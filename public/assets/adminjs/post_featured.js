/**
 * Created by Ling on 8/4/2015.
 */
function readURL(input,target) {
    if (input.files && input.files[0]) {
//                ready = false;
        var reader = new FileReader();
        reader.onload = function (e) {
            target.attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function getSourceOfFirstImage(target){
    return target.attr('src');
}
$(function() {
    var $trigger2 = $("#trigger2"),$propertyFileContainer = $("#propertyFileContainer"),$propertyContainer = $("#propertyContainer"),$propertyImageContainer = $("#propertyImageContainer"),newPF,newPI,ctr2= 1,
        newF,newI,ctr=1,$BrandTitleContainer = $("#cont"),$trigger = $("#trigger"),$fileContainer = $("#fileContainer"),triggerHeight = $("#triggerImage").height();
    var fd = new FormData(),$btnFinish = $("#btnFinish");
    var propertyCounter = 0;
    $("body").on('change','.txtBrandPictures',function(e){
        if(this.files && this.files[0]){
            newI = '<div class="col-lg-3" style="padding-top: 3px;padding-bottom:3px;">' +
                    '<img src="/img/ekis.gif" data-file-id="txtBrandPictures'+ctr+'" class="ekis" style="width:16px; height:16px;cursor:pointer;position:absolute;right:16px;top:1px;z-index:999;">' +
                    '<img src="" id="brandImage'+ctr+'" style="height:'+triggerHeight+'px;width:100%;">'+
                   '</div>';
            $BrandTitleContainer.append(newI);
            readURL(this,$("#brandImage"+ctr));
            ctr++;

            newF = '<input type="file" id="txtBrandPictures'+ctr+'" class="txtBrandPictures hidden" name="txtBrandPictures[]">';
            $fileContainer.append(newF);
            $trigger.attr('for','txtBrandPictures'+ctr);
        }
    }).on('change',".txtPropertyImages",function(e){
        if(this.files && this.files[0]){
            newPI = '<div class="col-lg-3" style="padding-bottom: 3px;padding-top:3px;">'+
                    '<img src="/img/ekis.gif" data-file-id="txtPropertyImages'+ctr+'" class="ekis" style="width:16px; height:16px;cursor:pointer;position:absolute;right:16px;top:1px;z-index:999;">' +
                    '<img src="" class="propertyImage" id="propertyImage'+ctr2+'" style="height:75px;width: 100%;">'+
                    '</div>';
            $propertyImageContainer.append(newPI);
            readURL(this,$("#propertyImage"+ctr2));
            ctr2++;
            newPF = '<input type="file" class="hidden txtPropertyImages" id="txtPropertyImages'+ctr2+'" name="txtPropertyImages[]">';
            $propertyFileContainer.append(newPF);
            $trigger2.attr('for','txtPropertyImages'+ctr2);
        }
    }).on("click","#btnPropertyAdd",function(e){
        var $txtPropertyType = $(".txtPropertyType:checked"),$txtPropertyTitle = $("#txtPropertyTitle"),$txtPropertyPrice = $("#txtPropertyPrice"),$txtPropertyFloorArea = $("#txtPropertyFloorArea"),$txtPropertyBedrooms = $("#txtPropertyBedrooms"),$txtPropertyParking = $("#txtPropertyParking"),$txtPropertyBath = $("#txtPropertyBath"),$txtPropertyAvailability = $("#txtPropertyAvailability"),$txtPropertyImages = $(".txtPropertyImages"),propertyThumbnail;
        propertyThumbnail = '<div class="col-md-12 no-padding"><div class="panel panel-default"><div class="panel-body"><img src="'+getSourceOfFirstImage($(".propertyImage:first"))+'" style="height:100px;width:100%;"><h6>'+$txtPropertyTitle.val()+'</h6><p class="text-muted" style="text-transform: uppercase;">SIZE: '+$txtPropertyFloorArea.val()+'</p></div><div class="panel-footer" style="text-transform: uppercase;">'+$txtPropertyType.val()+' <span class="label label-success pull-right">PHP '+$txtPropertyPrice.val()+'</span></div></div></div>';

        $propertyContainer.append(propertyThumbnail);
        fd.append("txtPropertyType[]",$txtPropertyType.val());
        fd.append("txtPropertyTitle[]",$txtPropertyTitle.val());
        fd.append("txtPropertyPrice[]",$txtPropertyPrice.val());
        fd.append("txtPropertyFloorArea[]",$txtPropertyFloorArea.val());
        fd.append("txtPropertyBedrooms[]",$txtPropertyBedrooms.val());
        fd.append("txtPropertyParking[]",$txtPropertyParking.val());
        fd.append("txtPropertyBath[]",$txtPropertyBath.val());
        fd.append("txtPropertyAvailability[]",$txtPropertyAvailability.val());
        $.each($txtPropertyImages,function(i,v){fd.append("txtPropertyImages[]", v.files[0]);});
        fd.append("txtPropertyType"+propertyCounter,$txtPropertyType.val());
        fd.append("txtPropertyTitle"+propertyCounter,$txtPropertyTitle.val());
        fd.append("txtPropertyPrice"+propertyCounter,$txtPropertyPrice.val());
        fd.append("txtPropertyFloorArea"+propertyCounter,$txtPropertyFloorArea.val());
        fd.append("txtPropertyBedrooms"+propertyCounter,$txtPropertyBedrooms.val());
        fd.append("txtPropertyParking"+propertyCounter,$txtPropertyParking.val());
        fd.append("txtPropertyBath"+propertyCounter,$txtPropertyBath.val());
        fd.append("txtPropertyAvailability"+propertyCounter,$txtPropertyAvailability.val());
        $.each($txtPropertyImages,function(i,v){fd.append("txtPropertyImages"+propertyCounter+"[]", v.files[0]);});
        $txtPropertyType.parent().removeClass('active');$txtPropertyTitle.val('');$txtPropertyPrice.val('');$txtPropertyFloorArea.val('');$txtPropertyBedrooms.val('');$txtPropertyParking.val('');$txtPropertyBath.val('');$txtPropertyAvailability.val('');$propertyImageContainer.empty();$(".txtPropertyImages:not(:last)").remove();
        propertyCounter++;
        $("#myModal").modal('hide');
    }).on("click",".ekis",function(e){
        var $this = $(this),id = $this.data("file-id");
        $("#"+id).remove();
        $this.parent().fadeOut(500).remove();
    }).on("click","#btnFinish",function(e){
        var $txtBrandTitle = $("#txtBrandTitle"),$txtBrandDescription = $("#txtBrandDescription"),$txtBrandPictures = $(".txtBrandPictures"),$txtBrandSubDescription=$("#txtBrandSubDescription");

        fd.append("txtBrandTitle",$txtBrandTitle.val());
        fd.append("txtBrandDescription",$txtBrandDescription.val());
        fd.append("txtBrandSubDescription",$txtBrandSubDescription.val());
        fd.append("propertyCounter",propertyCounter);

        $.each($txtBrandPictures,function(i,v){fd.append("txtBrandPictures[]", v.files[0]);});
        $.ajax({
            type: "POST",
            url: "/helper/post_featured_property.php",
            data:fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log("Response: "+response);
                //window.location.assign('admin_post_featured.php');
                //var d = jQuery.parseJSON(response);
                //if(d.picProperty && d.picBrand && d.property && d.brand){
                //
                //}

            },
            error: function(xhr) {
                //Do Something to handle error
            }
        })

    }).tooltip({ selector: '[data-tooltip=tooltip]' });
});