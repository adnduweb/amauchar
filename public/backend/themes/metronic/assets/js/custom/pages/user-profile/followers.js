/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/backend/core/js/custom/pages/user-profile/followers.js":
/*!**************************************************************************!*\
  !*** ./resources/backend/core/js/custom/pages/user-profile/followers.js ***!
  \**************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTProfileFollowers = function () {\n  // init variables\n  var showMoreButton = document.getElementById('kt_followers_show_more_button');\n  var showMoreCards = document.getElementById('kt_followers_show_more_cards'); // Private functions\n\n  var handleShowMore = function handleShowMore() {\n    // Show more click\n    showMoreButton.addEventListener('click', function (e) {\n      showMoreButton.setAttribute('data-kt-indicator', 'on'); // Disable button to avoid multiple click \n\n      showMoreButton.disabled = true;\n      setTimeout(function () {\n        // Hide loading indication\n        showMoreButton.removeAttribute('data-kt-indicator'); // Enable button\n\n        showMoreButton.disabled = false; // Hide button\n\n        showMoreButton.classList.add('d-none'); // Show card\n\n        showMoreCards.classList.remove('d-none'); // Scroll to card\n\n        KTUtil.scrollTo(showMoreCards, 200);\n      }, 2000);\n    });\n  }; // Public methods\n\n\n  return {\n    init: function init() {\n      handleShowMore();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTProfileFollowers.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9wYWdlcy91c2VyLXByb2ZpbGUvZm9sbG93ZXJzLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLGtCQUFrQixHQUFHLFlBQVk7QUFDakM7QUFDQSxNQUFJQyxjQUFjLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QiwrQkFBeEIsQ0FBckI7QUFDQSxNQUFJQyxhQUFhLEdBQUdGLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3Qiw4QkFBeEIsQ0FBcEIsQ0FIaUMsQ0FLakM7O0FBQ0EsTUFBSUUsY0FBYyxHQUFHLFNBQWpCQSxjQUFpQixHQUFZO0FBQzdCO0FBQ0FKLElBQUFBLGNBQWMsQ0FBQ0ssZ0JBQWYsQ0FBZ0MsT0FBaEMsRUFBeUMsVUFBVUMsQ0FBVixFQUFhO0FBQ2xETixNQUFBQSxjQUFjLENBQUNPLFlBQWYsQ0FBNEIsbUJBQTVCLEVBQWlELElBQWpELEVBRGtELENBR2xEOztBQUNBUCxNQUFBQSxjQUFjLENBQUNRLFFBQWYsR0FBMEIsSUFBMUI7QUFFQUMsTUFBQUEsVUFBVSxDQUFDLFlBQVc7QUFDbEI7QUFDQVQsUUFBQUEsY0FBYyxDQUFDVSxlQUFmLENBQStCLG1CQUEvQixFQUZrQixDQUlsQjs7QUFDWlYsUUFBQUEsY0FBYyxDQUFDUSxRQUFmLEdBQTBCLEtBQTFCLENBTDhCLENBT2xCOztBQUNBUixRQUFBQSxjQUFjLENBQUNXLFNBQWYsQ0FBeUJDLEdBQXpCLENBQTZCLFFBQTdCLEVBUmtCLENBVWxCOztBQUNBVCxRQUFBQSxhQUFhLENBQUNRLFNBQWQsQ0FBd0JFLE1BQXhCLENBQStCLFFBQS9CLEVBWGtCLENBYWxCOztBQUNBQyxRQUFBQSxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JaLGFBQWhCLEVBQStCLEdBQS9CO0FBQ0gsT0FmUyxFQWVQLElBZk8sQ0FBVjtBQWdCSCxLQXRCRDtBQXVCSCxHQXpCRCxDQU5pQyxDQWlDakM7OztBQUNBLFNBQU87QUFDSGEsSUFBQUEsSUFBSSxFQUFFLGdCQUFZO0FBQ2RaLE1BQUFBLGNBQWM7QUFDakI7QUFIRSxHQUFQO0FBS0gsQ0F2Q3dCLEVBQXpCLEMsQ0EwQ0E7OztBQUNBVSxNQUFNLENBQUNHLGtCQUFQLENBQTBCLFlBQVc7QUFDakNsQixFQUFBQSxrQkFBa0IsQ0FBQ2lCLElBQW5CO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL3BhZ2VzL3VzZXItcHJvZmlsZS9mb2xsb3dlcnMuanM/NTQ5OCJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtUUHJvZmlsZUZvbGxvd2VycyA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIGluaXQgdmFyaWFibGVzXHJcbiAgICB2YXIgc2hvd01vcmVCdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3RfZm9sbG93ZXJzX3Nob3dfbW9yZV9idXR0b24nKTtcclxuICAgIHZhciBzaG93TW9yZUNhcmRzID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X2ZvbGxvd2Vyc19zaG93X21vcmVfY2FyZHMnKTtcclxuXHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGhhbmRsZVNob3dNb3JlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vIFNob3cgbW9yZSBjbGlja1xyXG4gICAgICAgIHNob3dNb3JlQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgc2hvd01vcmVCdXR0b24uc2V0QXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicsICdvbicpO1xyXG5cclxuICAgICAgICAgICAgLy8gRGlzYWJsZSBidXR0b24gdG8gYXZvaWQgbXVsdGlwbGUgY2xpY2sgXHJcbiAgICAgICAgICAgIHNob3dNb3JlQnV0dG9uLmRpc2FibGVkID0gdHJ1ZTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAvLyBIaWRlIGxvYWRpbmcgaW5kaWNhdGlvblxyXG4gICAgICAgICAgICAgICAgc2hvd01vcmVCdXR0b24ucmVtb3ZlQXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIEVuYWJsZSBidXR0b25cclxuXHRcdFx0XHRzaG93TW9yZUJ1dHRvbi5kaXNhYmxlZCA9IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIEhpZGUgYnV0dG9uXHJcbiAgICAgICAgICAgICAgICBzaG93TW9yZUJ1dHRvbi5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBTaG93IGNhcmRcclxuICAgICAgICAgICAgICAgIHNob3dNb3JlQ2FyZHMuY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gU2Nyb2xsIHRvIGNhcmRcclxuICAgICAgICAgICAgICAgIEtUVXRpbC5zY3JvbGxUbyhzaG93TW9yZUNhcmRzLCAyMDApO1xyXG4gICAgICAgICAgICB9LCAyMDAwKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICAvLyBQdWJsaWMgbWV0aG9kc1xyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGhhbmRsZVNob3dNb3JlKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59KCk7XHJcblxyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUUHJvZmlsZUZvbGxvd2Vycy5pbml0KCk7XHJcbn0pOyJdLCJuYW1lcyI6WyJLVFByb2ZpbGVGb2xsb3dlcnMiLCJzaG93TW9yZUJ1dHRvbiIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJzaG93TW9yZUNhcmRzIiwiaGFuZGxlU2hvd01vcmUiLCJhZGRFdmVudExpc3RlbmVyIiwiZSIsInNldEF0dHJpYnV0ZSIsImRpc2FibGVkIiwic2V0VGltZW91dCIsInJlbW92ZUF0dHJpYnV0ZSIsImNsYXNzTGlzdCIsImFkZCIsInJlbW92ZSIsIktUVXRpbCIsInNjcm9sbFRvIiwiaW5pdCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/pages/user-profile/followers.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/pages/user-profile/followers.js"]();
/******/ 	
/******/ })()
;