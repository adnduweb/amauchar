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

/***/ "./resources/backend/core/js/custom/documentation/general/draggable/cards.js":
/*!***********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/general/draggable/cards.js ***!
  \***********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTDraggableCards = function () {\n  // Private functions\n  var exampleCards = function exampleCards() {\n    var containers = document.querySelectorAll('.draggable-zone');\n\n    if (containers.length === 0) {\n      return false;\n    }\n\n    var swappable = new Sortable[\"default\"](containers, {\n      draggable: '.draggable',\n      handle: '.draggable .draggable-handle',\n      mirror: {\n        //appendTo: selector,\n        appendTo: 'body',\n        constrainDimensions: true\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleCards();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTDraggableCards.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvZHJhZ2dhYmxlL2NhcmRzLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLGdCQUFnQixHQUFHLFlBQVc7QUFDOUI7QUFDQSxNQUFJQyxZQUFZLEdBQUcsU0FBZkEsWUFBZSxHQUFXO0FBQzFCLFFBQUlDLFVBQVUsR0FBR0MsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQixpQkFBMUIsQ0FBakI7O0FBRUEsUUFBSUYsVUFBVSxDQUFDRyxNQUFYLEtBQXNCLENBQTFCLEVBQTZCO0FBQ3pCLGFBQU8sS0FBUDtBQUNIOztBQUVELFFBQUlDLFNBQVMsR0FBRyxJQUFJQyxRQUFRLFdBQVosQ0FBcUJMLFVBQXJCLEVBQWlDO0FBQzdDTSxNQUFBQSxTQUFTLEVBQUUsWUFEa0M7QUFFN0NDLE1BQUFBLE1BQU0sRUFBRSw4QkFGcUM7QUFHN0NDLE1BQUFBLE1BQU0sRUFBRTtBQUNKO0FBQ0FDLFFBQUFBLFFBQVEsRUFBRSxNQUZOO0FBR0pDLFFBQUFBLG1CQUFtQixFQUFFO0FBSGpCO0FBSHFDLEtBQWpDLENBQWhCO0FBU0gsR0FoQkQ7O0FBa0JBLFNBQU87QUFDSDtBQUNBQyxJQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYlosTUFBQUEsWUFBWTtBQUNmO0FBSkUsR0FBUDtBQU1ILENBMUJzQixFQUF2QixDLENBNEJBOzs7QUFDQWEsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDZixFQUFBQSxnQkFBZ0IsQ0FBQ2EsSUFBakI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9nZW5lcmFsL2RyYWdnYWJsZS9jYXJkcy5qcz8wNzMzIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1REcmFnZ2FibGVDYXJkcyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlQ2FyZHMgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgY29udGFpbmVycyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5kcmFnZ2FibGUtem9uZScpO1xyXG5cclxuICAgICAgICBpZiAoY29udGFpbmVycy5sZW5ndGggPT09IDApIHtcclxuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgdmFyIHN3YXBwYWJsZSA9IG5ldyBTb3J0YWJsZS5kZWZhdWx0KGNvbnRhaW5lcnMsIHtcclxuICAgICAgICAgICAgZHJhZ2dhYmxlOiAnLmRyYWdnYWJsZScsXHJcbiAgICAgICAgICAgIGhhbmRsZTogJy5kcmFnZ2FibGUgLmRyYWdnYWJsZS1oYW5kbGUnLFxyXG4gICAgICAgICAgICBtaXJyb3I6IHtcclxuICAgICAgICAgICAgICAgIC8vYXBwZW5kVG86IHNlbGVjdG9yLFxyXG4gICAgICAgICAgICAgICAgYXBwZW5kVG86ICdib2R5JyxcclxuICAgICAgICAgICAgICAgIGNvbnN0cmFpbkRpbWVuc2lvbnM6IHRydWVcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlQ2FyZHMoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1REcmFnZ2FibGVDYXJkcy5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1REcmFnZ2FibGVDYXJkcyIsImV4YW1wbGVDYXJkcyIsImNvbnRhaW5lcnMiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJsZW5ndGgiLCJzd2FwcGFibGUiLCJTb3J0YWJsZSIsImRyYWdnYWJsZSIsImhhbmRsZSIsIm1pcnJvciIsImFwcGVuZFRvIiwiY29uc3RyYWluRGltZW5zaW9ucyIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/general/draggable/cards.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/general/draggable/cards.js"]();
/******/ 	
/******/ })()
;