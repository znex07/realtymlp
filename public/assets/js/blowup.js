$('#fullname').on('input', function (e) {
  var fullname = $(this).val();

  $('#inquirer').val(fullname);

});

$('#show_contact').click(function (e) {
     $('#phone_number').show('slow');

     var pcode = $('#property_code').val();
     var token = $('#_token').val();
     var inquirer = $('#inquirer').val();
     var viewer = $('#viewer').val();

   
     $.ajax (
       {
        url:'/blowup/save_log',
        type: 'post',
        data: {"_token": token,"property_code": pcode, "action": "YOUR CONTACT WAS VIEWED", 'inquirer_type': viewer , 'inquirer_name' : inquirer ,"type": "1"},
        success: function (success) {
         console.log(success);
      },
      error: function (error) {
         console.log(error);
      }
    });

});

$('#show_email').click(function (e) {
   $('#email_address').show('slow');

   var pcode = $('#property_code').val();
   var token = $('#_token').val();
   var inquirer = $('#inquirer').val();
   var viewer = $('#viewer').val();

   $.ajax (
   {
    url:'/blowup/save_log',
    type: 'post',
    data: {"_token": token,"property_code": pcode, "action": "YOUR EMAIL WAS VIEWED", 'inquirer_type': viewer , 'inquirer_name' : inquirer  ,"type": "1"},
    success: function (success) {
     console.log(success);
  },
  error: function (error) {
     console.log(error);
  }
}
);

});

$(function() {
   mapa.init(true);
   var map_options = $.parseJSON($('#map_options').val()) || null;
   // alertify.alert('lat' + map_options.lat);
   mapa.init_blowup(map_options);
   $('.panel-heading span.clickable').on('click', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
     $this.parents('.collapsible').find('.panel-body').slideUp();
     $this.addClass('panel-collapsed');
     $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
  } else {
     $this.parents('.collapsible').find('.panel-body').slideDown();
     $this.removeClass('panel-collapsed');
     $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
  }
});
});
