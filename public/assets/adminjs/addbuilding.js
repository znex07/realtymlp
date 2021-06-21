$(document).ready(function () {
    $('#province').on('change',function () {
        var province = $('#province option:selected').val();
        // console.log(province);
        $('#c_city').show();
        $.ajax({
            url: '/admin/buildings/building/requests',
            method: 'GET',
            data: {
                province: province,
            },
            success: function (data) {
                var appendData = '';
                $.each(data, function (index, city) {
                    appendData += '<option value="'+ city.id+'">'+city.name+'</option>'
                });
                $('#city').html(appendData)
                $('#c_brgy').show();
                $('#c_street_address').show();
            }
        })
    });
    // $('#addBuilding-submit').on('click',function () {
    //    var formData = {

    //    }
    //    console.log(formData);
    // });
    $('body').on('click', '#addBuilding-submit', function(){
        var addBuildingForm = $("#addDataBuilding");
        var formData = {
            bldg_name: $('#bldg_name').val(),
            province : $('#province option:selected').val(),
            province_name : $('#province option:selected').text(),
            city: $('#city option:selected').val(),
            city_name: $('#city option:selected').text(),
            brgy: $('#brgy').val(),
            street_address: $('#street_address').val(),
        };
        console.log(formData);
        $( '#bldg_name-error' ).html( "" );
        $( '#province-error' ).html( "" );
        $( '#city-error' ).html( "" );
        $( '#brgy-error').html("");
        $( '#street_address-error').html("");

        $.ajax({
            url:'/admin/buildings/building/addBuilding',
            type:'get',
            data:formData,
            success:function(data) {
                // console.log(data.errors.bldg_name);
                if(data.errors) {
                    if(data.errors.bldg_name){
                        $('#bldg_name-error').html(data.errors.bldg_name);
                    }
                    if(data.errors.province){
                        $( '#province-error' ).html( data.errors.province );
                    }
                    if(data.errors.city){
                        $( '#password-error' ).html( data.errors.city );
                    }
                    if(data.errors.brgy){
                        $( '#brgy-error' ).html( data.errors.brgy );
                    }
                    if(data.errors.street_address){
                        $( '#street_address-error' ).html( data.errors.street_address );
                    }
                }
                if(data.success) {
                    $('#success-msg').removeClass('hide');
                    setInterval(function(){

                    }, 3000);
                    alertify.confirm('Success', 'New Building Added Successfully !', function()
                        {
                           location.reload();
                        }
                        , function()
                        {
                        });
                }
            },
        });
    });

});