/**
 * SCROLL TABS
 *
 *  JQuery Plugin to manage scrollable tabs. See the 'defaultOptions' data structure for available options for configuration. The plugin is configured jointly via
 *  these Javascript options and CSS classes to style how it is displayed. Some of the CSS is set here in the javascript so that users will have minimal
 *  configuration to make the tabs themselves work, and should only have to do configuration on how they want it styled.
 *
 * Known Limitations:
 *  IE6 problems, it does not properly apply scrolling and therefore is always the 'full width.' Additionally, the multiple-class CSS styling does not work
 *  properly in IE6. We can work around this in the future by apply distinct class stylings that represent all the combinations.
 *
 * Version:   2.0
 * Author:    Josh Reed
 */
(function ($) {
  $.fn.scrollTabs = function (opts) {
    var initialize = function (state) {
      opts = $.extend({}, $.fn.scrollTabs.defaultOptions, opts);

      if ($(this).prop('tagName').toLowerCase() === 'ul') {
        this.itemTag = 'li';
      } else {
        this.itemTag = 'span';
      }

      $(this).addClass('scroll_tabs_container');
      if ($(this).css('position') === null || $(this).css('position') === 'static') {
        $(this).css('position', 'relative');
      }

      $(this.itemTag, this).last().addClass('scroll_tab_last');
      $(this.itemTag, this).first().addClass('scroll_tab_first');

      $(this).html("<div class='scroll_tab_left_button'></div><div class='scroll_tab_inner'><span class='scroll_tab_left_finisher'>&nbsp;</span>" + $(this).html() + "<span class='scroll_tab_right_finisher'>&nbsp;</span></div><div class='scroll_tab_right_button'></div>");

      $('.scroll_tab_inner > span.scroll_tab_left_finisher', this).css({
        'display': 'none'
      });

      $('.scroll_tab_inner > span.scroll_tab_right_finisher', this).css({
        'display': 'none'
      });


      var _this = this;

      $('.scroll_tab_inner', this).css({
        'margin': '0px',
        'overflow': 'hidden',
        'white-space': 'nowrap',
        '-ms-text-overflow': 'clip',
        'text-overflow': 'clip',
        'font-size': '0px',
        'position': 'absolute',
        'top': '0px',
        'left': opts.left_arrow_size + 'px',
        'right': opts.right_arrow_size + 'px'
      });

      // If mousewheel function not present, don't utilize it
      if ($.isFunction($.fn.mousewheel)) {
        $('.scroll_tab_inner', this).mousewheel(function (event, delta) {
          // Only do mousewheel scrolling if scrolling is necessary
          if ($('.scroll_tab_right_button', _this).css('display') !== 'none') {
            this.scrollLeft -= (delta * 30);
            state.scrollPos = this.scrollLeft;
            event.preventDefault();
          }
        });
      }

      // Set initial scroll position
      $('.scroll_tab_inner', _this).animate({ scrollLeft: state.scrollPos + 'px' }, 0);

      $('.scroll_tab_left_button', this).css({
        'position': 'absolute',
        'left': '0px',
        'top': '0px',
        'width': opts.left_arrow_size + 'px',
        'cursor': 'pointer'
      });

      $('.scroll_tab_right_button', this).css({
        'position': 'absolute',
        'right': '0px',
        'top': '0px',
        'width': opts.right_arrow_size + 'px',
        'cursor': 'pointer'
      });

      $('.scroll_tab_inner > ' + _this.itemTag, _this).css({
        'display': '-moz-inline-stack',
        'display': 'inline-block',
        'zoom': 1,
        '*display': 'inline',
        '_height': '40px',
        '-webkit-user-select': 'none',
        '-khtml-user-select': 'none',
        '-moz-user-select': 'none',
        '-ms-user-select': 'none',
        '-o-user-select': 'none',
        'user-select': 'none'
      });


      var size_checking = function () {
        var panel_width = $('.scroll_tab_inner', _this).outerWidth();

        if ($('.scroll_tab_inner', _this)[0].scrollWidth > panel_width) {
          $('.scroll_tab_right_button', _this).show();
          $('.scroll_tab_left_button', _this).show();
          $('.scroll_tab_inner', _this).css({ left: opts.left_arrow_size + 'px', right: opts.right_arrow_size + 'px' });
          $('.scroll_tab_left_finisher', _this).css('display', 'none');
          $('.scroll_tab_right_finisher', _this).css('display', 'none');

          if ($('.scroll_tab_inner', _this)[0].scrollWidth - panel_width == $('.scroll_tab_inner', _this).scrollLeft()) {
            $('.scroll_tab_right_button', _this).addClass('scroll_arrow_disabled').addClass('scroll_tab_right_button_disabled');
          } else {
            $('.scroll_tab_right_button', _this).removeClass('scroll_arrow_disabled').removeClass('scroll_tab_right_button_disabled');
          }
          if ($('.scroll_tab_inner', _this).scrollLeft() == 0) {
            $('.scroll_tab_left_button', _this).addClass('scroll_arrow_disabled').addClass('scroll_tab_left_button_disabled');
          } else {
            $('.scroll_tab_left_button', _this).removeClass('scroll_arrow_disabled').removeClass('scroll_tab_left_button_disabled');
          }
        } else {
          $('.scroll_tab_right_button', _this).hide();
          $('.scroll_tab_left_button', _this).hide();
          $('.scroll_tab_inner', _this).css({ left: '0px', right: '0px' });

          if ($('.scroll_tab_inner > ' + _this.itemTag + ':not(.scroll_tab_right_finisher):not(.scroll_tab_left_finisher):visible', _this).size() > 0) {
            $('.scroll_tab_left_finisher', _this).css('display', 'inline-block');
            $('.scroll_tab_right_finisher', _this).css('display', 'inline-block');
          }
        }
      };

      size_checking();

      state.delay_timer = setInterval(function () {
        size_checking();
      }, 500);

      var press_and_hold_timeout;

      $('.scroll_tab_right_button', this).mousedown(function (e) {
        e.stopPropagation();
        var scrollRightFunc = function () {
          var left = $('.scroll_tab_inner', _this).scrollLeft();
          state.scrollPos = Math.min(left + opts.scroll_distance, $('.scroll_tab_inner', _this)[0].scrollWidth - $('.scroll_tab_inner', _this).outerWidth());
          $('.scroll_tab_inner', _this).animate({ scrollLeft: (left + opts.scroll_distance) + 'px' }, opts.scroll_duration);
        };
        scrollRightFunc();

        press_and_hold_timeout = setInterval(function () {
          scrollRightFunc();
        }, opts.scroll_duration);
      }).bind("mouseup mouseleave", function () {
        clearInterval(press_and_hold_timeout);
      }).mouseover(function () {
        $(this).addClass('scroll_arrow_over').addClass('scroll_tab_right_button_over');
      }).mouseout(function () {
        $(this).removeClass('scroll_arrow_over').removeClass('scroll_tab_right_button_over');
      });

      $('.scroll_tab_left_button', this).mousedown(function (e) {
        e.stopPropagation();
        var scrollLeftFunc = function () {
          var left = $('.scroll_tab_inner', _this).scrollLeft();
          state.scrollPos = Math.max(left - opts.scroll_distance, 0);
          $('.scroll_tab_inner', _this).animate({ scrollLeft: (left - opts.scroll_distance) + 'px' }, opts.scroll_duration);
        };
        scrollLeftFunc();

        press_and_hold_timeout = setInterval(function () {
          scrollLeftFunc();
        }, opts.scroll_duration);
      }).bind("mouseup mouseleave", function () {
        clearInterval(press_and_hold_timeout);
      }).mouseover(function () {
        $(this).addClass('scroll_arrow_over').addClass('scroll_tab_left_button_over');
      }).mouseout(function () {
        $(this).removeClass('scroll_arrow_over').removeClass('scroll_tab_left_button_over');
      });

      $('.scroll_tab_inner > ' + this.itemTag + (this.itemTag !== 'span' ? ', .scroll_tab_inner > span' : ''), this).mouseover(function () {
        $(this).addClass('scroll_tab_over');
        if ($(this).hasClass('scroll_tab_left_finisher')) {
          $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_first', _this).addClass('scroll_tab_over').addClass('scroll_tab_first_over');
        }
        if ($(this).hasClass('scroll_tab_right_finisher')) {
          $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_last', _this).addClass('scroll_tab_over').addClass('scroll_tab_last_over');
        }
        if ($(this).hasClass('scroll_tab_first') || $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_last', _this).hasClass('scroll_tab_first')) {
          $('.scroll_tab_inner > span.scroll_tab_left_finisher', _this).addClass('scroll_tab_over').addClass('scroll_tab_left_finisher_over');
        }
        if ($(this).hasClass('scroll_tab_last') || $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_first', _this).hasClass('scroll_tab_last')) {
          $('.scroll_tab_inner > span.scroll_tab_right_finisher', _this).addClass('scroll_tab_over').addClass('scroll_tab_right_finisher_over');
        }
      }).mouseout(function () {
        $(this).removeClass('scroll_tab_over');
        if ($(this).hasClass('scroll_tab_left_finisher')) {
          $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_first', _this).removeClass('scroll_tab_over').removeClass('scroll_tab_first_over');
        }
        if ($(this).hasClass('scroll_tab_right_finisher')) {
          $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_last', _this).removeClass('scroll_tab_over').removeClass('scroll_tab_last_over');
        }
        if ($(this).hasClass('scroll_tab_first') || $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_last', _this).hasClass('scroll_tab_first')) {
          $('.scroll_tab_inner > span.scroll_tab_left_finisher', _this).removeClass('scroll_tab_over').removeClass('scroll_tab_left_finisher_over');
        }
        if ($(this).hasClass('scroll_tab_last') || $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_first', _this).hasClass('scroll_tab_last')) {
          $('.scroll_tab_inner > span.scroll_tab_right_finisher', _this).removeClass('scroll_tab_over').removeClass('scroll_tab_right_finisher_over');
        }
      });
      // Check to set the edges as selected if needed
      if ($('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_first', _this).hasClass('tab_selected'))
        $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_left_finisher', _this).addClass('tab_selected').addClass('scroll_tab_left_finisher_selected');
      if ($('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_last', _this).hasClass('tab_selected'))
        $('.scroll_tab_inner > ' + _this.itemTag + '.scroll_tab_right_finisher', _this).addClass('tab_selected').addClass('scroll_tab_right_finisher_selected');
    };



    this.each(function () {
      var backup = $(this).html();

      var state = {};
      state.scrollPos = 0;
      initialize.call(this, state);

      var context_obj = this;
    });
  };

  $.fn.scrollTabs.defaultOptions = {
    scroll_distance: 200,
    scroll_duration: 200,
    left_arrow_size: 26,
    right_arrow_size: 26,
    click_callback: function (e) {
      var val = $(this).attr('rel');
      if (val) {
        window.location.href = val;
      }
    }
  };

  $('#tabScroll').scrollTabs({
    scroll_distance: 150,
    scroll_duration: 150,
    left_arrow_size: 0,
    right_arrow_size: 0,
    click_callback: function (e) {
      var val = $(this).attr('rel');
      if (val) {
        window.location.href = val;
      }
    }
  });
  
  
  
  $('#tabScroll a').click(function (e) {
    console.log('1');
    e.preventDefault()
    $(this).tab('show')
  });
  
  $('#tabScroll li a').click(function () {
    console.log('2');
    $("#tabScroll li").removeClass('active');
    $(this).parent("li").addClass("active");
  });
})(jQuery);