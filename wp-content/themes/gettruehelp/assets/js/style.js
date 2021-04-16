"use strict";
jQuery(document).ready(function ($) {

    /*-----------------------------------------------------------------------------------*/
    /* Variables (element selectors) */
    /*-----------------------------------------------------------------------------------*/
    var selector_wrapper = $("#site-home"),                              // Main wrapper
        selector_window = $(window),                                     // window
        selector_show = ".show",                                         // selector show
        selector_hide = ".hide",                                         // selector hide
        class_show = "show",                                             // show class
        class_hide = "hide",                                             // Hde class
        class_preLoader = "preloader",                                   // Preloader class
        selector_sticky_header = $("#sticky-header"),                    // Sticky header selector
        selector_statistic = $("#site-statistic").find(".site-number"),  // Statistic section selector
        selector_accordion = $(".panel-group").find(".panel-body"),      // Statistic section selector
        header_slider = document.getElementById("header-slider"),        // Header slider ID selector
        selector_form = $("#myForm"),                                    // Ajax form selector
        form_submit = selector_form.find("#form-submit-btn i.fa"),       // Submit button icon
        form_clear = selector_form.find(".value-clear"),                 // Form input values clear class
        mobileButton = ".nav-mobile",                                    // Mobile navigation
        selector = ".site-nav",                                          // Header navigation
        offCanvas = ".nav-off-canvas",                                   // Off canvas selector
        active = "active",                                               // Active class
        subMenu = ".site-sub-menu";                                      // sub menu

    /*-----------------------------------------------------------------------------------*/
    /* Template JS */
    /*-----------------------------------------------------------------------------------*/
    var Template_JS = {

        /*-----------------------------------------------------------------------------------*/
        /* Pre-loader: This is used to show the full page pre-loader.
         * As long as the website does not load completely
         * Source: http://gasparesganga.com/labs/jquery-loading-overlay/ */
        /*-----------------------------------------------------------------------------------*/
        pre_loader: function () {

            // Pre-loader initialize (Plugin Options)
            $.LoadingOverlay(class_show, {
                color : "white",        // Background Color. Default white color. You can also used hex color code. Like (#ffffff)
                fade  : false,          // Animate the overlay div. Options (true, false)
                image : "images/loader-purple.gif", // Animate GIF image Path
                zIndex: 1000            // z-index value. Overlay div always stay top of the website content. Value is in integer
            });

            // Windows load function
            selector_window.on("load", function () {
                // Hid the pre-loader after content load
                $.LoadingOverlay(class_hide);
                // remove the pre-loader class
                selector_wrapper.removeClass(class_preLoader);
            });

        },


        /*-----------------------------------------------------------------------------------*/
        /* Header Slider: This function contain the header slider options.
         * Documentation: http://sequencejs.com/documentation/#options
         * Source: http://sequencejs.com */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* How it work section changeable options
         * Source: http://idangero.us/swiper/api/ */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Quick view section changeable options
         * Source: http://idangero.us/swiper/api/ */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Accordion section custom scroll bar
         * Source: http://manos.malihu.gr/jquery-custom-content-scroller/ */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Team Section changeable options
         * Source: http://idangero.us/swiper/api/ */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Testimonial section changeable options
         * Source: http://idangero.us/swiper/api/ */
        /*-----------------------------------------------------------------------------------*/


        /*-----------------------------------------------------------------------------------*/
        /* Statistic section changeable options
         * Source: https://github.com/benignware/jquery-countimator */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Sticky Header changeable options
         * Source: https://github.com/garand/sticky */
        /*-----------------------------------------------------------------------------------*/


        /*-----------------------------------------------------------------------------------*/
        /* Scroll top changeable options
         * Source: https://github.com/markgoodyear/scrollup */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Internal scroll links changeable option */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Ajax Contact Form
         * Send the contact email without page reload
         * Go to (php > form.php) file. And change the email address where you want to
         * received the mails */
        /*-----------------------------------------------------------------------------------*/



        /*-----------------------------------------------------------------------------------*/
        /* Header Navigation for mobile view
         * Changeable options */
        /*-----------------------------------------------------------------------------------*/
        header_navigation: function (current) {

            // Changeable options
            this.offCanvas_show_speed = 500;    // Off canvas menu show speed. Value is in milliseconds
            this.offCanvas_hide_speed = 500;    // Off canvas menu hide speed. Value is in milliseconds
            this.slide_down_speed = 400;        // Down down slide down speed. Value is in milliseconds
            this.slide_up_speed = 400;          // Drop down slide up speed. Value is in milliseconds

            // this
            current = this;

            // Menu mobile button icon change
            this.icon_change = function (selector) {

                // variables
                var getCloseClass = selector.find(selector_hide).attr("class");
                var getShowClass = selector.find(selector_show).attr("class");
                selector.find(selector_show).attr("class", getCloseClass).removeClass(class_hide).addClass(class_show);
                selector.find(selector_hide).attr("class", getShowClass).removeClass(class_show).addClass(class_hide);
            };

            /*-----------------------------------------------------------------------------------*/
            /* Click function to show the off canvas menu */
            /*-----------------------------------------------------------------------------------*/
            $(selector).find(mobileButton).on("click", function (self) {

                // variable
                self = $(this);

                // check if the has class active
                if (!$(selector).find(offCanvas).hasClass(active)) {

                    // show the menu
                    $(selector).find(offCanvas).animate({
                        "left": "0"
                    }, current.offCanvas_show_speed, function () {

                        // Call icon change function
                        current.icon_change(self);

                    })
                    // active class
                        .addClass(active);
                } else {

                    // hide the menu
                    $(selector).find(offCanvas).animate({
                        "left": "-1000px"
                    }, current.offCanvas_hide_speed, function () {

                        // Call icon change function
                        current.icon_change(self);
                    })
                    // remove class
                        .removeClass(active);
                }

                // Stop default behaviour
                return false;

            });


            /*-----------------------------------------------------------------------------------*/
            /* Out side click to close the off canvas menu */
            /*-----------------------------------------------------------------------------------*/
            selector_window.on("mouseup", function (event) {

                // Check if the mouse not on menu
                if (!$(selector).is(event.target) &&
                    $(selector).has(event.target).length === 0 &&
                    $(selector).find(offCanvas).hasClass(active)) {

                    // hide the menu
                    $(selector).find(offCanvas).animate({
                        "left": "-1000px"
                    }, current.offCanvas_hide_speed, function () {

                        // Call icon change function
                        current.icon_change($(mobileButton));

                    })
                    // remove class
                        .removeClass(active);

                }
            });


            /*-----------------------------------------------------------------------------------*/
            /* Off canvas close button */
            /*-----------------------------------------------------------------------------------*/

            // Append the close button inside the off canvas menu
            $(selector).find(offCanvas).prepend("<div class='offCanvasClose'><i class='fa fa-close'></i></div>");

            // Close button click event
            $(selector).find(".offCanvasClose").on("click", function () {

                // Check if the has class active
                if ($(selector).find(offCanvas).hasClass(active)) {

                    // Hide the menu
                    $(selector).find(offCanvas).animate({
                        "left": "-1000px"
                    }, current.offCanvas_hide_speed, function () {

                        // Call icon change function
                        current.icon_change($(mobileButton));

                    })
                    // remove class
                        .removeClass(active);
                }

                // Stop the link default behaviour
                return false;
            });


            /*-----------------------------------------------------------------------------------*/
            /* Mobile view drop down */
            /*-----------------------------------------------------------------------------------*/
            $(selector).find(subMenu).parent("li").on("click", function (event) {

                // stop bubbling
                event.stopPropagation();

                // check if the sub menu is hidden
                if ($(this).children(subMenu).is(":hidden") && $(selector).find(mobileButton).is(":visible")) {

                    // show the sub menu
                    $(this).children(subMenu).slideDown(current.slide_down_speed);

                    // Check if the sub menu is visible
                } else if ($(this).children(subMenu).is(":visible") && $(selector).find(mobileButton).is(":visible")) {

                    // hide the sub menu
                    $(this).children(subMenu).slideUp(current.slide_up_speed);
                }

            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Twitter Feed changeable options
         * Source: https://github.com/sonnyt/Tweetie
         * Go to folder (php > twitter > config.php) open this file
         * and add the twitter api key */
        /*-----------------------------------------------------------------------------------*/

    };

	/*-----------------------------------------------------------------------------------*/
    /* wow animation */
    /*-----------------------------------------------------------------------------------*/

	
	

    /*-----------------------------------------------------------------------------------*/
    /* Call Functions */
    /*-----------------------------------------------------------------------------------*/

    Template_JS.header_navigation();        // Call header navigation function


});