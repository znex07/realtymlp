// // JavaScript Document

// function readURL(input,target) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             target.attr('src', e.target.result);
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $(document).ready(function(e){
//     var $btnCrop = $('#btnCrop'),
//         $btnCancel = $('#btnCancel'),
// 		rlid = null;
// 	$('#DisplayPicture').click(function(e){
// 		$('#avatar-upload').modal('toggle');
// 		rlid = $('#rlid').val();
// 	});
//     $('.avatar-form').submit(function(e){
//         e.preventDefault();
//         var data = new FormData(this);
// 		data.append('rlid',rlid);
//         //$.ajax({
//         //    url:"helper/uploadAvatar.php",
//         //    type:"post",
//         //    data:data,
//         //    cache: false,
//         //    processData: false,
//         //    contentType: false,
//         //    success:function(response){
//         //        var data = jQuery.parseJSON(response);
//         //        console.log(data.status +'\n'+data.returned_path);
//         //        //alert(data.status);
//         //        if(data.status === 'success'){
//         //            $('#DisplayPicture').css({'background-image':'url(' + data.returned_path + ' )'});
//         //            $("#avatar-upload").modal('toggle');
//         //        //    //alert('Returned Path: '+data.returned_path);
//         //        }
//         //    }
//         //});
//     });
//     //$btnCrop.click(function(e){
//     //    e.preventDefault();
//     //    var data = $('.avatar-form').serialize();
//     //    alert(data);
//     //    $.ajax({
//     //        url:"helper/uploadAvatar.php",
//     //        type:"post",
//     //        data:data,
//     //        processData:false,
//     //        success:function(response){
//     //            alert(response);
//     //        }
//     //    });
//     //});
//     $('#avatarInput').change(function(){
//         if (this.files && this.files[0]) {
//             readURL(this,$('#avatar-img'));
//             $('.modal-dialog').animate({
//                 width:800
//             },500,function(){
//                 $(this).removeClass('.modal-dialog-start');
//                 $btnCrop.fadeIn();
//                 $btnCancel.html("Discard");
//                 $('#avatar-img').fadeIn("slow");
//             });
//         }
//     });
//     $("#avatar-upload").on('hidden.bs.modal', function () {
//         $('.modal-dialog').addClass('modal-dialog-start').attr('style','');
//         $btnCrop.hide();
//         $('#avatar-img').hide();
//     });

// });