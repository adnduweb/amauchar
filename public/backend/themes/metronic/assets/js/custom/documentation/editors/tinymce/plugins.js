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

/***/ "./resources/backend/core/js/custom/documentation/editors/tinymce/plugins.js":
/*!***********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/tinymce/plugins.js ***!
  \***********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsTinyMCEPlugins = function () {\n  // Private functions\n  var examplePlugins = function examplePlugins() {\n    tinymce.init({\n      selector: '#kt_docs_tinymce_plugins',\n      toolbar: 'advlist | autolink | link image | lists charmap | print preview',\n      plugins: 'advlist autolink link image lists charmap print preview'\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      examplePlugins();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsTinyMCEPlugins.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvdGlueW1jZS9wbHVnaW5zLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLHFCQUFxQixHQUFHLFlBQVc7QUFDbkM7QUFDQSxNQUFJQyxjQUFjLEdBQUcsU0FBakJBLGNBQWlCLEdBQVc7QUFDNUJDLElBQUFBLE9BQU8sQ0FBQ0MsSUFBUixDQUFhO0FBQ1RDLE1BQUFBLFFBQVEsRUFBRSwwQkFERDtBQUVUQyxNQUFBQSxPQUFPLEVBQUUsaUVBRkE7QUFHVEMsTUFBQUEsT0FBTyxFQUFHO0FBSEQsS0FBYjtBQUtILEdBTkQ7O0FBUUEsU0FBTztBQUNIO0FBQ0FILElBQUFBLElBQUksRUFBRSxnQkFBVztBQUNiRixNQUFBQSxjQUFjO0FBQ2pCO0FBSkUsR0FBUDtBQU1ILENBaEIyQixFQUE1QixDLENBa0JBOzs7QUFDQU0sTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDUixFQUFBQSxxQkFBcUIsQ0FBQ0csSUFBdEI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9lZGl0b3JzL3RpbnltY2UvcGx1Z2lucy5qcz84OGNkIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGb3Jtc1RpbnlNQ0VQbHVnaW5zID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVQbHVnaW5zID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdGlueW1jZS5pbml0KHtcclxuICAgICAgICAgICAgc2VsZWN0b3I6ICcja3RfZG9jc190aW55bWNlX3BsdWdpbnMnLFxyXG4gICAgICAgICAgICB0b29sYmFyOiAnYWR2bGlzdCB8IGF1dG9saW5rIHwgbGluayBpbWFnZSB8IGxpc3RzIGNoYXJtYXAgfCBwcmludCBwcmV2aWV3JyxcclxuICAgICAgICAgICAgcGx1Z2lucyA6ICdhZHZsaXN0IGF1dG9saW5rIGxpbmsgaW1hZ2UgbGlzdHMgY2hhcm1hcCBwcmludCBwcmV2aWV3J1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlUGx1Z2lucygpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEZvcm1zVGlueU1DRVBsdWdpbnMuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURm9ybXNUaW55TUNFUGx1Z2lucyIsImV4YW1wbGVQbHVnaW5zIiwidGlueW1jZSIsImluaXQiLCJzZWxlY3RvciIsInRvb2xiYXIiLCJwbHVnaW5zIiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/tinymce/plugins.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/tinymce/plugins.js"]();
/******/ 	
/******/ })()
;