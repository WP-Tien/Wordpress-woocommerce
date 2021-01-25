/**
 * Author: TienNguyen
 * Version: 1.0.0
 */

(function ($) {
  "use strict";

  // Screen Size
  const smallSize = 768;
  const mediumSize = 992;
  const largeSize = 1024;
  const wideSize = 1280;

  const $document = $(document);
  const $body = $(document.body);
  const $window = $(window);
  const $windowWidth = $(window).width();
  const screen = window.screen;

  class Tshop {
    constructor() {
      this.scrollToTop();
      this.scrollToSections();
      this.loadMoreProductsbyAjax();
      this.setHeightSlider();
      this.setTopHeaderIfWPAB();
      this.toggleCategoriesTablet();
      this.toggleCategorieChildren();
      this.setWidthMegaMenu();
      this.searchByCategories();
      this.searchByField();
      this.checkDropdownSearch();
      this.setQuantityProduct();
      this.addClassCarousel();
      this.addCarouselForRelatedProducts();
      this.addCarouselForPromotionProducts();
      this.toggleProductCategories();
      this.contactFormSubmit();
    }

    //*******************************************************************
    //*  LIFT NAV
    //*******************************************************************/
    scrollToTop() {
      const btnScrollToTop = $("#scroll-to-top");

      $window.on("scroll", function () {
        if ($window.scrollTop() > 350 && $windowWidth > smallSize) {
          btnScrollToTop.fadeIn(400);
        } else {
          btnScrollToTop.fadeOut(400);
        }
      });

      btnScrollToTop.on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
      });
    }

    scrollToSections() {
      const targetScrolls = $(".lift-nav [data-target*='home-']");
      const headerHeight = $(".header").outerHeight();

      targetScrolls.each(function () {
        $(this).on("click", function () {
          const target = $(this).data("target");

          if (target) {
            const sectionId = $(this).data("target");
            const targetOffsetTop = $("." + sectionId).offset().top;

            $("html, body").animate(
              {
                scrollTop: targetOffsetTop - headerHeight,
              },
              1000
            );
          }
        });
      });
    }

    //*******************************************************************
    //*  WORDPRESS ADMIN BAR
    //*******************************************************************/
    setTopHeaderIfWPAB() {
      if ($("#wpadminbar").length == 0) return;

      const wpadminbarHeight = $("#wpadminbar").outerHeight();
      const headerHeight = $(".header").outerHeight();

      $(".header").css("top", wpadminbarHeight + "px");
      $(".header__keywords").css(
        "top",
        wpadminbarHeight + headerHeight - 1 + "px"
      );
    }

    //*******************************************************************
    //*  SLIDER BANNER CATEGORY CATEGORY-TABLET SECTION
    //*******************************************************************/
    setHeightSlider() {
      var bannerRightHeight = $("#banners-right").outerHeight();
      var categoryItems = $(".category__item");
      var categoryHeight = $("#category").outerHeight();
      var bannerHeight = $("#banners").outerHeight();
      var bannerscarouselHeight = $("#banners-carousel").outerHeight();
      var numCategoryItems = $("#menu-category-main-page > li").length;
      var carousel = $(".carousel");

      if ($windowWidth >= largeSize) {
        carousel.height(bannerRightHeight);
        // categoryItems.height( bannerscarouselHeight / numCategoryItems );
      }

      if ($windowWidth >= mediumSize && $windowWidth < largeSize) {
        carousel.height(categoryHeight - (bannerRightHeight + bannerHeight));
        // console.log( bannerRightHeight, categoryHeight, bannerHeight );
      }

      // $window.on('resize', function () {
      //   var windowWidth = $(this).outerWidth();
      //   var bannerRightHeight = $('#banners-right').outerHeight();
      //   var categoryItems = $('.category__item');
      //   var categoryHeight = $('#category').outerHeight();
      //   var bannerHeight = $('#banners').outerHeight();
      //   var bannerscarouselHeight = $('#banners-carousel').outerHeight();
      //   var numCategoryItems = $("#menu-category-main-page > li").length;
      //   var carousel = $('.carousel');

      //   if (windowWidth >= largeSize) {
      //     carousel.height(bannerRightHeight);
      //     categoryItems.height(bannerscarouselHeight / numCategoryItems);
      //   }

      //   if (windowWidth >= mediumSize && windowWidth < largeSize) {
      //     carousel.height(categoryHeight - (bannerRightHeight + bannerHeight));
      //     categoryItems.height(bannerscarouselHeight / numCategoryItems);
      //   }
      // });
    }

    toggleCategoriesTablet() {
      $body.on("click", ".categoryTablet", function () {
        $(".category-tablet__section").addClass(
          "category-tablet__section--show"
        );
        $(".category-tablet__section").css("visibility", "visible");
      });

      $body.on(
        "click",
        ".category-tablet__overlay, .category-tablet__btn-close",
        function () {
          $(".category-tablet__section").removeClass(
            "category-tablet__section--show"
          );
          $(".category-tablet__section").removeAttr("style");
        }
      );
    }

    toggleCategorieChildren() {
      var x = 0;

      $body.on("click", ".category-tablet__item--has_children", function (
        event
      ) {
        event.stopPropagation();
        // event.preventDefault();

        x = x - 100;
        $(".category-tablet__wrap").css("transform", "translateX(" + x + "%)");
        $(this)
          .children(".category-tablet__sub-menu")
          .addClass("category-tablet__sub-menu--is-current");
      });

      $body.on("click", ".category-tablet__return", function (event) {
        event.stopPropagation();

        x = x + 100;
        $(".category-tablet__wrap").css("transform", "translateX(" + x + "%)");
        $(this)
          .parent(".category-tablet__sub-menu")
          .removeClass("category-tablet__sub-menu--is-current");
      });
    }

    setWidthMegaMenu() {
      var $bc = $("#banners-carousel");
      var $bcWidth = $bc.outerWidth();

      if ($bcWidth) {
        $(".category .category__mega").outerWidth($bcWidth);
      }
    }

    //*******************************************************************
    //*  SEARCH
    //*******************************************************************/
    searchByCategories() {
      $("#header__navsearch-category").on("click", function () {
        $(".header__navsearch-option").toggle();
      });

      $(".header__navsearch-option li").on("click", function (event) {
        event.stopPropagation();

        const cate_id = $(this).find("span").data("id");
        const cate_name = $(this).find("span").html();

        $("#header__navsearch-input--cate-id").val(cate_id);
        $(".header__navsearch-select-label").html(cate_name);
        $(".header__navsearch-option").hide();

        if (
          Helper.setLengthSearch($("#header__navsearch-input--value").val())
        ) {
          Tshop.doSearch();
        }
      });
    }

    searchByField() {
      $("#header__navsearch-input--value").on(
        "keyup",
        Helper.debounce(() => {
          if (
            Helper.setLengthSearch($("#header__navsearch-input--value").val())
          ) {
            Tshop.doSearch();
          } else {
            $(".header__navsearch-history").remove();
          }
        }, 500)
      );
    }

    checkDropdownSearch() {
      $body.on("mouseup", function (e) {
        e.preventDefault();

        if (
          !$("#header__navsearch-category").is(e.target) &&
          $("#header__navsearch-category").has(e.target).length === 0
        ) {
          if ($(".header__navsearch-option").is("[style]")) {
            $(".header__navsearch-option").removeAttr("style");
          }
        }

        if (
          !$(".header__navsearch-search").is(e.target) &&
          $(".header__navsearch-search").has(e.target).length === 0
        ) {
          if ($(".header__navsearch-history").length !== 0) {
            $(".header__navsearch-history").remove();
          }
        }
      });
    }

    static doSearch() {
      var search = $("#header__navsearch-input--value").val();
      var id = $("#header__navsearch-input--cate-id").val();

      $.ajax({
        type: "POST",
        url: ajax_object,
        data: {
          action: "get_related_products",
          search: search,
          id: id,
        },
        success: function (response) {
          if ($(".header__navsearch-history").length > 0) {
            $(".header__navsearch-history").remove();
          }
          $(".header__navsearch-search-history").append(response);
          $(".header__navsearch-history").show();
        },
        // error: function (response) {
        //   console.log(response);
        // }
      });
    }

    //*******************************************************************
    //*  MORE PRODUCTS
    //*******************************************************************/
    loadMoreProductsbyAjax() {
      $body.on("click", "#load-moreproducts", function (e) {
        e.preventDefault();

        const that = $(this);
        const page = that.data("page");
        const newPage = page + 1;
        const ajaxUrl = that.data("url");

        $.ajax({
          url: ajaxUrl,
          type: "post",
          data: {
            page: page,
            action: "load_more_products",
          },
          error: function (response) {
            console.log(response);
          },
          beforeSend: function () {
            that.addClass("home-moreproducts__button--loading");
          },
          success: function (response) {
            if (response == 0) {
              that.css("pointer-events", "none");
              that.html("TỚI ĐÂY THÔI");
            } else {
              that.data("page", newPage);
              $(".home-moreproducts__list").append(response);
            }
          },
          complete: function () {
            that.removeClass("home-moreproducts__button--loading");
          },
        });
      });
    }

    //*******************************************************************
    //*  SINGLE PRODUCT
    //*******************************************************************/
    setQuantityProduct() {
      $(".single-product__quantity").on(
        "click",
        ".single-product__quantity--minus",
        function (e) {
          var qty = $(this)
            .parent()
            .find("input.single-product__quantity--total");
          var val = parseInt(qty.val());

          var step = qty.attr("step");
          step = "undefined" !== typeof step ? parseInt(step) : 1;

          if (val > 0) {
            qty.val(val - step).change();
          }
        }
      );

      $(".single-product__quantity").on(
        "click",
        ".single-product__quantity--plus",
        function (e) {
          var qty = $(this)
            .parent()
            .find("input.single-product__quantity--total");
          var val = parseInt(qty.val());

          var step = qty.attr("step");
          step = "undefined" !== typeof step ? parseInt(step) : 1;
          qty.val(val + step).change();
        }
      );
    }

    addClassCarousel() {
      $(".flex-control-nav.flex-control-thumbs").addClass(
        "owl-carousel owl-theme"
      );
      $(".flex-control-nav.flex-control-thumbs").owlCarousel({
        items: 4,
        margin: 5,
        dots: false,
      });
    }

    //*******************************************************************
    //*  SIDEBAR
    //*******************************************************************/
    toggleProductCategories() {
      $(".product-categories")
        .find(".cat-parent")
        .prepend(
          '<span class="toggle"><i class="fas fa-chevron-down"></i></span>'
        );

      // $('.children').slideUp();

      $body.on("click", ".toggle", function (event) {
        event.stopPropagation();
        $(this).toggleClass("toggleRotate");
        $(this).closest("li").children(".children").slideToggle();
      });
    }

    //*******************************************************************
    //*  OWL CAROUSEL
    //*******************************************************************/
    addCarouselForRelatedProducts() {
      $("#related-products__carousel").owlCarousel({
        loop: true,
        margin: 8,
        items: 6,
        nav: true,
        navText: [
          '<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        dots: false,
        autoplay: false,
        responsiveClass: true,
        responsive: {
          0: {
            items: 2,
          },
          768: {
            items: 3,
          },
          992: {
            items: 4,
          },
          1200: {
            items: 6,
          },
        },
      });
    }

    addCarouselForPromotionProducts() {
      $("#home-promotion__carousel").owlCarousel({
        loop: true,
        margin: 8,
        items: 6,
        nav: true,
        navText: [
          '<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        dots: false,
        autoplay: false,
        responsiveClass: true,
        responsive: {
          0: {
            // stagePadding: 30,
            items: 2,
          },
          768: {
            // stagePadding: 30,
            items: 3,
          },
          992: {
            items: 4,
          },
          1200: {
            items: 6,
          },
        },
      });
    }

    contactFormSubmit() {

      console.log(ajax_object);

      $('#contactForm').on('submit', function (e) {
        e.preventDefault();


      });
    }
  }

  class Helper {
    static debounce(callback, wait) {
      let timeout;
      return (...args) => {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => callback.apply(context, args), wait);
      };
    }

    static setLengthSearch(val) {
      let minLength = 3;
      if (val.length > minLength) return true;
      return false;
    }
  }

  $document.ready(function () {
    new Tshop();
  });
})(jQuery);
