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

/***/ "./resources/backend/core/js/custom/documentation/general/blockui.js":
/*!***************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/general/blockui.js ***!
  \***************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTGeneralBlockUI = function () {\n  // Private functions\n  var example1 = function example1() {\n    var button = document.querySelector(\"#kt_block_ui_1_button\");\n    var target = document.querySelector(\"#kt_block_ui_1_target\");\n    var blockUI = new KTBlockUI(target);\n    button.addEventListener(\"click\", function () {\n      if (blockUI.isBlocked()) {\n        blockUI.release();\n        button.innerText = \"Block\";\n      } else {\n        blockUI.block();\n        button.innerText = \"Release\";\n      }\n    });\n  };\n\n  var example2 = function example2() {\n    var button = document.querySelector(\"#kt_block_ui_2_button\");\n    var target = document.querySelector(\"#kt_block_ui_2_target\");\n    var blockUI = new KTBlockUI(target, {\n      message: '<div class=\"blockui-message\"><span class=\"spinner-border text-primary\"></span> Loading...</div>'\n    });\n    button.addEventListener(\"click\", function () {\n      if (blockUI.isBlocked()) {\n        blockUI.release();\n        button.innerText = \"Block\";\n      } else {\n        blockUI.block();\n        button.innerText = \"Release\";\n      }\n    });\n  };\n\n  var example3 = function example3() {\n    var button = document.querySelector(\"#kt_block_ui_3_button\");\n    var target = document.querySelector(\"#kt_block_ui_3_target\");\n    var blockUI = new KTBlockUI(target, {\n      overlayClass: 'bg-danger bg-opacity-25'\n    });\n    button.addEventListener(\"click\", function () {\n      if (blockUI.isBlocked()) {\n        blockUI.release();\n        button.innerText = \"Block\";\n      } else {\n        blockUI.block();\n        button.innerText = \"Release\";\n      }\n    });\n  };\n\n  var example4 = function example4() {\n    var button = document.querySelector(\"#kt_block_ui_4_button\");\n    var target = document.querySelector(\"#kt_block_ui_4_target\");\n    var blockUI = new KTBlockUI(target);\n    button.addEventListener(\"click\", function (e) {\n      e.preventDefault();\n      blockUI.block();\n      setTimeout(function () {\n        blockUI.release();\n      }, 3000);\n    });\n  };\n\n  var example5 = function example5() {\n    var button = document.querySelector(\"#kt_block_ui_5_button\");\n    var blockUI = new KTBlockUI(document.body);\n    button.addEventListener(\"click\", function (e) {\n      e.preventDefault();\n      blockUI.block();\n      setTimeout(function () {//blockUI.release();\n      }, 3000);\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      example1();\n      example2();\n      example3();\n      example4(); //example5();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralBlockUI.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvYmxvY2t1aS5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxnQkFBZ0IsR0FBRyxZQUFXO0FBQzlCO0FBQ0EsTUFBSUMsUUFBUSxHQUFHLFNBQVhBLFFBQVcsR0FBVztBQUN0QixRQUFJQyxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qix1QkFBdkIsQ0FBYjtBQUNBLFFBQUlDLE1BQU0sR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLHVCQUF2QixDQUFiO0FBRUEsUUFBSUUsT0FBTyxHQUFHLElBQUlDLFNBQUosQ0FBY0YsTUFBZCxDQUFkO0FBRUFILElBQUFBLE1BQU0sQ0FBQ00sZ0JBQVAsQ0FBd0IsT0FBeEIsRUFBaUMsWUFBVztBQUN4QyxVQUFJRixPQUFPLENBQUNHLFNBQVIsRUFBSixFQUF5QjtBQUNyQkgsUUFBQUEsT0FBTyxDQUFDSSxPQUFSO0FBQ0FSLFFBQUFBLE1BQU0sQ0FBQ1MsU0FBUCxHQUFtQixPQUFuQjtBQUNILE9BSEQsTUFHTztBQUNITCxRQUFBQSxPQUFPLENBQUNNLEtBQVI7QUFDQVYsUUFBQUEsTUFBTSxDQUFDUyxTQUFQLEdBQW1CLFNBQW5CO0FBQ0g7QUFDSixLQVJEO0FBU0gsR0FmRDs7QUFpQkEsTUFBSUUsUUFBUSxHQUFHLFNBQVhBLFFBQVcsR0FBVztBQUN0QixRQUFJWCxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qix1QkFBdkIsQ0FBYjtBQUNBLFFBQUlDLE1BQU0sR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLHVCQUF2QixDQUFiO0FBRUEsUUFBSUUsT0FBTyxHQUFHLElBQUlDLFNBQUosQ0FBY0YsTUFBZCxFQUFzQjtBQUNoQ1MsTUFBQUEsT0FBTyxFQUFFO0FBRHVCLEtBQXRCLENBQWQ7QUFJQVosSUFBQUEsTUFBTSxDQUFDTSxnQkFBUCxDQUF3QixPQUF4QixFQUFpQyxZ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cmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9ibG9ja3VpLmpzP2EzNGYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEdlbmVyYWxCbG9ja1VJID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGUxID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdmFyIGJ1dHRvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3RfYmxvY2tfdWlfMV9idXR0b25cIik7XHJcbiAgICAgICAgdmFyIHRhcmdldCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3RfYmxvY2tfdWlfMV90YXJnZXRcIik7XHJcblxyXG4gICAgICAgIHZhciBibG9ja1VJID0gbmV3IEtUQmxvY2tVSSh0YXJnZXQpO1xyXG5cclxuICAgICAgICBidXR0b24uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBpZiAoYmxvY2tVSS5pc0Jsb2NrZWQoKSkge1xyXG4gICAgICAgICAgICAgICAgYmxvY2tVSS5yZWxlYXNlKCk7XHJcbiAgICAgICAgICAgICAgICBidXR0b24uaW5uZXJUZXh0ID0gXCJCbG9ja1wiO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgYmxvY2tVSS5ibG9jaygpO1xyXG4gICAgICAgICAgICAgICAgYnV0dG9uLmlubmVyVGV4dCA9IFwiUmVsZWFzZVwiO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgdmFyIGV4YW1wbGUyID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdmFyIGJ1dHRvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3RfYmxvY2tfdWlfMl9idXR0b25cIik7XHJcbiAgICAgICAgdmFyIHRhcmdldCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3RfYmxvY2tfdWlfMl90YXJnZXRcIik7XHJcblxyXG4gICAgICAgIHZhciBibG9ja1VJID0gbmV3IEtUQmxvY2tVSSh0YXJnZXQsIHtcclxuICAgICAgICAgICAgbWVzc2FnZTogJzxkaXYgY2xhc3M9XCJibG9ja3VpLW1lc3NhZ2VcIj48c3BhbiBjbGFzcz1cInNwaW5uZXItYm9yZGVyIHRleHQtcHJpbWFyeVwiPjwvc3Bhbj4gTG9hZGluZy4uLjwvZGl2PicsXHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGlmIChibG9ja1VJLmlzQmxvY2tlZCgpKSB7XHJcbiAgICAgICAgICAgICAgICBibG9ja1VJLnJlbGVhc2UoKTtcclxuICAgICAgICAgICAgICAgIGJ1dHRvbi5pbm5lclRleHQgPSBcIkJsb2NrXCI7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBibG9ja1VJLmJsb2NrKCk7XHJcbiAgICAgICAgICAgICAgICBidXR0b24uaW5uZXJUZXh0ID0gXCJSZWxlYXNlXCI7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTMgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgYnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9ibG9ja191aV8zX2J1dHRvblwiKTtcclxuICAgICAgICB2YXIgdGFyZ2V0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9ibG9ja191aV8zX3RhcmdldFwiKTtcclxuXHJcbiAgICAgICAgdmFyIGJsb2NrVUkgPSBuZXcgS1RCbG9ja1VJKHRhcmdldCwge1xyXG4gICAgICAgICAgICBvdmVybGF5Q2xhc3M6ICdiZy1kYW5nZXIgYmctb3BhY2l0eS0yNScsXHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGlmIChibG9ja1VJLmlzQmxvY2tlZCgpKSB7XHJcbiAgICAgICAgICAgICAgICBibG9ja1VJLnJlbGVhc2UoKTtcclxuICAgICAgICAgICAgICAgIGJ1dHRvbi5pbm5lclRleHQgPSBcIkJsb2NrXCI7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBibG9ja1VJLmJsb2NrKCk7XHJcbiAgICAgICAgICAgICAgICBidXR0b24uaW5uZXJUZXh0ID0gXCJSZWxlYXNlXCI7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgYnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9ibG9ja191aV80X2J1dHRvblwiKTtcclxuICAgICAgICB2YXIgdGFyZ2V0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9ibG9ja191aV80X3RhcmdldFwiKTtcclxuXHJcbiAgICAgICAgdmFyIGJsb2NrVUkgPSBuZXcgS1RCbG9ja1VJKHRhcmdldCk7XHJcblxyXG4gICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICBibG9ja1VJLmJsb2NrKCk7XHJcblxyXG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgYmxvY2tVSS5yZWxlYXNlKCk7XHJcbiAgICAgICAgICAgIH0sIDMwMDApO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlNSA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIHZhciBidXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI2t0X2Jsb2NrX3VpXzVfYnV0dG9uXCIpO1xyXG5cclxuICAgICAgICB2YXIgYmxvY2tVSSA9IG5ldyBLVEJsb2NrVUkoZG9jdW1lbnQuYm9keSk7XHJcblxyXG4gICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICBibG9ja1VJLmJsb2NrKCk7XHJcblxyXG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgLy9ibG9ja1VJLnJlbGVhc2UoKTtcclxuICAgICAgICAgICAgfSwgMzAwMCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGUxKCk7XHJcbiAgICAgICAgICAgIGV4YW1wbGUyKCk7XHJcbiAgICAgICAgICAgIGV4YW1wbGUzKCk7XHJcbiAgICAgICAgICAgIGV4YW1wbGU0KCk7XHJcbiAgICAgICAgICAgIC8vZXhhbXBsZTUoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RHZW5lcmFsQmxvY2tVSS5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RHZW5lcmFsQmxvY2tVSSIsImV4YW1wbGUxIiwiYnV0dG9uIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwidGFyZ2V0IiwiYmxvY2tVSSIsIktUQmxvY2tVSSIsImFkZEV2ZW50TGlzdGVuZXIiLCJpc0Jsb2NrZWQiLCJyZWxlYXNlIiwiaW5uZXJUZXh0IiwiYmxvY2siLCJleGFtcGxlMiIsIm1lc3NhZ2UiLCJleGFtcGxlMyIsIm92ZXJsYXlDbGFzcyIsImV4YW1wbGU0IiwiZSIsInByZXZlbnREZWZhdWx0Iiwic2V0VGltZW91dCIsImV4YW1wbGU1IiwiYm9keSIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/general/blockui.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/general/blockui.js"]();
/******/ 	
/******/ })()
;