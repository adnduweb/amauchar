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

/***/ "./resources/backend/core/js/custom/documentation/charts/flotcharts/dynamic.js":
/*!*************************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/charts/flotcharts/dynamic.js ***!
  \*************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nfunction _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }\n\nvar KTFlotDemoDynamic = function () {\n  // Private functions\n  var exampleDynamic = function exampleDynamic() {\n    var _options;\n\n    var data = [];\n    var totalPoints = 250; // random data generator for plot charts\n\n    function getRandomData() {\n      if (data.length > 0) data = data.slice(1); // do a random walk\n\n      while (data.length < totalPoints) {\n        var prev = data.length > 0 ? data[data.length - 1] : 50;\n        var y = prev + Math.random() * 10 - 5;\n        if (y < 0) y = 0;\n        if (y > 100) y = 100;\n        data.push(y);\n      } // zip the generated y values with the x values\n\n\n      var res = [];\n\n      for (var i = 0; i < data.length; ++i) {\n        res.push([i, data[i]]);\n      }\n\n      return res;\n    } //server load\n\n\n    var options = (_options = {\n      colors: [KTUtil.getCssVariableValue('--bs-active-danger'), KTUtil.getCssVariableValue('--bs-active-primary')],\n      series: {\n        shadowSize: 1\n      },\n      lines: {\n        show: true,\n        lineWidth: 0.5,\n        fill: true,\n        fillColor: {\n          colors: [{\n            opacity: 0.1\n          }, {\n            opacity: 1\n          }]\n        }\n      },\n      yaxis: {\n        min: 0,\n        max: 100,\n        tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n        tickFormatter: function tickFormatter(v) {\n          return v + \"%\";\n        }\n      },\n      xaxis: {\n        show: false\n      }\n    }, _defineProperty(_options, \"colors\", [KTUtil.getCssVariableValue('--bs-active-primary')]), _defineProperty(_options, \"grid\", {\n      tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n      borderWidth: 0\n    }), _options);\n    var updateInterval = 30;\n    var plot = $.plot($(\"#kt_docs_flot_dynamic\"), [getRandomData()], options);\n\n    function update() {\n      plot.setData([getRandomData()]);\n      plot.draw();\n      setTimeout(update, updateInterval);\n    }\n\n    update();\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleDynamic();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoDynamic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2NoYXJ0cy9mbG90Y2hhcnRzL2R5bmFtaWMuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7Ozs7QUFDQSxJQUFJQSxpQkFBaUIsR0FBRyxZQUFZO0FBQ2hDO0FBQ0EsTUFBSUMsY0FBYyxHQUFHLFNBQWpCQSxjQUFpQixHQUFZO0FBQUE7O0FBQzdCLFFBQUlDLElBQUksR0FBRyxFQUFYO0FBQ04sUUFBSUMsV0FBVyxHQUFHLEdBQWxCLENBRm1DLENBSW5DOztBQUVBLGFBQVNDLGFBQVQsR0FBeUI7QUFDeEIsVUFBSUYsSUFBSSxDQUFDRyxNQUFMLEdBQWMsQ0FBbEIsRUFBcUJILElBQUksR0FBR0EsSUFBSSxDQUFDSSxLQUFMLENBQVcsQ0FBWCxDQUFQLENBREcsQ0FFeEI7O0FBQ0EsYUFBT0osSUFBSSxDQUFDRyxNQUFMLEdBQWNGLFdBQXJCLEVBQWtDO0FBQ2pDLFlBQUlJLElBQUksR0FBR0wsSUFBSSxDQUFDRyxNQUFMLEdBQWMsQ0FBZCxHQUFrQkgsSUFBSSxDQUFDQSxJQUFJLENBQUNHLE1BQUwsR0FBYyxDQUFmLENBQXRCLEdBQTBDLEVBQXJEO0FBQ0EsWUFBSUcsQ0FBQyxHQUFHRCxJQUFJLEdBQUdFLElBQUksQ0FBQ0MsTUFBTCxLQUFnQixFQUF2QixHQUE0QixDQUFwQztBQUNBLFlBQUlGLENBQUMsR0FBRyxDQUFSLEVBQVdBLENBQUMsR0FBRyxDQUFKO0FBQ1gsWUFBSUEsQ0FBQyxHQUFHLEdBQVIsRUFBYUEsQ0FBQyxHQUFHLEdBQUo7QUFDYk4sUUFBQUEsSUFBSSxDQUFDUyxJQUFMLENBQVVILENBQVY7QUFDQSxPQVR1QixDQVV4Qjs7O0FBQ0EsVUFBSUksR0FBRyxHQUFHLEVBQVY7O0FBQ0EsV0FBSyxJQUFJQyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHWCxJQUFJLENBQUNHLE1BQXpCLEVBQWlDLEVBQUVRLENBQW5DLEVBQXNDO0FBQ3JDRCxRQUFBQSxHQUFHLENBQUNELElBQUosQ0FBUyxDQUFDRSxDQUFELEVBQUlYLElBQUksQ0FBQ1csQ0FBRCxDQUFSLENBQVQ7QUFDQTs7QUFFRCxhQUFPRCxHQUFQO0FBQ0EsS0F2QmtDLENBeUJuQzs7O0FBQ0EsUUFBSUUsT0FBTztBQUNWQyxNQUFBQSxNQUFNLEVBQUUsQ0FBQ0MsTUFBTSxDQUFDQyxtQkFBUCxDQUEyQixvQkFBM0IsQ0FBRCxFQUFtREQsTUFBTSxDQUFDQyxtQkFBUCxDQUEyQixxQkFBM0IsQ0FBbkQsQ0FERTtBQUVWQyxNQUFBQSxNQUFNLEVBQUU7QUFDUEMsUUFBQUEsVUFBVSxFQUFFO0FBREwsT0FGRTtBQUtWQyxNQUFBQSxLQUFLLEVBQUU7QUFDTkMsUUFBQUEsSUFBSSxFQUFFLElBREE7QUFFTkMsUUFBQUEsU0FBUyxFQUFFLEdBRkw7QUFHTkMsUUFBQUEsSUFBSSxFQUFFLElBSEE7QUFJTkMsUUFBQUEsU0FBUyxFQUFFO0FBQ1ZULFVBQUFBLE1BQU0sRUFBRSxDQUFDO0FBQ1JVLFlBQUFBLE9BQU8sRUFBRTtBQURELFdBQUQsRUFFTDtBQUNGQSxZQUFBQSxPQUFPLEVBQUU7QUFEUCxXQUZLO0FBREU7QUFKTCxPQUxHO0FBaUJWQyxNQUFBQSxLQUFLLEVBQUU7QUFDTkMsUUFBQUEsR0FBRyxFQUFFLENBREM7QUFFTkMsUUFBQUEsR0FBRyxFQUFFLEdBRkM7QUFHTkMsUUFBQUEsU0FBUyxFQUFFYixNQUFNLENBQUNDLG1CQUFQLENBQTJCLGlCQUEzQixDQUhMO0FBSU5hLFFBQUFBLGFBQWEsRUFBRSx1QkFBU0MsQ0FBVCxFQUFZO0FBQzFCLGlCQUFPQSxDQUFDLEdBQUcsR0FBWDtBQUNBO0FBTkssT0FqQkc7QUF5QlZDLE1BQUFBLEtBQUssRUFBRTtBQUNOWCxRQUFBQSxJQUFJLEVBQUU7QUFEQTtBQXpCRywyQ0E0QkYsQ0FBQ0wsTUFBTSxDQUFDQyxtQkFBUCxDQUEyQixxQkFBM0IsQ0FBRCxDQTVCRSxxQ0E2Qko7QUFDTFksTUFBQUEsU0FBUyxFQUFFYixNQUFNLENBQUNDLG1CQUFQLENBQTJCLGlCQUEzQixDQUROO0FBRUxnQixNQUFBQSxXQUFXLEVBQUU7QUFGUixLQTdCSSxZQUFYO0FBbUNBLFFBQUlDLGNBQWMsR0FBRyxFQUFyQjtBQUNBLFFBQUlDLElBQUksR0FBR0MsQ0FBQyxDQUFDRCxJQUFGLENBQU9DLENBQUMsQ0FBQyx1QkFBRCxDQUFSLEVBQW1DLENBQUNoQyxhQUFhLEVBQWQsQ0FBbkMsRUFBc0RVLE9BQXRELENBQVg7O0FBRUEsYUFBU3VCLE1BQVQsR0FBa0I7QUFDakJGLE1BQUFBLElBQUksQ0FBQ0csT0FBTCxDQUFhLENBQUNsQyxhQUFhLEVBQWQsQ0FBYjtBQUNBK0IsTUFBQUEsSUFBSSxDQUFDSSxJQUFMO0FBQ0FDLE1BQUFBLFVBQVUsQ0FBQ0gsTUFBRCxFQUFTSCxjQUFULENBQVY7QUFDQTs7QUFFREcsSUFBQUEsTUFBTTtBQUNILEdBdkVEOztBQXlFQSxTQUFPO0FBQ0g7QUFDQUksSUFBQUEsSUFBSSxFQUFFLGdCQUFZO0FBQ2R4QyxNQUFBQSxjQUFjO0FBQ2pCO0FBSkUsR0FBUDtBQU1ILENBakZ1QixFQUF4QixDLENBbUZBOzs7QUFDQWUsTUFBTSxDQUFDMEIsa0JBQVAsQ0FBMEIsWUFBWTtBQUNsQzFDLEVBQUFBLGlCQUFpQixDQUFDeUMsSUFBbEI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9jaGFydHMvZmxvdGNoYXJ0cy9keW5hbWljLmpzPzlkNWYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZsb3REZW1vRHluYW1pYyA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZUR5bmFtaWMgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIGRhdGEgPSBbXTtcclxuXHRcdHZhciB0b3RhbFBvaW50cyA9IDI1MDtcclxuXHJcblx0XHQvLyByYW5kb20gZGF0YSBnZW5lcmF0b3IgZm9yIHBsb3QgY2hhcnRzXHJcblxyXG5cdFx0ZnVuY3Rpb24gZ2V0UmFuZG9tRGF0YSgpIHtcclxuXHRcdFx0aWYgKGRhdGEubGVuZ3RoID4gMCkgZGF0YSA9IGRhdGEuc2xpY2UoMSk7XHJcblx0XHRcdC8vIGRvIGEgcmFuZG9tIHdhbGtcclxuXHRcdFx0d2hpbGUgKGRhdGEubGVuZ3RoIDwgdG90YWxQb2ludHMpIHtcclxuXHRcdFx0XHR2YXIgcHJldiA9IGRhdGEubGVuZ3RoID4gMCA/IGRhdGFbZGF0YS5sZW5ndGggLSAxXSA6IDUwO1xyXG5cdFx0XHRcdHZhciB5ID0gcHJldiArIE1hdGgucmFuZG9tKCkgKiAxMCAtIDU7XHJcblx0XHRcdFx0aWYgKHkgPCAwKSB5ID0gMDtcclxuXHRcdFx0XHRpZiAoeSA+IDEwMCkgeSA9IDEwMDtcclxuXHRcdFx0XHRkYXRhLnB1c2goeSk7XHJcblx0XHRcdH1cclxuXHRcdFx0Ly8gemlwIHRoZSBnZW5lcmF0ZWQgeSB2YWx1ZXMgd2l0aCB0aGUgeCB2YWx1ZXNcclxuXHRcdFx0dmFyIHJlcyA9IFtdO1xyXG5cdFx0XHRmb3IgKHZhciBpID0gMDsgaSA8IGRhdGEubGVuZ3RoOyArK2kpIHtcclxuXHRcdFx0XHRyZXMucHVzaChbaSwgZGF0YVtpXV0pO1xyXG5cdFx0XHR9XHJcblxyXG5cdFx0XHRyZXR1cm4gcmVzO1xyXG5cdFx0fVxyXG5cclxuXHRcdC8vc2VydmVyIGxvYWRcclxuXHRcdHZhciBvcHRpb25zID0ge1xyXG5cdFx0XHRjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtZGFuZ2VyJyksIEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWFjdGl2ZS1wcmltYXJ5JyldLFxyXG5cdFx0XHRzZXJpZXM6IHtcclxuXHRcdFx0XHRzaGFkb3dTaXplOiAxXHJcblx0XHRcdH0sXHJcblx0XHRcdGxpbmVzOiB7XHJcblx0XHRcdFx0c2hvdzogdHJ1ZSxcclxuXHRcdFx0XHRsaW5lV2lkdGg6IDAuNSxcclxuXHRcdFx0XHRmaWxsOiB0cnVlLFxyXG5cdFx0XHRcdGZpbGxDb2xvcjoge1xyXG5cdFx0XHRcdFx0Y29sb3JzOiBbe1xyXG5cdFx0XHRcdFx0XHRvcGFjaXR5OiAwLjFcclxuXHRcdFx0XHRcdH0sIHtcclxuXHRcdFx0XHRcdFx0b3BhY2l0eTogMVxyXG5cdFx0XHRcdFx0fV1cclxuXHRcdFx0XHR9XHJcblx0XHRcdH0sXHJcblx0XHRcdHlheGlzOiB7XHJcblx0XHRcdFx0bWluOiAwLFxyXG5cdFx0XHRcdG1heDogMTAwLFxyXG5cdFx0XHRcdHRpY2tDb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtbGlnaHQtZGFyaycpLFxyXG5cdFx0XHRcdHRpY2tGb3JtYXR0ZXI6IGZ1bmN0aW9uKHYpIHtcclxuXHRcdFx0XHRcdHJldHVybiB2ICsgXCIlXCI7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9LFxyXG5cdFx0XHR4YXhpczoge1xyXG5cdFx0XHRcdHNob3c6IGZhbHNlLFxyXG5cdFx0XHR9LFxyXG5cdFx0XHRjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtcHJpbWFyeScpXSxcclxuXHRcdFx0Z3JpZDoge1xyXG5cdFx0XHRcdHRpY2tDb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtbGlnaHQtZGFyaycpLFxyXG5cdFx0XHRcdGJvcmRlcldpZHRoOiAwLFxyXG5cdFx0XHR9XHJcblx0XHR9O1xyXG5cclxuXHRcdHZhciB1cGRhdGVJbnRlcnZhbCA9IDMwO1xyXG5cdFx0dmFyIHBsb3QgPSAkLnBsb3QoJChcIiNrdF9kb2NzX2Zsb3RfZHluYW1pY1wiKSwgW2dldFJhbmRvbURhdGEoKV0sIG9wdGlvbnMpO1xyXG5cclxuXHRcdGZ1bmN0aW9uIHVwZGF0ZSgpIHtcclxuXHRcdFx0cGxvdC5zZXREYXRhKFtnZXRSYW5kb21EYXRhKCldKTtcclxuXHRcdFx0cGxvdC5kcmF3KCk7XHJcblx0XHRcdHNldFRpbWVvdXQodXBkYXRlLCB1cGRhdGVJbnRlcnZhbCk7XHJcblx0XHR9XHJcblxyXG5cdFx0dXBkYXRlKCk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlRHluYW1pYygpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RGbG90RGVtb0R5bmFtaWMuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURmxvdERlbW9EeW5hbWljIiwiZXhhbXBsZUR5bmFtaWMiLCJkYXRhIiwidG90YWxQb2ludHMiLCJnZXRSYW5kb21EYXRhIiwibGVuZ3RoIiwic2xpY2UiLCJwcmV2IiwieSIsIk1hdGgiLCJyYW5kb20iLCJwdXNoIiwicmVzIiwiaSIsIm9wdGlvbnMiLCJjb2xvcnMiLCJLVFV0aWwiLCJnZXRDc3NWYXJpYWJsZVZhbHVlIiwic2VyaWVzIiwic2hhZG93U2l6ZSIsImxpbmVzIiwic2hvdyIsImxpbmVXaWR0aCIsImZpbGwiLCJmaWxsQ29sb3IiLCJvcGFjaXR5IiwieWF4aXMiLCJtaW4iLCJtYXgiLCJ0aWNrQ29sb3IiLCJ0aWNrRm9ybWF0dGVyIiwidiIsInhheGlzIiwiYm9yZGVyV2lkdGgiLCJ1cGRhdGVJbnRlcnZhbCIsInBsb3QiLCIkIiwidXBkYXRlIiwic2V0RGF0YSIsImRyYXciLCJzZXRUaW1lb3V0IiwiaW5pdCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/charts/flotcharts/dynamic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/charts/flotcharts/dynamic.js"]();
/******/ 	
/******/ })()
;