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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

$(document).ready(function () {

    // time and date pickers

    $(".timepicker").timepicker({ 'timeFormat': 'H:i' });

    $(".datepicker").datepicker({
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
        changeYear: true,
        monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        monthNamesShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        dayNames: ["日曜日", "月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日"],
        dayNamesMin: ["日", "月", "火", "水", "木", "金", "土"],
        weekHeader: "週",
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: "年"
    });

    // navigation toggles
    $(".menu").on("click", function (event) {
        event.preventDefault();
        if ($(this).parent().hasClass("open") != true) {
            $(this).parent().addClass("open");
        } else if ($(this).parent().hasClass("open") == true) {
            $(this).parent().removeClass("open");
        }
    });

    $(".toggle").on("click", function (event) {
        event.preventDefault();
        if ($(".submenu").hasClass("open") != true) {
            $(".submenu").addClass("open");
        } else if ($(".submenu").hasClass("open") == true) {
            $(".submenu").removeClass("open");
        }
    });

    // chat
    $("#toggle-chat").on("click", function (event) {
        event.preventDefault();
        $(".chat-open").fadeIn("fast");
    });

    $(".contact-list a").on("click", function (event) {
        event.preventDefault();
        $(".contact-list").animate({ marginLeft: "-240px" });
        $(".contact-message .scroll").animate({ scrollTop: $('.contact-message .scroll').get(0).scrollHeight }, 2000);
    });

    $("a.back").on("click", function (event) {
        event.preventDefault();
        $(".contact-list").animate({ marginLeft: "0" });
        $('#chat_provider_id').val('');
        $('#chat_client_id').val('');
    });

    $("a.close").on("click", function (event) {
        event.preventDefault();
        $(".contact-list").animate({ marginLeft: "0" });
        $(".chat-open").fadeOut("fast");
        $('#chat_provider_id').val('');
        $('#chat_client_id').val('');
    });
});

/***/ })

/******/ });
