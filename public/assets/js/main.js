$.noConflict();

jQuery(document).ready(function($) {

    "use strict";



    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function(el) {
        new SelectFx(el);
    });

    jQuery('.selectpicker').selectpicker;

    $('.search-trigger').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });

    $('.equal-height').matchHeight({
        property: 'max-height'
    });

    // var chartsheight = $('.flotRealtime2').height();
    // $('.traffic-chart').css('height', chartsheight-122);


    // Counter Number
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });




    // Menu Trigger
    $('#menuToggle').on('click', function(event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').removeClass('open');
            if (windowWidth < 760) {
                $('#left-panel').slideToggle();
            } else {
                $('#left-panel').toggleClass('open-menu');
            }
        } else {
            $('body').toggleClass('open');
            $('#left-panel').removeClass('open-menu');
        }

    });
    $(".menu-item-has-children.dropdown").each(function() {
        $(this).on('click', function() {
            var $temp_text = $(this).children('.dropdown-toggle').html();
            $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
        });
    });
    // Load Resize 
    $(window).on("load resize", function(event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').addClass('small-device');
        } else {
            $('body').removeClass('small-device');
        }

    });

    /**
     * 
     * start coding for custom script
     *  
     */
    $('.add-new-feature').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
					<div class="px-1"><input type="text" name="key[]" placeholder="Feature title" class="form-control"></div>
					<div class="px-1"><input type="text" name="value[]"  placeholder="Feature details"  class="form-control"></div>
					<div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
				</div>`;
        $(".feature .list-group").append(html);
    })
    $(document).on('click', '.feature  .feature__trash', function() {
        $(this).closest('.feature  .list-group-item').remove();
    })

    $('.add-new-includes').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
						<div class="pr-2" style="flex: 1">
							<div class="py-1">
								<input type="text" required name="include_title[]" placeholder="Enter title" class="form-control">
							</div>
							<div class="py-1">
								<textarea name="description[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter short details"></textarea>
							</div>
							<div class="py-1">
								<input type="number" required name="price[]"  placeholder="Enter price"  class="form-control">
							</div>
						</div>
						<div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
					</div>`;
        $(".service-include .list-group").append(html);
    })
    $(document).on('click', '.service-include .feature__trash', function() {
        $(this).closest('.service-include .list-group-item').remove();
    })

    $('.add-new-question').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
						<div class="pr-2" style="flex: 1">
							<div class="py-1">
								<input type="text" required name="question_title[]" placeholder="Enter title" class="form-control">
							</div> 
							<div class="py-1">
								<input type="number" required name="question_price[]"  placeholder="Enter price"  class="form-control">
							</div>
						</div>
						<div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
					</div>`;
        $(".service-question .list-group").append(html);
    })
    $(document).on('click', '.service-question .feature__trash', function() {
        $(this).closest('.service-question .list-group-item').remove();
    })

    $('.add-new-cost').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
						<div class="pr-2" style="flex: 1"> 
							<div class="py-1">
								<textarea name="cost_title[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter title"></textarea>
							</div> 
						</div>
						<div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
					</div>`;
        $(".material-cost .list-group").append(html);
    })
    $(document).on('click', '.material-cost .feature__trash', function() {
        $(this).closest('.material-cost .list-group-item').remove();
    })

    $('.add-new-social').on('click', function() {
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
    })
    $(document).on('click', '.social .feature__trash', function() {
        $(this).closest('.social .list-group-item').remove();
    })
    $('.add-new-operation').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
                        <div class="pr-2" style="flex: 1"> 
                            <div class="py-1">
                                <input type="text" name="hrs_operation[]" class="form-control">
                            </div> 
                        </div>
                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                    </div>`;
        $(".hrs-operation .list-group").append(html);
    })
    $(document).on('click', '.hrs-operation .feature__trash', function() {
        $(this).closest('.hrs-operation .list-group-item').remove();
    })
    $('.add-new-address').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
                        <div class="pr-2" style="flex: 1">
                            <div class="py-1">
                                <input type="text" name="address_title[]" placeholder="Enter address title" class="form-control">
                            </div>
                            <div class="py-1">
                                <select name="address_type[]" id="address_type" class="form-control">
                                    <option value="">Select type</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="other">others</option>
                                </select>
                            </div>
                            <div class="py-1">
                                <textarea name="address_details[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter short details"></textarea>
                            </div> 
                        </div>
                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                    </div>`;
        $(".address .list-group").append(html);
    })
    $(document).on('click', '.address .feature__trash', function() {
        $(this).closest('.address .list-group-item').remove();
    })
    $('.add-new-location').on('click', function() {
        let html = `<div class="list-group-item d-flex align-items-center">
                        <div class="pr-2" style="flex: 1"> 
                            <div class="py-1">
                                <input type="text" name="service_location[]" class="form-control">
                            </div> 
                        </div>
                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                    </div>`;
        $(".service-location .list-group").append(html);
    })
    $(document).on('click', '.service-location .feature__trash', function() {
        $(this).closest('.service-location .list-group-item').remove();
    })

});