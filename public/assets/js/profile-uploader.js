'use strict';
$('.profile-userpic .avatar-placeholder')
    .on('click', function() {
        $('#profile_image').click();
    });

$('#profile_image').on('change', function() {
    $('#avatar-uploader-form').submit();
});
