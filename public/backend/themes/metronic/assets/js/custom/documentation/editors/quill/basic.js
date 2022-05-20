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

/***/ "./resources/backend/core/js/custom/documentation/editors/quill/basic.js":
/*!*******************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/quill/basic.js ***!
  \*******************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsQuillBasic = function () {\n  // Private functions\n  var exampleBasic = function exampleBasic() {\n    var quill = new Quill('#kt_docs_quill_basic', {\n      modules: {\n        toolbar: [[{\n          header: [1, 2, false]\n        }], ['bold', 'italic', 'underline'], ['image', 'code-block']]\n      },\n      placeholder: 'Type your text here...',\n      theme: 'snow' // or 'bubble'\n\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleBasic();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsQuillBasic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvcXVpbGwvYmFzaWMuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsaUJBQWlCLEdBQUcsWUFBVztBQUMvQjtBQUNBLE1BQUlDLFlBQVksR0FBRyxTQUFmQSxZQUFlLEdBQVc7QUFDMUIsUUFBSUMsS0FBSyxHQUFHLElBQUlDLEtBQUosQ0FBVSxzQkFBVixFQUFrQztBQUMxQ0MsTUFBQUEsT0FBTyxFQUFFO0FBQ0xDLFFBQUFBLE9BQU8sRUFBRSxDQUNMLENBQUM7QUFDR0MsVUFBQUEsTUFBTSxFQUFFLENBQUMsQ0FBRCxFQUFJLENBQUosRUFBTyxLQUFQO0FBRFgsU0FBRCxDQURLLEVBSUwsQ0FBQyxNQUFELEVBQVMsUUFBVCxFQUFtQixXQUFuQixDQUpLLEVBS0wsQ0FBQyxPQUFELEVBQVUsWUFBVixDQUxLO0FBREosT0FEaUM7QUFVMUNDLE1BQUFBLFdBQVcsRUFBRSx3QkFWNkI7QUFXMUNDLE1BQUFBLEtBQUssRUFBRSxNQVhtQyxDQVc1Qjs7QUFYNEIsS0FBbEMsQ0FBWjtBQWFILEdBZEQ7O0FBZ0JBLFNBQU87QUFDSDtBQUNBQyxJQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYlIsTUFBQUEsWUFBWTtBQUNmO0FBSkUsR0FBUDtBQU1ILENBeEJ1QixFQUF4QixDLENBMEJBOzs7QUFDQVMsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDWCxFQUFBQSxpQkFBaUIsQ0FBQ1MsSUFBbEI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9lZGl0b3JzL3F1aWxsL2Jhc2ljLmpzPzM0MmUiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZvcm1zUXVpbGxCYXNpYyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlQmFzaWMgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgcXVpbGwgPSBuZXcgUXVpbGwoJyNrdF9kb2NzX3F1aWxsX2Jhc2ljJywge1xyXG4gICAgICAgICAgICBtb2R1bGVzOiB7XHJcbiAgICAgICAgICAgICAgICB0b29sYmFyOiBbXHJcbiAgICAgICAgICAgICAgICAgICAgW3tcclxuICAgICAgICAgICAgICAgICAgICAgICAgaGVhZGVyOiBbMSwgMiwgZmFsc2VdXHJcbiAgICAgICAgICAgICAgICAgICAgfV0sXHJcbiAgICAgICAgICAgICAgICAgICAgWydib2xkJywgJ2l0YWxpYycsICd1bmRlcmxpbmUnXSxcclxuICAgICAgICAgICAgICAgICAgICBbJ2ltYWdlJywgJ2NvZGUtYmxvY2snXVxyXG4gICAgICAgICAgICAgICAgXVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBwbGFjZWhvbGRlcjogJ1R5cGUgeW91ciB0ZXh0IGhlcmUuLi4nLFxyXG4gICAgICAgICAgICB0aGVtZTogJ3Nub3cnIC8vIG9yICdidWJibGUnXHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVCYXNpYygpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEZvcm1zUXVpbGxCYXNpYy5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RGb3Jtc1F1aWxsQmFzaWMiLCJleGFtcGxlQmFzaWMiLCJxdWlsbCIsIlF1aWxsIiwibW9kdWxlcyIsInRvb2xiYXIiLCJoZWFkZXIiLCJwbGFjZWhvbGRlciIsInRoZW1lIiwiaW5pdCIsIktUVXRpbCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/quill/basic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/quill/basic.js"]();
/******/ 	
/******/ })()
;