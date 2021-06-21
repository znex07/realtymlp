$(function() {

    "use strict";

    var $bgobj = $(".ha-bg-testi"); // assigning the object

    $(window).on("scroll", function() {

        var yPos = -($(window).scrollTop() / $bgobj.data('speed'));

        // Put together our final background position

        var coords = '100% ' + yPos + 'px';

        // Move the background

        $bgobj.css({
            backgroundPosition: coords
        });

    });
});
