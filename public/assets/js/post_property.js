$(document).ready(function(e) {
	// prop transaction
	var Region="",Province="";
	$('.btnRadio').click(function(e)
	{
        var id = $(this).attr('id');
		$('.btnRadio').each(function(index, element)
		{
			$('.btnRadio').removeClass('btn-info');
            $('.btnRadio').removeClass('btn-primary');
			$('.btnRadio').addClass('btn-info');
        });
		$('#'+id).removeClass('btn-info');
		$('#'+id).addClass('btn-primary');
		$('#txtTransType').val(id);
    });
	$('.btnRadioPost').click(function(e) {
        var id = $(this).attr('id');
		$('.btnRadioPost').removeClass('btn-primary').addClass('btn-info');
		$(this).removeClass('btn-info').addClass('btn-primary');
		$('#txtPropertyPost').val(id);
    });

	// tooltips 
	$(".tips").mouseover(function(event){
		var child = $(event.target).children();
		$(child).fadeIn(300);
	});
	$(".tips").mouseout(function(){
		$(".tips span").hide();
	});
	// showMap
	$('#txtCity, #txtAddress').change(function(){
		$('#btnShowMap').attr('disabled',false);
	});
	// btnShowMap
	$('#btnShowMap').click(function(){
		if($('#btnShowMap').val() == "Show Map"){	
		  $('#map-canvas').fadeIn(500);
		  var address = $('#txtAddress').val() +' '+ $('#txtProvince option:selected').text() + ', '+ $('#txtCity option:selected').text();
		  $('#address').val(address);
		  google.maps.event.trigger(map, 'resize')
		  codeAddress();
		  $('#btnShowMap').val("Hide Map");
		}
		else if($('#btnShowMap').val() == "Hide Map"){	
		   $('#map-canvas').fadeOut(500);
		   $('#btnShowMap').val("Show Map");
		   clearMarker();
		   
		}
	});
	// category
	$('#txtPropType').change(function(){
		var selVal = $("#txtPropType option:selected").val();
		if(selVal == "0000000001"){ // forland
			$(".forcom").hide();
			$(".forcom:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forhomes").hide();
			$(".forhomes:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forland").show();
			$(".forland:visible .form-group div > input").each(function(index, element) {
                $(this).attr("required",true);
            });
		}
		else if(selVal == "0000000002"){
			$(".forcom").hide();
			$(".forcom:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forland").hide();
			$(".forland:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forhomes").show();
			$(".forhomes:visible .form-group div > input").each(function(index, element) {
                $(this).attr("required",true);
            });
		}
		else if(selVal == "0000000003"){
			$(".forland").hide();
			$(".forland:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forhomes").hide();
			$(".forhomes:hidden .form-group div > input").each(function(index, element) {
                $(this).attr("required",false);
            });
			$(".forcom").show();
			$(".forcom:visible .form-group div > input").each(function(index, element) {
                $(this).attr("required",true);
            });
		}
		
		
		$.ajax({
		  url: "helper/subcat.php",
		  type: "get",
		  data:{"q":selVal},
		  success: function(response) {
			  $( "label[for=txtSubCat],#txtSubCat" ).each(function() {
                $(this).fadeOut(10,function(){
					$(this).fadeIn(500);
				});
              });
			  $('#txtSubCat').html(response);
 		  },
		  error: function(xhr) {
			//Do Something to handle error
		  }
		});
	});
	
	// province
	$('#txtRegion').change(function(){
		var selText = $("#txtRegion option:selected").val();
		Region = selText;
		$.ajax({
		  url: "helper/province.php",
		  type: "get",
		  data:{"q":selText},
		  success: function(response) {

			  $( "label[for=txtProvince],#txtProvince" ).each(function() {
                $(this).fadeOut(10,function(){
					$(this).fadeIn(500);
				});
              });
			  $('#txtProvince').html(response);
 		  },
		  error: function(xhr) {
			//Do Something to handle error
		  }
		});
	});
	// city
	$('#txtProvince').change(function(){
		var selText = $("#txtProvince option:selected").val();

		Province = selText;
		$.ajax({
		  url: "helper/city.php",
		  type: "get",
		  data:{"region":Region == "" ? "" : Region,"province": Province=="" ? "" : Province},
		  success: function(response) {
			  $( "label[for=txtCity],#txtCity" ).each(function() {
                $(this).fadeOut(100,function(){
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
	
	// textarea limit
	$('#txtPropTitle').keypress(function(e) {
		var tval = $('#txtPropTitle').val(),
			tlength = tval.length,
			set = 100-1,
			remain = parseInt(set - tlength);
		
		$('#counter').text(remain+" Characters left");
		if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
			$('#txtPropTitle').val((tval).substring(0, tlength - 1))
		}
	}).change(function(e) {
		console.log("txtPropTitle");
        $("#prev-title").text( $(this).val());
    });
	
	$(".pprice").change(function(e) {
	    $("#prev-price").html('&#8369;&nbsp;' + $(this).val());
    });
	
	$("#txtAddress").change(function(e) {
	    $("#prev-location").html('<span class="fa fa-map-marker"></span>&nbsp;' + $('#txtProvince option:selected').text() + ", " + $('#txtCity option:selected').text() + ", " +$(this).val());
    });
	$(".btnRadio").click(function(e) {
        $("#prev-type").text("Transaction Type: "+$(this).text());
    });
	// textarea limit
	$('#txtDescription').keypress(function(e) {
		var tval = $('#txtDescription').val(),
			tlength = tval.length,
			set = 250-1,
			remain = parseInt(set - tlength);
		$('#counterD').text(remain+" Characters left");
		if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
			$('#txtDescription').val((tval).substring(0, tlength - 1))
		}
	});
	
	// stepwizard
	var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

	allWells.hide();
    navListItems.click(function (e) {
      	e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            //$target.find(':eq(0)').focus();
        }
    });
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type=text]:visible,textarea:visible,select:visible"),
            isValid = true;
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});