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

/***/ "./resources/backend/core/js/custom/apps/user-management/permissions/add-permission.js":
/*!*********************************************************************************************!*\
  !*** ./resources/backend/core/js/custom/apps/user-management/permissions/add-permission.js ***!
  \*********************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTUsersAddPermission = function () {\n  // Shared variables\n  var element = document.getElementById('kt_modal_add_permission');\n  var form = element.querySelector('#kt_modal_add_permission_form');\n  var modal = new bootstrap.Modal(element); // Init add schedule modal\n\n  var initAddPermission = function initAddPermission() {\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    var validator = FormValidation.formValidation(form, {\n      fields: {\n        'permission_name': {\n          validators: {\n            notEmpty: {\n              message: 'Permission name is required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    }); // Close button handler\n\n    var closeButton = element.querySelector('[data-kt-permissions-modal-action=\"close\"]');\n    closeButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like to close?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, close it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          modal.hide(); // Hide modal\t\t\t\t\n        }\n      });\n    }); // Cancel button handler\n\n    var cancelButton = element.querySelector('[data-kt-permissions-modal-action=\"cancel\"]');\n    cancelButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like to cancel?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, cancel it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          form.reset(); // Reset form\t\n\n          modal.hide(); // Hide modal\t\t\t\t\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Your form has not been cancelled!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    }); // Submit button handler\n\n    var submitButton = element.querySelector('[data-kt-permissions-modal-action=\"submit\"]');\n    submitButton.addEventListener('click', function (e) {\n      // Prevent default button action\n      e.preventDefault(); // Validate form before submit\n\n      if (validator) {\n        validator.validate().then(function (status) {\n          console.log('validated!');\n\n          if (status == 'Valid') {\n            // Show loading indication\n            submitButton.setAttribute('data-kt-indicator', 'on'); // Disable button to avoid multiple click \n\n            submitButton.disabled = true; // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n\n            setTimeout(function () {\n              // Remove loading indication\n              submitButton.removeAttribute('data-kt-indicator'); // Enable button\n\n              submitButton.disabled = false; // Show popup confirmation \n\n              Swal.fire({\n                text: \"Form has been successfully submitted!\",\n                icon: \"success\",\n                buttonsStyling: false,\n                confirmButtonText: \"Ok, got it!\",\n                customClass: {\n                  confirmButton: \"btn btn-primary\"\n                }\n              }).then(function (result) {\n                if (result.isConfirmed) {\n                  modal.hide();\n                }\n              }); //form.submit(); // Submit form\n            }, 2000);\n          } else {\n            // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n            Swal.fire({\n              text: \"Sorry, looks like there are some errors detected, please try again.\",\n              icon: \"error\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            });\n          }\n        });\n      }\n    });\n  };\n\n  return {\n    // Public functions\n    init: function init() {\n      initAddPermission();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTUsersAddPermission.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9hcHBzL3VzZXItbWFuYWdlbWVudC9wZXJtaXNzaW9ucy9hZGQtcGVybWlzc2lvbi5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxvQkFBb0IsR0FBRyxZQUFZO0FBQ25DO0FBQ0EsTUFBTUMsT0FBTyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IseUJBQXhCLENBQWhCO0FBQ0EsTUFBTUMsSUFBSSxHQUFHSCxPQUFPLENBQUNJLGFBQVIsQ0FBc0IsK0JBQXRCLENBQWI7QUFDQSxNQUFNQyxLQUFLLEdBQUcsSUFBSUMsU0FBUyxDQUFDQyxLQUFkLENBQW9CUCxPQUFwQixDQUFkLENBSm1DLENBTW5DOztBQUNBLE1BQUlRLGlCQUFpQixHQUFHLFNBQXBCQSxpQkFBb0IsR0FBTTtBQUUxQjtBQUNBLFFBQUlDLFNBQVMsR0FBR0MsY0FBYyxDQUFDQyxjQUFmLENBQ1pSLElBRFksRUFFWjtBQUNJUyxNQUFBQSxNQUFNLEVBQUU7QUFDSiwyQkFBbUI7QUFDZkMsVUFBQUEsVUFBVSxFQUFFO0FBQ1JDLFlBQUFBLFFBQVEsRUFBRTtBQUNOQyxjQUFBQSxPQUFPLEVBQUU7QUFESDtBQURGO0FBREc7QUFEZixPQURaO0FBV0lDLE1BQUFBLE9BQU8sRUFBRTtBQUNMQyxRQUFBQSxPQUFPLEVBQUUsSUFBSVAsY0FBYyxDQUFDTSxPQUFmLENBQXVCRSxPQUEzQixFQURKO0FBRUxaLFFBQUFBLFNBQVMsRUFBRSxJQUFJSSxjQUFjLENBQUNNLE9BQWYsQ0FBdUJHLFVBQTNCLENBQXNDO0FBQzdDQyxVQUFBQSxXQUFXLEVBQUUsU0FEZ0M7QUFFN0NDLFVBQUFBLGVBQWUsRUFBRSxFQUY0QjtBQUc3Q0MsVUFBQUEsYUFBYSxFQUFFO0FBSDhCLFNBQXRDO0FBRk47QUFYYixLQUZZLENBQWhCLENBSDBCLENBMkIxQjs7QUFDQSxRQUFNQyxXQUFXLEdBQUd2QixPQUFPLENBQUNJLGFBQVIsQ0FBc0IsNENB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QUksRUFBRSxnQkFBWTtBQUNkOUMsTUFBQUEsaUJBQWlCO0FBQ3BCO0FBSkUsR0FBUDtBQU1ILENBN0owQixFQUEzQixDLENBK0pBOzs7QUFDQStDLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBWTtBQUNsQ3pELEVBQUFBLG9CQUFvQixDQUFDdUQsSUFBckI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vYXBwcy91c2VyLW1hbmFnZW1lbnQvcGVybWlzc2lvbnMvYWRkLXBlcm1pc3Npb24uanM/YmVjYiJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtUVXNlcnNBZGRQZXJtaXNzaW9uID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gU2hhcmVkIHZhcmlhYmxlc1xyXG4gICAgY29uc3QgZWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrdF9tb2RhbF9hZGRfcGVybWlzc2lvbicpO1xyXG4gICAgY29uc3QgZm9ybSA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignI2t0X21vZGFsX2FkZF9wZXJtaXNzaW9uX2Zvcm0nKTtcclxuICAgIGNvbnN0IG1vZGFsID0gbmV3IGJvb3RzdHJhcC5Nb2RhbChlbGVtZW50KTtcclxuXHJcbiAgICAvLyBJbml0IGFkZCBzY2hlZHVsZSBtb2RhbFxyXG4gICAgdmFyIGluaXRBZGRQZXJtaXNzaW9uID0gKCkgPT4ge1xyXG5cclxuICAgICAgICAvLyBJbml0IGZvcm0gdmFsaWRhdGlvbiBydWxlcy4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgRm9ybVZhbGlkYXRpb24gcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjpodHRwczovL2Zvcm12YWxpZGF0aW9uLmlvL1xyXG4gICAgICAgIHZhciB2YWxpZGF0b3IgPSBGb3JtVmFsaWRhdGlvbi5mb3JtVmFsaWRhdGlvbihcclxuICAgICAgICAgICAgZm9ybSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgZmllbGRzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgJ3Blcm1pc3Npb25fbmFtZSc6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsaWRhdG9yczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbm90RW1wdHk6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtZXNzYWdlOiAnUGVybWlzc2lvbiBuYW1lIGlzIHJlcXVpcmVkJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIH0sXHJcblxyXG4gICAgICAgICAgICAgICAgcGx1Z2luczoge1xyXG4gICAgICAgICAgICAgICAgICAgIHRyaWdnZXI6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLlRyaWdnZXIoKSxcclxuICAgICAgICAgICAgICAgICAgICBib290c3RyYXA6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLkJvb3RzdHJhcDUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByb3dTZWxlY3RvcjogJy5mdi1yb3cnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBlbGVJbnZhbGlkQ2xhc3M6ICcnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBlbGVWYWxpZENsYXNzOiAnJ1xyXG4gICAgICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICApO1xyXG5cclxuICAgICAgICAvLyBDbG9zZSBidXR0b24gaGFuZGxlclxyXG4gICAgICAgIGNvbnN0IGNsb3NlQnV0dG9uID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1wZXJtaXNzaW9ucy1tb2RhbC1hY3Rpb249XCJjbG9zZVwiXScpO1xyXG4gICAgICAgIGNsb3NlQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZSA9PiB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICB0ZXh0OiBcIkFyZSB5b3Ugc3VyZSB5b3Ugd291bGQgbGlrZSB0byBjbG9zZT9cIixcclxuICAgICAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxyXG4gICAgICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIlllcywgY2xvc2UgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBcIk5vLCByZXR1cm5cIixcclxuICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICBjYW5jZWxCdXR0b246IFwiYnRuIGJ0bi1hY3RpdmUtbGlnaHRcIlxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcclxuICAgICAgICAgICAgICAgIGlmIChyZXN1bHQudmFsdWUpIHtcclxuICAgICAgICAgICAgICAgICAgICBtb2RhbC5oaWRlKCk7IC8vIEhpZGUgbW9kYWxcdFx0XHRcdFxyXG4gICAgICAgICAgICAgICAgfSBcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8vIENhbmNlbCBidXR0b24gaGFuZGxlclxyXG4gICAgICAgIGNvbnN0IGNhbmNlbEJ1dHRvbiA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEta3QtcGVybWlzc2lvbnMtbW9kYWwtYWN0aW9uPVwiY2FuY2VsXCJdJyk7XHJcbiAgICAgICAgY2FuY2VsQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZSA9PiB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICB0ZXh0OiBcIkFyZSB5b3Ugc3VyZSB5b3Ugd291bGQgbGlrZSB0byBjYW5jZWw/XCIsXHJcbiAgICAgICAgICAgICAgICBpY29uOiBcIndhcm5pbmdcIixcclxuICAgICAgICAgICAgICAgIHNob3dDYW5jZWxCdXR0b246IHRydWUsXHJcbiAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJZZXMsIGNhbmNlbCBpdCFcIixcclxuICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6IFwiTm8sIHJldHVyblwiLFxyXG4gICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvbjogXCJidG4gYnRuLWFjdGl2ZS1saWdodFwiXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKHJlc3VsdC52YWx1ZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGZvcm0ucmVzZXQoKTsgLy8gUmVzZXQgZm9ybVx0XHJcbiAgICAgICAgICAgICAgICAgICAgbW9kYWwuaGlkZSgpOyAvLyBIaWRlIG1vZGFsXHRcdFx0XHRcclxuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAocmVzdWx0LmRpc21pc3MgPT09ICdjYW5jZWwnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJZb3VyIGZvcm0gaGFzIG5vdCBiZWVuIGNhbmNlbGxlZCEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gU3VibWl0IGJ1dHRvbiBoYW5kbGVyXHJcbiAgICAgICAgY29uc3Qgc3VibWl0QnV0dG9uID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1wZXJtaXNzaW9ucy1tb2RhbC1hY3Rpb249XCJzdWJtaXRcIl0nKTtcclxuICAgICAgICBzdWJtaXRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAvLyBQcmV2ZW50IGRlZmF1bHQgYnV0dG9uIGFjdGlvblxyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICAvLyBWYWxpZGF0ZSBmb3JtIGJlZm9yZSBzdWJtaXRcclxuICAgICAgICAgICAgaWYgKHZhbGlkYXRvcikge1xyXG4gICAgICAgICAgICAgICAgdmFsaWRhdG9yLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbiAoc3RhdHVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ3ZhbGlkYXRlZCEnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHN0YXR1cyA9PSAnVmFsaWQnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIFNob3cgbG9hZGluZyBpbmRpY2F0aW9uXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5zZXRBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJywgJ29uJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBEaXNhYmxlIGJ1dHRvbiB0byBhdm9pZCBtdWx0aXBsZSBjbGljayBcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLmRpc2FibGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIFNpbXVsYXRlIGZvcm0gc3VibWlzc2lvbi4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjogaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gUmVtb3ZlIGxvYWRpbmcgaW5kaWNhdGlvblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLnJlbW92ZUF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBFbmFibGUgYnV0dG9uXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uZGlzYWJsZWQgPSBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBTaG93IHBvcHVwIGNvbmZpcm1hdGlvbiBcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJGb3JtIGhhcyBiZWVuIHN1Y2Nlc3NmdWxseSBzdWJtaXR0ZWQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJzdWNjZXNzXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXN1bHQuaXNDb25maXJtZWQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbW9kYWwuaGlkZSgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vZm9ybS5zdWJtaXQoKTsgLy8gU3VibWl0IGZvcm1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSwgMjAwMCk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gU2hvdyBwb3B1cCB3YXJuaW5nLiBGb3IgbW9yZSBpbmZvIGNoZWNrIHRoZSBwbHVnaW4ncyBvZmZpY2lhbCBkb2N1bWVudGF0aW9uOiBodHRwczovL3N3ZWV0YWxlcnQyLmdpdGh1Yi5pby9cclxuICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiU29ycnksIGxvb2tzIGxpa2UgdGhlcmUgYXJlIHNvbWUgZXJyb3JzIGRldGVjdGVkLCBwbGVhc2UgdHJ5IGFnYWluLlwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIGZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaW5pdEFkZFBlcm1pc3Npb24oKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcclxuICAgIEtUVXNlcnNBZGRQZXJtaXNzaW9uLmluaXQoKTtcclxufSk7Il0sIm5hbWVzIjpbIktUVXNlcnNBZGRQZXJtaXNzaW9uIiwiZWxlbWVudCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJmb3JtIiwicXVlcnlTZWxlY3RvciIsIm1vZGFsIiwiYm9vdHN0cmFwIiwiTW9kYWwiLCJpbml0QWRkUGVybWlzc2lvbiIsInZhbGlkYXRvciIsIkZvcm1WYWxpZGF0aW9uIiwiZm9ybVZhbGlkYXRpb24iLCJmaWVsZHMiLCJ2YWxpZGF0b3JzIiwibm90RW1wdHkiLCJtZXNzYWdlIiwicGx1Z2lucyIsInRyaWdnZXIiLCJUcmlnZ2VyIiwiQm9vdHN0cmFwNSIsInJvd1NlbGVjdG9yIiwiZWxlSW52YWxpZENsYXNzIiwiZWxlVmFsaWRDbGFzcyIsImNsb3NlQnV0dG9uIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJwcmV2ZW50RGVmYXVsdCIsIlN3YWwiLCJmaXJlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiYnV0dG9uc1N0eWxpbmciLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJjYW5jZWxCdXR0b24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJoaWRlIiwicmVzZXQiLCJkaXNtaXNzIiwic3VibWl0QnV0dG9uIiwidmFsaWRhdGUiLCJzdGF0dXMiLCJjb25zb2xlIiwibG9nIiwic2V0QXR0cmlidXRlIiwiZGlzYWJsZWQiLCJzZXRUaW1lb3V0IiwicmVtb3ZlQXR0cmlidXRlIiwiaXNDb25maXJtZWQiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/apps/user-management/permissions/add-permission.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/apps/user-management/permissions/add-permission.js"]();
/******/ 	
/******/ })()
;