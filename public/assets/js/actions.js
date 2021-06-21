$('#move_to_private').click(function (e) {
    var id = $(this).data(id);
    alertify.confirm("RealtyMLP","Are you sure you want to remove this to private ?",
        function(){
            $.ajax({
                url:"",
                type:"post",
                data:[],
                success: function(success) {

                },
                error: function(err) {

                }
            });
        },
        function(){
            alertify.error('Cancel');
        });

});

$('#edit').click(function (e) {
    console.log('hello_world');
});

$('#delete').click(function (e) {

    alertify.confirm("RealtyMLP","Are you sure you want to delete this property ?",
        function(){
            alertify.success('Yes');
        },
        function(){
            alertify.error('Cancel');
        });

});

$('#list_public').click(function (e) {
    $('.list_view').show();
    $('.grid_view').hide();
});
$('#grid_public').click(function (e) {
    $('.list_view').hide();
    $('.grid_view').show();
});

$('#list_quick').click(function (e) {
    $('.list_view').show();
    $('.grid_view').hide();
});
$('#grid_quick').click(function (e) {
    $('.list_view').hide();
    $('.grid_view').show();
});

$('#list_shared').click(function (e) {
    $('.list_view').show();
    $('.grid_view').hide();
});
$('#grid_shared').click(function (e) {
    $('.list_view').hide();
    $('.grid_view').show();
});/**
 * Created by Joram on 9/23/2015.
 */
