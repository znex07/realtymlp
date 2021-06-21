    'use strict';

    var mapa = {
        map:null,
        lat : 0,
        lng : 0,
        circle:null,
        curRadius:100,
        curLocation: {
            set : false,
            lat: 13.0000,
            lng: 122.0000,
        },
        type:'',
        init: function(blowup) {
            blowup = (typeof blowup === 'undefined') ? false : blowup;
            mapa.map = new GMaps({
                el: '#map',
                width:'100%',
                height:'300px',
                lat: 13.0000,
                lng: 122.0000,
                zoomControl : true,
                zoomControlOpt: {
                    style : 'SMALL',
                    position: 'TOP_LEFT'
                },
                panControl : false,
                streetViewControl : true,
                mapTypeControl: true,
                overviewMapControl: true,
                drawingControl: true,
                disableDefaultUI: true,
                // zoom_changed: function() {
                //     console.log('zooom!');
                //     if (mapa.circle != null) {
                //         var curRadius = mapa.circle.getRadius();
                //         var curZoom = mapa.map.getZoom();
                //         var p = mapa.getScale(mapa.lat, curZoom);
                //         console.log(curRadius);
                //         // mapa.curRadius = p;
                //         // mapa.circle.setRadius(p);
                //     }
                // }
            });
            // var drawingManager = new google.maps.drawing.DrawingManager({
            //     drawingMode: google.maps.drawing.OverlayType.POLYLINE,
            //     drawingControl: true,
            //     drawingControlOptions: {
            //         position: google.maps.ControlPosition.TOP_CENTER,
            //         drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
            //     }
            // });
            var triangleCoords = [[-12.040397656836609,-77.03373871559225], [-12.040248585302038,-77.03993927003302], [-12.050047116528843,-77.02448169303511],	[-12.044804866577001,-77.02154422636042]];

            // Construct the polygon.
            var bermudaTriangle = mapa.map.drawPolygon({
                paths: triangleCoords,
                strokeColor: '#FF0000',
                strokeOpacity: 1,
                strokeWeight: 2,
                editable: true,
                clickable: true,
                setDraggable: true,
                fillColor: '#FF0000',
                fillOpacity: 0.8,
            });
            bermudaTriangle.setVisible(true);
            if (!blowup)
                mapa.geolocate();

        },

        init_blowup: function(options) {
            var o = options;

            mapa.lat = o.lat;
            mapa.lng = o.lng;
            mapa.curRadius = o.marker_scale || 100;
            mapa.map.setZoom(o.zoom);
            mapa.draw_markers(o.marker_type,true);

            mapa.map.setCenter(o.lat,o.lng);

            mapa.map.refresh();
        },

        draw_markers_blowup: function(type) {
            mapa.type = type;
            mapa.map.setCenter(mapa.lat,mapa.lng);
        },

        getScale: function(lat,curZoom) {
            return 156543.03392 * Math.cos(lat * Math.PI / 180) / Math.pow(2, curZoom);
        },

        geolocate: function() {
            GMaps.geolocate({
                success: function(position) {
                    mapa.lat = position.coords.latitude;
                    mapa.lng = position.coords.longitude;
                    mapa.map.setCenter(mapa.lat,mapa.lng);

                },

            });
        },
        geocodeFeatured: function() {
            var init = function() {
                    var province = $('#province option:selected').text(),
                        city = $('#city option:selected').text(),
                        street_address = $('#street_address').val(),
                        brgy = $('#brgy').val(),
                        address = '';
                    $('#complete_address').val(province + ' ' + city);
                    address = province + ' ' + city ;
                    mapa.trigger_geocode(address);
                    if(province != '') {
                        mapa.trigger_geocode(address);
                        $('#map-wrapper').fadeIn();
                        mapa.trigger_map();
                    }
                    else {
                        $('#map-wrapper').fadeOut();
                        mapa.curLocation = {
                            set : false,
                            lat : null,
                            lng : null
                        }
                    }
                }
            init();
        },
        geocode: function() {
            var init = function() {
                    var province = $('#province option:selected').text(),
                        city = $('#city option:selected').text(),
                        street_address = $('#street_address').val(),
                        brgy = $('#brgy').val(),
                        address = '';
                    $('#complete_address').val(province + ' ' + city);
                    address = province + ' ' + city;
                    if(province != 'Choose Province') {
                        mapa.trigger_geocode(address);
                        $('#map-wrapper').fadeIn();
                        mapa.curLocation = {
                            set : true,
                            lat: 13.0000,
                            lng: 122.0000
                        }
                        mapa.trigger_map();
                        mapa.map.refresh();
                    }
                    else {
                        // $('#map-wrapper').fadeOut();
                        mapa.curLocation = {
                            set : true,
                            lat: 13.0000,
                            lng: 122.0000
                        }
                    }
                }
            init();
        },

        map_button: function(elem) {
            var e = $(elem);
            if (e.attr('id') !== 'rmv-mrk') {
                $('#rmv-mrk').parent().fadeIn();
                $('.map-btn').not(elem).prop('checked',!e.prop('checked'));
                mapa.draw_markers($('.map-btn:checked').attr('id'));
                $('input[name=marker_type]').val(e.attr('id'));
            }
            else {
                $('input[name=marker_type]').val('');
                $('#rmv-mrk').parent().fadeOut();
                $('#map-btn-desc').fadeOut();
                $('.map-btn').prop('checked',false);
                mapa.draw_markers('');
            }

        },
        map_draw: function(){

            var drawingManager = new google.maps.drawing.DrawingManager({

                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.CIRCLE,
                        google.maps.drawing.OverlayType.POLYGON,
                        google.maps.drawing.OverlayType.POLYLINE,
                        google.maps.drawing.OverlayType.RECTANGLE
                    ]
                }});
            drawingManager.setMap(map.map);
        },

        popover: function() {
            $('#map-btn-desc').hide().text($('.map-btn:checked').data('content')).fadeIn(200);
        },

        draw_markers: function(type,blowup){
            blowup = (typeof blowup === 'undefined') ? false : blowup;
            mapa.type = type;

            mapa.map.setCenter(mapa.lat,mapa.lng);
            // mapa.map.setCenter({
            //     lat: mapa.lat, lng: mapa.lng
            // });

            if(mapa.curLocation.set) {
                mapa.map.setCenter(mapa.curLocation.lat,mapa.curLocation.lng);
                // mapa.map.setCenter({
                //     lat: mapa.curLocation.lat, lng: mapa.curLocation.lng
                // });
            }

            mapa.map.removeMarkers();
            if(mapa.circle != null)
                mapa.circle.setVisible(false);
            mapa.circle = null;

            if (type == 'pin') {

                var marker = mapa.map.addMarker({
                    lat:mapa.lat,
                    lng:mapa.lng,
                    draggable:true,
                    position_changed: function() {
                        var pos = this.getPosition();
                        // console.log("pin position changed", pos);
                        // alertify.alert('fdsfsdfdsfsdfdsfsd');
                        mapa.curLocation = {
                            set: true,
                            lat: pos.lat(),
                            lng: pos.lng()
                        };
                    },
                });


                if(mapa.curLocation.set) {
                    var center = mapa.map.getCenter();
                    console.log('pin location set: ', center);
                    marker.setPosition({
                        lat: center.lat(),
                        lng: center.lng()
                    });
                }
                if (blowup) {
                    marker.setDraggable(false);
                }
            }
            else if (type == 'area') {
                var circleOpt = {
                        lat:mapa.lat,
                        lng:mapa.lng,
                        radius: mapa.curRadius,
                        strokeColor: '#CD0000',
                        fillColor: '#f61c1c',
                        scale: 1,
                        editable:true,
                        draggable:true,
                        radius_changed: function() {
                            mapa.curRadius = this.getRadius();
                        },
                        center_changed: function() {
                            var center = this.getCenter();
                            mapa.curLocation = {
                                set: true,
                                lat: center.lat(),
                                lng: center.lng()
                            };
                        }
                    };

                mapa.circle = mapa.map.drawCircle(circleOpt);
                mapa.curRadius = mapa.circle.getRadius();
                mapa.circle.setVisible(true);
                if (blowup) {
                    mapa.circle.setDraggable(false);
                    mapa.circle.setEditable(false);
                }
                if(mapa.curLocation.set) {
                    var center = mapa.map.getCenter();
                    mapa.circle.setCenter({
                        lat:center.lat(),
                        lng:center.lng()
                    });
                }
            } else if(type == 'draw')
            {
                // var drawingManager = new google.maps.drawing.DrawManager({
                //     drawingMode: google.maps.drawing.OverlayType.MARKE
                // });

            }

        },

        setLatLng: function(lat,lng) {
            mapa.lat = lat;
            mapa.lng = lng;
        },

        trigger_map : function(isEdit) {
            isEdit = (typeof isEdit === 'undefined') ? false : isEdit;

            mapa.map.refresh();

            if(mapa.curLocation.set){
                mapa.map.setCenter(mapa.curLocation.lat,mapa.curLocation.lng);
                // mapa.map.setCenter(mapa.curLocation.lat,mapa.curLocation.lng);
            }
        },

        trigger_geocode: function(address) {
            var init = function(address) {
                    GMaps.geocode({
                        address: address,
                        callback: next
                    });
                },
                next = function(results,status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        mapa.lat = latlng.lat();
                        mapa.lng = latlng.lng();
                        mapa.curLocation = {
                            set: true,
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        };
                        mapa.map.setCenter(mapa.lat,mapa.lng);
                        mapa.draw_markers(mapa.type);
                    }
                    else {
                        alertify.error('Cannot locate your address on Map');
                    }
                };
            init(address);

        },

        set_map_options: function() {
            var map_options = {
                marker_type: mapa.type,
                lat: mapa.curLocation.lat,
                lng: mapa.curLocation.lng,
                zoom: mapa.map.getZoom(),
                marker_scale: mapa.curRadius || 0
            };
            $('input[name=map_options]').val(JSON.stringify(map_options));
        }
    }
