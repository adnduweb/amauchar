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

/***/ "./resources/backend/core/js/custom/documentation/editors/tinymce/hidden.js":
/*!**********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/tinymce/hidden.js ***!
  \**********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsTinyMCEHidden = function () {\n  // Private functions\n  var exampleHidden = function exampleHidden() {\n    tinymce.init({\n      selector: '#kt_docs_tinymce_hidden',\n      menubar: false,\n      toolbar: ['styleselect fontselect fontsizeselect', 'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify', 'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],\n      plugins: 'advlist autolink link image lists charmap print preview code'\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleHidden();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsTinyMCEHidden.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvdGlueW1jZS9oaWRkZW4uanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsb0JBQW9CLEdBQUcsWUFBVztBQUNsQztBQUNBLE1BQUlDLGFBQWEsR0FBRyxTQUFoQkEsYUFBZ0IsR0FBVztBQUMzQkMsSUFBQUEsT0FBTyxDQUFDQyxJQUFSLENBQWE7QUFDVEMsTUFBQUEsUUFBUSxFQUFFLHlCQUREO0FBRVRDLE1BQUFBLE9BQU8sRUFBRSxLQUZBO0FBR1RDLE1BQUFBLE9BQU8sRUFBRSxDQUFDLHVDQUFELEVBQ0wsdUdBREssRUFFTCxrSUFGSyxDQUhBO0FBTVRDLE1BQUFBLE9BQU8sRUFBRztBQU5ELEtBQWI7QUFRSCxHQVREOztBQVdBLFNBQU87QUFDSDtBQUNBSixJQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYkYsTUFBQUEsYUFBYTtBQUNoQjtBQUpFLEdBQVA7QUFNSCxDQW5CMEIsRUFBM0IsQyxDQXFCQTs7O0FBQ0FPLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBVztBQUNqQ1QsRUFBQUEsb0JBQW9CLENBQUNHLElBQXJCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZWRpdG9ycy90aW55bWNlL2hpZGRlbi5qcz83ZjQ3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGb3Jtc1RpbnlNQ0VIaWRkZW4gPSBmdW5jdGlvbigpIHtcclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZUhpZGRlbiA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIHRpbnltY2UuaW5pdCh7XHJcbiAgICAgICAgICAgIHNlbGVjdG9yOiAnI2t0X2RvY3NfdGlueW1jZV9oaWRkZW4nLFxyXG4gICAgICAgICAgICBtZW51YmFyOiBmYWxzZSxcclxuICAgICAgICAgICAgdG9vbGJhcjogWydzdHlsZXNlbGVjdCBmb250c2VsZWN0IGZvbnRzaXplc2VsZWN0JyxcclxuICAgICAgICAgICAgICAgICd1bmRvIHJlZG8gfCBjdXQgY29weSBwYXN0ZSB8IGJvbGQgaXRhbGljIHwgbGluayBpbWFnZSB8IGFsaWdubGVmdCBhbGlnbmNlbnRlciBhbGlnbnJpZ2h0IGFsaWduanVzdGlmeScsXHJcbiAgICAgICAgICAgICAgICAnYnVsbGlzdCBudW1saXN0IHwgb3V0ZGVudCBpbmRlbnQgfCBibG9ja3F1b3RlIHN1YnNjcmlwdCBzdXBlcnNjcmlwdCB8IGFkdmxpc3QgfCBhdXRvbGluayB8IGxpc3RzIGNoYXJtYXAgfCBwcmludCBwcmV2aWV3IHwgIGNvZGUnXSxcclxuICAgICAgICAgICAgcGx1Z2lucyA6ICdhZHZsaXN0IGF1dG9saW5rIGxpbmsgaW1hZ2UgbGlzdHMgY2hhcm1hcCBwcmludCBwcmV2aWV3IGNvZGUnXHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVIaWRkZW4oKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RGb3Jtc1RpbnlNQ0VIaWRkZW4uaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURm9ybXNUaW55TUNFSGlkZGVuIiwiZXhhbXBsZUhpZGRlbiIsInRpbnltY2UiLCJpbml0Iiwic2VsZWN0b3IiLCJtZW51YmFyIiwidG9vbGJhciIsInBsdWdpbnMiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/tinymce/hidden.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/tinymce/hidden.js"]();
/******/ 	
/******/ })()
;