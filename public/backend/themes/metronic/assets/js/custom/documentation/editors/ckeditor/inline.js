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

/***/ "./resources/backend/core/js/custom/documentation/editors/ckeditor/inline.js":
/*!***********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/ckeditor/inline.js ***!
  \***********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsCKEditorInline = function () {\n  // Private functions\n  var exampleInline = function exampleInline() {\n    InlineEditor.create(document.querySelector('#kt_docs_ckeditor_inline')).then(function (editor) {\n      console.log(editor);\n    })[\"catch\"](function (error) {\n      console.error(error);\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleInline();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsCKEditorInline.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvY2tlZGl0b3IvaW5saW5lLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLHFCQUFxQixHQUFHLFlBQVk7QUFDcEM7QUFDQSxNQUFJQyxhQUFhLEdBQUcsU0FBaEJBLGFBQWdCLEdBQVk7QUFDNUJDLElBQUFBLFlBQVksQ0FDUEMsTUFETCxDQUNZQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsMEJBQXZCLENBRFosRUFFS0MsSUFGTCxDQUVVLFVBQUFDLE1BQU0sRUFBSTtBQUNaQyxNQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWUYsTUFBWjtBQUNILEtBSkwsV0FLVyxVQUFBRyxLQUFLLEVBQUk7QUFDWkYsTUFBQUEsT0FBTyxDQUFDRSxLQUFSLENBQWNBLEtBQWQ7QUFDSCxLQVBMO0FBUUgsR0FURDs7QUFXQSxTQUFPO0FBQ0g7QUFDQUMsSUFBQUEsSUFBSSxFQUFFLGdCQUFZO0FBQ2RWLE1BQUFBLGFBQWE7QUFDaEI7QUFKRSxHQUFQO0FBTUgsQ0FuQjJCLEVBQTVCLEMsQ0FxQkE7OztBQUNBVyxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVk7QUFDbENiLEVBQUFBLHFCQUFxQixDQUFDVyxJQUF0QjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvY2tlZGl0b3IvaW5saW5lLmpzPzIwZTQiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZvcm1zQ0tFZGl0b3JJbmxpbmUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVJbmxpbmUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgSW5saW5lRWRpdG9yXHJcbiAgICAgICAgICAgIC5jcmVhdGUoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X2RvY3NfY2tlZGl0b3JfaW5saW5lJykpXHJcbiAgICAgICAgICAgIC50aGVuKGVkaXRvciA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlZGl0b3IpO1xyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAuY2F0Y2goZXJyb3IgPT4ge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5lcnJvcihlcnJvcik7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUlubGluZSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RGb3Jtc0NLRWRpdG9ySW5saW5lLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZvcm1zQ0tFZGl0b3JJbmxpbmUiLCJleGFtcGxlSW5saW5lIiwiSW5saW5lRWRpdG9yIiwiY3JlYXRlIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwidGhlbiIsImVkaXRvciIsImNvbnNvbGUiLCJsb2ciLCJlcnJvciIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/ckeditor/inline.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/ckeditor/inline.js"]();
/******/ 	
/******/ })()
;