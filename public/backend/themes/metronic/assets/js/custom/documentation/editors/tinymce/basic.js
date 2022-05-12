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

/***/ "./resources/backend/core/js/custom/documentation/editors/tinymce/basic.js":
/*!*********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/tinymce/basic.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsTinyMCEBasic = function () {\n  // Private functions\n  var exampleBasic = function exampleBasic() {\n    var options = {\n      selector: '#kt_docs_tinymce_basic'\n    };\n\n    if (KTApp.isDarkMode()) {\n      options['skin'] = 'oxide-dark';\n      options['content_css'] = 'dark';\n    }\n\n    tinymce.init(options);\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleBasic();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsTinyMCEBasic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvdGlueW1jZS9iYXNpYy5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxtQkFBbUIsR0FBRyxZQUFXO0FBQ2pDO0FBQ0EsTUFBSUMsWUFBWSxHQUFHLFNBQWZBLFlBQWUsR0FBVztBQUMxQixRQUFJQyxPQUFPLEdBQUc7QUFBQ0MsTUFBQUEsUUFBUSxFQUFFO0FBQVgsS0FBZDs7QUFFQSxRQUFJQyxLQUFLLENBQUNDLFVBQU4sRUFBSixFQUF3QjtBQUNwQkgsTUFBQUEsT0FBTyxDQUFDLE1BQUQsQ0FBUCxHQUFrQixZQUFsQjtBQUNBQSxNQUFBQSxPQUFPLENBQUMsYUFBRCxDQUFQLEdBQXlCLE1BQXpCO0FBQ0g7O0FBRURJLElBQUFBLE9BQU8sQ0FBQ0MsSUFBUixDQUFhTCxPQUFiO0FBQ0gsR0FURDs7QUFXQSxTQUFPO0FBQ0g7QUFDQUssSUFBQUEsSUFBSSxFQUFFLGdCQUFXO0FBQ2JOLE1BQUFBLFlBQVk7QUFDZjtBQUpFLEdBQVA7QUFNSCxDQW5CeUIsRUFBMUIsQyxDQXFCQTs7O0FBQ0FPLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBVztBQUNqQ1QsRUFBQUEsbUJBQW1CLENBQUNPLElBQXBCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZWRpdG9ycy90aW55bWNlL2Jhc2ljLmpzPzk4ZjMiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZvcm1zVGlueU1DRUJhc2ljID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVCYXNpYyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIHZhciBvcHRpb25zID0ge3NlbGVjdG9yOiAnI2t0X2RvY3NfdGlueW1jZV9iYXNpYyd9O1xyXG4gICAgICAgIFxyXG4gICAgICAgIGlmIChLVEFwcC5pc0RhcmtNb2RlKCkpIHtcclxuICAgICAgICAgICAgb3B0aW9uc1snc2tpbiddID0gJ294aWRlLWRhcmsnO1xyXG4gICAgICAgICAgICBvcHRpb25zWydjb250ZW50X2NzcyddID0gJ2RhcmsnO1xyXG4gICAgICAgIH1cclxuICAgICAgICBcclxuICAgICAgICB0aW55bWNlLmluaXQob3B0aW9ucyk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVCYXNpYygpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEZvcm1zVGlueU1DRUJhc2ljLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZvcm1zVGlueU1DRUJhc2ljIiwiZXhhbXBsZUJhc2ljIiwib3B0aW9ucyIsInNlbGVjdG9yIiwiS1RBcHAiLCJpc0RhcmtNb2RlIiwidGlueW1jZSIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/tinymce/basic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/tinymce/basic.js"]();
/******/ 	
/******/ })()
;