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

/***/ "./resources/backend/core/js/custom/utilities/modals/create-project/complete.js":
/*!**************************************************************************************!*\
  !*** ./resources/backend/core/js/custom/utilities/modals/create-project/complete.js ***!
  \**************************************************************************************/
/***/ ((module) => {

eval(" // Class definition\n\nvar KTModalCreateProjectComplete = function () {\n  // Variables\n  var startButton;\n  var form;\n  var stepper; // Private functions\n\n  var handleForm = function handleForm() {\n    startButton.addEventListener('click', function () {\n      stepper.goTo(1);\n    });\n  };\n\n  return {\n    // Public functions\n    init: function init() {\n      form = KTModalCreateProject.getForm();\n      stepper = KTModalCreateProject.getStepperObj();\n      startButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element=\"complete-start\"]');\n      handleForm();\n    }\n  };\n}(); // Webpack support\n\n\nif ( true && typeof module.exports !== 'undefined') {\n  window.KTModalCreateProjectComplete = module.exports = KTModalCreateProjectComplete;\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS91dGlsaXRpZXMvbW9kYWxzL2NyZWF0ZS1wcm9qZWN0L2NvbXBsZXRlLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLDRCQUE0QixHQUFHLFlBQVk7QUFDOUM7QUFDQSxNQUFJQyxXQUFKO0FBQ0EsTUFBSUMsSUFBSjtBQUNBLE1BQUlDLE9BQUosQ0FKOEMsQ0FNOUM7O0FBQ0EsTUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQWEsR0FBVztBQUMzQkgsSUFBQUEsV0FBVyxDQUFDSSxnQkFBWixDQUE2QixPQUE3QixFQUFzQyxZQUFZO0FBQ2pERixNQUFBQSxPQUFPLENBQUNHLElBQVIsQ0FBYSxDQUFiO0FBQ0EsS0FGRDtBQUdBLEdBSkQ7O0FBTUEsU0FBTztBQUNOO0FBQ0FDLElBQUFBLElBQUksRUFBRSxnQkFBWTtBQUNqQkwsTUFBQUEsSUFBSSxHQUFHTSxvQkFBb0IsQ0FBQ0MsT0FBckIsRUFBUDtBQUNBTixNQUFBQSxPQUFPLEdBQUdLLG9CQUFvQixDQUFDRSxhQUFyQixFQUFWO0FBQ0FULE1BQUFBLFdBQVcsR0FBR08sb0JBQW9CLENBQUNHLFVBQXJCLEdBQWtDQyxhQUFsQyxDQUFnRCxvQ0FBaEQsQ0FBZDtBQUVBUixNQUFBQSxVQUFVO0FBQ1Y7QUFSSyxHQUFQO0FBVUEsQ0F2QmtDLEVBQW5DLEMsQ0F5QkE7OztBQUNBLElBQUksU0FBaUMsT0FBT1MsTUFBTSxDQUFDQyxPQUFkLEtBQTBCLFdBQS9ELEVBQTRFO0FBQzNFQyxFQUFBQSxNQUFNLENBQUNmLDRCQUFQLEdBQXNDYSxNQUFNLENBQUNDLE9BQVAsR0FBaUJkLDRCQUF2RDtBQUNBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vdXRpbGl0aWVzL21vZGFscy9jcmVhdGUtcHJvamVjdC9jb21wbGV0ZS5qcz9mMGVhIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RNb2RhbENyZWF0ZVByb2plY3RDb21wbGV0ZSA9IGZ1bmN0aW9uICgpIHtcclxuXHQvLyBWYXJpYWJsZXNcclxuXHR2YXIgc3RhcnRCdXR0b247XHJcblx0dmFyIGZvcm07XHJcblx0dmFyIHN0ZXBwZXI7XHJcblxyXG5cdC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcblx0dmFyIGhhbmRsZUZvcm0gPSBmdW5jdGlvbigpIHtcclxuXHRcdHN0YXJ0QnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG5cdFx0XHRzdGVwcGVyLmdvVG8oMSk7XHJcblx0XHR9KTtcclxuXHR9XHJcblxyXG5cdHJldHVybiB7XHJcblx0XHQvLyBQdWJsaWMgZnVuY3Rpb25zXHJcblx0XHRpbml0OiBmdW5jdGlvbiAoKSB7XHJcblx0XHRcdGZvcm0gPSBLVE1vZGFsQ3JlYXRlUHJvamVjdC5nZXRGb3JtKCk7XHJcblx0XHRcdHN0ZXBwZXIgPSBLVE1vZGFsQ3JlYXRlUHJvamVjdC5nZXRTdGVwcGVyT2JqKCk7XHJcblx0XHRcdHN0YXJ0QnV0dG9uID0gS1RNb2RhbENyZWF0ZVByb2plY3QuZ2V0U3RlcHBlcigpLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LWVsZW1lbnQ9XCJjb21wbGV0ZS1zdGFydFwiXScpO1xyXG5cclxuXHRcdFx0aGFuZGxlRm9ybSgpO1xyXG5cdFx0fVxyXG5cdH07XHJcbn0oKTtcclxuXHJcbi8vIFdlYnBhY2sgc3VwcG9ydFxyXG5pZiAodHlwZW9mIG1vZHVsZSAhPT0gJ3VuZGVmaW5lZCcgJiYgdHlwZW9mIG1vZHVsZS5leHBvcnRzICE9PSAndW5kZWZpbmVkJykge1xyXG5cdHdpbmRvdy5LVE1vZGFsQ3JlYXRlUHJvamVjdENvbXBsZXRlID0gbW9kdWxlLmV4cG9ydHMgPSBLVE1vZGFsQ3JlYXRlUHJvamVjdENvbXBsZXRlO1xyXG59XHJcbiJdLCJuYW1lcyI6WyJLVE1vZGFsQ3JlYXRlUHJvamVjdENvbXBsZXRlIiwic3RhcnRCdXR0b24iLCJmb3JtIiwic3RlcHBlciIsImhhbmRsZUZvcm0iLCJhZGRFdmVudExpc3RlbmVyIiwiZ29UbyIsImluaXQiLCJLVE1vZGFsQ3JlYXRlUHJvamVjdCIsImdldEZvcm0iLCJnZXRTdGVwcGVyT2JqIiwiZ2V0U3RlcHBlciIsInF1ZXJ5U2VsZWN0b3IiLCJtb2R1bGUiLCJleHBvcnRzIiwid2luZG93Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/utilities/modals/create-project/complete.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/backend/core/js/custom/utilities/modals/create-project/complete.js");
/******/ 	
/******/ })()
;