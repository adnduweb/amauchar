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

/***/ "./resources/backend/core/js/custom/documentation/forms/bootstrap-maxlength.js":
/*!*************************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/forms/bootstrap-maxlength.js ***!
  \*************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsMaxlengthDemos = function () {\n  // Private functions\n  var exampleBasic = function exampleBasic() {\n    // minimum setup\n    $('#kt_docs_maxlength_basic').maxlength({\n      warningClass: \"badge badge-primary\",\n      limitReachedClass: \"badge badge-success\"\n    });\n  };\n\n  var exampleThreshold = function exampleThreshold() {\n    // Threshold setup\n    $('#kt_docs_maxlength_threshold').maxlength({\n      threshold: 20,\n      warningClass: \"badge badge-primary\",\n      limitReachedClass: \"badge badge-success\"\n    });\n  };\n\n  var exampleAlwaysShow = function exampleAlwaysShow() {\n    // Always show setup\n    $('#kt_docs_maxlength_always_show').maxlength({\n      alwaysShow: true,\n      threshold: 20,\n      warningClass: \"badge badge-danger\",\n      limitReachedClass: \"badge badge-info\"\n    });\n  };\n\n  var exampleCustomText = function exampleCustomText() {\n    // Always show setup\n    $('#kt_docs_maxlength_custom_text').maxlength({\n      threshold: 20,\n      warningClass: \"badge badge-danger\",\n      limitReachedClass: \"badge badge-success\",\n      separator: ' of ',\n      preText: 'You have ',\n      postText: ' chars remaining.',\n      validate: true\n    });\n  };\n\n  var exampleTextarea = function exampleTextarea() {\n    // Textarea setup\n    $('#kt_docs_maxlength_textarea').maxlength({\n      warningClass: \"badge badge-primary\",\n      limitReachedClass: \"badge badge-success\"\n    });\n  };\n\n  var examplePosition = function examplePosition() {\n    // Position setup\n    $('#kt_docs_maxlength_position_top_left').maxlength({\n      placement: 'top-left',\n      warningClass: \"badge badge-danger\",\n      limitReachedClass: \"badge badge-primary\"\n    });\n    $('#kt_docs_maxlength_position_top_right').maxlength({\n      placement: 'top-right',\n      warningClass: \"badge badge-success\",\n      limitReachedClass: \"badge badge-danger\"\n    });\n    $('#kt_docs_maxlength_position_bottom_left').maxlength({\n      placement: 'bottom-left',\n      warningClass: \"badge badge-info\",\n      limitReachedClass: \"badge badge-warning\"\n    });\n    $('#kt_docs_maxlength_position_bottom_right').maxlength({\n      placement: 'bottom-right',\n      warningClass: \"badge badge-primary\",\n      limitReachedClass: \"badge badge-success\"\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleBasic();\n      exampleThreshold();\n      exampleAlwaysShow();\n      exampleCustomText();\n      exampleTextarea();\n      examplePosition();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsMaxlengthDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2Zvcm1zL2Jvb3RzdHJhcC1tYXhsZW5ndGguanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEscUJBQXFCLEdBQUcsWUFBWTtBQUNwQztBQUNBLE1BQUlDLFlBQVksR0FBRyxTQUFmQSxZQUFlLEdBQVk7QUFDM0I7QUFDQUMsSUFBQUEsQ0FBQyxDQUFDLDBCQUFELENBQUQsQ0FBOEJDLFNBQTlCLENBQXdDO0FBQ3BDQyxNQUFBQSxZQUFZLEVBQUUscUJBRHNCO0FBRXBDQyxNQUFBQSxpQkFBaUIsRUFBRTtBQUZpQixLQUF4QztBQUlILEdBTkQ7O0FBUUEsTUFBSUMsZ0JBQWdCLEdBQUcsU0FBbkJBLGdCQUFtQixHQUFZO0FBQy9CO0FBQ0FKLElBQUFBLENBQUMsQ0FBQyw4QkFBRCxDQUFELENBQWtDQyxTQUFsQyxDQUE0QztBQUN4Q0ksTUFBQUEsU0FBUyxFQUFFLEVBRDZCO0FBRXhDSCxNQUFBQSxZQUFZLEVBQUUscUJBRjBCO0FBR3hDQyxNQUFBQSxpQkFBaUIsRUFBRTtBQUhxQixLQUE1QztBQUtILEdBUEQ7O0FBU0EsTUFBSUcsaUJBQWlCLEdBQUcsU0FBcEJBLGlCQUFvQixHQUFZO0FBQ2hDO0FBQ0FOLElBQUFBLENBQUMsQ0FBQyxnQ0FBRCxDQUFELENBQW9DQyxTQUFwQyxDQUE4QztBQUMxQ00sTUFBQUEsVUFBVSxFQUFFLElBRDhCO0FBRTFDRixNQUFBQSxTQUFTLEVBQUUsRUFGK0I7QUFHMUNILE1BQUFBLFlBQVksRUFBRSxvQkFINEI7QUFJMUNDLE1BQUFBLGlCQUFpQixFQUFFO0FBSnVCLEtBQTlDO0FBTUgsR0FSRDs7QUFVQSxNQUFJSyxpQkFBaUIsR0FBRyxTQUFwQkEsaUJBQW9CLEdBQVk7QUFDaEM7QUFDQVIsSUFBQUEsQ0FBQyxDQUFDLGdDQUFELENBQUQsQ0FBb0NDLFNBQXBDLENBQThDO0FBQzFDSSxNQUFBQSxTQUFTLEVBQUUsRUFEK0I7QUFFMUNILE1BQUFBLFlBQVksRUFBRSxvQkFGNEI7QUFHMUNDLE1BQUFBLGlCQUFpQixFQUFFLHFCQUh1QjtBQUkxQ00sTUFBQUEsU0FBUyxFQUFFLE1BSitCO0FBSzFDQyxNQUFBQSxPQUFPLEVBQUUsV0FMaUM7QUFNMUNDLE1BQUFBLFFBQVEsRUFBRSxtQkFOZ0M7QUFPMUNDLE1BQUFBLFFBQVEsRUFBRTtBQVBnQyxLQUE5QztBQVNILEdBWEQ7O0FBYUEsTUFBSUMsZUFBZSxHQUFHLFNBQWxCQSxlQUFrQixHQUFZO0FBQzlCO0FBQ0FiLElBQUFBLENBQUMsQ0FBQyw2QkFBRCxDQUFELENBQWlDQyxTQUFqQyxDQUEyQztBQUN2Q0MsTUFBQUEsWUFBWSxFQUFFLHFCQUR5QjtBQUV2Q0MsTUFBQUEsaUJBQWlCLEVBQUU7QUFGb0IsS0FBM0M7QUFJSCxHQU5EOztBQVFBLE1BQUlXLGVBQWUsR0FBRyxTQUFsQkEsZUFBa0IsR0FBWTtBQUM5QjtBQUNBZCxJQUFBQSxDQUFDLENBQUMsc0NBQUQsQ0FBRCxDQUEwQ0MsU0FBMUMsQ0FBb0Q7QUFDaERjLE1BQUFBLFNBQVMsRUFBRSxVQURxQztBQUVoRGIsTUFBQUEsWUFBWSxFQUFFLG9CQUZrQztBQUdoREMsTUFBQUEsaUJBQWlCLEVBQUU7QUFINkIsS0FBcEQ7QUFNQUgsSUFBQUEsQ0FBQyxDQUFDLHVDQUFELENBQUQsQ0FBMkNDLFNBQTNDLENBQXFEO0FBQ2pEYyxNQUFBQSxTQUFTLEVBQUUsV0FEc0M7QUFFakRiLE1BQUFBLFlBQVksRUFBRSxxQkFGbUM7QUFHakRDLE1BQUFBLGlCQUFpQixFQUFFO0FBSDhCLEtBQXJEO0FBTUFILElBQUFBLENBQUMsQ0FBQyx5Q0FBRCxDQUFELENBQTZDQyxTQUE3QyxDQUF1RDtBQUNuRGMsTUFBQUEsU0FBUyxFQUFFLGFBRHdDO0FBRW5EYixNQUFBQSxZQUFZLEVBQUUsa0JBRnFDO0FBR25EQyxNQUFBQSxpQkFBaUIsRUFBRTtBQUhnQyxLQUF2RDtBQU1BSCxJQUFBQSxDQUFDLENBQUMsMENBQUQsQ0FBRCxDQUE4Q0MsU0FBOUMsQ0FBd0Q7QUFDcERjLE1BQUFBLFNBQVMsRUFBRSxjQUR5QztBQUVwRGIsTUFBQUEsWUFBWSxFQUFFLHFCQUZzQztBQUdwREMsTUFBQUEsaUJBQWlCLEVBQUU7QUFIaUMsS0FBeEQ7QUFLSCxHQXpCRDs7QUEyQkEsU0FBTztBQUNIO0FBQ0FhLElBQUFBLElBQUksRUFBRSxnQkFBWTtBQUNkakIsTUFBQUEsWUFBWTtBQUNaSyxNQUFBQSxnQkFBZ0I7QUFDaEJFLE1BQUFBLGlCQUFpQjtBQUNqQkUsTUFBQUEsaUJBQWlCO0FBQ2pCSyxNQUFBQSxlQUFlO0FBQ2ZDLE1BQUFBLGVBQWU7QUFDbEI7QUFURSxHQUFQO0FBV0gsQ0F4RjJCLEVBQTVCLEMsQ0EwRkE7OztBQUNBRyxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVk7QUFDbENwQixFQUFBQSxxQkFBcUIsQ0FBQ2tCLElBQXRCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9iYWNrZW5kL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvYm9vdHN0cmFwLW1heGxlbmd0aC5qcz8yN2VlIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGb3Jtc01heGxlbmd0aERlbW9zID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlQmFzaWMgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gbWluaW11bSBzZXR1cFxyXG4gICAgICAgICQoJyNrdF9kb2NzX21heGxlbmd0aF9iYXNpYycpLm1heGxlbmd0aCh7XHJcbiAgICAgICAgICAgIHdhcm5pbmdDbGFzczogXCJiYWRnZSBiYWRnZS1wcmltYXJ5XCIsXHJcbiAgICAgICAgICAgIGxpbWl0UmVhY2hlZENsYXNzOiBcImJhZGdlIGJhZGdlLXN1Y2Nlc3NcIlxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlVGhyZXNob2xkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vIFRocmVzaG9sZCBzZXR1cFxyXG4gICAgICAgICQoJyNrdF9kb2NzX21heGxlbmd0aF90aHJlc2hvbGQnKS5tYXhsZW5ndGgoe1xyXG4gICAgICAgICAgICB0aHJlc2hvbGQ6IDIwLFxyXG4gICAgICAgICAgICB3YXJuaW5nQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICBsaW1pdFJlYWNoZWRDbGFzczogXCJiYWRnZSBiYWRnZS1zdWNjZXNzXCJcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZUFsd2F5c1Nob3cgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gQWx3YXlzIHNob3cgc2V0dXBcclxuICAgICAgICAkKCcja3RfZG9jc19tYXhsZW5ndGhfYWx3YXlzX3Nob3cnKS5tYXhsZW5ndGgoe1xyXG4gICAgICAgICAgICBhbHdheXNTaG93OiB0cnVlLFxyXG4gICAgICAgICAgICB0aHJlc2hvbGQ6IDIwLFxyXG4gICAgICAgICAgICB3YXJuaW5nQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtZGFuZ2VyXCIsXHJcbiAgICAgICAgICAgIGxpbWl0UmVhY2hlZENsYXNzOiBcImJhZGdlIGJhZGdlLWluZm9cIlxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlQ3VzdG9tVGV4dCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAvLyBBbHdheXMgc2hvdyBzZXR1cFxyXG4gICAgICAgICQoJyNrdF9kb2NzX21heGxlbmd0aF9jdXN0b21fdGV4dCcpLm1heGxlbmd0aCh7XHJcbiAgICAgICAgICAgIHRocmVzaG9sZDogMjAsXHJcbiAgICAgICAgICAgIHdhcm5pbmdDbGFzczogXCJiYWRnZSBiYWRnZS1kYW5nZXJcIixcclxuICAgICAgICAgICAgbGltaXRSZWFjaGVkQ2xhc3M6IFwiYmFkZ2UgYmFkZ2Utc3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICBzZXBhcmF0b3I6ICcgb2YgJyxcclxuICAgICAgICAgICAgcHJlVGV4dDogJ1lvdSBoYXZlICcsXHJcbiAgICAgICAgICAgIHBvc3RUZXh0OiAnIGNoYXJzIHJlbWFpbmluZy4nLFxyXG4gICAgICAgICAgICB2YWxpZGF0ZTogdHJ1ZVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlVGV4dGFyZWEgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgLy8gVGV4dGFyZWEgc2V0dXBcclxuICAgICAgICAkKCcja3RfZG9jc19tYXhsZW5ndGhfdGV4dGFyZWEnKS5tYXhsZW5ndGgoe1xyXG4gICAgICAgICAgICB3YXJuaW5nQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICBsaW1pdFJlYWNoZWRDbGFzczogXCJiYWRnZSBiYWRnZS1zdWNjZXNzXCJcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZVBvc2l0aW9uID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vIFBvc2l0aW9uIHNldHVwXHJcbiAgICAgICAgJCgnI2t0X2RvY3NfbWF4bGVuZ3RoX3Bvc2l0aW9uX3RvcF9sZWZ0JykubWF4bGVuZ3RoKHtcclxuICAgICAgICAgICAgcGxhY2VtZW50OiAndG9wLWxlZnQnLFxyXG4gICAgICAgICAgICB3YXJuaW5nQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtZGFuZ2VyXCIsXHJcbiAgICAgICAgICAgIGxpbWl0UmVhY2hlZENsYXNzOiBcImJhZGdlIGJhZGdlLXByaW1hcnlcIlxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAkKCcja3RfZG9jc19tYXhsZW5ndGhfcG9zaXRpb25fdG9wX3JpZ2h0JykubWF4bGVuZ3RoKHtcclxuICAgICAgICAgICAgcGxhY2VtZW50OiAndG9wLXJpZ2h0JyxcclxuICAgICAgICAgICAgd2FybmluZ0NsYXNzOiBcImJhZGdlIGJhZGdlLXN1Y2Nlc3NcIixcclxuICAgICAgICAgICAgbGltaXRSZWFjaGVkQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtZGFuZ2VyXCJcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgJCgnI2t0X2RvY3NfbWF4bGVuZ3RoX3Bvc2l0aW9uX2JvdHRvbV9sZWZ0JykubWF4bGVuZ3RoKHtcclxuICAgICAgICAgICAgcGxhY2VtZW50OiAnYm90dG9tLWxlZnQnLFxyXG4gICAgICAgICAgICB3YXJuaW5nQ2xhc3M6IFwiYmFkZ2UgYmFkZ2UtaW5mb1wiLFxyXG4gICAgICAgICAgICBsaW1pdFJlYWNoZWRDbGFzczogXCJiYWRnZSBiYWRnZS13YXJuaW5nXCJcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgJCgnI2t0X2RvY3NfbWF4bGVuZ3RoX3Bvc2l0aW9uX2JvdHRvbV9yaWdodCcpLm1heGxlbmd0aCh7XHJcbiAgICAgICAgICAgIHBsYWNlbWVudDogJ2JvdHRvbS1yaWdodCcsXHJcbiAgICAgICAgICAgIHdhcm5pbmdDbGFzczogXCJiYWRnZSBiYWRnZS1wcmltYXJ5XCIsXHJcbiAgICAgICAgICAgIGxpbWl0UmVhY2hlZENsYXNzOiBcImJhZGdlIGJhZGdlLXN1Y2Nlc3NcIlxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUJhc2ljKCk7XHJcbiAgICAgICAgICAgIGV4YW1wbGVUaHJlc2hvbGQoKTtcclxuICAgICAgICAgICAgZXhhbXBsZUFsd2F5c1Nob3coKTtcclxuICAgICAgICAgICAgZXhhbXBsZUN1c3RvbVRleHQoKTtcclxuICAgICAgICAgICAgZXhhbXBsZVRleHRhcmVhKCk7XHJcbiAgICAgICAgICAgIGV4YW1wbGVQb3NpdGlvbigpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RGb3Jtc01heGxlbmd0aERlbW9zLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZvcm1zTWF4bGVuZ3RoRGVtb3MiLCJleGFtcGxlQmFzaWMiLCIkIiwibWF4bGVuZ3RoIiwid2FybmluZ0NsYXNzIiwibGltaXRSZWFjaGVkQ2xhc3MiLCJleGFtcGxlVGhyZXNob2xkIiwidGhyZXNob2xkIiwiZXhhbXBsZUFsd2F5c1Nob3ciLCJhbHdheXNTaG93IiwiZXhhbXBsZUN1c3RvbVRleHQiLCJzZXBhcmF0b3IiLCJwcmVUZXh0IiwicG9zdFRleHQiLCJ2YWxpZGF0ZSIsImV4YW1wbGVUZXh0YXJlYSIsImV4YW1wbGVQb3NpdGlvbiIsInBsYWNlbWVudCIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/forms/bootstrap-maxlength.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/forms/bootstrap-maxlength.js"]();
/******/ 	
/******/ })()
;