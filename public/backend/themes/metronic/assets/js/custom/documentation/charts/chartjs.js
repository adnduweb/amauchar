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

/***/ "./resources/backend/core/js/custom/documentation/charts/chartjs.js":
/*!**************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/charts/chartjs.js ***!
  \**************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTGeneralChartJS = function () {\n  // Randomizer function\n  function getRandom() {\n    var min = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;\n    var max = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 100;\n    return Math.floor(Math.random() * (max - min) + min);\n  }\n\n  function generateRandomData() {\n    var min = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;\n    var max = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 100;\n    var count = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 10;\n    var arr = [];\n\n    for (var i = 0; i < count; i++) {\n      arr.push(getRandom(min, max));\n    }\n\n    return arr;\n  } // Private functions\n\n\n  var example1 = function example1() {\n    // Define chart element\n    var ctx = document.getElementById('kt_chartjs_1'); // Define colors\n\n    var primaryColor = KTUtil.getCssVariableValue('--bs-primary');\n    var dangerColor = KTUtil.getCssVariableValue('--bs-danger');\n    var successColor = KTUtil.getCssVariableValue('--bs-success'); // Define fonts\n\n    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif'); // Chart labels\n\n    var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; // Chart data\n\n    var data = {\n      labels: labels,\n      datasets: [{\n        label: 'Dataset 1',\n        data: generateRandomData(1, 100, 12),\n        backgroundColor: primaryColor,\n        stack: 'Stack 0'\n      }, {\n        label: 'Dataset 2',\n        data: generateRandomData(1, 100, 12),\n        backgroundColor: dangerColor,\n        stack: 'Stack 1'\n      }, {\n        label: 'Dataset 3',\n        data: generateRandomData(1, 100, 12),\n        backgroundColor: successColor,\n        stack: 'Stack 2'\n      }]\n    }; // Chart config\n\n    var config = {\n      type: 'bar',\n      data: data,\n      options: {\n        plugins: {\n          title: {\n            display: false\n          }\n        },\n        responsive: true,\n        interaction: {\n          intersect: false\n        },\n        scales: {\n          x: {\n            stacked: true\n          },\n          y: {\n            stacked: true\n          }\n        }\n      }\n    }; // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/\n\n    var myChart = new Chart(ctx, config);\n  };\n\n  var example2 = function example2() {\n    // Define chart element\n    var ctx = document.getElementById('kt_chartjs_2'); // Define colors\n\n    var primaryColor = KTUtil.getCssVariableValue('--bs-primary');\n    var dangerColor = KTUtil.getCssVariableValue('--bs-danger');\n    var successColor = KTUtil.getCssVariableValue('--bs-success'); // Define fonts\n\n    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif'); // Chart labels\n\n    var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July']; // Chart data\n\n    var data = {\n      labels: labels,\n      datasets: [{\n        label: 'Dataset 1',\n        data: generateRandomData(1, 50, 7),\n        borderColor: primaryColor,\n        backgroundColor: 'transparent'\n      }, {\n        label: 'Dataset 2',\n        data: generateRandomData(1, 50, 7),\n        borderColor: dangerColor,\n        backgroundColor: 'transparent'\n      }]\n    }; // Chart config\n\n    var config = {\n      type: 'line',\n      data: data,\n      options: {\n        plugins: {\n          title: {\n            display: false\n          }\n        },\n        responsive: true\n      }\n    }; // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/\n\n    var myChart = new Chart(ctx, config);\n  };\n\n  var example3 = function example3() {\n    // Define chart element\n    var ctx = document.getElementById('kt_chartjs_3'); // Define colors\n\n    var primaryColor = KTUtil.getCssVariableValue('--bs-primary');\n    var dangerColor = KTUtil.getCssVariableValue('--bs-danger');\n    var successColor = KTUtil.getCssVariableValue('--bs-success');\n    var warningColor = KTUtil.getCssVariableValue('--bs-warning');\n    var infoColor = KTUtil.getCssVariableValue('--bs-info'); // Chart labels\n\n    var labels = ['January', 'February', 'March', 'April', 'May']; // Chart data\n\n    var data = {\n      labels: labels,\n      datasets: [{\n        label: 'Dataset 1',\n        data: generateRandomData(1, 100, 5),\n        backgroundColor: [primaryColor, dangerColor, successColor, warningColor, infoColor]\n      }]\n    }; // Chart config\n\n    var config = {\n      type: 'pie',\n      data: data,\n      options: {\n        plugins: {\n          title: {\n            display: false\n          }\n        },\n        responsive: true\n      }\n    }; // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/\n\n    var myChart = new Chart(ctx, config);\n  };\n\n  var example4 = function example4() {\n    // Define chart element\n    var ctx = document.getElementById('kt_chartjs_4'); // Define colors\n\n    var primaryColor = KTUtil.getCssVariableValue('--bs-primary');\n    var dangerColor = KTUtil.getCssVariableValue('--bs-danger');\n    var dangerLightColor = KTUtil.getCssVariableValue('--bs-light-danger'); // Define fonts\n\n    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif'); // Chart labels\n\n    var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; // Chart data\n\n    var data = {\n      labels: labels,\n      datasets: [{\n        label: 'Dataset 1',\n        data: generateRandomData(50, 100, 12),\n        borderColor: primaryColor,\n        backgroundColor: 'transparent',\n        stack: 'combined'\n      }, {\n        label: 'Dataset 2',\n        data: generateRandomData(1, 60, 12),\n        backgroundColor: dangerColor,\n        borderColor: dangerColor,\n        stack: 'combined',\n        type: 'bar'\n      }]\n    }; // Chart config\n\n    var config = {\n      type: 'line',\n      data: data,\n      options: {\n        plugins: {\n          title: {\n            display: false\n          }\n        },\n        responsive: true,\n        interaction: {\n          intersect: false\n        },\n        scales: {\n          y: {\n            stacked: true\n          }\n        }\n      },\n      defaults: {\n        font: {\n          family: 'inherit'\n        }\n      }\n    }; // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/\n\n    var myChart = new Chart(ctx, config);\n  };\n\n  var example5 = function example5() {\n    // Define chart element\n    var ctx = document.getElementById('kt_chartjs_5'); // Define colors\n\n    var infoColor = KTUtil.getCssVariableValue('--bs-info');\n    var infoLightColor = KTUtil.getCssVariableValue('--bs-light-info');\n    var warningColor = KTUtil.getCssVariableValue('--bs-warning');\n    var warningLightColor = KTUtil.getCssVariableValue('--bs-light-warning');\n    var primaryColor = KTUtil.getCssVariableValue('--bs-primary');\n    var primaryLightColor = KTUtil.getCssVariableValue('--bs-light-primary'); // Define fonts\n\n    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif'); // Chart labels\n\n    var labels = ['January', 'February', 'March', 'April', 'May', 'June']; // Chart data\n\n    var data = {\n      labels: labels,\n      datasets: [{\n        label: 'Dataset 1',\n        data: generateRandomData(20, 80, 6),\n        borderColor: infoColor,\n        backgroundColor: infoLightColor\n      }, {\n        label: 'Dataset 2',\n        data: generateRandomData(10, 60, 6),\n        backgroundColor: warningLightColor,\n        borderColor: warningColor\n      }, {\n        label: 'Dataset 3',\n        data: generateRandomData(0, 80, 6),\n        backgroundColor: primaryLightColor,\n        borderColor: primaryColor\n      }]\n    }; // Chart config\n\n    var config = {\n      type: 'radar',\n      data: data,\n      options: {\n        plugins: {\n          title: {\n            display: false\n          }\n        },\n        responsive: true\n      }\n    }; // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/\n\n    var myChart = new Chart(ctx, config);\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      // Global font settings: https://www.chartjs.org/docs/latest/general/fonts.html\n      Chart.defaults.font.size = 13;\n      Chart.defaults.font.family = KTUtil.getCssVariableValue('--bs-font-sans-serif');\n      example1();\n      example2();\n      example3();\n      example4();\n      example5();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralChartJS.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2NoYXJ0cy9jaGFydGpzLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLGdCQUFnQixHQUFHLFlBQVk7QUFDL0I7QUFDQSxXQUFTQyxTQUFULEdBQXVDO0FBQUEsUUFBcEJDLEdBQW9CLHVFQUFkLENBQWM7QUFBQSxRQUFYQyxHQUFXLHVFQUFMLEdBQUs7QUFDbkMsV0FBT0MsSUFBSSxDQUFDQyxLQUFMLENBQVdELElBQUksQ0FBQ0UsTUFBTCxNQUFpQkgsR0FBRyxHQUFHRCxHQUF2QixJQUE4QkEsR0FBekMsQ0FBUDtBQUNIOztBQUVELFdBQVNLLGtCQUFULEdBQTREO0FBQUEsUUFBaENMLEdBQWdDLHVFQUExQixDQUEwQjtBQUFBLFFBQXZCQyxHQUF1Qix1RUFBakIsR0FBaUI7QUFBQSxRQUFaSyxLQUFZLHVFQUFKLEVBQUk7QUFDeEQsUUFBSUMsR0FBRyxHQUFHLEVBQVY7O0FBQ0EsU0FBSyxJQUFJQyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHRixLQUFwQixFQUEyQkUsQ0FBQyxFQUE1QixFQUFnQztBQUM1QkQsTUFBQUEsR0FBRyxDQUFDRSxJQUFKLENBQVNWLFNBQVMsQ0FBQ0MsR0FBRCxFQUFNQyxHQUFOLENBQWxCO0FBQ0g7O0FBQ0QsV0FBT00sR0FBUDtBQUNILEdBWjhCLENBYy9COzs7QUFDQSxNQUFJRyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxHQUFZO0FBQ3ZCO0FBQ0EsUUFBSUMsR0FBRyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsY0FBeEIsQ0FBVixDQUZ1QixDQUl2Qjs7QUFDQSxRQUFJQyxZQUFZLEdBQUdDLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIsY0FBM0IsQ0FBbkI7QUFDQSxRQUFJQyxXQUFXLEdBQUdGLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIsYUFBM0IsQ0FBbEI7QUFDQSxRQUFJRSxZQUFZLEdBQUdILE1BQU0s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QUNsQzNELEVBQUFBLGdCQUFnQixDQUFDeUQsSUFBakI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9jaGFydHMvY2hhcnRqcy5qcz8xYzk0Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RHZW5lcmFsQ2hhcnRKUyA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIFJhbmRvbWl6ZXIgZnVuY3Rpb25cclxuICAgIGZ1bmN0aW9uIGdldFJhbmRvbShtaW4gPSAxLCBtYXggPSAxMDApIHtcclxuICAgICAgICByZXR1cm4gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogKG1heCAtIG1pbikgKyBtaW4pO1xyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIGdlbmVyYXRlUmFuZG9tRGF0YShtaW4gPSAxLCBtYXggPSAxMDAsIGNvdW50ID0gMTApIHtcclxuICAgICAgICB2YXIgYXJyID0gW107XHJcbiAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBjb3VudDsgaSsrKSB7XHJcbiAgICAgICAgICAgIGFyci5wdXNoKGdldFJhbmRvbShtaW4sIG1heCkpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gYXJyO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZTEgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gRGVmaW5lIGNoYXJ0IGVsZW1lbnRcclxuICAgICAgICB2YXIgY3R4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X2NoYXJ0anNfMScpO1xyXG5cclxuICAgICAgICAvLyBEZWZpbmUgY29sb3JzXHJcbiAgICAgICAgdmFyIHByaW1hcnlDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLXByaW1hcnknKTtcclxuICAgICAgICB2YXIgZGFuZ2VyQ29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1kYW5nZXInKTtcclxuICAgICAgICB2YXIgc3VjY2Vzc0NvbG9yID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtc3VjY2VzcycpO1xyXG5cclxuICAgICAgICAvLyBEZWZpbmUgZm9udHNcclxuICAgICAgICB2YXIgZm9udEZhbWlseSA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWZvbnQtc2Fucy1zZXJpZicpO1xyXG5cclxuICAgICAgICAvLyBDaGFydCBsYWJlbHNcclxuICAgICAgICBjb25zdCBsYWJlbHMgPSBbJ0phbnVhcnknLCAnRmVicnVhcnknLCAnTWFyY2gnLCAnQXByaWwnLCAnTWF5JywgJ0p1bmUnLCAnSnVseScsICdBdWd1c3QnLCAnU2VwdGVtYmVyJywgJ09jdG9iZXInLCAnTm92ZW1iZXInLCAnRGVjZW1iZXInXTtcclxuXHJcbiAgICAgICAgLy8gQ2hhcnQgZGF0YVxyXG4gICAgICAgIGNvbnN0IGRhdGEgPSB7XHJcbiAgICAgICAgICAgIGxhYmVsczogbGFiZWxzLFxyXG4gICAgICAgICAgICBkYXRhc2V0czogW1xyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsOiAnRGF0YXNldCAxJyxcclxuICAgICAgICAgICAgICAgICAgICBkYXRhOiBnZW5lcmF0ZVJhbmRvbURhdGEoMSwgMTAwLCAxMiksXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiBwcmltYXJ5Q29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgc3RhY2s6ICdTdGFjayAwJyxcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDInLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgxLCAxMDAsIDEyKSxcclxuICAgICAgICAgICAgICAgICAgICBiYWNrZ3JvdW5kQ29sb3I6IGRhbmdlckNvbG9yLFxyXG4gICAgICAgICAgICAgICAgICAgIHN0YWNrOiAnU3RhY2sgMScsXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsOiAnRGF0YXNldCAzJyxcclxuICAgICAgICAgICAgICAgICAgICBkYXRhOiBnZW5lcmF0ZVJhbmRvbURhdGEoMSwgMTAwLCAxMiksXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiBzdWNjZXNzQ29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgc3RhY2s6ICdTdGFjayAyJyxcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICAvLyBDaGFydCBjb25maWdcclxuICAgICAgICBjb25zdCBjb25maWcgPSB7XHJcbiAgICAgICAgICAgIHR5cGU6ICdiYXInLFxyXG4gICAgICAgICAgICBkYXRhOiBkYXRhLFxyXG4gICAgICAgICAgICBvcHRpb25zOiB7XHJcbiAgICAgICAgICAgICAgICBwbHVnaW5zOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGl0bGU6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZGlzcGxheTogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIHJlc3BvbnNpdmU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBpbnRlcmFjdGlvbjoge1xyXG4gICAgICAgICAgICAgICAgICAgIGludGVyc2VjdDogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgc2NhbGVzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgeDoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzdGFja2VkOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgeToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzdGFja2VkOiB0cnVlXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgLy8gSW5pdCBDaGFydEpTIC0tIGZvciBtb3JlIGluZm8sIHBsZWFzZSB2aXNpdDogaHR0cHM6Ly93d3cuY2hhcnRqcy5vcmcvZG9jcy9sYXRlc3QvXHJcbiAgICAgICAgdmFyIG15Q2hhcnQgPSBuZXcgQ2hhcnQoY3R4LCBjb25maWcpO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlMiA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAvLyBEZWZpbmUgY2hhcnQgZWxlbWVudFxyXG4gICAgICAgIHZhciBjdHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3RfY2hhcnRqc18yJyk7XHJcblxyXG4gICAgICAgIC8vIERlZmluZSBjb2xvcnNcclxuICAgICAgICB2YXIgcHJpbWFyeUNvbG9yID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtcHJpbWFyeScpO1xyXG4gICAgICAgIHZhciBkYW5nZXJDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWRhbmdlcicpO1xyXG4gICAgICAgIHZhciBzdWNjZXNzQ29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1zdWNjZXNzJyk7XHJcblxyXG4gICAgICAgIC8vIERlZmluZSBmb250c1xyXG4gICAgICAgIHZhciBmb250RmFtaWx5ID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtZm9udC1zYW5zLXNlcmlmJyk7XHJcblxyXG4gICAgICAgIC8vIENoYXJ0IGxhYmVsc1xyXG4gICAgICAgIGNvbnN0IGxhYmVscyA9IFsnSmFudWFyeScsICdGZWJydWFyeScsICdNYXJjaCcsICdBcHJpbCcsICdNYXknLCAnSnVuZScsICdKdWx5J107XHJcblxyXG4gICAgICAgIC8vIENoYXJ0IGRhdGFcclxuICAgICAgICBjb25zdCBkYXRhID0ge1xyXG4gICAgICAgICAgICBsYWJlbHM6IGxhYmVscyxcclxuICAgICAgICAgICAgZGF0YXNldHM6IFtcclxuICAgICAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgICAgICBsYWJlbDogJ0RhdGFzZXQgMScsXHJcbiAgICAgICAgICAgICAgICAgICAgZGF0YTogZ2VuZXJhdGVSYW5kb21EYXRhKDEsIDUwLCA3KSxcclxuICAgICAgICAgICAgICAgICAgICBib3JkZXJDb2xvcjogcHJpbWFyeUNvbG9yLFxyXG4gICAgICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogJ3RyYW5zcGFyZW50J1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgICAgICBsYWJlbDogJ0RhdGFzZXQgMicsXHJcbiAgICAgICAgICAgICAgICAgICAgZGF0YTogZ2VuZXJhdGVSYW5kb21EYXRhKDEsIDUwLCA3KSxcclxuICAgICAgICAgICAgICAgICAgICBib3JkZXJDb2xvcjogZGFuZ2VyQ29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiAndHJhbnNwYXJlbnQnXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBdXHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgLy8gQ2hhcnQgY29uZmlnXHJcbiAgICAgICAgY29uc3QgY29uZmlnID0ge1xyXG4gICAgICAgICAgICB0eXBlOiAnbGluZScsXHJcbiAgICAgICAgICAgIGRhdGE6IGRhdGEsXHJcbiAgICAgICAgICAgIG9wdGlvbnM6IHtcclxuICAgICAgICAgICAgICAgIHBsdWdpbnM6IHtcclxuICAgICAgICAgICAgICAgICAgICB0aXRsZToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBkaXNwbGF5OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgcmVzcG9uc2l2ZTogdHJ1ZSxcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIC8vIEluaXQgQ2hhcnRKUyAtLSBmb3IgbW9yZSBpbmZvLCBwbGVhc2UgdmlzaXQ6IGh0dHBzOi8vd3d3LmNoYXJ0anMub3JnL2RvY3MvbGF0ZXN0L1xyXG4gICAgICAgIHZhciBteUNoYXJ0ID0gbmV3IENoYXJ0KGN0eCwgY29uZmlnKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTMgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gRGVmaW5lIGNoYXJ0IGVsZW1lbnRcclxuICAgICAgICB2YXIgY3R4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X2NoYXJ0anNfMycpO1xyXG5cclxuICAgICAgICAvLyBEZWZpbmUgY29sb3JzXHJcbiAgICAgICAgdmFyIHByaW1hcnlDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLXByaW1hcnknKTtcclxuICAgICAgICB2YXIgZGFuZ2VyQ29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1kYW5nZXInKTtcclxuICAgICAgICB2YXIgc3VjY2Vzc0NvbG9yID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtc3VjY2VzcycpO1xyXG4gICAgICAgIHZhciB3YXJuaW5nQ29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy13YXJuaW5nJyk7XHJcbiAgICAgICAgdmFyIGluZm9Db2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWluZm8nKTtcclxuXHJcbiAgICAgICAgLy8gQ2hhcnQgbGFiZWxzXHJcbiAgICAgICAgY29uc3QgbGFiZWxzID0gWydKYW51YXJ5JywgJ0ZlYnJ1YXJ5JywgJ01hcmNoJywgJ0FwcmlsJywgJ01heSddO1xyXG5cclxuICAgICAgICAvLyBDaGFydCBkYXRhXHJcbiAgICAgICAgY29uc3QgZGF0YSA9IHtcclxuICAgICAgICAgICAgbGFiZWxzOiBsYWJlbHMsXHJcbiAgICAgICAgICAgIGRhdGFzZXRzOiBbXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDEnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgxLCAxMDAsIDUpLFxyXG4gICAgICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogW3ByaW1hcnlDb2xvciwgZGFuZ2VyQ29sb3IsIHN1Y2Nlc3NDb2xvciwgd2FybmluZ0NvbG9yLCBpbmZvQ29sb3JdXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBdXHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgLy8gQ2hhcnQgY29uZmlnXHJcbiAgICAgICAgY29uc3QgY29uZmlnID0ge1xyXG4gICAgICAgICAgICB0eXBlOiAncGllJyxcclxuICAgICAgICAgICAgZGF0YTogZGF0YSxcclxuICAgICAgICAgICAgb3B0aW9uczoge1xyXG4gICAgICAgICAgICAgICAgcGx1Z2luczoge1xyXG4gICAgICAgICAgICAgICAgICAgIHRpdGxlOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRpc3BsYXk6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICByZXNwb25zaXZlOiB0cnVlLFxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgLy8gSW5pdCBDaGFydEpTIC0tIGZvciBtb3JlIGluZm8sIHBsZWFzZSB2aXNpdDogaHR0cHM6Ly93d3cuY2hhcnRqcy5vcmcvZG9jcy9sYXRlc3QvXHJcbiAgICAgICAgdmFyIG15Q2hhcnQgPSBuZXcgQ2hhcnQoY3R4LCBjb25maWcpO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlNCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAvLyBEZWZpbmUgY2hhcnQgZWxlbWVudFxyXG4gICAgICAgIHZhciBjdHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3RfY2hhcnRqc180Jyk7XHJcblxyXG4gICAgICAgIC8vIERlZmluZSBjb2xvcnNcclxuICAgICAgICB2YXIgcHJpbWFyeUNvbG9yID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtcHJpbWFyeScpO1xyXG4gICAgICAgIHZhciBkYW5nZXJDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWRhbmdlcicpO1xyXG4gICAgICAgIHZhciBkYW5nZXJMaWdodENvbG9yID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtbGlnaHQtZGFuZ2VyJyk7XHJcblxyXG4gICAgICAgIC8vIERlZmluZSBmb250c1xyXG4gICAgICAgIHZhciBmb250RmFtaWx5ID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtZm9udC1zYW5zLXNlcmlmJyk7XHJcblxyXG4gICAgICAgIC8vIENoYXJ0IGxhYmVsc1xyXG4gICAgICAgIGNvbnN0IGxhYmVscyA9IFsnSmFudWFyeScsICdGZWJydWFyeScsICdNYXJjaCcsICdBcHJpbCcsICdNYXknLCAnSnVuZScsICdKdWx5JywgJ0F1Z3VzdCcsICdTZXB0ZW1iZXInLCAnT2N0b2JlcicsICdOb3ZlbWJlcicsICdEZWNlbWJlciddO1xyXG5cclxuICAgICAgICAvLyBDaGFydCBkYXRhXHJcbiAgICAgICAgY29uc3QgZGF0YSA9IHtcclxuICAgICAgICAgICAgbGFiZWxzOiBsYWJlbHMsXHJcbiAgICAgICAgICAgIGRhdGFzZXRzOiBbXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDEnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSg1MCwgMTAwLCAxMiksXHJcbiAgICAgICAgICAgICAgICAgICAgYm9yZGVyQ29sb3I6IHByaW1hcnlDb2xvcixcclxuICAgICAgICAgICAgICAgICAgICBiYWNrZ3JvdW5kQ29sb3I6ICd0cmFuc3BhcmVudCcsXHJcbiAgICAgICAgICAgICAgICAgICAgc3RhY2s6ICdjb21iaW5lZCdcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDInLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgxLCA2MCwgMTIpLFxyXG4gICAgICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogZGFuZ2VyQ29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgYm9yZGVyQ29sb3I6IGRhbmdlckNvbG9yLFxyXG4gICAgICAgICAgICAgICAgICAgIHN0YWNrOiAnY29tYmluZWQnLFxyXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdiYXInXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICAvLyBDaGFydCBjb25maWdcclxuICAgICAgICBjb25zdCBjb25maWcgPSB7XHJcbiAgICAgICAgICAgIHR5cGU6ICdsaW5lJyxcclxuICAgICAgICAgICAgZGF0YTogZGF0YSxcclxuICAgICAgICAgICAgb3B0aW9uczoge1xyXG4gICAgICAgICAgICAgICAgcGx1Z2luczoge1xyXG4gICAgICAgICAgICAgICAgICAgIHRpdGxlOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRpc3BsYXk6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICByZXNwb25zaXZlOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgaW50ZXJhY3Rpb246IHtcclxuICAgICAgICAgICAgICAgICAgICBpbnRlcnNlY3Q6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIHNjYWxlczoge1xyXG4gICAgICAgICAgICAgICAgICAgIHk6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3RhY2tlZDogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgZGVmYXVsdHM6IHtcclxuICAgICAgICAgICAgICAgIGZvbnQ6IHtcclxuICAgICAgICAgICAgICAgICAgICBmYW1pbHk6ICdpbmhlcml0JyxcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIC8vIEluaXQgQ2hhcnRKUyAtLSBmb3IgbW9yZSBpbmZvLCBwbGVhc2UgdmlzaXQ6IGh0dHBzOi8vd3d3LmNoYXJ0anMub3JnL2RvY3MvbGF0ZXN0L1xyXG4gICAgICAgIHZhciBteUNoYXJ0ID0gbmV3IENoYXJ0KGN0eCwgY29uZmlnKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gRGVmaW5lIGNoYXJ0IGVsZW1lbnRcclxuICAgICAgICB2YXIgY3R4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X2NoYXJ0anNfNScpO1xyXG5cclxuICAgICAgICAvLyBEZWZpbmUgY29sb3JzXHJcbiAgICAgICAgdmFyIGluZm9Db2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWluZm8nKTtcclxuICAgICAgICB2YXIgaW5mb0xpZ2h0Q29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1saWdodC1pbmZvJyk7XHJcbiAgICAgICAgdmFyIHdhcm5pbmdDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLXdhcm5pbmcnKTtcclxuICAgICAgICB2YXIgd2FybmluZ0xpZ2h0Q29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1saWdodC13YXJuaW5nJyk7XHJcbiAgICAgICAgdmFyIHByaW1hcnlDb2xvciA9IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLXByaW1hcnknKTtcclxuICAgICAgICB2YXIgcHJpbWFyeUxpZ2h0Q29sb3IgPSBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1saWdodC1wcmltYXJ5Jyk7XHJcblxyXG4gICAgICAgIC8vIERlZmluZSBmb250c1xyXG4gICAgICAgIHZhciBmb250RmFtaWx5ID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtZm9udC1zYW5zLXNlcmlmJyk7XHJcblxyXG4gICAgICAgIC8vIENoYXJ0IGxhYmVsc1xyXG4gICAgICAgIGNvbnN0IGxhYmVscyA9IFsnSmFudWFyeScsICdGZWJydWFyeScsICdNYXJjaCcsICdBcHJpbCcsICdNYXknLCAnSnVuZSddO1xyXG5cclxuICAgICAgICAvLyBDaGFydCBkYXRhXHJcbiAgICAgICAgY29uc3QgZGF0YSA9IHtcclxuICAgICAgICAgICAgbGFiZWxzOiBsYWJlbHMsXHJcbiAgICAgICAgICAgIGRhdGFzZXRzOiBbXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDEnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgyMCwgODAsIDYpLFxyXG4gICAgICAgICAgICAgICAgICAgIGJvcmRlckNvbG9yOiBpbmZvQ29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiBpbmZvTGlnaHRDb2xvcixcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDInLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgxMCwgNjAsIDYpLFxyXG4gICAgICAgICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogd2FybmluZ0xpZ2h0Q29sb3IsXHJcbiAgICAgICAgICAgICAgICAgICAgYm9yZGVyQ29sb3I6IHdhcm5pbmdDb2xvcixcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw6ICdEYXRhc2V0IDMnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGdlbmVyYXRlUmFuZG9tRGF0YSgwLCA4MCwgNiksXHJcbiAgICAgICAgICAgICAgICAgICAgYmFja2dyb3VuZENvbG9yOiBwcmltYXJ5TGlnaHRDb2xvcixcclxuICAgICAgICAgICAgICAgICAgICBib3JkZXJDb2xvcjogcHJpbWFyeUNvbG9yLFxyXG4gICAgICAgICAgICAgICAgfSwgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICAvLyBDaGFydCBjb25maWdcclxuICAgICAgICBjb25zdCBjb25maWcgPSB7XHJcbiAgICAgICAgICAgIHR5cGU6ICdyYWRhcicsXHJcbiAgICAgICAgICAgIGRhdGE6IGRhdGEsXHJcbiAgICAgICAgICAgIG9wdGlvbnM6IHtcclxuICAgICAgICAgICAgICAgIHBsdWdpbnM6IHtcclxuICAgICAgICAgICAgICAgICAgICB0aXRsZToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBkaXNwbGF5OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgcmVzcG9uc2l2ZTogdHJ1ZSxcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIC8vIEluaXQgQ2hhcnRKUyAtLSBmb3IgbW9yZSBpbmZvLCBwbGVhc2UgdmlzaXQ6IGh0dHBzOi8vd3d3LmNoYXJ0anMub3JnL2RvY3MvbGF0ZXN0L1xyXG4gICAgICAgIHZhciBteUNoYXJ0ID0gbmV3IENoYXJ0KGN0eCwgY29uZmlnKTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vIEdsb2JhbCBmb250IHNldHRpbmdzOiBodHRwczovL3d3dy5jaGFydGpzLm9yZy9kb2NzL2xhdGVzdC9nZW5lcmFsL2ZvbnRzLmh0bWxcclxuICAgICAgICAgICAgQ2hhcnQuZGVmYXVsdHMuZm9udC5zaXplID0gMTM7XHJcbiAgICAgICAgICAgIENoYXJ0LmRlZmF1bHRzLmZvbnQuZmFtaWx5ID0gS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtZm9udC1zYW5zLXNlcmlmJyk7XHJcblxyXG4gICAgICAgICAgICBleGFtcGxlMSgpO1xyXG4gICAgICAgICAgICBleGFtcGxlMigpO1xyXG4gICAgICAgICAgICBleGFtcGxlMygpO1xyXG4gICAgICAgICAgICBleGFtcGxlNCgpO1xyXG4gICAgICAgICAgICBleGFtcGxlNSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RHZW5lcmFsQ2hhcnRKUy5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RHZW5lcmFsQ2hhcnRKUyIsImdldFJhbmRvbSIsIm1pbiIsIm1heCIsIk1hdGgiLCJmbG9vciIsInJhbmRvbSIsImdlbmVyYXRlUmFuZG9tRGF0YSIsImNvdW50IiwiYXJyIiwiaSIsInB1c2giLCJleGFtcGxlMSIsImN0eCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJwcmltYXJ5Q29sb3IiLCJLVFV0aWwiLCJnZXRDc3NWYXJpYWJsZVZhbHVlIiwiZGFuZ2VyQ29sb3IiLCJzdWNjZXNzQ29sb3IiLCJmb250RmFtaWx5IiwibGFiZWxzIiwiZGF0YSIsImRhdGFzZXRzIiwibGFiZWwiLCJiYWNrZ3JvdW5kQ29sb3IiLCJzdGFjayIsImNvbmZpZyIsInR5cGUiLCJvcHRpb25zIiwicGx1Z2lucyIsInRpdGxlIiwiZGlzcGxheSIsInJlc3BvbnNpdmUiLCJpbnRlcmFjdGlvbiIsImludGVyc2VjdCIsInNjYWxlcyIsIngiLCJzdGFja2VkIiwieSIsIm15Q2hhcnQiLCJDaGFydCIsImV4YW1wbGUyIiwiYm9yZGVyQ29sb3IiLCJleGFtcGxlMyIsIndhcm5pbmdDb2xvciIsImluZm9Db2xvciIsImV4YW1wbGU0IiwiZGFuZ2VyTGlnaHRDb2xvciIsImRlZmF1bHRzIiwiZm9udCIsImZhbWlseSIsImV4YW1wbGU1IiwiaW5mb0xpZ2h0Q29sb3IiLCJ3YXJuaW5nTGlnaHRDb2xvciIsInByaW1hcnlMaWdodENvbG9yIiwiaW5pdCIsInNpemUiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/charts/chartjs.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/charts/chartjs.js"]();
/******/ 	
/******/ })()
;