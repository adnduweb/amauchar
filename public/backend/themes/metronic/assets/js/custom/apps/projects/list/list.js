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

/***/ "./resources/backend/core/js/custom/apps/projects/list/list.js":
/*!*********************************************************************!*\
  !*** ./resources/backend/core/js/custom/apps/projects/list/list.js ***!
  \*********************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTProjectList = function () {\n  var initChart = function initChart() {\n    // init chart\n    var element = document.getElementById(\"kt_project_list_chart\");\n\n    if (!element) {\n      return;\n    }\n\n    var config = {\n      type: 'doughnut',\n      data: {\n        datasets: [{\n          data: [30, 45, 25],\n          backgroundColor: ['#00A3FF', '#50CD89', '#E4E6EF']\n        }],\n        labels: ['Active', 'Completed', 'Yet to start']\n      },\n      options: {\n        chart: {\n          fontFamily: 'inherit'\n        },\n        cutout: '75%',\n        cutoutPercentage: 65,\n        responsive: true,\n        maintainAspectRatio: false,\n        title: {\n          display: false\n        },\n        animation: {\n          animateScale: true,\n          animateRotate: true\n        },\n        tooltips: {\n          enabled: true,\n          intersect: false,\n          mode: 'nearest',\n          bodySpacing: 5,\n          yPadding: 10,\n          xPadding: 10,\n          caretPadding: 0,\n          displayColors: false,\n          backgroundColor: '#20D489',\n          titleFontColor: '#ffffff',\n          cornerRadius: 4,\n          footerSpacing: 0,\n          titleSpacing: 0\n        },\n        plugins: {\n          legend: {\n            display: false\n          }\n        }\n      }\n    };\n    var ctx = element.getContext('2d');\n    var myDoughnut = new Chart(ctx, config);\n  }; // Public methods\n\n\n  return {\n    init: function init() {\n      initChart();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTProjectList.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9hcHBzL3Byb2plY3RzL2xpc3QvbGlzdC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxhQUFhLEdBQUcsWUFBWTtBQUM1QixNQUFJQyxTQUFTLEdBQUcsU0FBWkEsU0FBWSxHQUFZO0FBQ3hCO0FBQ0EsUUFBSUMsT0FBTyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsdUJBQXhCLENBQWQ7O0FBRUEsUUFBSSxDQUFDRixPQUFMLEVBQWM7QUFDVjtBQUNIOztBQUVELFFBQUlHLE1BQU0sR0FBRztBQUNUQyxNQUFBQSxJQUFJLEVBQUUsVUFERztBQUVUQyxNQUFBQSxJQUFJLEVBQUU7QUFDRkMsUUFBQUEsUUFBUSxFQUFFLENBQUM7QUFDUEQsVUFBQUEsSUFBSSxFQUFFLENBQUMsRUFBRCxFQUFLLEVBQUwsRUFBUyxFQUFULENBREM7QUFFUEUsVUFBQUEsZUFBZSxFQUFFLENBQUMsU0FBRCxFQUFZLFNBQVosRUFBdUIsU0FBdkI7QUFGVixTQUFELENBRFI7QUFLRkMsUUFBQUEsTUFBTSxFQUFFLENBQUMsUUFBRCxFQUFXLFdBQVgsRUFBd0IsY0FBeEI7QUFMTixPQUZHO0FBU1RDLE1BQUFBLE9BQU8sRUFBRTtBQUNMQyxRQUFBQSxLQUFLLEVBQUU7QUFDSEMsVUFBQUEsVUFBVSxFQUFFO0FBRFQsU0FERjtBQUlMQyxRQUFBQSxNQUFNLEVBQUUsS0FKSDtBQUtMQyxRQUFBQSxnQkFBZ0IsRUFBRSxFQUxiO0FBTUxDLFFBQUFBLFVBQVUsRUFBRSxJQU5QO0FBT0xDLFFBQUFBLG1CQUFtQixFQUFFLEtBUGhCO0FBUUxDLFFBQUFBLEtBQUssRUFBRTtBQUNIQyxVQUFBQSxPQUFPLEVBQUU7QUFETixTQVJGO0FBV0xDLFFBQUFBLFNBQVMsRUFBRTtBQUNQQyxVQUFBQSxZQUFZLEVBQUUsSUFEUDtBQUVQQyxVQUFBQSxhQUFhLEVBQUU7QUFGUixTQVhOO0FBZUxDLFFBQUFBLFFBQVEsRUFBRTtBQUNOQyxVQUFBQSxPQUFPLEVBQUUsSUFESDtBQUVOQyxVQUFBQSxTQUFTLEVBQUUsS0FGTDtBQUdOQyxVQUFBQSxJQUFJLEVBQUUsU0FIQTtBQUlOQyxVQUFBQSxXQUFXLEVBQUUsQ0FKUDtBQUtOQyxVQUFBQSxRQUFRLEVBQUUsRUFMSjtBQU1OQyxVQUFBQSxRQUFRLEVBQUUsRUFOSjtBQU9OQyxVQUFBQSxZQUFZLEVBQUUsQ0FQUjtBQVFOQyxVQUFBQSxhQUFhLEVBQUUsS0FSVDtBQVNOdEIsVUFBQUEsZUFBZSxFQUFFLFNBVFg7QUFVTnVCLFVBQUFBLGNBQWMsRUFBRSxTQVZWO0FBV05DLFVBQUFBLFlBQVksRUFBRSxDQVhSO0FBWU5DLFVBQUFBLGFBQWEsRUFBRSxDQVpUO0FBYU5DLFVBQUFBLFlBQVksRUFBRTtBQWJSLFNBZkw7QUE4QkxDLFFBQUFBLE9BQU8sRUFBRTtBQUNMQyxVQUFBQSxNQUFNLEVBQUU7QUFDSmxCLFlBQUFBLE9BQU8sRUFBRTtBQURMO0FBREg7QUE5Qko7QUFUQSxLQUFiO0FBK0NBLFFBQUltQixHQUFHLEdBQUdwQyxPQUFPLENBQUNxQyxVQUFSLENBQW1CLElBQW5CLENBQVY7QUFDQSxRQUFJQyxVQUFVLEdBQUcsSUFBSUMsS0FBSixDQUFVSCxHQUFWLEVBQWVqQyxNQUFmLENBQWpCO0FBQ0gsR0F6REQsQ0FENEIsQ0E0RDVCOzs7QUFDQSxTQUFPO0FBQ0hxQyxJQUFBQSxJQUFJLEVBQUUsZ0JBQVk7QUFDZHpDLE1BQUFBLFNBQVM7QUFDWjtBQUhFLEdBQVA7QUFLSCxDQWxFbUIsRUFBcEIsQyxDQW9FQTs7O0FBQ0EwQyxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVc7QUFDakM1QyxFQUFBQSxhQUFhLENBQUMwQyxJQUFkO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL2FwcHMvcHJvamVjdHMvbGlzdC9saXN0LmpzPzQ2YWIiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVFByb2plY3RMaXN0ID0gZnVuY3Rpb24gKCkgeyAgICBcclxuICAgIHZhciBpbml0Q2hhcnQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gaW5pdCBjaGFydFxyXG4gICAgICAgIHZhciBlbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJrdF9wcm9qZWN0X2xpc3RfY2hhcnRcIik7XHJcblxyXG4gICAgICAgIGlmICghZWxlbWVudCkge1xyXG4gICAgICAgICAgICByZXR1cm47XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICB2YXIgY29uZmlnID0ge1xyXG4gICAgICAgICAgICB0eXBlOiAnZG91Z2hudXQnLFxyXG4gICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICBkYXRhc2V0czogW3tcclxuICAgICAgICAgICAgICAgICAgICBkYXRhOiBbMzAsIDQ1LCAyNV0sXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiBbJyMwMEEzRkYnLCAnIzUwQ0Q4OScsICcjRTRFNkVGJ11cclxuICAgICAgICAgICAgICAgIH1dLFxyXG4gICAgICAgICAgICAgICAgbGFiZWxzOiBbJ0FjdGl2ZScsICdDb21wbGV0ZWQnLCAnWWV0IHRvIHN0YXJ0J11cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgb3B0aW9uczoge1xyXG4gICAgICAgICAgICAgICAgY2hhcnQ6IHtcclxuICAgICAgICAgICAgICAgICAgICBmb250RmFtaWx5OiAnaW5oZXJpdCdcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBjdXRvdXQ6ICc3NSUnLFxyXG4gICAgICAgICAgICAgICAgY3V0b3V0UGVyY2VudGFnZTogNjUsXHJcbiAgICAgICAgICAgICAgICByZXNwb25zaXZlOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgbWFpbnRhaW5Bc3BlY3RSYXRpbzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICB0aXRsZToge1xyXG4gICAgICAgICAgICAgICAgICAgIGRpc3BsYXk6IGZhbHNlXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgYW5pbWF0aW9uOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgYW5pbWF0ZVNjYWxlOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIGFuaW1hdGVSb3RhdGU6IHRydWVcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB0b29sdGlwczoge1xyXG4gICAgICAgICAgICAgICAgICAgIGVuYWJsZWQ6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgaW50ZXJzZWN0OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICBtb2RlOiAnbmVhcmVzdCcsXHJcbiAgICAgICAgICAgICAgICAgICAgYm9keVNwYWNpbmc6IDUsXHJcbiAgICAgICAgICAgICAgICAgICAgeVBhZGRpbmc6IDEwLFxyXG4gICAgICAgICAgICAgICAgICAgIHhQYWRkaW5nOiAxMCxcclxuICAgICAgICAgICAgICAgICAgICBjYXJldFBhZGRpbmc6IDAsXHJcbiAgICAgICAgICAgICAgICAgICAgZGlzcGxheUNvbG9yczogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiAnIzIwRDQ4OScsXHJcbiAgICAgICAgICAgICAgICAgICAgdGl0bGVGb250Q29sb3I6ICcjZmZmZmZmJyxcclxuICAgICAgICAgICAgICAgICAgICBjb3JuZXJSYWRpdXM6IDQsXHJcbiAgICAgICAgICAgICAgICAgICAgZm9vdGVyU3BhY2luZzogMCxcclxuICAgICAgICAgICAgICAgICAgICB0aXRsZVNwYWNpbmc6IDBcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBwbHVnaW5zOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGVnZW5kOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRpc3BsYXk6IGZhbHNlXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIHZhciBjdHggPSBlbGVtZW50LmdldENvbnRleHQoJzJkJyk7XHJcbiAgICAgICAgdmFyIG15RG91Z2hudXQgPSBuZXcgQ2hhcnQoY3R4LCBjb25maWcpO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBtZXRob2RzXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaW5pdENoYXJ0KCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RQcm9qZWN0TGlzdC5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RQcm9qZWN0TGlzdCIsImluaXRDaGFydCIsImVsZW1lbnQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiY29uZmlnIiwidHlwZSIsImRhdGEiLCJkYXRhc2V0cyIsImJhY2tncm91bmRDb2xvciIsImxhYmVscyIsIm9wdGlvbnMiLCJjaGFydCIsImZvbnRGYW1pbHkiLCJjdXRvdXQiLCJjdXRvdXRQZXJjZW50YWdlIiwicmVzcG9uc2l2ZSIsIm1haW50YWluQXNwZWN0UmF0aW8iLCJ0aXRsZSIsImRpc3BsYXkiLCJhbmltYXRpb24iLCJhbmltYXRlU2NhbGUiLCJhbmltYXRlUm90YXRlIiwidG9vbHRpcHMiLCJlbmFibGVkIiwiaW50ZXJzZWN0IiwibW9kZSIsImJvZHlTcGFjaW5nIiwieVBhZGRpbmciLCJ4UGFkZGluZyIsImNhcmV0UGFkZGluZyIsImRpc3BsYXlDb2xvcnMiLCJ0aXRsZUZvbnRDb2xvciIsImNvcm5lclJhZGl1cyIsImZvb3RlclNwYWNpbmciLCJ0aXRsZVNwYWNpbmciLCJwbHVnaW5zIiwibGVnZW5kIiwiY3R4IiwiZ2V0Q29udGV4dCIsIm15RG91Z2hudXQiLCJDaGFydCIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/apps/projects/list/list.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/apps/projects/list/list.js"]();
/******/ 	
/******/ })()
;