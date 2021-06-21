    $(document).ready(function() {
        var newF = null;
        var ctr = 1;

        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    target.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#addMore").click(function(e) {
            $("#fimg" + ctr).trigger("click");
            $("#fimg" + ctr).change(function(e) {
                if (this.files && this.files[0]) {
                    $(".input-img").append(
                        $("<img />", {
                            id: 'prevImg' + ctr,
                            class: 'prevImg'
                        })
                    );
                    readURL(this, $('#img' + ctr));
                    if (ctr <= 1) {
                        $('#pos-caption' + ctr).fadeTo("slow", 0.50);
                        readURL(this, $('#prev-img'));
                    }
                    /*else{
                     $('#pos-caption'+ctr).text("Secondary Image").css({"font-size":"12px"}).fadeTo("slow",0.50);;
                     }*/
                    $("#timg" + ctr).attr('disabled', false);
                    $("#ekis" + ctr).fadeIn("fast").click(function(e) {
                        var parent = $(this).parent().parent();
                        parent.remove();
                        /*              var divis = $(".pos-img");
                         var firsts = divis.find(".pos-caption");*/
                    });;
                    ctr += 1;
                    var newCap = ctr <= 1 ? 'Main Image' : 'Add More Image';
                    newF = '<div class="col-sm-4 pos-img">' +
                        '<div>' +
                        '<img class="img-center img-thumbnail img-prev" src="img/img_tder.png" id="img' + ctr + '">' +
                        '<img id="ekis' + ctr + '" class="ekis" style="display:none;cursor:pointer; width:16px;height:16px;" src="img/delete.png" />' +
                        '</div>' +
                        '<div class="img-text">' +
                        '<input type="file" class="hidden" name="fimg[]" id="fimg' + ctr + '" accept=".png,.jpg">' +
                        '</div>' +
                        '</div>';
                    $("#pos_img_container").append(newF).fadeIn("slow");
                    $("#addMore").text("Add More Photos");
                }

            });
        });




        var Region = "",
            Province = "";
        $('.btnRadio').click(function(e) {
            var id = $(this).attr('id');
            $(".btnRadio").removeClass('active');
            $(this).addClass('active');
            $('#txtTransType').val(id);
        });
        $('.btnRadioPost').click(function(e) {
            var id = $(this).attr('id');
            $('.btnRadioPost').removeClass('active');
            $(this).addClass('active');
            $('#txtPropertyPost').val(id);
        });
        $('#txtCity, #txtAddress,#txtRegion,#txtProvince').on('change', function(e) {
            if ($(this).val() != '')
                $('#btnShowMap').attr('disabled', false);
            else
                $('#btnShowMap').attr('disabled', true);
        });
        $('#btnShowMap').click(function() {
            if ($(this).val() == "Show Map") {
                $('#map-canvas').fadeIn(500);
                var address = $('#txtAddress').val() + ' ' + $('#txtProvince option:selected').text() + ', ' + $('#txtCity option:selected').text();
                $('#address').val(address);
                google.maps.event.trigger(map, 'resize')
                codeAddress();
                $('#btnShowMap').val("Hide Map");
            } else if ($(this).val() == "Hide Map") {
                $('#map-canvas').fadeOut(500);
                $('#btnShowMap').val("Show Map");
                clearMarker();
            }
        });
        $('#txtPropType').change(function() {
            var selVal = $("#txtPropType option:selected").val();
            var forcom = $(".forcom"),
                forhomes = $(".forhomes"),
                forland = $(".forland");
            switch (selVal) {
                case '0000000001':
                    forcom.hide();
                    forcom.find(".pprice").attr('required', false);
                    forhomes.hide();
                    forhomes.find(".pprice").attr('required', false);
                    forland.show();
                    break;
                case '0000000002':
                    forcom.hide();
                    forhomes.show();
                    forland.hide();
                    forland.find(".pprice").attr('required', false);
                    forcom.find(".pprice").attr('required', false);
                    break;
                case '0000000003':
                    forcom.show();
                    forhomes.hide();
                    forland.hide();
                    forland.find(".pprice").attr('required', false);
                    forhomes.find(".pprice").attr('required', false);

                    break;
            }
            $.ajax({
                url: "helper/subcat.php",
                type: "get",
                data: {
                    "q": selVal
                },
                success: function(response) {
                    $("label[for=txtSubCat],#txtSubCat").each(function() {
                        $(this).fadeOut(10, function() {
                            $(this).fadeIn(500);
                        });
                    });
                    $('#txtSubCat').html(response);
                }
            });
        });
        $('#txtRegion').change(function() {
            var selText = $("#txtRegion option:selected").val();
            Region = selText;
            $.ajax({
                url: "helper/province.php",
                type: "get",
                data: {
                    "q": selText
                },
                success: function(response) {
                    $("label[for=txtProvince],#txtProvince").each(function() {
                        $(this).fadeOut(10, function() {
                            $(this).fadeIn(500);
                        });
                    });
                    $('#txtProvince').html(response);
                }
            });
        });
        $('#txtProvince').change(function() {
            var selText = $("#txtProvince option:selected").val();
            Province = selText;
            $.ajax({
                url: "helper/city.php",
                type: "get",
                data: {
                    "region": Region == "" ? "" : Region,
                    "province": Province == "" ? "" : Province
                },
                success: function(response) {
                    $("label[for=txtCity],#txtCity").each(function() {
                        $(this).fadeOut(100, function() {
                            $(this).fadeIn(500);
                        });
                    });
                    $('#txtCity').html(response);
                },
                error: function(xhr) {
                    //Do Something to handle error
                }
            });
        });
        $('#txtPropTitle').keypress(function(e) {
            var tval = $('#txtPropTitle').val(),
                tlength = tval.length,
                set = 100 - 1,
                remain = parseInt(set - tlength);

            $('#counter').text(remain + " Characters left");
            if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                $('#txtPropTitle').val((tval).substring(0, tlength - 1))
            }
        }).change(function(e) {
            $("#prev-title").text($(this).val());
        });
        $(".pprice").change(function(e) {
            $("#prev-price").html('&#8369;&nbsp;' + $(this).val());
        });
        $("#txtAddress").change(function(e) {
            $("#prev-location").html('<span class="fa fa-map-marker"></span>&nbsp;' + $('#txtProvince option:selected').text() + ", " + $('#txtCity option:selected').text() + ", " + $(this).val());
        });
        $('#txtDescription').keypress(function(e) {
            var tval = $('#txtDescription').val(),
                tlength = tval.length,
                set = 250 - 1,
                remain = parseInt(set - tlength);
            $('#counterD').text(remain + " Characters left");
            if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                $('#txtDescription').val((tval).substring(0, tlength - 1))
            }
        });

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();
        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('.btnRadio:eq(0)').focus();
            }
        });


        allNextBtn.click(function() {
            console.log("qweqwe");
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text']:visible,textarea:visible"),
                isValid = true;

            $(".form-group").removeClass("has-error");

            //for (var i = 0; i < curInputs.length; i++) {
            //    if (!curInputs[i].validity.valid) {
            //        isValid = false;
            //        $(curInputs[i]).closest(".form-group").addClass("has-error");php
            //    }
            //    console.log("element: " + curInputs[i] + " - " + curInputs[i].validity.valid);
            //}
            //
            //if ($("#txtPropType option:selected").val() == 'default') {
            //    $("#txtPropType").closest('.form-group').addClass('has-error');
            //    isValid = false;
            //}
            //if ($("#txtSubCat:visible option:selected").val() == 'default') {
            //    $("#txtSubCat").closest('.form-group').addClass('has-error');
            //    isValid = false;
            //}
            //if ($("#txtRegion option:selected").val() == 'default') {
            //    $("#txtRegion").closest('.form-group').addClass('has-error');
            //    isValid = false;
            //}
            //if ($("#txtProvince:visible option:selected").val() == 'default') {
            //    $("#txtProvince").closest('.form-group').addClass('has-error');
            //    isValid = false;
            //}
            //if ($("#txtCity:visible option:selected").val() == 'default') {
            //    $("#txtCity").closest('.form-group').addClass('has-error');
            //    isValid = false;
            //}
            //            if(!$("#txtTransType").val()){console.log("qweqwe"); $(".btnRadio").addClass('btn-danger');$("#txtTransType").closest('.form-group').addClass('has-error');isValid = false;}
            //            else{console.log("asdasdasd"); $(".btnRadio").removeClass('btn-danger');$("#txtTransType").closest('.form-group').removeClass('has-error');isValid = true;}
            //            if($("#txtDescription:visible").val() == ''){$("#txtTransType").closest('.form-group').addClass('has-error');isValid = false;}



            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');

        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    })
