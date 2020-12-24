$.noConflict();

jQuery(document).ready(function($) {
    "use strict";

    [].slice
        .call(document.querySelectorAll("select.cs-select"))
        .forEach(function(el) {
            new SelectFx(el);
        });

    jQuery(".selectpicker").selectpicker;

    $(".search-trigger").on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(".search-trigger")
            .parent(".header-left")
            .addClass("open");
    });

    $(".search-close").on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(".search-trigger")
            .parent(".header-left")
            .removeClass("open");
    });

    $(".equal-height").matchHeight({
        property: "max-height"
    });

    // var chartsheight = $('.flotRealtime2').height();
    // $('.traffic-chart').css('height', chartsheight-122);

    // Counter Number
    $(".count").each(function() {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text()
                },
                {
                    duration: 3000,
                    easing: "swing",
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                }
            );
    });

    // Menu Trigger
    $("#menuToggle").on("click", function(event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $("body").removeClass("open");
            if (windowWidth < 760) {
                $("#left-panel").slideToggle();
            } else {
                $("#left-panel").toggleClass("open-menu");
            }
        } else {
            $("body").toggleClass("open");
            $("#left-panel").removeClass("open-menu");
        }
    });
    $(".menu-item-has-children.dropdown").each(function() {
        $(this).on("click", function() {
            var $temp_text = $(this)
                .children(".dropdown-toggle")
                .html();
            $(this)
                .children(".sub-menu")
                .prepend('<li class="subtitle">' + $temp_text + "</li>");
        });
    });
    // Load Resize
    $(window).on("load resize", function(event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $("body").addClass("small-device");
        } else {
            $("body").removeClass("small-device");
        }
    });

    /**
     *
     * start coding for custom script
     *
     */

    $(".add-new-social").on("click", function() {
        let html = `<div class="list-group-item d-flex align-items-center">
                        <div class="px-1">
                            <input type="text" name="icon[]" placeholder="Social name" class="form-control">
                        </div>
                        <div class="px-1">
                            <input type="text" name="link[]"  placeholder="Social Link"  class="form-control">
                        </div>
                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                    </div>`;
        $(".social .list-group").append(html);
    });
    $(document).on("click", ".social .feature__trash", function() {
        $(this)
            .closest(".social .list-group-item")
            .remove();
    });

    $(".add-new-address").on("click", function() {
        let html = `<div class="list-group-item d-flex align-items-center">
                                       <div class="pr-2" style="flex: 1">
                                            <div class="py-1">
                                                <input type="text" name="address_icon[]" placeholder="Enter icon name" class="form-control">
                                            </div> 
                                            <div class="py-1">
                                                <textarea name="address_details[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter short details"></textarea>
                                            </div> 
                                       </div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>`;
        $(".address .list-group").append(html);
    });
    $(document).on("click", ".address .feature__trash", function() {
        $(this)
            .closest(".address .list-group-item")
            .remove();
    });
});
