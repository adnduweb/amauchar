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

/***/ "./resources/backend/core/js/custom/account/security/license-usage.js":
/*!****************************************************************************!*\
  !*** ./resources/backend/core/js/custom/account/security/license-usage.js ***!
  \****************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTAccountSecurityLicenseUsage = function () {\n  // Private functions\n  var initLicenceCopy = function initLicenceCopy() {\n    KTUtil.each(document.querySelectorAll('#kt_security_license_usage_table [data-action=\"copy\"]'), function (button) {\n      var tr = button.closest('tr');\n      var license = KTUtil.find(tr, '[data-bs-target=\"license\"]');\n      var clipboard = new ClipboardJS(button, {\n        target: license,\n        text: function text() {\n          return license.innerHTML;\n        }\n      });\n      clipboard.on('success', function (e) {\n        // Icons\n        var svgIcon = button.querySelector('.svg-icon');\n        var checkIcon = button.querySelector('.bi.bi-check'); // exit if check icon is already shown\n\n        if (checkIcon) {\n          return;\n        } // Create check icon\n\n\n        checkIcon = document.createElement('i');\n        checkIcon.classList.add('bi');\n        checkIcon.classList.add('bi-check');\n        checkIcon.classList.add('fs-2x'); // Append check icon\n\n        button.appendChild(checkIcon); // Highlight target\n\n        license.classList.add('text-success'); // Hide copy icon\n\n        svgIcon.classList.add('d-none'); // Set 3 seconds timeout to hide the check icon and show copy icon back\n\n        setTimeout(function () {\n          // Remove check icon\n          svgIcon.classList.remove('d-none'); // Show check icon back\n\n          button.removeChild(checkIcon); // Remove highlight\n\n          license.classList.remove('text-success');\n        }, 3000);\n      });\n    });\n  }; // Public methods\n\n\n  return {\n    init: function init() {\n      initLicenceCopy();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTAccountSecurityLicenseUsage.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9hY2NvdW50L3NlY3VyaXR5L2xpY2Vuc2UtdXNhZ2UuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsNkJBQTZCLEdBQUcsWUFBWTtBQUM1QztBQUNBLE1BQUlDLGVBQWUsR0FBRyxTQUFsQkEsZUFBa0IsR0FBVztBQUM3QkMsSUFBQUEsTUFBTSxDQUFDQyxJQUFQLENBQVlDLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsdURBQTFCLENBQVosRUFBZ0csVUFBU0MsTUFBVCxFQUFpQjtBQUM3RyxVQUFJQyxFQUFFLEdBQUdELE1BQU0sQ0FBQ0UsT0FBUCxDQUFlLElBQWYsQ0FBVDtBQUNBLFVBQUlDLE9BQU8sR0FBR1AsTUFBTSxDQUFDUSxJQUFQLENBQVlILEVBQVosRUFBZ0IsNEJBQWhCLENBQWQ7QUFFQSxVQUFJSSxTQUFTLEdBQUcsSUFBSUMsV0FBSixDQUFnQk4sTUFBaEIsRUFBd0I7QUFDcENPLFFBQUFBLE1BQU0sRUFBRUosT0FENEI7QUFFcENLLFFBQUFBLElBQUksRUFBRSxnQkFBVztBQUNiLGlCQUFPTCxPQUFPLENBQUNNLFNBQWY7QUFDSDtBQUptQyxPQUF4QixDQUFoQjtBQU9BSixNQUFBQSxTQUFTLENBQUNLLEVBQVYsQ0FBYSxTQUFiLEVBQXdCLFVBQVNDLENBQVQsRUFBWTtBQUNoQztBQUNBLFlBQUlDLE9BQU8sR0FBR1osTUFBTSxDQUFDYSxhQUFQLENBQXFCLFdBQXJCLENBQWQ7QUFDQSxZQUFJQyxTQUFTLEdBQUdkLE1BQU0sQ0FBQ2EsYUFBUCxDQUFxQixjQUFyQixDQUFoQixDQUhnQyxDQUtoQzs7QUFDQSxZQUFJQyxTQUFKLEVBQWU7QUFDWjtBQUNGLFNBUitCLENBVWhDOzs7QUFDQUEsUUFBQUEsU0FBUyxHQUFHaEIsUUFBUSxDQUFDaUIsYUFBVCxDQUF1QixHQUF2QixDQUFaO0FBQ0FELFFBQUFBLFNBQVMsQ0FBQ0UsU0FBVixDQUFvQkMsR0FBcEIsQ0FBd0IsSUFBeEI7QUFDQUgsUUFBQUEsU0FBUyxDQUFDRSxTQUFWLENBQW9CQyxHQUFwQixDQUF3QixVQUF4QjtBQUNBSCxRQUFBQSxTQUFTLENBQUNFLFNBQVYsQ0FBb0JDLEdBQXBCLENBQXdCLE9BQXhCLEVBZGdDLENBZ0JoQzs7QUFDQWpCLFFBQUFBLE1BQU0sQ0FBQ2tCLFdBQVAsQ0FBbUJKLFNBQW5CLEVBakJnQyxDQW1CaEM7O0FBQ0FYLFFBQUFBLE9BQU8sQ0FBQ2EsU0FBUixDQUFrQkMsR0FBbEIsQ0FBc0IsY0FBdEIsRUFwQmdDLENBc0JoQzs7QUFDQUwsUUFBQUEsT0FBTyxDQUFDSSxTQUFSLENBQWtCQyxHQUFsQixDQUFzQixRQUF0QixFQXZCZ0MsQ0F5QmhDOztBQUNBRSxRQUFBQSxVQUFVLENBQUMsWUFBVztBQUNsQjtBQUNBUCxVQUFBQSxPQUFPLENBQUNJLFNBQVIsQ0FBa0JJLE1BQWxCLENBQXlCLFFBQXpCLEVBRmtCLENBR2xCOztBQUNBcEIsVUFBQUEsTUFBTSxDQUFDcUIsV0FBUCxDQUFtQlAsU0FBbkIsRUFKa0IsQ0FNbEI7O0FBQ0FYLFVBQUFBLE9BQU8sQ0FBQ2EsU0FBUixDQUFrQkksTUFBbEIsQ0FBeUIsY0FBekI7QUFDSCxTQVJTLEVBUVAsSUFSTyxDQUFWO0FBU0gsT0FuQ0Q7QUFvQ0gsS0EvQ0Q7QUFnREgsR0FqREQsQ0FGNEMsQ0FxRDVDOzs7QUFDQSxTQUFPO0FBQ0hFLElBQUFBLElBQUksRUFBRSxnQkFBWTtBQUNkM0IsTUFBQUEsZUFBZTtBQUNsQjtBQUhFLEdBQVA7QUFLSCxDQTNEbUMsRUFBcEMsQyxDQTZEQTs7O0FBQ0FDLE1BQU0sQ0FBQzJCLGtCQUFQLENBQTBCLFlBQVc7QUFDakM3QixFQUFBQSw2QkFBNkIsQ0FBQzRCLElBQTlCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL2FjY291bnQvc2VjdXJpdHkvbGljZW5zZS11c2FnZS5qcz8zZTU2Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RBY2NvdW50U2VjdXJpdHlMaWNlbnNlVXNhZ2UgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGluaXRMaWNlbmNlQ29weSA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIEtUVXRpbC5lYWNoKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJyNrdF9zZWN1cml0eV9saWNlbnNlX3VzYWdlX3RhYmxlIFtkYXRhLWFjdGlvbj1cImNvcHlcIl0nKSwgZnVuY3Rpb24oYnV0dG9uKSB7XHJcbiAgICAgICAgICAgIHZhciB0ciA9IGJ1dHRvbi5jbG9zZXN0KCd0cicpO1xyXG4gICAgICAgICAgICB2YXIgbGljZW5zZSA9IEtUVXRpbC5maW5kKHRyLCAnW2RhdGEtYnMtdGFyZ2V0PVwibGljZW5zZVwiXScpO1xyXG5cclxuICAgICAgICAgICAgdmFyIGNsaXBib2FyZCA9IG5ldyBDbGlwYm9hcmRKUyhidXR0b24sIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldDogbGljZW5zZSxcclxuICAgICAgICAgICAgICAgIHRleHQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBsaWNlbnNlLmlubmVySFRNTDtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgXHJcbiAgICAgICAgICAgIGNsaXBib2FyZC5vbignc3VjY2VzcycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIC8vIEljb25zXHJcbiAgICAgICAgICAgICAgICB2YXIgc3ZnSWNvbiA9IGJ1dHRvbi5xdWVyeVNlbGVjdG9yKCcuc3ZnLWljb24nKTsgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICB2YXIgY2hlY2tJY29uID0gYnV0dG9uLnF1ZXJ5U2VsZWN0b3IoJy5iaS5iaS1jaGVjaycpO1xyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAvLyBleGl0IGlmIGNoZWNrIGljb24gaXMgYWxyZWFkeSBzaG93blxyXG4gICAgICAgICAgICAgICAgaWYgKGNoZWNrSWNvbikge1xyXG4gICAgICAgICAgICAgICAgICAgcmV0dXJuOyAgXHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gQ3JlYXRlIGNoZWNrIGljb25cclxuICAgICAgICAgICAgICAgIGNoZWNrSWNvbiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2knKTtcclxuICAgICAgICAgICAgICAgIGNoZWNrSWNvbi5jbGFzc0xpc3QuYWRkKCdiaScpO1xyXG4gICAgICAgICAgICAgICAgY2hlY2tJY29uLmNsYXNzTGlzdC5hZGQoJ2JpLWNoZWNrJyk7XHJcbiAgICAgICAgICAgICAgICBjaGVja0ljb24uY2xhc3NMaXN0LmFkZCgnZnMtMngnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBBcHBlbmQgY2hlY2sgaWNvblxyXG4gICAgICAgICAgICAgICAgYnV0dG9uLmFwcGVuZENoaWxkKGNoZWNrSWNvbik7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gSGlnaGxpZ2h0IHRhcmdldFxyXG4gICAgICAgICAgICAgICAgbGljZW5zZS5jbGFzc0xpc3QuYWRkKCd0ZXh0LXN1Y2Nlc3MnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBIaWRlIGNvcHkgaWNvblxyXG4gICAgICAgICAgICAgICAgc3ZnSWNvbi5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBTZXQgMyBzZWNvbmRzIHRpbWVvdXQgdG8gaGlkZSB0aGUgY2hlY2sgaWNvbiBhbmQgc2hvdyBjb3B5IGljb24gYmFja1xyXG4gICAgICAgICAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgICAgICAvLyBSZW1vdmUgY2hlY2sgaWNvblxyXG4gICAgICAgICAgICAgICAgICAgIHN2Z0ljb24uY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gU2hvdyBjaGVjayBpY29uIGJhY2tcclxuICAgICAgICAgICAgICAgICAgICBidXR0b24ucmVtb3ZlQ2hpbGQoY2hlY2tJY29uKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gUmVtb3ZlIGhpZ2hsaWdodFxyXG4gICAgICAgICAgICAgICAgICAgIGxpY2Vuc2UuY2xhc3NMaXN0LnJlbW92ZSgndGV4dC1zdWNjZXNzJyk7XHJcbiAgICAgICAgICAgICAgICB9LCAzMDAwKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgLy8gUHVibGljIG1ldGhvZHNcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBpbml0TGljZW5jZUNvcHkoKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEFjY291bnRTZWN1cml0eUxpY2Vuc2VVc2FnZS5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RBY2NvdW50U2VjdXJpdHlMaWNlbnNlVXNhZ2UiLCJpbml0TGljZW5jZUNvcHkiLCJLVFV0aWwiLCJlYWNoIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiYnV0dG9uIiwidHIiLCJjbG9zZXN0IiwibGljZW5zZSIsImZpbmQiLCJjbGlwYm9hcmQiLCJDbGlwYm9hcmRKUyIsInRhcmdldCIsInRleHQiLCJpbm5lckhUTUwiLCJvbiIsImUiLCJzdmdJY29uIiwicXVlcnlTZWxlY3RvciIsImNoZWNrSWNvbiIsImNyZWF0ZUVsZW1lbnQiLCJjbGFzc0xpc3QiLCJhZGQiLCJhcHBlbmRDaGlsZCIsInNldFRpbWVvdXQiLCJyZW1vdmUiLCJyZW1vdmVDaGlsZCIsImluaXQiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/account/security/license-usage.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/account/security/license-usage.js"]();
/******/ 	
/******/ })()
;