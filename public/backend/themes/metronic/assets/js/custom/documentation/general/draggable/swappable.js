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

/***/ "./resources/backend/core/js/custom/documentation/general/draggable/swappable.js":
/*!***************************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/general/draggable/swappable.js ***!
  \***************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTDraggableSwappable = function () {\n  // Private functions\n  var exampleSwappable = function exampleSwappable() {\n    var containers = document.querySelectorAll('.draggable-zone');\n\n    if (containers.length === 0) {\n      return false;\n    }\n\n    var swappable = new Swappable[\"default\"](containers, {\n      draggable: '.draggable',\n      handle: '.draggable .draggable-handle',\n      mirror: {\n        //appendTo: selector,\n        appendTo: 'body',\n        constrainDimensions: true\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleSwappable();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTDraggableSwappable.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvZHJhZ2dhYmxlL3N3YXBwYWJsZS5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxvQkFBb0IsR0FBRyxZQUFXO0FBQ2xDO0FBQ0EsTUFBSUMsZ0JBQWdCLEdBQUcsU0FBbkJBLGdCQUFtQixHQUFXO0FBQzlCLFFBQUlDLFVBQVUsR0FBR0MsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQixpQkFBMUIsQ0FBakI7O0FBRUEsUUFBSUYsVUFBVSxDQUFDRyxNQUFYLEtBQXNCLENBQTFCLEVBQTZCO0FBQ3pCLGFBQU8sS0FBUDtBQUNIOztBQUVELFFBQUlDLFNBQVMsR0FBRyxJQUFJQyxTQUFTLFdBQWIsQ0FBc0JMLFVBQXRCLEVBQWtDO0FBQzlDTSxNQUFBQSxTQUFTLEVBQUUsWUFEbUM7QUFFOUNDLE1BQUFBLE1BQU0sRUFBRSw4QkFGc0M7QUFHOUNDLE1BQUFBLE1BQU0sRUFBRTtBQUNKO0FBQ0FDLFFBQUFBLFFBQVEsRUFBRSxNQUZOO0FBR0pDLFFBQUFBLG1CQUFtQixFQUFFO0FBSGpCO0FBSHNDLEtBQWxDLENBQWhCO0FBU0gsR0FoQkQ7O0FBa0JBLFNBQU87QUFDSDtBQUNBQyxJQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYlosTUFBQUEsZ0JBQWdCO0FBQ25CO0FBSkUsR0FBUDtBQU1ILENBMUIwQixFQUEzQixDLENBNEJBOzs7QUFDQWEsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDZixFQUFBQSxvQkFBb0IsQ0FBQ2EsSUFBckI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9nZW5lcmFsL2RyYWdnYWJsZS9zd2FwcGFibGUuanM/NGI4YiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtURHJhZ2dhYmxlU3dhcHBhYmxlID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVTd2FwcGFibGUgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgY29udGFpbmVycyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5kcmFnZ2FibGUtem9uZScpO1xyXG5cclxuICAgICAgICBpZiAoY29udGFpbmVycy5sZW5ndGggPT09IDApIHtcclxuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgdmFyIHN3YXBwYWJsZSA9IG5ldyBTd2FwcGFibGUuZGVmYXVsdChjb250YWluZXJzLCB7XHJcbiAgICAgICAgICAgIGRyYWdnYWJsZTogJy5kcmFnZ2FibGUnLFxyXG4gICAgICAgICAgICBoYW5kbGU6ICcuZHJhZ2dhYmxlIC5kcmFnZ2FibGUtaGFuZGxlJyxcclxuICAgICAgICAgICAgbWlycm9yOiB7XHJcbiAgICAgICAgICAgICAgICAvL2FwcGVuZFRvOiBzZWxlY3RvcixcclxuICAgICAgICAgICAgICAgIGFwcGVuZFRvOiAnYm9keScsXHJcbiAgICAgICAgICAgICAgICBjb25zdHJhaW5EaW1lbnNpb25zOiB0cnVlXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZVN3YXBwYWJsZSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVERyYWdnYWJsZVN3YXBwYWJsZS5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1REcmFnZ2FibGVTd2FwcGFibGUiLCJleGFtcGxlU3dhcHBhYmxlIiwiY29udGFpbmVycyIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImxlbmd0aCIsInN3YXBwYWJsZSIsIlN3YXBwYWJsZSIsImRyYWdnYWJsZSIsImhhbmRsZSIsIm1pcnJvciIsImFwcGVuZFRvIiwiY29uc3RyYWluRGltZW5zaW9ucyIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/general/draggable/swappable.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/general/draggable/swappable.js"]();
/******/ 	
/******/ })()
;