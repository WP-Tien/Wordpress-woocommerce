/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {
  // Top navigation section
  wp.customize("theme_options[showroom_text]", function (value) {
    value.bind(function (newval) {
      $("#showroomText").html(newval);
    });
  });

  wp.customize("theme_options[support_text]", function(value) {
    value.bind(function (newval) {
      $("#supportText").html(newval);
    });
  });
   
  wp.customize("theme_options[sub_support_text]", function(value) {
    value.bind(function (newval) {
      $("#subSupportText").html(newval);
    })
  });

  wp.customize("theme_options[advisory_text]", function(value) {
    value.bind(function (newval) {
      $("#advisoryText").html(newval);
    });  
  });

  wp.customize("theme_options[subAdvisoryText]", function(value) {
    value.bind(function (newval) {
      $("#subAdvisoryText").html(newval);
    }); 
  });

  wp.customize("theme_options[technology_news_text]", function(value) {
    value.bind(function (newval) {
      $("#technologyNews").html(newval);
    })
  });

  wp.customize("theme_options[image_qr]", function(value) {
    value.bind(function(newval) {
      $('.header__qr-img').attr('src', newval);
    });
  });

  

})(jQuery);
