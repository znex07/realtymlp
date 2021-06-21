$('.price_form').show();
var availability = $('#availability_type').val();

var type = {{ $property->listing_type }};
if (type == '1') {
    $('#f_rental_price').show();
    $('#f_selling_price').hide();
}
else if (type == '2') {
    $('#f_selling_price').show();
    $('#f_rental_price').hide();

}
else if (type == '3') {
    $('#f_rental_price').hide();
    $('#f_selling_price').hide();
}

if (type == '1') {
    $("#availability_type option[value=1]").hide();
    $("#availability_type option[value=4]").hide();

    $("#availability_type option[value=2]").show();
    $("#availability_type option[value=5]").show();
}
else if (type == '2') {
    $("#availability_type option[value=2]").hide();
    $("#availability_type option[value=5]").hide();
    $("#availability_type option[value=1]").show();
    $("#availability_type option[value=4]").show();

}
else if (type == '3') {
    $("#availability_type option[value=1]").hide();
    $("#availability_type option[value=2]").hide();
    $("#availability_type option[value=4]").hide();
    $("#availability_type option[value=5]").hide();

}
var values = $(this).val(),
    loader = $('#l_property_type'),
    c_property_type = $('#c_property_type'),
    property_type = $('#property_type');
var start = function () {
        c_property_type.show();
        loader.fadeIn();
        property_type.attr({
            disabled: true
        });
        var _ajx = $.post('/admin/post/postClassification', {
            _token: csrf_token,
            'classifications': values
        });
        _ajx.done(ajx);
    },
    ajx = function (_data) {
        var d = $.map(_data, function (item) {
            return {
                id: item.id,
                parent_id: item.parent_id,
                text: item.department_name,
            };
        });

        load(d);
    },
    load = function (_data) {
        property_type.show();
        property_type.empty();
        var def = "<option value='default' default hidden >What's the type of the property?</option>";
        if (!_data.length)
            c_property_type.hide();

        $.each(_data, function (i, v) {
            var item = "<option  value=" + v.id + ">" + v.text + "</option>";
            property_type.append(item);
        });
        property_type.prepend(def).attr({
            disabled: false,
        })


        loader.fadeOut();
    };
start();

