$(".toggle-nav").click(function () {
    $("#sidebar-links .nav-menu").css("left", "0px");
});
$(".mobile-back").click(function () {
    $("#sidebar-links .nav-menu").css("left", "-410px");
});
$(".page-wrapper").attr(
    "class",
    "page-wrapper " + localStorage.getItem("page-wrapper")
);
if (localStorage.getItem("page-wrapper") === null) {
    $(".page-wrapper").addClass("compact-wrapper");
}
if (localStorage.getItem("pins") === null || localStorage.getItem("pins") == '[]') {
    const pinTitle = $('.pin-title');
    pinTitle.css('display : none !important');
}

// left sidebar and vertical menu
if ($("#pageWrapper").hasClass("compact-wrapper")) {
    jQuery(".sidebar-title").append(
        '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
    );
    jQuery(".sidebar-title").click(function () {
        jQuery(".sidebar-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
            );
        jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
        jQuery(".menu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                );
        }
    });
    jQuery(".sidebar-submenu, .menu-content").hide();
    jQuery(".submenu-title").append(
        '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
    );
    jQuery(".submenu-title").click(function () {
        jQuery(".submenu-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
            );
        jQuery(".submenu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                );
        }
    });
    jQuery(".submenu-content").hide();
} else if ($("#pageWrapper").hasClass("horizontal-wrapper")) {
    var contentwidth = jQuery(window).width();
    if (contentwidth < 992) {
        $("#pageWrapper")
            .removeClass("horizontal-wrapper")
            .addClass("compact-wrapper");
        $(".page-body-wrapper")
            .removeClass("horizontal-menu")
            .addClass("sidebar-icon");
        jQuery(".submenu-title").append(
            '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
        );
        jQuery(".submenu-title").click(function () {
            jQuery(".submenu-title").removeClass("active");
            jQuery(".submenu-title")
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                );
            jQuery(".submenu-content").slideUp("normal");
            if (jQuery(this).next().is(":hidden") == true) {
                jQuery(this).addClass("active");
                jQuery(this)
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                    );
                jQuery(this).next().slideDown("normal");
            } else {
                jQuery(this)
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                    );
            }
        });
        jQuery(".submenu-content").hide();

        jQuery(".sidebar-title").append(
            '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
        );
        jQuery(".sidebar-title").click(function () {
            jQuery(".sidebar-title").removeClass("active");
            jQuery(".sidebar-title")
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                );
            jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
            if (jQuery(this).next().is(":hidden") == true) {
                jQuery(this).addClass("active");
                jQuery(this)
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                    );
                jQuery(this).next().slideDown("normal");
            } else {
                jQuery(this)
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                    );
            }
        });
        jQuery(".sidebar-submenu, .menu-content").hide();
    }
} else if ($("#pageWrapper").hasClass("compact-sidebar")) {
    var contentwidth = jQuery(window).width();
    if (contentwidth > 992) {
        $('<div class="bg-overlay1"></div>').appendTo($("body"));
    }

    jQuery(".sidebar-title").click(function () {
        jQuery(".sidebar-title").removeClass("active");
        $(".bg-overlay1").removeClass("active");
        jQuery(".sidebar-submenu").removeClass("close-submenu").slideUp("normal");
        jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
        jQuery(".menu-content").slideUp("normal");

        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this).next().slideDown("normal");
            $(".bg-overlay1").addClass("active");

            $(".bg-overlay1").on("click", function () {
                jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
                $(this).removeClass("active");
            });
        }
        if (contentwidth < "992") {
            $(".bg-overlay").addClass("active");
        }
    });
    jQuery(".sidebar-submenu, .menu-content").hide();
    jQuery(".submenu-title").append(
        '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
    );
    jQuery(".submenu-title").click(function () {
        jQuery(".submenu-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
            );
        jQuery(".submenu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="fa fa-angle-right"></i></div>'
                );
        }
    });
    jQuery(".submenu-content").hide();
}

// toggle sidebar
$nav = $(".sidebar-wrapper");
$header = $(".page-header");
$toggle_nav_top = $(".toggle-sidebar");
$toggle_nav_top.click(function () {
    $nav.toggleClass("close_icon");
    $header.toggleClass("close_icon");
    $(window).trigger("overlay");
});

$(window).on("overlay", function () {
    $bgOverlay = $(".bg-overlay");
    $isHidden = $nav.hasClass("close_icon");
    if ($(window).width() <= 991 && !$isHidden && $bgOverlay.length === 0) {
        $('<div class="bg-overlay active"></div>').appendTo($("body"));
    }

    if ($isHidden && $bgOverlay.length > 0) {
        $bgOverlay.remove();
    }
});

$(".sidebar-wrapper .back-btn").on("click", function (e) {
    $(".page-header").toggleClass("close_icon");
    $(".sidebar-wrapper").toggleClass("close_icon");
    $(window).trigger("overlay");
});

$("body").on("click", ".bg-overlay", function () {
    $header.addClass("close_icon");
    $nav.addClass("close_icon");
    $(this).remove();
});

$body_part_side = $(".body-part");
$body_part_side.click(function () {
    $toggle_nav_top.attr("checked", false);
    $nav.addClass("close_icon");
    $header.addClass("close_icon");
});

//    responsive sidebar
var $window = $(window);
var widthwindow = $window.width();
(function ($) {
    "use strict";
    if (widthwindow <= 991) {
        $toggle_nav_top.attr("checked", false);
        $nav.addClass("close_icon");
        $header.addClass("close_icon");
    }
})(jQuery);
$(window).resize(function () {
    var widthwindaw = $window.width();
    if (widthwindaw <= 991) {
        $toggle_nav_top.attr("checked", false);
        $nav.addClass("close_icon");
        $header.addClass("close_icon");
    } else {
        $toggle_nav_top.attr("checked", true);
        $nav.removeClass("close_icon");
        $header.removeClass("close_icon");
    }
});

// horizontal arrows
var view = $("#sidebar-menu");
var move = "500px";
var leftsideLimit = -500;

var getMenuWrapperSize = function () {
    return $(".sidebar-wrapper").innerWidth();
};
var menuWrapperSize = getMenuWrapperSize();

if (menuWrapperSize >= "1660") {
    var sliderLimit = -3000;
} else if (menuWrapperSize >= "1440") {
    var sliderLimit = -3600;
} else {
    var sliderLimit = -4200;
}

$("#left-arrow").addClass("disabled");
$("#right-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition >= sliderLimit) {
        $("#left-arrow").removeClass("disabled");
        view.stop(false, true).animate(
            {
                marginLeft: "-=" + move,
            },
            {
                duration: 400,
            }
        );
        if (currentPosition == sliderLimit) {
            $(this).addClass("disabled");
            console.log("sliderLimit", sliderLimit);
        }
    }
});

$("#left-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition < 0) {
        view.stop(false, true).animate(
            {
                marginLeft: "+=" + move,
            },
            {
                duration: 400,
            }
        );
        $("#right-arrow").removeClass("disabled");
        $("#left-arrow").removeClass("disabled");
        if (currentPosition >= leftsideLimit) {
            $(this).addClass("disabled");
        }
    }
});

// page active
if ($("#pageWrapper").hasClass("compact-wrapper")) {
    $(".sidebar-wrapper nav").find("a").removeClass("active");
    $(".sidebar-wrapper nav").find("li").removeClass("active");

    var current = window.location.pathname;
    $(".sidebar-wrapper nav ul li a").filter(function () {
        var link = $(this).attr("href");
        if (link) {
            if (current.indexOf(link) != -1) {
                $(this).parents().children("a").addClass("active");
                $(this).parents().parents().children("ul").css("display", "block");
                $(this).addClass("active");
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .children("a")
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                    );
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .children("a")
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="fa fa-angle-down"></i></div>'
                    );
                return false;
            }
        }
    });
}

$(".left-header .mega-menu .nav-link").on("click", function (event) {
    event.stopPropagation();
    $(this).parent().children(".mega-menu-container").toggleClass("show");
});

$(".left-header .level-menu .nav-link").on("click", function (event) {
    event.stopPropagation();
    $(this).parent().children(".header-level-menu").toggleClass("show");
});

$(document).click(function () {
    $(".mega-menu-container").removeClass("show");
    $(".header-level-menu").removeClass("show");
});

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".mega-menu-container").removeClass("show");
        $(".header-level-menu").removeClass("show");
    }
});

$(".left-header .level-menu .nav-link").click(function () {
    if ($(".mega-menu-container").hasClass("show")) {
        $(".mega-menu-container").removeClass("show");
    }
});

$(".left-header .mega-menu .nav-link").click(function () {
    if ($(".header-level-menu").hasClass("show")) {
        $(".header-level-menu").removeClass("show");
    }
});

$(document).ready(function () {
    $(".outside").click(function () {
        $(this).find(".menu-to-be-close").slideToggle("fast");
    });
});
$(document).on("click", function (event) {
    var $trigger = $(".outside");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
        $(".menu-to-be-close").slideUp("fast");
    }
});

$(".left-header .link-section > div").on("click", function (e) {
    if ($(window).width() <= 1199) {
        $(".left-header .link-section > div").removeClass("active");
        $(this).toggleClass("active");
        $(this).parent().children("ul").toggleClass("d-block").slideToggle();
    }
});

if ($(window).width() <= 1199) {
    $(".left-header .link-section").children("ul").css("display", "none");
    $(this).parent().children("ul").toggleClass("d-block").slideToggle();
}

// active link
if (
    $(".simplebar-wrapper .simplebar-content-wrapper") &&
    $("#pageWrapper").hasClass("compact-wrapper")
);

// Sidebar pin-drops
const pinTitle = document.querySelector(".pin-title");
let pinIcon = document.querySelectorAll(".sidebar-list i.fa-thumbtack");
function togglePinnedName() {
    if (document.getElementsByClassName("pined").length) {
        if (!pinTitle.classList.contains("show")) pinTitle.classList.add("show");
    } else {
        pinTitle.classList.remove("show");
    }
}


pinIcon.forEach((item, index) => {
    if (localStorage.getItem("pins") === null || localStorage.getItem("pins") == '[]') {
        const pinTitle = $('.pin-title');
        pinTitle.css('display : none !important');
    }
    pinClicked(item);
});

function pinClicked(item) {
    var linkName = item.parentNode.querySelector("span").innerHTML;
    var InitialLocalStorage = JSON.parse(localStorage.getItem("pins") || false);

    if (InitialLocalStorage && InitialLocalStorage.includes(linkName)) {
        item.parentNode.classList.add("pined");
    }
    item.addEventListener("click", (event) => {
        var localStoragePins = JSON.parse(localStorage.getItem("pins") || false);
        item.parentNode.classList.toggle("pined");

        if (localStoragePins?.length) {
            if (item.parentNode.classList.contains("pined")) {
                !localStoragePins?.includes(linkName) &&
                    (localStoragePins = [...localStoragePins, linkName]);
            } else {
                localStoragePins?.includes(linkName) &&
                    localStoragePins.splice(localStoragePins.indexOf(linkName), 1);
            }
            localStorage.setItem("pins", JSON.stringify(localStoragePins));
        } else {
            localStorage.setItem("pins", JSON.stringify([linkName]));
        }

        var elem = item;
        togglePinnedName();
    });

    function scrollTo(element, to, duration) {
        var start = element.scrollTop,
            change = to - start,
            currentTime = 0,
            increment = 20;

        var animateScroll = function () {
            currentTime += increment;
            var val = Math.easeInOutQuad(currentTime, start, change, duration);
            element.scrollTop = val;
            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };
        animateScroll();
    }

    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    };
}
togglePinnedName();