/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/sass/frontend/js/script.js":
/*!**********************************************!*\
  !*** ./resources/sass/frontend/js/script.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

// Slider
var Slider = function Slider() {
  if ($('.slider').length > 0) {
    $('.slider').slick({
      infinite: true,
      speed: 500,
      arrows: true,
      dots: false,
      prevArrow: '<a href="#" title="" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>',
      nextArrow: '<a href="#" title="" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>'
    });
  }
}; // Menu


var Menu = function Menu() {
  $('.btn-menu').click(function () {
    $('.menu-mb').addClass('open');
    $('.menu-mb').removeClass('close');
  });
  $('.menu-mb').find("ul li").each(function () {
    if ($(this).find("ul>li").length > 0) {
      $(this).append('<i class="fa fa-angle-down btn-drop1" aria-hidden="true"></i>');
    }
  });
  $('.btn-drop1').click(function () {
    $(this).toggleClass('fa-angle-down').toggleClass('fa-angle-up');
    $('.btn-drop1').parent('li').children('ul').toggleClass('active1');
  });
  $('.btn-close').click(function () {
    $(this).parent('.menu-mb').removeClass('open');
    $(this).parent('.menu-mb').addClass('close');
  });
}; // Lọc theo giá


var Sliderfilter = function Sliderfilter() {
  if ($("#slider-range").length > 0) {
    var numMin;
    var numMax;
    $("#slider-range").slider({
      range: true,
      min: 100000,
      max: 5000000,
      step: 100000,
      values: [100000, 5000000],
      slide: function slide(event, ui) {
        numMin = ui.values[0].toLocaleString();
        ;
        numMax = ui.values[1].toLocaleString();
        ;
        $("#amount").val(numMin + " - " + numMax);
      }
    });
    var numMin1 = $("#slider-range").slider("values", 0).toLocaleString();
    var numMax1 = $("#slider-range").slider("values", 1).toLocaleString();
    $("#amount").val(numMin1 + " - " + numMax1);
  }
};

var Sliderbookdetail = function Sliderbookdetail() {
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick(_defineProperty({
    slidesToShow: 3,
    slidesToScroll: 3,
    asNavFor: '.slider-for',
    dots: true,
    focusOnSelect: true,
    arrows: false
  }, "dots", false));
}; // Backtotop


var Backtotop = function Backtotop() {
  $('.back-to-top').click(function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
}; // Input number


var Inputnumber = function Inputnumber() {
  var number = $('.input-number').val();
  $('.plus').click(function () {
    var val = parseInt(number);
    val = val + 1;
    number = val;
    $('.input-number').val(val);
  });
  $('.minus').click(function () {
    var val = parseInt(number);

    if (number == 1) {
      val = 1;
    } else {
      val = val - 1;
    }

    $('.input-number').val(val);
    number = val;
  });
};

$(function () {
  Slider();
  Menu();
  Sliderbookdetail();
  Sliderfilter();
  Inputnumber();
  Backtotop();
}); // fb

$(document).ready(function (d, s, id) {
  var js,
      fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/***/ }),

/***/ 1:
/*!****************************************************!*\
  !*** multi ./resources/sass/frontend/js/script.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\Freelancer\dangkithanhlapdoanhnghiep\resources\sass\frontend\js\script.js */"./resources/sass/frontend/js/script.js");


/***/ })

/******/ });