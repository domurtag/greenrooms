jQuery(document).ready(function ($) {
    $('.home_slider').bxSlider({
        auto: true,
        pause: 3000,
        autoControls: true,
        randomStart: true
    });

    $(".gallery-icon a").colorbox({rel: 'group1', width: "30%", height: "auto"});

    $(".make_a_booking").click(function () {

        if (jQuery(this).parent().find(".booking_form").css("display") != "block") {
            jQuery(this).parent().find(".booking_form").slideDown("fast");
        }
        else {
            jQuery(this).parent().find(".booking_form").slideUp("fast");
        }
        $(this).slideUp("fast");
        return false;

    });

});