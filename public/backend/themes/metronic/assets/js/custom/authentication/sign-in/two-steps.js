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

/***/ "./resources/backend/core/js/custom/authentication/sign-in/two-steps.js":
/*!******************************************************************************!*\
  !*** ./resources/backend/core/js/custom/authentication/sign-in/two-steps.js ***!
  \******************************************************************************/
/***/ (() => {

eval(" // Class Definition\n\nvar KTSigninTwoSteps = function () {\n  // Elements\n  var form;\n  var submitButton; // Handle form\n\n  var handleForm = function handleForm(e) {\n    // Handle form submit\n    submitButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      var validated = true;\n      var inputs = [].slice.call(form.querySelectorAll('input[maxlength=\"1\"]'));\n      inputs.map(function (input) {\n        if (input.value === '' || input.value.length === 0) {\n          validated = false;\n        }\n      });\n\n      if (validated === true) {\n        // Show loading indication\n        submitButton.setAttribute('data-kt-indicator', 'on'); // Disable button to avoid multiple click \n\n        submitButton.disabled = true; // Simulate ajax request\n\n        setTimeout(function () {\n          // Hide loading indication\n          submitButton.removeAttribute('data-kt-indicator'); // Enable button\n\n          submitButton.disabled = false; // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n\n          Swal.fire({\n            text: \"You have been successfully verified!\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          }).then(function (result) {\n            if (result.isConfirmed) {\n              inputs.map(function (input) {\n                input.value = '';\n              });\n              var redirectUrl = form.getAttribute('data-kt-redirect-url');\n\n              if (redirectUrl) {\n                location.href = redirectUrl;\n              }\n            }\n          });\n        }, 1000);\n      } else {\n        swal.fire({\n          text: \"Please enter valid securtiy code and try again.\",\n          icon: \"error\",\n          buttonsStyling: false,\n          confirmButtonText: \"Ok, got it!\",\n          customClass: {\n            confirmButton: \"btn fw-bold btn-light-primary\"\n          }\n        }).then(function () {\n          KTUtil.scrollTop();\n        });\n      }\n    });\n  }; // Public functions\n\n\n  return {\n    // Initialization\n    init: function init() {\n      form = document.querySelector('#kt_sing_in_two_steps_form');\n      submitButton = document.querySelector('#kt_sing_in_two_steps_submit');\n      handleForm();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTSigninTwoSteps.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9hdXRoZW50aWNhdGlvbi9zaWduLWluL3R3by1zdGVwcy5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxnQkFBZ0IsR0FBRyxZQUFXO0FBQzlCO0FBQ0EsTUFBSUMsSUFBSjtBQUNBLE1BQUlDLFlBQUosQ0FIOEIsQ0FLOUI7O0FBQ0EsTUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQWEsQ0FBU0MsQ0FBVCxFQUFZO0FBQ3pCO0FBQ0FGLElBQUFBLFlBQVksQ0FBQ0csZ0JBQWIsQ0FBOEIsT0FBOUIsRUFBdUMsVUFBVUQsQ0FBVixFQUFhO0FBQ2hEQSxNQUFBQSxDQUFDLENBQUNFLGNBQUY7QUFFQSxVQUFJQyxTQUFTLEdBQUcsSUFBaEI7QUFFQSxVQUFJQyxNQUFNLEdBQUcsR0FBR0MsS0FBSCxDQUFTQyxJQUFULENBQWNULElBQUksQ0FBQ1UsZ0JBQUwsQ0FBc0Isc0JBQXRCLENBQWQsQ0FBYjtBQUNBSCxNQUFBQSxNQUFNLENBQUNJLEdBQVAsQ0FBVyxVQUFVQyxLQUFWLEVBQWlCO0FBQ3hCLFlBQUlBLEtBQUssQ0FBQ0MsS0FBTixLQUFnQixFQUFoQixJQUFzQkQsS0FBSyxDQUFDQyxLQUFOLENBQVlDLE1BQVosS0FBdUIsQ0FBakQsRUFBb0Q7QUFDaERSLFVBQUFBLFNBQVMsR0FBRyxLQUFaO0FBQ0g7QUFDSixPQUpEOztBQU1BLFVBQUlBLFNBQVMsS0FBSyxJQUFsQixFQUF3QjtBQUNwQjtBQUNBTCxRQUFBQSxZQUFZLENBQUNjLFlBQWIsQ0FBMEIsbUJBQTFCLEVBQStDLElBQS9DLEVBRm9CLENBSXBCOztBQUNBZCxRQUFBQSxZQUFZLENBQUNlLFFBQWIsR0FBd0IsSUFBeEIsQ0FMb0IsQ0FPcEI7O0FBQ0FDLFFBQUFBLFVBQVUsQ0FBQyxZQUFXO0FBQ2xCO0FBQ0FoQixVQUFBQSxZQUFZLENBQUNpQixlQUFiLENBQTZCLG1CQUE3QixFQUZrQixDQUlsQjs7QUFDQWpCLFVBQUFBLFlBQVksQ0FBQ2UsUUFBYixHQUF3QixLQUF4QixDQUxrQixDQU9sQjs7QUFDQUcsVUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsWUFBQUEsSUFBSSxFQUFFLHNDQURBO0FBRU5DLFlBQUFBLElBQUksRUFBRSxTQUZBO0FBR05DLFlBQUFBLGNBQWMsRUFBRSxLQUhWO0FBSU5DLFlBQUFBLGlCQUFpQixFQUFFLGFBSmI7QUFLTkMsWUFBQUEsV0FBVyxFQUFFO0FBQ1RDLGNBQUFBLGFBQWEsRUFBRTtBQUROO0FBTFAsV0FBVixFQVFHQyxJQVJILENBUVEsVUFBVUMsTUFBVixFQUFrQjtBQUN0QixnQkFBSUEsTUFBTSxDQUFDQyxXQUFYLEVBQXdCO0FBQ3BCdEIsY0FBQUEsTUFBTSxDQUFDSSxHQUFQLENBQVcsVUFBVUMsS0FBVixFQUFpQjtBQUN4QkEsZ0JBQUFBLEtBQUssQ0FBQ0MsS0FBTixHQUFjLEVBQWQ7QUFDSCxlQUZEO0FBSUEsa0JBQUlpQixXQUFXLEdBQUc5QixJQUFJLENBQUMrQixZQUFMLENBQWtCLHNCQUFsQixDQUFsQjs7QUFDQSxrQkFBSUQsV0FBSixFQUFpQjtBQUNiRSxnQkFBQUEsUUFBUSxDQUFDQyxJQUFULEdBQWdCSCxXQUFoQjtBQUNIO0FBQ0o7QUFDSixXQW5CRDtBQW9CSCxTQTVCUyxFQTRCUCxJQTVCTyxDQUFWO0FBNkJILE9BckNELE1BcUNPO0FBQ0hJLFFBQUFBLElBQUksQ0FBQ2QsSUFBTCxDQUFVO0FBQ05DLFVBQUFBLElBQUksRUFBRSxpREFEQTtBQUVOQyxVQUFBQSxJQUFJLEVBQUUsT0FGQTtBQUdOQyxVQUFBQSxjQUFjLEVBQUUsS0FIVjtBQUlOQyxVQUFBQSxpQkFBaUIsRUFBRSxhQUpiO0FBS05DLFVBQUFBLFdBQVcsRUFBRTtBQUNUQyxZQUFBQSxhQUFhLEVBQUU7QUFETjtBQUxQLFNBQVYsRUFRR0MsSUFSSCxDQVFRLFlBQVc7QUFDZlEsVUFBQUEsTUFBTSxDQUFDQyxTQUFQO0FBQ0gsU0FWRDtBQVdIO0FBQ0osS0E5REQ7QUErREgsR0FqRUQsQ0FOOEIsQ0F5RTlCOzs7QUFDQSxTQUFPO0FBQ0g7QUFDQUMsSUFBQUEsSUFBSSxFQUFFLGdCQUFXO0FBQ2JyQyxNQUFBQSxJQUFJLEdBQUdzQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsNEJBQXZCLENBQVA7QUFDQXRDLE1BQUFBLFlBQVksR0FBR3FDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qiw4QkFBdkIsQ0FBZjtBQUVBckMsTUFBQUEsVUFBVTtBQUNiO0FBUEUsR0FBUDtBQVNILENBbkZzQixFQUF2QixDLENBcUZBOzs7QUFDQWlDLE1BQU0sQ0FBQ0ssa0JBQVAsQ0FBMEIsWUFBVztBQUNqQ3pDLEVBQUFBLGdCQUFnQixDQUFDc0MsSUFBakI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vYXV0aGVudGljYXRpb24vc2lnbi1pbi90d28tc3RlcHMuanM/NTlhOCJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIERlZmluaXRpb25cclxudmFyIEtUU2lnbmluVHdvU3RlcHMgPSBmdW5jdGlvbigpIHtcclxuICAgIC8vIEVsZW1lbnRzXHJcbiAgICB2YXIgZm9ybTtcclxuICAgIHZhciBzdWJtaXRCdXR0b247XHJcblxyXG4gICAgLy8gSGFuZGxlIGZvcm1cclxuICAgIHZhciBoYW5kbGVGb3JtID0gZnVuY3Rpb24oZSkgeyAgICAgICAgXHJcbiAgICAgICAgLy8gSGFuZGxlIGZvcm0gc3VibWl0XHJcbiAgICAgICAgc3VibWl0QnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgdmFyIHZhbGlkYXRlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICB2YXIgaW5wdXRzID0gW10uc2xpY2UuY2FsbChmb3JtLnF1ZXJ5U2VsZWN0b3JBbGwoJ2lucHV0W21heGxlbmd0aD1cIjFcIl0nKSk7XHJcbiAgICAgICAgICAgIGlucHV0cy5tYXAoZnVuY3Rpb24gKGlucHV0KSB7XHJcbiAgICAgICAgICAgICAgICBpZiAoaW5wdXQudmFsdWUgPT09ICcnIHx8IGlucHV0LnZhbHVlLmxlbmd0aCA9PT0gMCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHZhbGlkYXRlZCA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIGlmICh2YWxpZGF0ZWQgPT09IHRydWUpIHtcclxuICAgICAgICAgICAgICAgIC8vIFNob3cgbG9hZGluZyBpbmRpY2F0aW9uXHJcbiAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uc2V0QXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicsICdvbicpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIERpc2FibGUgYnV0dG9uIHRvIGF2b2lkIG11bHRpcGxlIGNsaWNrIFxyXG4gICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLmRpc2FibGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyBTaW11bGF0ZSBhamF4IHJlcXVlc3RcclxuICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gSGlkZSBsb2FkaW5nIGluZGljYXRpb25cclxuICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24ucmVtb3ZlQXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvLyBFbmFibGUgYnV0dG9uXHJcbiAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vIFNob3cgbWVzc2FnZSBwb3B1cC4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjogaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vXHJcbiAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJZb3UgaGF2ZSBiZWVuIHN1Y2Nlc3NmdWxseSB2ZXJpZmllZCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJzdWNjZXNzXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzdWx0LmlzQ29uZmlybWVkKSB7IFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRzLm1hcChmdW5jdGlvbiAoaW5wdXQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbnB1dC52YWx1ZSA9ICcnO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFyIHJlZGlyZWN0VXJsID0gZm9ybS5nZXRBdHRyaWJ1dGUoJ2RhdGEta3QtcmVkaXJlY3QtdXJsJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVkaXJlY3RVcmwpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5ocmVmID0gcmVkaXJlY3RVcmw7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIH0sIDEwMDApOyBcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJQbGVhc2UgZW50ZXIgdmFsaWQgc2VjdXJ0aXkgY29kZSBhbmQgdHJ5IGFnYWluLlwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBmdy1ib2xkIGJ0bi1saWdodC1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIEtUVXRpbC5zY3JvbGxUb3AoKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgLy8gUHVibGljIGZ1bmN0aW9uc1xyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBJbml0aWFsaXphdGlvblxyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBmb3JtID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X3NpbmdfaW5fdHdvX3N0ZXBzX2Zvcm0nKTtcclxuICAgICAgICAgICAgc3VibWl0QnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X3NpbmdfaW5fdHdvX3N0ZXBzX3N1Ym1pdCcpO1xyXG5cclxuICAgICAgICAgICAgaGFuZGxlRm9ybSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVFNpZ25pblR3b1N0ZXBzLmluaXQoKTtcclxufSk7Il0sIm5hbWVzIjpbIktUU2lnbmluVHdvU3RlcHMiLCJmb3JtIiwic3VibWl0QnV0dG9uIiwiaGFuZGxlRm9ybSIsImUiLCJhZGRFdmVudExpc3RlbmVyIiwicHJldmVudERlZmF1bHQiLCJ2YWxpZGF0ZWQiLCJpbnB1dHMiLCJzbGljZSIsImNhbGwiLCJxdWVyeVNlbGVjdG9yQWxsIiwibWFwIiwiaW5wdXQiLCJ2YWx1ZSIsImxlbmd0aCIsInNldEF0dHJpYnV0ZSIsImRpc2FibGVkIiwic2V0VGltZW91dCIsInJlbW92ZUF0dHJpYnV0ZSIsIlN3YWwiLCJmaXJlIiwidGV4dCIsImljb24iLCJidXR0b25zU3R5bGluZyIsImNvbmZpcm1CdXR0b25UZXh0IiwiY3VzdG9tQ2xhc3MiLCJjb25maXJtQnV0dG9uIiwidGhlbiIsInJlc3VsdCIsImlzQ29uZmlybWVkIiwicmVkaXJlY3RVcmwiLCJnZXRBdHRyaWJ1dGUiLCJsb2NhdGlvbiIsImhyZWYiLCJzd2FsIiwiS1RVdGlsIiwic2Nyb2xsVG9wIiwiaW5pdCIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/authentication/sign-in/two-steps.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/authentication/sign-in/two-steps.js"]();
/******/ 	
/******/ })()
;