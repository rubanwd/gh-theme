(function($, window) {
  'use strict';

  var slide = {
    // default options
    defaults: {
      isAutoSlide: true,
      isHoverStop: true,
      isBlurStop: true,
      isShowDots: false,
      isShowArrow: true,
      isHoverShowArrow: true,
      isLoadAllImgs: false,
      slideSpeed: 9000,
      switchSpeed: 3000,
      dotsClass: 'dots',
      dotActiveClass: 'active',
      dotsEvent: 'click',
      arrowClass: 'arrow',
      arrowLeftClass: 'arrow-left',
      arrowRightClass: 'arrow-right'
    },

    // curr options
    options: null,

    // 当前索引
    curIndex: 0,

    // 定时器
    timer: null,

    // 状态点集合
    dotsList: [],

    // init function
    init: function(elem, options) {
      var $self = $(elem),
          list = $self.find('ul li'),
          self = this,
          o;

      o = this.options = $.extend({}, this.defaults, options);

      if (o.isShowDots) {
        this._createDots(elem, list);
      }

      // // 显示左右箭头
      // if (o.isShowArrow) {
      //   this._createArrow(elem, list);
      // }

      // 一次性加载完全部图片
      if (o.isLoadAllImgs) {
        list.each(function() {
          $(this).css({
            // 'background': 'url(' + $(this).attr('data-bg') + ')',
            'opacity': '0',
            'z-index': '0',
              'background-position': '50% 50%',
              'background-size': 'cover'
          });
          $(this).attr('data-bg', '');
        });
      }

      // 显示第一个
      this._showBlock(list[this.curIndex]);

      // 自动轮播
      if (o.isAutoSlide) {
        this._defaultSlide(list);

        // 鼠标移入移除事件
        if (o.isHoverStop) {
          var className = $self.attr('class');
          $self.on('mouseenter', function(e) {
            clearInterval(self.timer);
          }).on('mouseleave', function() {
            clearInterval(self.timer);
            self._defaultSlide(list);
          });
        }

        // Window获取失去焦点事件
        if (o.isBlurStop) {
          $(window).on('blur', function() {
            clearInterval(self.timer);
          }).on('focus', function() {
            clearInterval(self.timer);
            self._defaultSlide(list);
          });
        }
      }

      $('.arrow-left').on('click', function() {
        self._hideBlock(list[self.curIndex]);
        self.curIndex = (list.length + (self.curIndex - 1)) % list.length;
        self._showBlock(list[self.curIndex]);
      });

      $('.arrow-right').on('click', function() {
        self._hideBlock(list[self.curIndex]);
        self.curIndex =  (self.curIndex + 1) % list.length;
        self._showBlock(list[self.curIndex]);
      });



    },

    // default slide
    _defaultSlide: function(list) {
      var self = this;
      this.timer = setInterval(function() {
        self._hideBlock(list[self.curIndex]);
        self.curIndex =  (self.curIndex + 1) % list.length;
        self._showBlock(list[self.curIndex]);
      }, 10000);
    },

    // show block
    _showBlock: function(block) {
      var o = this.options,
          $block = $(block),
          bg = $(block).attr('data-bg');

      if (bg) {
        $block.css({
          'background': 'url(' + bg + ')',
          'opacity': '0',
          'z-index': '0',
          'background-position': '50% 50%',
  'background-size': 'cover'
        });
        $block.attr('data-bg', '');
      }

      $block.stop().animate({
        'opacity': '1',
        'z-index': '1'
      }, o.switchSpeed);

      if (o.isShowDots) {
        $(this.dotsList[this.curIndex]).addClass(o.dotActiveClass);
      }
    },

    // hide block
    _hideBlock: function(block) {
      var o = this.options;

      $(block).stop().animate({
        'opacity': '0',
        'z-index': '0'
      }, o.switchSpeed);

      if (o.isShowDots) {
        $(this.dotsList[this.curIndex]).removeClass(o.dotActiveClass);
      }
    },

    // create dots
    _createDots: function(elem, list) {
      var self = this,
          dotsEvent = this.options.dotsEvent;

      var dots = $('<ol/>', {
        class: this.options.dotsClass
      });

      var dotsList = [];
      for (var i = 0; i < list.length; i++) {
        dotsList[i] = $('<li/>');
        dots.append(dotsList[i]);
      }

      $(elem).append(dots);
      this.dotsList = dotsList;

      // dots添加事件
      if (dotsEvent === 'click' || dotsEvent === 'mouseover' || dotsEvent === 'mouseenter') {
        dots.find('li').on(dotsEvent, function() {
          self._hideBlock(list[self.curIndex]);
          self.curIndex =  $(this).index();
          self._showBlock(list[self.curIndex]);
        });
      }
    }

  };

      

  // main function
  $.fn.slide = function(options) {
    slide.init(this, options);
    return this;
  };

})(jQuery, window);
