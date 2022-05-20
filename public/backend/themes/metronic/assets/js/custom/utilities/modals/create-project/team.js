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

/***/ "./resources/backend/core/js/custom/utilities/modals/create-project/team.js":
/*!**********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/utilities/modals/create-project/team.js ***!
  \**********************************************************************************/
/***/ ((module) => {

eval(" // Class definition\n\nvar KTModalCreateProjectTeam = function () {\n  // Variables\n  var nextButton;\n  var previousButton;\n  var form;\n  var stepper; // Private functions\n\n  var handleForm = function handleForm() {\n    nextButton.addEventListener('click', function (e) {\n      // Prevent default button action\n      e.preventDefault(); // Disable button to avoid multiple click \n\n      nextButton.disabled = true; // Show loading indication\n\n      nextButton.setAttribute('data-kt-indicator', 'on'); // Simulate form submission\n\n      setTimeout(function () {\n        // Enable button\n        nextButton.disabled = false; // Simulate form submission\n\n        nextButton.removeAttribute('data-kt-indicator'); // Go to next step\n\n        stepper.goNext();\n      }, 1500);\n    });\n    previousButton.addEventListener('click', function () {\n      stepper.goPrevious();\n    });\n  };\n\n  return {\n    // Public functions\n    init: function init() {\n      form = KTModalCreateProject.getForm();\n      stepper = KTModalCreateProject.getStepperObj();\n      nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element=\"team-next\"]');\n      previousButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element=\"team-previous\"]');\n      handleForm();\n    }\n  };\n}(); // Webpack support\n\n\nif ( true && typeof module.exports !== 'undefined') {\n  window.KTModalCreateProjectTeam = module.exports = KTModalCreateProjectTeam;\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS91dGlsaXRpZXMvbW9kYWxzL2NyZWF0ZS1wcm9qZWN0L3RlYW0uanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsd0JBQXdCLEdBQUcsWUFBWTtBQUMxQztBQUNBLE1BQUlDLFVBQUo7QUFDQSxNQUFJQyxjQUFKO0FBQ0EsTUFBSUMsSUFBSjtBQUNBLE1BQUlDLE9BQUosQ0FMMEMsQ0FPMUM7O0FBQ0EsTUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQWEsR0FBVztBQUMzQkosSUFBQUEsVUFBVSxDQUFDSyxnQkFBWCxDQUE0QixPQUE1QixFQUFxQyxVQUFVQyxDQUFWLEVBQWE7QUFDakQ7QUFDQUEsTUFBQUEsQ0FBQyxDQUFDQyxjQUFGLEdBRmlELENBSWpEOztBQUNBUCxNQUFBQSxVQUFVLENBQUNRLFFBQVgsR0FBc0IsSUFBdEIsQ0FMaUQsQ0FPakQ7O0FBQ0FSLE1BQUFBLFVBQVUsQ0FBQ1MsWUFBWCxDQUF3QixtQkFBeEIsRUFBNkMsSUFBN0MsRUFSaUQsQ0FVakQ7O0FBQ0FDLE1BQUFBLFVBQVUsQ0FBQyxZQUFXO0FBQ3JCO0FBQ0FWLFFBQUFBLFVBQVUsQ0FBQ1EsUUFBWCxHQUFzQixLQUF0QixDQUZxQixDQUlyQjs7QUFDQVIsUUFBQUEsVUFBVSxDQUFDVyxlQUFYLENBQTJCLG1CQUEzQixFQUxxQixDQU9yQjs7QUFDQVIsUUFBQUEsT0FBTyxDQUFDUyxNQUFSO0FBQ0EsT0FUUyxFQVNQLElBVE8sQ0FBVjtBQVVBLEtBckJEO0FBdUJBWCxJQUFBQSxjQUFjLENBQUNJLGdCQUFmLENBQWdDLE9BQWhDLEVBQXlDLFlBQVk7QUFDcERGLE1BQUFBLE9BQU8sQ0FBQ1UsVUFBUjtBQUNBLEtBRkQ7QUFHQSxHQTNCRDs7QUE2QkEsU0FBTztBQUNOO0FBQ0FDLElBQUFBLElBQUksRUFBRSxnQkFBWTtBQUNqQlosTUFBQUEsSUFBSSxHQUFHYSxvQkFBb0IsQ0FBQ0MsT0FBckIsRUFBUDtBQUNBYixNQUFBQSxPQUFPLEdBQUdZLG9CQUFvQixDQUFDRSxhQUFyQixFQUFWO0FBQ0FqQixNQUFBQSxVQUFVLEdBQUdlLG9CQUFvQixDQUFDRyxVQUFyQixHQUFrQ0MsYUFBbEMsQ0FBZ0QsK0JBQWhELENBQWI7QUFDQWxCLE1BQUFBLGNBQWMsR0FBR2Msb0JBQW9CLENBQUNHLFVBQXJCLEdBQWtDQyxhQUFsQyxDQUFnRCxtQ0FBaEQsQ0FBakI7QUFFQWYsTUFBQUEsVUFBVTtBQUNWO0FBVEssR0FBUDtBQVdBLENBaEQ4QixFQUEvQixDLENBa0RBOzs7QUFDQSxJQUFJLFNBQWlDLE9BQU9nQixNQUFNLENBQUNDLE9BQWQsS0FBMEIsV0FBL0QsRUFBNEU7QUFDM0VDLEVBQUFBLE1BQU0sQ0FBQ3ZCLHdCQUFQLEdBQWtDcUIsTUFBTSxDQUFDQyxPQUFQLEdBQWlCdEIsd0JBQW5EO0FBQ0EiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS91dGlsaXRpZXMvbW9kYWxzL2NyZWF0ZS1wcm9qZWN0L3RlYW0uanM/YzVhMiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtUTW9kYWxDcmVhdGVQcm9qZWN0VGVhbSA9IGZ1bmN0aW9uICgpIHtcclxuXHQvLyBWYXJpYWJsZXNcclxuXHR2YXIgbmV4dEJ1dHRvbjtcclxuXHR2YXIgcHJldmlvdXNCdXR0b247XHJcblx0dmFyIGZvcm07XHJcblx0dmFyIHN0ZXBwZXI7XHJcblxyXG5cdC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcblx0dmFyIGhhbmRsZUZvcm0gPSBmdW5jdGlvbigpIHtcclxuXHRcdG5leHRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG5cdFx0XHQvLyBQcmV2ZW50IGRlZmF1bHQgYnV0dG9uIGFjdGlvblxyXG5cdFx0XHRlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG5cdFx0XHQvLyBEaXNhYmxlIGJ1dHRvbiB0byBhdm9pZCBtdWx0aXBsZSBjbGljayBcclxuXHRcdFx0bmV4dEJ1dHRvbi5kaXNhYmxlZCA9IHRydWU7XHJcblxyXG5cdFx0XHQvLyBTaG93IGxvYWRpbmcgaW5kaWNhdGlvblxyXG5cdFx0XHRuZXh0QnV0dG9uLnNldEF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InLCAnb24nKTtcclxuXHJcblx0XHRcdC8vIFNpbXVsYXRlIGZvcm0gc3VibWlzc2lvblxyXG5cdFx0XHRzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRcdC8vIEVuYWJsZSBidXR0b25cclxuXHRcdFx0XHRuZXh0QnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XHJcblx0XHRcdFx0XHJcblx0XHRcdFx0Ly8gU2ltdWxhdGUgZm9ybSBzdWJtaXNzaW9uXHJcblx0XHRcdFx0bmV4dEJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XHJcblx0XHRcdFx0XHJcblx0XHRcdFx0Ly8gR28gdG8gbmV4dCBzdGVwXHJcblx0XHRcdFx0c3RlcHBlci5nb05leHQoKTtcclxuXHRcdFx0fSwgMTUwMCk7IFx0XHRcclxuXHRcdH0pO1xyXG5cclxuXHRcdHByZXZpb3VzQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG5cdFx0XHRzdGVwcGVyLmdvUHJldmlvdXMoKTtcclxuXHRcdH0pO1xyXG5cdH1cclxuXHJcblx0cmV0dXJuIHtcclxuXHRcdC8vIFB1YmxpYyBmdW5jdGlvbnNcclxuXHRcdGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuXHRcdFx0Zm9ybSA9IEtUTW9kYWxDcmVhdGVQcm9qZWN0LmdldEZvcm0oKTtcclxuXHRcdFx0c3RlcHBlciA9IEtUTW9kYWxDcmVhdGVQcm9qZWN0LmdldFN0ZXBwZXJPYmooKTtcclxuXHRcdFx0bmV4dEJ1dHRvbiA9IEtUTW9kYWxDcmVhdGVQcm9qZWN0LmdldFN0ZXBwZXIoKS5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1lbGVtZW50PVwidGVhbS1uZXh0XCJdJyk7XHJcblx0XHRcdHByZXZpb3VzQnV0dG9uID0gS1RNb2RhbENyZWF0ZVByb2plY3QuZ2V0U3RlcHBlcigpLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LWVsZW1lbnQ9XCJ0ZWFtLXByZXZpb3VzXCJdJyk7XHJcblxyXG5cdFx0XHRoYW5kbGVGb3JtKCk7XHJcblx0XHR9XHJcblx0fTtcclxufSgpO1xyXG5cclxuLy8gV2VicGFjayBzdXBwb3J0XHJcbmlmICh0eXBlb2YgbW9kdWxlICE9PSAndW5kZWZpbmVkJyAmJiB0eXBlb2YgbW9kdWxlLmV4cG9ydHMgIT09ICd1bmRlZmluZWQnKSB7XHJcblx0d2luZG93LktUTW9kYWxDcmVhdGVQcm9qZWN0VGVhbSA9IG1vZHVsZS5leHBvcnRzID0gS1RNb2RhbENyZWF0ZVByb2plY3RUZWFtO1xyXG59Il0sIm5hbWVzIjpbIktUTW9kYWxDcmVhdGVQcm9qZWN0VGVhbSIsIm5leHRCdXR0b24iLCJwcmV2aW91c0J1dHRvbiIsImZvcm0iLCJzdGVwcGVyIiwiaGFuZGxlRm9ybSIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwicHJldmVudERlZmF1bHQiLCJkaXNhYmxlZCIsInNldEF0dHJpYnV0ZSIsInNldFRpbWVvdXQiLCJyZW1vdmVBdHRyaWJ1dGUiLCJnb05leHQiLCJnb1ByZXZpb3VzIiwiaW5pdCIsIktUTW9kYWxDcmVhdGVQcm9qZWN0IiwiZ2V0Rm9ybSIsImdldFN0ZXBwZXJPYmoiLCJnZXRTdGVwcGVyIiwicXVlcnlTZWxlY3RvciIsIm1vZHVsZSIsImV4cG9ydHMiLCJ3aW5kb3ciXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/utilities/modals/create-project/team.js\n");

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
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/backend/core/js/custom/utilities/modals/create-project/team.js");
/******/ 	
/******/ })()
;