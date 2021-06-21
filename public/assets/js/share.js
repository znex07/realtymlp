var document_container = $("#document_container"),
    document_template = null,
    $sharingData = $("#sharingData"),
    $m_property_price = $('#m_property_price'),
    $m_property_location = $('#m_property_location'),
    $m_property_attribute = $('#m_property_price'),
    $m_property_title = $('#m_property_title'),
    $m_property_picture = $('#m_property_picture');

var aff = new Bloodhound({
    datumTokenizer:Bloodhound.tokenizers.obj.whitespace('email'),
    queryTokenizer:Bloodhound.tokenizers.whitespace,
    remote:{
        url: 'dashboard/getUsersInfo?value=%QUERY'
    }
});
aff.initialize();
var elt = $('input.tagsinput-typeahead');
elt.tagsinput({
    itemValue:'id',
    itemText:'email',
    typeaheadjs:{
        name:'affiliates',
        displayKey:function(data){
            return '<span style="padding:0;margin:0;"><strong style="text-transform:capitalize;">'+data.user_fname +' '+data.user_lname+'</strong>'+
                '<p style="font-size:14px; margin-top:0; margin-bottom:0; color:#848484;margin-top:-15px;margin-left:5px;">-'+data.email+'</p>'+
                '</span>';
        },
        source:aff.ttAdapter()
    }
});
$('body').on('click','.doc_img',function(){
    $(this).parent().find('label').trigger('click');
});
$('#show_advanced').click(function () {
    var advance_settings = $('#advance_settings');
    var status = $(this).data('status');

    if(status == 'hidden') {
        advance_settings.slideDown();
        $(this).text('Hide Advanced Settings');
        $(this).data('status','visible');
    }
    else if(status == 'visible') {
        advance_settings.slideUp();
        $(this).text('Advanced Settings');
        $(this).data('status','hidden');
    }
});
$("#share").on('show.bs.modal',function(e){
    var triggerButton = $(e.relatedTarget),
        inputs = triggerButton.parent().find('input[type=hidden]'),
        ext = "",icon="",
        property_id = $("input[name=property_id]"),
        property_data = triggerButton.parent().find('div#property-data');


    property_id.val(triggerButton.data('id'));
     // set modal property data
    $m_property_price.text('Price: '+property_data.data('m_property_price'));
    $m_property_picture.css({'background-image':'url(/uploads/'+property_data.data('m_property_picture')+')'});
    $m_property_title.text(property_data.data('m_property_title'));
    $m_property_location.text();

    document_container.empty();

    inputs.each(function(i,v){
        var val = JSON.parse($(v).val());
        document_template = $("#documents_template").clone();
        ext = getFileExtension(val.file_path);

        if(ext != "jpg" && ext != "png" && ext != "gif" && ext != "bmp" && ext != "jpeg") icon = '/img/icons/'+ext+'.png';
        else icon = '/uploads/'+val.file_path;
        document_template.find('img.doc_img').attr({
            'src':icon,
            'title':val.orig_name,
            'data-id':val.id
        });
        document_template.find('label input.doc_cb').attr({
            'id':'doc'+val.id,
            'data-id':val.id
        });
        document_template.find('label.doc_label').attr({
            'for':'doc'+val.id,
            'data-id':val.id
        });
        document_template.show();
        document_container.append(document_template);
    });
});
$("#submitShare").click(function(e){

    var limit = $("input.doc_cb").length;
    $("input.doc_cb").each(function(i,v){
        if($(v).is(':checked') && i < limit-1)
        {
            $sharingData.append('<input type="hidden" name="_documents_id[]" value="'+$(v).data('id')+'">');
        }
    });
    $("input[type=checkbox].options").each(function(i,v){
        var val = false;
        if($(v).is(':checked')) val = true;
        var input = $('<input>').attr({
            type: 'hidden',
            name: '_sharing_options[]',
            value: $(v).attr('id')+':'+val
        });
        $sharingData.append(input);
    });
    var affisDatum = $("input.tagsinput").tagsinput('items');
    $.each(affisDatum,function(i,v){
        var input = $('<input>').attr({
            type:'hidden',
            name:'_affiliate_ids[]',
            value: v.id
        });
        $sharingData.append(input);
    })

    $("#formShare").submit();
})
$('input.tagsinput-typeahead').change(function(){
    if($(this).val() !== '')
        $('button[type=submit]').attr('disabled',false)
    else
        $('button[type=submit]').attr('disabled',true)
});



function getFileExtension(filename){
    var ext = /^.+\.([^.]+)$/.exec(filename);
    return ext == null ? "" : ext[1];
}
/**
 * Created by Joram on 9/23/2015.
 */
