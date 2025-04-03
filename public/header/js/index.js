$(document).ready(function () {
    $("#menu_checkbox").change(function () {
        if ($(this).is(":checked")) {
            $("#navbarNav").css("transform", "translateX(0%)");
        } else {
            $("#navbarNav").css("transform", "translateX(-100%)");
        }
    });

    // Function to check if an element is in view
    function isInView(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    // Check all elements with the class "animate-on-scroll"
    function checkInView() {
        $(".animate-on-scroll").each(function () {
            if (isInView(this)) {
                $(this).addClass("in-view"); // Add the class when in view
            }
        });
    }

    // Run the check on page load and on scroll
    $(window).on("scroll resize", checkInView);
    checkInView(); // Initial check on page load

    function isInViewFromTop(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    // Check all elements with the class "animate-from-top"
    function checkInViewFromTop() {
        $(".animate-from-top").each(function () {
            if (isInViewFromTop(this)) {
                $(this).addClass("in-view-from-top"); // Add the class when in view
            }
        });
    }

    // Run the check on page load and on scroll
    $(window).on("scroll resize", checkInViewFromTop);
    checkInViewFromTop(); // Initial check on page load

    function isInViewFromLeft(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkInViewFromLeft() {
        $(".animate-from-left").each(function () {
            if (isInViewFromLeft(this)) {
                $(this).addClass("in-view-from-left"); // Add the class when in view
            }
        });
    }

    function isInViewFromRight(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkInViewFromRight() {
        $(".animate-from-right").each(function () {
            if (isInViewFromRight(this)) {
                $(this).addClass("in-view-from-right"); // Add the class when in view
            }
        });
    }

    function isInViewFromBottom(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkInViewFromBottom() {
        $(".animate-from-bottom").each(function () {
            if (isInViewFromBottom(this)) {
                $(this).addClass("in-view-from-bottom"); // Add the class when in view
            }
        });
    }

    // Run the checks on page load and on scroll
    $(window).on("scroll resize", checkInViewFromLeft);
    $(window).on("scroll resize", checkInViewFromRight);
    $(window).on("scroll resize", checkInViewFromBottom);
    checkInViewFromLeft(); // Initial check on page load
    checkInViewFromRight(); // Initial check on page load
    checkInViewFromBottom(); // Initial check on page load

    const $goUpButton = $("#goUpButton");

    // Show or hide the button based on scroll position
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 200) {
            $goUpButton.addClass("show"); // Show the button
        } else {
            $goUpButton.removeClass("show"); // Hide the button
        }
    });

    // Scroll to the top when the button is clicked
    $goUpButton.on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, "smooth"); // Smooth scrolling
    });
});
