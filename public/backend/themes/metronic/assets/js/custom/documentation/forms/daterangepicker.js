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

/***/ "./resources/backend/core/js/custom/documentation/forms/daterangepicker.js":
/*!*********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/forms/daterangepicker.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsDaterangepickerDemos = function () {\n  // Private functions\n  var example1 = function example1(element) {\n    $(\"#kt_daterangepicker_1\").daterangepicker();\n  };\n\n  var example2 = function example2(element) {\n    $(\"#kt_daterangepicker_2\").daterangepicker({\n      timePicker: true,\n      startDate: moment().startOf(\"hour\"),\n      endDate: moment().startOf(\"hour\").add(32, \"hour\"),\n      locale: {\n        format: \"M/DD hh:mm A\"\n      }\n    });\n  };\n\n  var example3 = function example3(element) {\n    $(\"#kt_daterangepicker_3\").daterangepicker({\n      singleDatePicker: true,\n      showDropdowns: true,\n      minYear: 1901,\n      maxYear: parseInt(moment().format(\"YYYY\"), 10)\n    }, function (start, end, label) {\n      var years = moment().diff(start, \"years\");\n      alert(\"You are \" + years + \" years old!\");\n    });\n  };\n\n  var example4 = function example4(element) {\n    var start = moment().subtract(29, \"days\");\n    var end = moment();\n\n    function cb(start, end) {\n      $(\"#kt_daterangepicker_4\").html(start.format(\"MMMM D, YYYY\") + \" - \" + end.format(\"MMMM D, YYYY\"));\n    }\n\n    $(\"#kt_daterangepicker_4\").daterangepicker({\n      startDate: start,\n      endDate: end,\n      ranges: {\n        \"Today\": [moment(), moment()],\n        \"Yesterday\": [moment().subtract(1, \"days\"), moment().subtract(1, \"days\")],\n        \"Last 7 Days\": [moment().subtract(6, \"days\"), moment()],\n        \"Last 30 Days\": [moment().subtract(29, \"days\"), moment()],\n        \"This Month\": [moment().startOf(\"month\"), moment().endOf(\"month\")],\n        \"Last Month\": [moment().subtract(1, \"month\").startOf(\"month\"), moment().subtract(1, \"month\").endOf(\"month\")]\n      }\n    }, cb);\n    cb(start, end);\n  };\n\n  var example5 = function example5(element) {\n    $(\"#kt_daterangepicker_5\").daterangepicker();\n  };\n\n  return {\n    // Public Functions\n    init: function init(element) {\n      example1();\n      example2();\n      example3();\n      example4();\n      example5();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsDaterangepickerDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2Zvcm1zL2RhdGVyYW5nZXBpY2tlci5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSwyQkFBMkIsR0FBRyxZQUFXO0FBQ3pDO0FBQ0EsTUFBSUMsUUFBUSxHQUFHLFNBQVhBLFFBQVcsQ0FBU0MsT0FBVCxFQUFrQjtBQUM3QkMsSUFBQUEsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJDLGVBQTNCO0FBQ0gsR0FGRDs7QUFJQSxNQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxDQUFTSCxPQUFULEVBQWtCO0FBQzdCQyxJQUFBQSxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkMsZUFBM0IsQ0FBMkM7QUFDdkNFLE1BQUFBLFVBQVUsRUFBRSxJQUQyQjtBQUV2Q0MsTUFBQUEsU0FBUyxFQUFFQyxNQUFNLEdBQUdDLE9BQVQsQ0FBaUIsTUFBakIsQ0FGNEI7QUFHdkNDLE1BQUFBLE9BQU8sRUFBRUYsTUFBTSxHQUFHQyxPQUFULENBQWlCLE1BQWpCLEVBQXlCRSxHQUF6QixDQUE2QixFQUE3QixFQUFpQyxNQUFqQyxDQUg4QjtBQUl2Q0MsTUFBQUEsTUFBTSxFQUFFO0FBQ0pDLFFBQUFBLE1BQU0sRUFBRTtBQURKO0FBSitCLEtBQTNDO0FBUUgsR0FURDs7QUFXQSxNQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBVyxDQUFTWixPQUFULEVBQWtCO0FBQzdCQyxJQUFBQSxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkMsZUFBM0IsQ0FBMkM7QUFDbkNXLE1BQUFBLGdCQUFnQixFQUFFLElBRGlCO0FBRW5DQyxNQUFBQSxhQUFhLEVBQUUsSUFGb0I7QUFHbkNDLE1BQUFBLE9BQU8sRUFBRSxJQUgwQjtBQUluQ0MsTUFBQUEsT0FBTyxFQUFFQyxRQUFRLENBQUNYLE1BQU0sR0FBR0ssTUFBVCxDQUFnQixNQUFoQixDQUFELEVBQXlCLEVBQXpCO0FBSmtCLEtBQTNDLEVBS08sVUFBU08sS0FBVCxFQUFnQkMsR0FBaEIsRUFBcUJDLEtBQXJCLEVBQTRCO0FBQzNCLFVBQUlDLEtBQUssR0FBR2YsTUFBTSxHQUFHZ0IsSUFBVCxDQUFjSixLQUFkLEVBQXFCLE9BQXJCLENBQVo7QUFDQUssTUFBQUEsS0FBSyxDQUFDLGFBQWFGLEtBQWIsR0FBcUIsYUFBdEIsQ0FBTDtBQUNILEtBUkw7QUFVSCxHQVhEOztBQWFBLE1BQUlHLFFBQVEsR0FBRyxTQUFYQSxRQUFXLENBQVN4QixPQUFULEVBQWtCO0FBQzdCLFFBQUlrQixLQUFLLEdBQUdaLE1BQU0sR0FBR21CLFFBQVQsQ0FBa0IsRUFBbEIsRUFBc0IsTUFBdEIsQ0FBWjtBQUNBLFFBQUlOLEdBQUcsR0FBR2IsTUFBTSxFQUFoQjs7QUFFQSxhQUFTb0IsRUFBVCxDQUFZUixLQUFaLEVBQW1CQyxHQUFuQixFQUF3QjtBQUNwQmxCLE1BQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCMEIsSUFBM0IsQ0FBZ0NULEtBQUssQ0FBQ1AsTUFBTixDQUFhLGNBQWIsSUFBK0IsS0FBL0IsR0FBdUNRLEdBQUcsQ0FBQ1IsTUFBSixDQUFXLGNBQVgsQ0FBdkU7QUFDSDs7QUFFRFYsSUFBQUEsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJDLGVBQTNCLENBQTJDO0FBQ3ZDRyxNQUFBQSxTQUFTLEVBQUVhLEtBRDRCO0FBRXZDVixNQUFBQSxPQUFPLEVBQUVXLEdBRjhCO0FBR3ZDUyxNQUFBQSxNQUFNLEVBQUU7QUFDUixpQkFBUyxDQUFDdEIsTUFBTSxFQUFQLEVBQVdBLE1BQU0sRUFBakIsQ0FERDtBQUVSLHFCQUFhLENBQUNBLE1BQU0sR0FBR21CLFFBQVQsQ0FBa0IsQ0FBbEIsRUFBcUIsTUFBckIsQ0FBRCxFQUErQm5CLE1BQU0sR0FBR21CLFFBQVQsQ0FBa0IsQ0FBbEIsRUFBcUIsTUFBckIsQ0FBL0IsQ0FGTDtBQUdSLHVCQUFlLENBQUNuQixNQUFNLEdBQUdtQixRQUFULENBQWtCLENBQWxCLEVBQXFCLE1BQXJCLENBQUQsRUFBK0JuQixNQUFNLEVBQXJDLENBSFA7QUFJUix3QkFBZ0IsQ0FBQ0EsTUFBTSxHQUFHbUIsUUFBVCxDQUFrQixFQUFsQixFQUFzQixNQUF0QixDQUFELEVBQWdDbkIsTUFBTSxFQUF0QyxDQUpSO0FBS1Isc0JBQWMsQ0FBQ0EsTUFBTSxHQUFHQyxPQUFULENBQWlCLE9BQWpCLENBQUQsRUFBNEJELE1BQU0sR0FBR3VCLEtBQVQsQ0FBZSxPQUFmLENBQTVCLENBTE47QUFNUixzQkFBYyxDQUFDdkIsTUFBTSxHQUFHbUIsUUFBVCxDQUFrQixDQUFsQixFQUFxQixPQUFyQixFQUE4QmxCLE9BQTlCLENBQXNDLE9BQXRDLENBQUQsRUFBaURELE1BQU0sR0FBR21CLFFBQVQsQ0FBa0IsQ0FBbEIsRUFBcUIsT0FBckIsRUFBOEJJLEtBQTlCLENBQW9DLE9BQXBDLENBQWpEO0FBTk47QUFIK0IsS0FBM0MsRUFXR0gsRUFYSDtBQWFBQSxJQUFBQSxFQUFFLENBQUNSLEtBQUQsRUFBUUMsR0FBUixDQUFGO0FBQ0gsR0F0QkQ7O0FBd0JBLE1BQUlXLFFBQVEsR0FBRyxTQUFYQSxRQUFXLENBQVM5QixPQUFULEVBQWtCO0FBQzdCQyxJQUFBQSxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkMsZUFBM0I7QUFDSCxHQUZEOztBQUlBLFNBQU87QUFDSDtBQUNBNkIsSUFBQUEsSUFBSSxFQUFFLGNBQVMvQixPQUFULEVBQWtCO0FBQ3BCRCxNQUFBQSxRQUFRO0FBQ1JJLE1BQUFBLFFBQVE7QUFDUlMsTUFBQUEsUUFBUTtBQUNSWSxNQUFBQSxRQUFRO0FBQ1JNLE1BQUFBLFFBQVE7QUFDWDtBQVJFLEdBQVA7QUFVSCxDQXBFaUMsRUFBbEMsQyxDQXNFQTs7O0FBQ0FFLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBVztBQUNqQ25DLEVBQUFBLDJCQUEyQixDQUFDaUMsSUFBNUI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9mb3Jtcy9kYXRlcmFuZ2VwaWNrZXIuanM/MDdmYyJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtURm9ybXNEYXRlcmFuZ2VwaWNrZXJEZW1vcyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlMSA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcclxuICAgICAgICAkKFwiI2t0X2RhdGVyYW5nZXBpY2tlcl8xXCIpLmRhdGVyYW5nZXBpY2tlcigpO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBleGFtcGxlMiA9IGZ1bmN0aW9uKGVsZW1lbnQpIHtcclxuICAgICAgICAkKFwiI2t0X2RhdGVyYW5nZXBpY2tlcl8yXCIpLmRhdGVyYW5nZXBpY2tlcih7XHJcbiAgICAgICAgICAgIHRpbWVQaWNrZXI6IHRydWUsXHJcbiAgICAgICAgICAgIHN0YXJ0RGF0ZTogbW9tZW50KCkuc3RhcnRPZihcImhvdXJcIiksXHJcbiAgICAgICAgICAgIGVuZERhdGU6IG1vbWVudCgpLnN0YXJ0T2YoXCJob3VyXCIpLmFkZCgzMiwgXCJob3VyXCIpLFxyXG4gICAgICAgICAgICBsb2NhbGU6IHtcclxuICAgICAgICAgICAgICAgIGZvcm1hdDogXCJNL0REIGhoOm1tIEFcIlxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgdmFyIGV4YW1wbGUzID0gZnVuY3Rpb24oZWxlbWVudCkge1xyXG4gICAgICAgICQoXCIja3RfZGF0ZXJhbmdlcGlja2VyXzNcIikuZGF0ZXJhbmdlcGlja2VyKHtcclxuICAgICAgICAgICAgICAgIHNpbmdsZURhdGVQaWNrZXI6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBzaG93RHJvcGRvd25zOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgbWluWWVhcjogMTkwMSxcclxuICAgICAgICAgICAgICAgIG1heFllYXI6IHBhcnNlSW50KG1vbWVudCgpLmZvcm1hdChcIllZWVlcIiksMTApXHJcbiAgICAgICAgICAgIH0sIGZ1bmN0aW9uKHN0YXJ0LCBlbmQsIGxhYmVsKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgeWVhcnMgPSBtb21lbnQoKS5kaWZmKHN0YXJ0LCBcInllYXJzXCIpO1xyXG4gICAgICAgICAgICAgICAgYWxlcnQoXCJZb3UgYXJlIFwiICsgeWVhcnMgKyBcIiB5ZWFycyBvbGQhXCIpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTQgPSBmdW5jdGlvbihlbGVtZW50KSB7XHJcbiAgICAgICAgdmFyIHN0YXJ0ID0gbW9tZW50KCkuc3VidHJhY3QoMjksIFwiZGF5c1wiKTtcclxuICAgICAgICB2YXIgZW5kID0gbW9tZW50KCk7XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGNiKHN0YXJ0LCBlbmQpIHtcclxuICAgICAgICAgICAgJChcIiNrdF9kYXRlcmFuZ2VwaWNrZXJfNFwiKS5odG1sKHN0YXJ0LmZvcm1hdChcIk1NTU0gRCwgWVlZWVwiKSArIFwiIC0gXCIgKyBlbmQuZm9ybWF0KFwiTU1NTSBELCBZWVlZXCIpKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgICQoXCIja3RfZGF0ZXJhbmdlcGlja2VyXzRcIikuZGF0ZXJhbmdlcGlja2VyKHtcclxuICAgICAgICAgICAgc3RhcnREYXRlOiBzdGFydCxcclxuICAgICAgICAgICAgZW5kRGF0ZTogZW5kLFxyXG4gICAgICAgICAgICByYW5nZXM6IHtcclxuICAgICAgICAgICAgXCJUb2RheVwiOiBbbW9tZW50KCksIG1vbWVudCgpXSxcclxuICAgICAgICAgICAgXCJZZXN0ZXJkYXlcIjogW21vbWVudCgpLnN1YnRyYWN0KDEsIFwiZGF5c1wiKSwgbW9tZW50KCkuc3VidHJhY3QoMSwgXCJkYXlzXCIpXSxcclxuICAgICAgICAgICAgXCJMYXN0IDcgRGF5c1wiOiBbbW9tZW50KCkuc3VidHJhY3QoNiwgXCJkYXlzXCIpLCBtb21lbnQoKV0sXHJcbiAgICAgICAgICAgIFwiTGFzdCAzMCBEYXlzXCI6IFttb21lbnQoKS5zdWJ0cmFjdCgyOSwgXCJkYXlzXCIpLCBtb21lbnQoKV0sXHJcbiAgICAgICAgICAgIFwiVGhpcyBNb250aFwiOiBbbW9tZW50KCkuc3RhcnRPZihcIm1vbnRoXCIpLCBtb21lbnQoKS5lbmRPZihcIm1vbnRoXCIpXSxcclxuICAgICAgICAgICAgXCJMYXN0IE1vbnRoXCI6IFttb21lbnQoKS5zdWJ0cmFjdCgxLCBcIm1vbnRoXCIpLnN0YXJ0T2YoXCJtb250aFwiKSwgbW9tZW50KCkuc3VidHJhY3QoMSwgXCJtb250aFwiKS5lbmRPZihcIm1vbnRoXCIpXVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSwgY2IpO1xyXG5cclxuICAgICAgICBjYihzdGFydCwgZW5kKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgZXhhbXBsZTUgPSBmdW5jdGlvbihlbGVtZW50KSB7XHJcbiAgICAgICAgJChcIiNrdF9kYXRlcmFuZ2VwaWNrZXJfNVwiKS5kYXRlcmFuZ2VwaWNrZXIoKTtcclxuICAgIH0gICAgXHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oZWxlbWVudCkge1xyXG4gICAgICAgICAgICBleGFtcGxlMSgpO1xyXG4gICAgICAgICAgICBleGFtcGxlMigpO1xyXG4gICAgICAgICAgICBleGFtcGxlMygpO1xyXG4gICAgICAgICAgICBleGFtcGxlNCgpO1xyXG4gICAgICAgICAgICBleGFtcGxlNSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEZvcm1zRGF0ZXJhbmdlcGlja2VyRGVtb3MuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURm9ybXNEYXRlcmFuZ2VwaWNrZXJEZW1vcyIsImV4YW1wbGUxIiwiZWxlbWVudCIsIiQiLCJkYXRlcmFuZ2VwaWNrZXIiLCJleGFtcGxlMiIsInRpbWVQaWNrZXIiLCJzdGFydERhdGUiLCJtb21lbnQiLCJzdGFydE9mIiwiZW5kRGF0ZSIsImFkZCIsImxvY2FsZSIsImZvcm1hdCIsImV4YW1wbGUzIiwic2luZ2xlRGF0ZVBpY2tlciIsInNob3dEcm9wZG93bnMiLCJtaW5ZZWFyIiwibWF4WWVhciIsInBhcnNlSW50Iiwic3RhcnQiLCJlbmQiLCJsYWJlbCIsInllYXJzIiwiZGlmZiIsImFsZXJ0IiwiZXhhbXBsZTQiLCJzdWJ0cmFjdCIsImNiIiwiaHRtbCIsInJhbmdlcyIsImVuZE9mIiwiZXhhbXBsZTUiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/forms/daterangepicker.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/forms/daterangepicker.js"]();
/******/ 	
/******/ })()
;