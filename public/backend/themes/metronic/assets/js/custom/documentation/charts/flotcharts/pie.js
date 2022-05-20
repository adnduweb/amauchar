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

/***/ "./resources/backend/core/js/custom/documentation/charts/flotcharts/pie.js":
/*!*********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/charts/flotcharts/pie.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFlotDemoPie = function () {\n  // Private functions\n  var examplePie = function examplePie() {\n    var data = [{\n      label: \"CSS\",\n      data: 10,\n      color: KTUtil.getCssVariableValue('--bs-active-primary')\n    }, {\n      label: \"HTML5\",\n      data: 40,\n      color: KTUtil.getCssVariableValue('--bs-active-success')\n    }, {\n      label: \"PHP\",\n      data: 30,\n      color: KTUtil.getCssVariableValue('--bs-active-danger')\n    }, {\n      label: \"Angular\",\n      data: 20,\n      color: KTUtil.getCssVariableValue('--bs-active-warning')\n    }];\n    $.plot($(\"#kt_docs_flot_pie\"), data, {\n      series: {\n        pie: {\n          show: true\n        }\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      examplePie();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoPie.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2NoYXJ0cy9mbG90Y2hhcnRzL3BpZS5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxhQUFhLEdBQUcsWUFBWTtBQUM1QjtBQUNBLE1BQUlDLFVBQVUsR0FBRyxTQUFiQSxVQUFhLEdBQVk7QUFDekIsUUFBSUMsSUFBSSxHQUFHLENBQ1A7QUFBRUMsTUFBQUEsS0FBSyxFQUFFLEtBQVQ7QUFBZ0JELE1BQUFBLElBQUksRUFBRSxFQUF0QjtBQUEwQkUsTUFBQUEsS0FBSyxFQUFFQyxNQUFNLENBQUNDLG1CQUFQLENBQTJCLHFCQUEzQjtBQUFqQyxLQURPLEVBRVA7QUFBRUgsTUFBQUEsS0FBSyxFQUFFLE9BQVQ7QUFBa0JELE1BQUFBLElBQUksRUFBRSxFQUF4QjtBQUE0QkUsTUFBQUEsS0FBSyxFQUFFQyxNQUFNLENBQUNDLG1CQUFQLENBQTJCLHFCQUEzQjtBQUFuQyxLQUZPLEVBR1A7QUFBRUgsTUFBQUEsS0FBSyxFQUFFLEtBQVQ7QUFBZ0JELE1BQUFBLElBQUksRUFBRSxFQUF0QjtBQUEwQkUsTUFBQUEsS0FBSyxFQUFFQyxNQUFNLENBQUNDLG1CQUFQLENBQTJCLG9CQUEzQjtBQUFqQyxLQUhPLEVBSVA7QUFBRUgsTUFBQUEsS0FBSyxFQUFFLFNBQVQ7QUFBb0JELE1BQUFBLElBQUksRUFBRSxFQUExQjtBQUE4QkUsTUFBQUEsS0FBSyxFQUFFQyxNQUFNLENBQUNDLG1CQUFQLENBQTJCLHFCQUEzQjtBQUFyQyxLQUpPLENBQVg7QUFPQUMsSUFBQUEsQ0FBQyxDQUFDQyxJQUFGLENBQU9ELENBQUMsQ0FBQyxtQkFBRCxDQUFSLEVBQStCTCxJQUEvQixFQUFxQztBQUNqQ08sTUFBQUEsTUFBTSxFQUFFO0FBQ0pDLFFBQUFBLEdBQUcsRUFBRTtBQUNEQyxVQUFBQSxJQUFJLEVBQUU7QUFETDtBQUREO0FBRHlCLEtBQXJDO0FBT0gsR0FmRDs7QUFpQkEsU0FBTztBQUNIO0FBQ0FDLElBQUFBLElBQUksRUFBRSxnQkFBWTtBQUNkWCxNQUFBQSxVQUFVO0FBQ2I7QUFKRSxHQUFQO0FBTUgsQ0F6Qm1CLEVBQXBCLEMsQ0EyQkE7OztBQUNBSSxNQUFNLENBQUNRLGtCQUFQLENBQTBCLFlBQVk7QUFDbENiLEVBQUFBLGFBQWEsQ0FBQ1ksSUFBZDtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2NoYXJ0cy9mbG90Y2hhcnRzL3BpZS5qcz84NjBmIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGbG90RGVtb1BpZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZVBpZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICB2YXIgZGF0YSA9IFtcclxuICAgICAgICAgICAgeyBsYWJlbDogXCJDU1NcIiwgZGF0YTogMTAsIGNvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtcHJpbWFyeScpIH0sXHJcbiAgICAgICAgICAgIHsgbGFiZWw6IFwiSFRNTDVcIiwgZGF0YTogNDAsIGNvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtc3VjY2VzcycpIH0sXHJcbiAgICAgICAgICAgIHsgbGFiZWw6IFwiUEhQXCIsIGRhdGE6IDMwLCBjb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtYWN0aXZlLWRhbmdlcicpIH0sXHJcbiAgICAgICAgICAgIHsgbGFiZWw6IFwiQW5ndWxhclwiLCBkYXRhOiAyMCwgY29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWFjdGl2ZS13YXJuaW5nJykgfVxyXG4gICAgICAgIF07XHJcblxyXG4gICAgICAgICQucGxvdCgkKFwiI2t0X2RvY3NfZmxvdF9waWVcIiksIGRhdGEsIHtcclxuICAgICAgICAgICAgc2VyaWVzOiB7XHJcbiAgICAgICAgICAgICAgICBwaWU6IHtcclxuICAgICAgICAgICAgICAgICAgICBzaG93OiB0cnVlXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVQaWUoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcclxuICAgIEtURmxvdERlbW9QaWUuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURmxvdERlbW9QaWUiLCJleGFtcGxlUGllIiwiZGF0YSIsImxhYmVsIiwiY29sb3IiLCJLVFV0aWwiLCJnZXRDc3NWYXJpYWJsZVZhbHVlIiwiJCIsInBsb3QiLCJzZXJpZXMiLCJwaWUiLCJzaG93IiwiaW5pdCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/charts/flotcharts/pie.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/charts/flotcharts/pie.js"]();
/******/ 	
/******/ })()
;