/**
 * Table of contents
 * -----------------------------------
 * 1.HEADER STICKY
 * 2.HEADER ACTIVE ADD CLASS
 * 3.HEADER COLLAPSE
 * 4.HEADER FIXED
 * 5.MOUSE MOVE ANIMATION
 * 6.HERO IMAGE CHANGE
 * 7.HERO SWIPER SLIDER
 * 8.ABOUT SWIPER SLIDER
 * 9.TEAM SWIPER SLIDER
 * 10.TESTIMONIAL SLIDER
 * 11.AJAX MAILCHIMP SUBSCRIBE
 * 12.LOCAL SUBSCRIBE
 * 13.JOIN EVENT MAILCHIMP
 * 14.JOIN EVENT LOCAL
 * 15.ABOUT TOGGLER
 * 16.EVENT TOGGLER
 * 17.GALLERY FILTER
 * 18.GALLERY POPUP
 * 19.CONTACT FORM
 * 21.GLIGHTBOX VIDEO
 * 22.COUNTDOWN
 * 23.ODOMETER
 * 24.AOS JS
 * 25.DARK THEME
 */

 (function ($) {
  "use strict";
  var PATH = {};

  /******************** 1.HEADER STICKY ********************/
  PATH.HeaderSticky = function () {
    $(".navbar-toggler").on("click", function (a) {
      a.preventDefault(), $(".navbar").addClass("navbar_fixed");
    });
  };

  /******************** 2.HEADER ACTIVE ADD CLASS ********************/
  PATH.HeaderActive = function () {
    $('#onepage-nav').onePageNav({
      currentClass: 'active',
      changeHash: false,
      scrollSpeed: 1000,
      scrollOffset: 80
    });
  };

  /******************** 3.HEADER COLLAPSE ********************/
  PATH.MenuClose = function () {
    $(".navbar-nav a").on("click", function () {
      var toggle = $(".navbar-toggler").is(":visible");
      if (toggle) {
        $(".navbar-collapse").collapse("hide");
      }
    });
  };

  /******************** 4.HEADER FIXED ********************/
  PATH.HeaderFixed = function () {
    var varHeaderFix = $(window).scrollTop() >= 60,
      $navbar = $(".header");
    if (varHeaderFix) {
      $navbar.addClass("navbar_fixed");
    } else {
      $navbar.removeClass("navbar_fixed");
    }
  };

  /******************** 5.MOUSE MOVE ANIMATION ********************/
  PATH.MouseMove = function () {
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
      document.querySelectorAll(".front-img").forEach(function (move) {
        let moving_value = move.getAttribute("data-value");
        var x = (e.clientX * moving_value) / 200;
        var y = (e.clientY * moving_value) / 200;

        move.style.transform =
          "translateX(" + x + "px) translateX(" + y + "px)";
      });
    }
  };
  /******************** MOUSE MOVE ANIMATION V2 ********************/
  PATH.MouseMove2 = function () {
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
      document.querySelectorAll(".shape-img").forEach(function (move) {
        let moving_value = move.getAttribute("data-value");
        var x = (e.clientX * moving_value) / 200;
        var y = (e.clientY * moving_value) / 200;

        move.style.transform =
          "translateY(" + x + "px) translateY(" + y + "px)";
      });
    }
  };

  /********************  6.HERO IMAGE CHANGE ********************/
  PATH.ImageChange = function () {
    let img = document.getElementById("hero-img");
    let firstImg = document.querySelector(".hero-2__image-img__details-1");
    let secondImg = document.querySelector(".hero-2__image-img__details-2");

    if (firstImg) {
      firstImg.addEventListener("click", function () {
        img.src ="assets/images/portfolio/portfolio-2.png";
        firstImg.classList.add("current");
        img.classList.remove("hero-img");
        setTimeout(function () {
          img.classList.add("hero-img");
        }, 1);
        secondImg.classList.remove("current");
      });
    }
    if (secondImg) {
      secondImg.addEventListener("click", function () {
        img.src ="assets/images/portfolio/portfolio-1.png";
        secondImg.classList.add("current");
        img.classList.remove("hero-img");
        setTimeout(function () {
          img.classList.add("hero-img");
        }, 1);
        firstImg.classList.remove("current");
      });
    }
  };

  /******************** 7.HERO SWIPER SLIDER ********************/
  PATH.HeroSwiper = function () {
    const swiper = new Swiper(".heroSwiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
        horizontalClass: "swiper-pagination-horizontal",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop: true,
      autoplay: {
        delay: 6000,
      },
    });
  };

  /******************** 8.ABOUT SWIPER SLIDER  ********************/
  PATH.AboutSwiper = function () {
    const swiper = new Swiper(".aboutSwiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
        horizontalClass: "swiper-pagination-horizontal",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop: true,
      autoplay: {
        delay: 5000,
      },
    });
  };

  /******************** 9.TEAM SWIPER SLIDER  ********************/
  PATH.TeamSwiper = function () {
    var testimonialSlider = new Swiper(".teamSwiper", {
      slidesPerView: 3,
      spaceBetween: 18,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 4,
        },
      },
    });
  };

  /******************** 10.TESTIMONIAL SLIDER  ********************/
  PATH.TestimonialSlide = function () {
    var testimonialSlider = new Swiper(".clients-slider", {
      slidesPerView: 3,
      spaceBetween: 18,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        775: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });
  };
  /******************** TESTIMONIAL SLIDER v2  ********************/
  PATH.TestimonialSlidev2 = function () {
    var testimonialSlider = new Swiper(".testimonialv2__wrapper", {
      slidesPerView: 3,
      spaceBetween: 18,
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        775: {
          slidesPerView: 1,
        },
        1200: {
          slidesPerView: 1,
        },
      },
    });
  };

  /******************** 11.AJAX MAILCHIMP SUBSCRIBE ********************/
  PATH.AjaxChimp = function () {
    $("#subscribe-mailchimp").ajaxChimp({
      callback: mailchimpCallback,
      url: "http:////unitetheme.us12.list-manage.com/subscribe/post?u=5e0141c017272ff01c6c3a091&amp;id=335f7c3601", // Replace your mailchimp post url inside double quote "".
    });
    function mailchimpCallback(resp) {
      var error_msg = $("#subscribe-mailchimp").find(".error-msg");
      var success_msg = $("#subscribe-mailchimp").find(".success-msg");
      if (resp.result === "success") {
        error_msg.fadeOut(200);
        success_msg.html(resp.msg).fadeIn(200);
      } else if (resp.result === "error") {
        success_msg.fadeOut(200);
        error_msg.html(resp.msg).fadeIn(200);
      }
    }
  };

  /******************** 12.LOCAL SUBSCRIBE********************/
  PATH.localSubs = function () {
    $("#subscribe").submit(function (e) {
      e.preventDefault();
      var email = $("#subscriber-email").val();
      var dataString = "email=" + email;
      function isValidEmail(emailAddress) {
        var pattern = new RegExp(
          /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
        );
        return pattern.test(emailAddress);
      }
      if (isValidEmail(email)) {
        $.ajax({
          type: "POST",
          url: "assets/subscribe/subscribe.php",
          data: dataString,
          success: function () {
            $(".success-msg").fadeIn(1000);
            $(".error-msg").fadeOut(500);
            $(".hide-after").fadeOut(500);
          },
        });
      } else {
        $(".error-msg").fadeIn(1000);
      }

      return false;
    });
  };

  /******************** 13.JOIN EVENT MAILCHIMP ********************/
  PATH.JoinEvent = function () {
    $("#join-event").ajaxChimp({
      callback: mailchimpCallback,
      url: "http:////unitetheme.us12.list-manage.com/subscribe/post?u=5e0141c017272ff01c6c3a091&amp;id=335f7c3601", // Replace your mailchimp post url inside double quote "".
    });
    function mailchimpCallback(resp) {
      var error_msg = $("#join-event").find(".error-msg");
      var success_msg = $("#join-event").find(".success-msg");
      if (resp.result === "success") {
        error_msg.fadeOut(200);
        success_msg.html(resp.msg).fadeIn(200);
      } else if (resp.result === "error") {
        success_msg.fadeOut(200);
        error_msg.html(resp.msg).fadeIn(200);
      }
    }
  };

  /******************** 14.JOIN EVENT LOCAL ********************/
  PATH.JoinEventLocal = function () {
    $("#join-event").submit(function (e) {
      e.preventDefault();
      var name = $("#event-name").val();
      var email = $("#event-email").val();
      var city = $("#event-city").val();
      var dataString = ` "name :" ${name},"email :" ${email},"city :" ${city}`;
      function isValidEmail(emailAddress) {
        var pattern = new RegExp(
          /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
        );
        return pattern.test(emailAddress);
      }
      if (isValidEmail(email)) {
        $.ajax({
          type: "POST",
          url: "assets/join-event/join-event.php",
          data: dataString,
          success: function () {
            $(".success-msg").fadeIn(1000);
            $(".error-msg").fadeOut(500);
            $(".hide-after").fadeOut(500);
          },
        });
      } else {
        $(".error-msg").fadeIn(1000);
      }
      return false;
    });
  };

  /******************** 15.ABOUT TOGGLER ********************/
  PATH.AboutToggler = function () {
    $("#about-nav li:first-child").addClass("active");
    $(".about-v2__content").hide();
    $(".about-v2__content:first").show();
    // Click function
    $("#about-nav li").click(function () {
      $("#about-nav li").removeClass("active");
      $(this).addClass("active");
      $(".about-v2__content").hide();

      var activeTab = $(this).find("a").attr("href");
      $(activeTab).fadeIn();
      return false;
    });
  };

  /******************** 16.EVENT TOGGLER ********************/
  PATH.EventToggler = function () {
    $("#event-nav li:first-child").addClass("active");
    $(".tab-content").hide();
    $(".tab-content:first").show();
    // Click function
    $("#event-nav li").click(function () {
      $("#event-nav li").removeClass("active");
      $(this).addClass("active");
      $(".tab-content").hide();

      var activeTab = $(this).find("a").attr("href");
      $(activeTab).fadeIn();
      return false;
    });
  };

  /******************** 17.GALLERY FILTER ********************/
  PATH.GalleryFilter = function () {
    var $portfolio_selectors = $(".gallery-filter >li>a");
    if ($portfolio_selectors.length) {
      var $portfolio = $(".gallery-boxes");
      $portfolio.isotope({
        itemSelector: ".gallery-box",
        layoutMode: "fitRows",
      });
      $portfolio_selectors.on("click", function () {
        $portfolio_selectors.removeClass("active");
        $(this).addClass("active");
        var selector = $(this).attr("data-filter");
        $portfolio.isotope({
          filter: selector,
        });
        return false;
      });
    }
  };

  /******************** 18.GALLERY POPUP ********************/
  PATH.GalleryPopup = function () {
    var $galleryPopupImg = $(".light-icon");
    if ($galleryPopupImg.length) {
      $galleryPopupImg.magnificPopup({
        type: "image",
        mainClass: "mfp-fade",
        removalDelay: 160,
        fixedContentPos: false,
        delegate: "a",
        gallery: {
          enabled: true,
        },
      });
    }
  };

  /******************** 19.CONTACT FORM ********************/
  PATH.ContactForm = function () {
    function isValidEmail(emailAddress) {
      var pattern = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
      );
      return pattern.test(emailAddress);
    }
    var $contact = $("#contact-form");
    if ($contact.length) {
      $contact.on("submit", function (e) {
        e.preventDefault();
        var success = $(this).find(".email-success"),
          failed = $(this).find(".email-failed"),
          loader = $(this).find(".email-loading"),
          postUrl = $(this).attr("action");
        var data = {
          name: $(this).find(".contact-name").val(),
          email: $(this).find(".contact-email").val(),
          subject: $(this).find(".contact-subject").val(),
          message: $(this).find(".contact-message").val(),
        };
        if (
          isValidEmail(data["email"]) &&
          data["message"].length > 1 &&
          data["name"].length > 1
        ) {
          $.ajax({
            type: "POST",
            url: postUrl,
            data: data,
            beforeSend: function () {
              loader.fadeIn(1000);
            },
            success: function (data) {
              loader.fadeOut(1000);
              success.delay(500).fadeIn(1000);
              failed.fadeOut(500);
            },
            error: function (xhr) {
              // if error occured
              loader.fadeOut(1000);
              failed.delay(500).fadeIn(1000);
              success.fadeOut(500);
            },
            complete: function () {
              loader.fadeOut(1000);
            },
          });
        } else {
          loader.fadeOut(1000);
          failed.delay(500).fadeIn(1000);
          success.fadeOut(500);
        }
        return false;
      });
    }
  };

  /******************** 21.GLIGHTBOX VIDEO MISSION ********************/
  PATH.VideoModal = function () {
    var lightboxVideo = GLightbox({
      selector: ".glightbox3",
    });
  };

  /******************** 22.COUNTDOWN ********************/
  PATH.Countdown = function () {
    if ($("#mycountdown").length > 0) {
      $("#mycountdown").countdown("2024/09/20", function (event) {
        $(".month").text(event.strftime("%m"));
        $(".days").text(event.strftime("%n"));
        $(".hours").text(event.strftime("%H"));
        $(".mins").text(event.strftime("%M"));
        $(".secs").text(event.strftime("%S"));
      });
    }
  };

  /******************** 23.ODOMETER JS  ********************/
  PATH.OdoMeter = function () {
    $(".odometer").appear(function (e) {
      var odo = $(".odometer");
      odo.each(function () {
        var countNumber = $(this).attr("data-count");
        $(this).html(countNumber);
      });
    });
  };

  /******************** 24.AOS JS  ********************/
  PATH.AOS = function () {
    AOS.init();
  };

  /******************** DOCUMENT READY FUNCTION ********************/
  $(function () {
    PATH.HeaderSticky();
    PATH.HeaderActive();
    PATH.MenuClose();
    PATH.MouseMove();
    PATH.MouseMove2();
    PATH.ImageChange();
    PATH.HeroSwiper();
    PATH.AboutSwiper();
    PATH.TeamSwiper();
    PATH.TestimonialSlide();
    PATH.TestimonialSlidev2();
    PATH.AjaxChimp();
    PATH.localSubs();
    PATH.JoinEvent();
    PATH.JoinEventLocal();
    PATH.AboutToggler();
    PATH.EventToggler();
    PATH.GalleryFilter();
    PATH.GalleryPopup();
    PATH.ContactForm();
    PATH.VideoModal();
    PATH.Countdown();
    PATH.OdoMeter();
    PATH.AOS();
  });

  /******************** WINDOW ON SCROLL FUNCTION ********************/
  $(window).on("scroll", function () {
    PATH.HeaderFixed();
  });

  /******************** WINDOW ON LOAD FUNCTION ********************/
  $(window).on("load", function () {});
})(jQuery);

/******************** 25.DARK VERSION ********************/
function setTheme(themeName) {
  localStorage.setItem("stateman_theme", themeName);
  document.documentElement.className = themeName;
}
function toggleTheme() {
  if (localStorage.getItem("stateman_theme") === "theme-dark") {
    setTheme("theme-light");
  } else {
    setTheme("theme-dark");
  }
}
(function () {
  if (localStorage.getItem("stateman_theme") === "theme-dark") {
    setTheme("theme-dark");
    document.getElementById("slider").checked = false;
  } else {
    setTheme("theme-light");
    document.getElementById("slider").checked = true;
  }
})();