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

/***/ "./resources/backend/core/js/custom/documentation/general/toastr.js":
/*!**************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/general/toastr.js ***!
  \**************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTGeneralToastr = function () {\n  // Private functions\n  var example1 = function example1() {\n    var i = -1;\n    var toastCount = 0;\n    var $toastlast;\n\n    var getMessage = function getMessage() {\n      var msgs = ['New order has been placed!', 'Are you the six fingered man?', 'Inconceivable!', 'I do not think that means what you think it means.', 'Have fun storming the castle!'];\n      i++;\n\n      if (i === msgs.length) {\n        i = 0;\n      }\n\n      return msgs[i];\n    };\n\n    var getMessageWithClearButton = function getMessageWithClearButton(msg) {\n      msg = msg ? msg : 'Clear itself?';\n      msg += '<br /><br /><button type=\"button\" class=\"btn btn-outline-light btn-sm\">Yes</button>';\n      return msg;\n    };\n\n    $('#showtoast').on('click', function () {\n      var shortCutFunction = $(\"#toastTypeGroup input:radio:checked\").val();\n      var msg = $('#message').val();\n      var title = $('#title').val() || '';\n      var $showDuration = $('#showDuration');\n      var $hideDuration = $('#hideDuration');\n      var $timeOut = $('#timeOut');\n      var $extendedTimeOut = $('#extendedTimeOut');\n      var $showEasing = $('#showEasing');\n      var $hideEasing = $('#hideEasing');\n      var $showMethod = $('#showMethod');\n      var $hideMethod = $('#hideMethod');\n      var toastIndex = toastCount++;\n      var addClear = $('#addClear').prop('checked');\n      toastr.options = {\n        closeButton: $('#closeButton').prop('checked'),\n        debug: $('#debugInfo').prop('checked'),\n        newestOnTop: $('#newestOnTop').prop('checked'),\n        progressBar: $('#progressBar').prop('checked'),\n        positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',\n        preventDuplicates: $('#preventDuplicates').prop('checked'),\n        onclick: null\n      };\n\n      if ($('#addBehaviorOnToastClick').prop('checked')) {\n        toastr.options.onclick = function () {\n          alert('You can perform some custom action after a toast goes away');\n        };\n      }\n\n      if ($showDuration.val().length) {\n        toastr.options.showDuration = $showDuration.val();\n      }\n\n      if ($hideDuration.val().length) {\n        toastr.options.hideDuration = $hideDuration.val();\n      }\n\n      if ($timeOut.val().length) {\n        toastr.options.timeOut = addClear ? 0 : $timeOut.val();\n      }\n\n      if ($extendedTimeOut.val().length) {\n        toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();\n      }\n\n      if ($showEasing.val().length) {\n        toastr.options.showEasing = $showEasing.val();\n      }\n\n      if ($hideEasing.val().length) {\n        toastr.options.hideEasing = $hideEasing.val();\n      }\n\n      if ($showMethod.val().length) {\n        toastr.options.showMethod = $showMethod.val();\n      }\n\n      if ($hideMethod.val().length) {\n        toastr.options.hideMethod = $hideMethod.val();\n      }\n\n      if (addClear) {\n        msg = getMessageWithClearButton(msg);\n        toastr.options.tapToDismiss = false;\n      }\n\n      if (!msg) {\n        msg = getMessage();\n      }\n\n      $('#toastrOptions').text('toastr.options = ' + JSON.stringify(toastr.options, null, 2) + ';' + '\\n\\ntoastr.' + shortCutFunction + '(\"' + msg + (title ? '\", \"' + title : '') + '\");');\n      var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists\n\n      $toastlast = $toast;\n\n      if (typeof $toast === 'undefined') {\n        return;\n      }\n\n      if ($toast.find('#okBtn').length) {\n        $toast.delegate('#okBtn', 'click', function () {\n          alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');\n          $toast.remove();\n        });\n      }\n\n      if ($toast.find('#surpriseBtn').length) {\n        $toast.delegate('#surpriseBtn', 'click', function () {\n          alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');\n        });\n      }\n\n      if ($toast.find('.clear').length) {\n        $toast.delegate('.clear', 'click', function () {\n          toastr.clear($toast, {\n            force: true\n          });\n        });\n      }\n    });\n\n    function getLastToast() {\n      return $toastlast;\n    }\n\n    $('#clearlasttoast').on('click', function () {\n      toastr.clear(getLastToast());\n    });\n    $('#cleartoasts').on('click', function () {\n      toastr.clear();\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      example1();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralToastr.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvdG9hc3RyLmpzLmpzIiwibWFwcGluZ3MiOiJDQUVBOztBQUNBLElBQUlBLGVBQWUsR0FBRyxZQUFXO0FBQzdCO0FBQ0EsTUFBSUMsUUFBUSxHQUFHLFNBQVhBLFFBQVcsR0FBVztBQUN0QixRQUFJQyxDQUFDLEdBQUcsQ0FBQyxDQUFUO0FBQ0EsUUFBSUMsVUFBVSxHQUFHLENBQWpCO0FBQ0EsUUFBSUMsVUFBSjs7QUFFQSxRQUFJQyxVQUFVLEdBQUcsU0FBYkEsVUFBYSxHQUFZO0FBQ3pCLFVBQUlDLElBQUksR0FBRyxDQUNQLDRCQURPLEVBRVAsK0JBRk8sRUFHUCxnQkFITyxFQUlQLG9EQUpPLEVBS1AsK0JBTE8sQ0FBWDtBQU9BSixNQUFBQSxDQUFDOztBQUNELFVBQUlBLENBQUMsS0FBS0ksSUFBSSxDQUFDQyxNQUFmLEVBQXVCO0FBQ25CTCxRQUFBQSxDQUFDLEdBQUcsQ0FBSjtBQUNIOztBQUVELGFBQU9JLElBQUksQ0FBQ0osQ0FBRCxDQUFYO0FBQ0gsS0FkRDs7QUFnQkEsUUFBSU0seUJBQXlCLEdBQUcsU0FBNUJBLHlCQUE0QixDQUFVQyxHQUFWLEVBQWU7QUFDM0NBLE1BQUFBLEdBQUcsR0FBR0EsR0FBRyxHQUFHQSxHQUFILEdBQVMsZUFBbEI7QUFDQUEsTUFBQUEsR0FBRyxJQUFJLHFGQUFQO0FBQ0EsYUFBT0EsR0FBUDtBQUNILEtBSkQ7O0FBTUFDLElBQUFBLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JDLEVBQWhCLENBQW1CLE9BQW5CLEVBQTRCLFlBQVk7QUFDcEMsVUFBSUMsZ0JBQWdCLEdBQUdGLENBQUMsQ0FBQyxxQ0FBRCxDQUFELENBQXlDRyxHQUF6QyxFQUF2QjtBQUNBLFVBQUlKLEdBQUcsR0FBR0MsQ0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjRyxHQUFkLEVBQVY7QUFDQSxVQUFJQyxLQUFLLEdBQUdKLENBQUMsQ0FBQyxRQUFE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QUFDSCxLQUZEO0FBR0E1QyxJQUFBQSxDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCQyxFQUFsQixDQUFxQixPQUFyQixFQUE4QixZQUFZO0FBQ3RDZSxNQUFBQSxNQUFNLENBQUMwQixLQUFQO0FBQ0gsS0FGRDtBQUdILEdBaEpEOztBQWtKQSxTQUFPO0FBQ0g7QUFDQUcsSUFBQUEsSUFBSSxFQUFFLGdCQUFXO0FBQ2J0RCxNQUFBQSxRQUFRO0FBQ1g7QUFKRSxHQUFQO0FBTUgsQ0ExSnFCLEVBQXRCLEMsQ0E0SkE7OztBQUNBdUQsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDekQsRUFBQUEsZUFBZSxDQUFDdUQsSUFBaEI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9nZW5lcmFsL3RvYXN0ci5qcz9hYTM0Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RHZW5lcmFsVG9hc3RyID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGUxID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdmFyIGkgPSAtMTtcclxuICAgICAgICB2YXIgdG9hc3RDb3VudCA9IDA7XHJcbiAgICAgICAgdmFyICR0b2FzdGxhc3Q7XHJcblxyXG4gICAgICAgIHZhciBnZXRNZXNzYWdlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICB2YXIgbXNncyA9IFtcclxuICAgICAgICAgICAgICAgICdOZXcgb3JkZXIgaGFzIGJlZW4gcGxhY2VkIScsXHJcbiAgICAgICAgICAgICAgICAnQXJlIHlvdSB0aGUgc2l4IGZpbmdlcmVkIG1hbj8nLFxyXG4gICAgICAgICAgICAgICAgJ0luY29uY2VpdmFibGUhJyxcclxuICAgICAgICAgICAgICAgICdJIGRvIG5vdCB0aGluayB0aGF0IG1lYW5zIHdoYXQgeW91IHRoaW5rIGl0IG1lYW5zLicsXHJcbiAgICAgICAgICAgICAgICAnSGF2ZSBmdW4gc3Rvcm1pbmcgdGhlIGNhc3RsZSEnXHJcbiAgICAgICAgICAgIF07XHJcbiAgICAgICAgICAgIGkrKztcclxuICAgICAgICAgICAgaWYgKGkgPT09IG1zZ3MubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICBpID0gMDtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgcmV0dXJuIG1zZ3NbaV07XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgdmFyIGdldE1lc3NhZ2VXaXRoQ2xlYXJCdXR0b24gPSBmdW5jdGlvbiAobXNnKSB7XHJcbiAgICAgICAgICAgIG1zZyA9IG1zZyA/IG1zZyA6ICdDbGVhciBpdHNlbGY/JztcclxuICAgICAgICAgICAgbXNnICs9ICc8YnIgLz48YnIgLz48YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImJ0biBidG4tb3V0bGluZS1saWdodCBidG4tc21cIj5ZZXM8L2J1dHRvbj4nO1xyXG4gICAgICAgICAgICByZXR1cm4gbXNnO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgICQoJyNzaG93dG9hc3QnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHZhciBzaG9ydEN1dEZ1bmN0aW9uID0gJChcIiN0b2FzdFR5cGVHcm91cCBpbnB1dDpyYWRpbzpjaGVja2VkXCIpLnZhbCgpO1xyXG4gICAgICAgICAgICB2YXIgbXNnID0gJCgnI21lc3NhZ2UnKS52YWwoKTtcclxuICAgICAgICAgICAgdmFyIHRpdGxlID0gJCgnI3RpdGxlJykudmFsKCkgfHwgJyc7XHJcbiAgICAgICAgICAgIHZhciAkc2hvd0R1cmF0aW9uID0gJCgnI3Nob3dEdXJhdGlvbicpO1xyXG4gICAgICAgICAgICB2YXIgJGhpZGVEdXJhdGlvbiA9ICQoJyNoaWRlRHVyYXRpb24nKTtcclxuICAgICAgICAgICAgdmFyICR0aW1lT3V0ID0gJCgnI3RpbWVPdXQnKTtcclxuICAgICAgICAgICAgdmFyICRleHRlbmRlZFRpbWVPdXQgPSAkKCcjZXh0ZW5kZWRUaW1lT3V0Jyk7XHJcbiAgICAgICAgICAgIHZhciAkc2hvd0Vhc2luZyA9ICQoJyNzaG93RWFzaW5nJyk7XHJcbiAgICAgICAgICAgIHZhciAkaGlkZUVhc2luZyA9ICQoJyNoaWRlRWFzaW5nJyk7XHJcbiAgICAgICAgICAgIHZhciAkc2hvd01ldGhvZCA9ICQoJyNzaG93TWV0aG9kJyk7XHJcbiAgICAgICAgICAgIHZhciAkaGlkZU1ldGhvZCA9ICQoJyNoaWRlTWV0aG9kJyk7XHJcbiAgICAgICAgICAgIHZhciB0b2FzdEluZGV4ID0gdG9hc3RDb3VudCsrO1xyXG4gICAgICAgICAgICB2YXIgYWRkQ2xlYXIgPSAkKCcjYWRkQ2xlYXInKS5wcm9wKCdjaGVja2VkJyk7XHJcblxyXG4gICAgICAgICAgICB0b2FzdHIub3B0aW9ucyA9IHtcclxuICAgICAgICAgICAgICAgIGNsb3NlQnV0dG9uOiAkKCcjY2xvc2VCdXR0b24nKS5wcm9wKCdjaGVja2VkJyksXHJcbiAgICAgICAgICAgICAgICBkZWJ1ZzogJCgnI2RlYnVnSW5mbycpLnByb3AoJ2NoZWNrZWQnKSxcclxuICAgICAgICAgICAgICAgIG5ld2VzdE9uVG9wOiAkKCcjbmV3ZXN0T25Ub3AnKS5wcm9wKCdjaGVja2VkJyksXHJcbiAgICAgICAgICAgICAgICBwcm9ncmVzc0JhcjogJCgnI3Byb2dyZXNzQmFyJykucHJvcCgnY2hlY2tlZCcpLFxyXG4gICAgICAgICAgICAgICAgcG9zaXRpb25DbGFzczogJCgnI3Bvc2l0aW9uR3JvdXAgaW5wdXQ6cmFkaW86Y2hlY2tlZCcpLnZhbCgpIHx8ICd0b2FzdC10b3AtcmlnaHQnLFxyXG4gICAgICAgICAgICAgICAgcHJldmVudER1cGxpY2F0ZXM6ICQoJyNwcmV2ZW50RHVwbGljYXRlcycpLnByb3AoJ2NoZWNrZWQnKSxcclxuICAgICAgICAgICAgICAgIG9uY2xpY2s6IG51bGxcclxuICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgIGlmICgkKCcjYWRkQmVoYXZpb3JPblRvYXN0Q2xpY2snKS5wcm9wKCdjaGVja2VkJykpIHtcclxuICAgICAgICAgICAgICAgIHRvYXN0ci5vcHRpb25zLm9uY2xpY2sgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgYWxlcnQoJ1lvdSBjYW4gcGVyZm9ybSBzb21lIGN1c3RvbSBhY3Rpb24gYWZ0ZXIgYSB0b2FzdCBnb2VzIGF3YXknKTtcclxuICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlmICgkc2hvd0R1cmF0aW9uLnZhbCgpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuc2hvd0R1cmF0aW9uID0gJHNob3dEdXJhdGlvbi52YWwoKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgaWYgKCRoaWRlRHVyYXRpb24udmFsKCkubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICB0b2FzdHIub3B0aW9ucy5oaWRlRHVyYXRpb24gPSAkaGlkZUR1cmF0aW9uLnZhbCgpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoJHRpbWVPdXQudmFsKCkubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICB0b2FzdHIub3B0aW9ucy50aW1lT3V0ID0gYWRkQ2xlYXIgPyAwIDogJHRpbWVPdXQudmFsKCk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlmICgkZXh0ZW5kZWRUaW1lT3V0LnZhbCgpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuZXh0ZW5kZWRUaW1lT3V0ID0gYWRkQ2xlYXIgPyAwIDogJGV4dGVuZGVkVGltZU91dC52YWwoKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgaWYgKCRzaG93RWFzaW5nLnZhbCgpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuc2hvd0Vhc2luZyA9ICRzaG93RWFzaW5nLnZhbCgpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoJGhpZGVFYXNpbmcudmFsKCkubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICB0b2FzdHIub3B0aW9ucy5oaWRlRWFzaW5nID0gJGhpZGVFYXNpbmcudmFsKCk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlmICgkc2hvd01ldGhvZC52YWwoKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgIHRvYXN0ci5vcHRpb25zLnNob3dNZXRob2QgPSAkc2hvd01ldGhvZC52YWwoKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgaWYgKCRoaWRlTWV0aG9kLnZhbCgpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgdG9hc3RyLm9wdGlvbnMuaGlkZU1ldGhvZCA9ICRoaWRlTWV0aG9kLnZhbCgpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoYWRkQ2xlYXIpIHtcclxuICAgICAgICAgICAgICAgIG1zZyA9IGdldE1lc3NhZ2VXaXRoQ2xlYXJCdXR0b24obXNnKTtcclxuICAgICAgICAgICAgICAgIHRvYXN0ci5vcHRpb25zLnRhcFRvRGlzbWlzcyA9IGZhbHNlO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGlmICghbXNnKSB7XHJcbiAgICAgICAgICAgICAgICBtc2cgPSBnZXRNZXNzYWdlKCk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICQoJyN0b2FzdHJPcHRpb25zJykudGV4dChcclxuICAgICAgICAgICAgICAgICAgICAndG9hc3RyLm9wdGlvbnMgPSAnXHJcbiAgICAgICAgICAgICAgICAgICAgKyBKU09OLnN0cmluZ2lmeSh0b2FzdHIub3B0aW9ucywgbnVsbCwgMilcclxuICAgICAgICAgICAgICAgICAgICArICc7J1xyXG4gICAgICAgICAgICAgICAgICAgICsgJ1xcblxcbnRvYXN0ci4nXHJcbiAgICAgICAgICAgICAgICAgICAgKyBzaG9ydEN1dEZ1bmN0aW9uXHJcbiAgICAgICAgICAgICAgICAgICAgKyAnKFwiJ1xyXG4gICAgICAgICAgICAgICAgICAgICsgbXNnXHJcbiAgICAgICAgICAgICAgICAgICAgKyAodGl0bGUgPyAnXCIsIFwiJyArIHRpdGxlIDogJycpXHJcbiAgICAgICAgICAgICAgICAgICAgKyAnXCIpOydcclxuICAgICAgICAgICAgKTtcclxuXHJcbiAgICAgICAgICAgIHZhciAkdG9hc3QgPSB0b2FzdHJbc2hvcnRDdXRGdW5jdGlvbl0obXNnLCB0aXRsZSk7IC8vIFdpcmUgdXAgYW4gZXZlbnQgaGFuZGxlciB0byBhIGJ1dHRvbiBpbiB0aGUgdG9hc3QsIGlmIGl0IGV4aXN0c1xyXG4gICAgICAgICAgICAkdG9hc3RsYXN0ID0gJHRvYXN0O1xyXG5cclxuICAgICAgICAgICAgaWYodHlwZW9mICR0b2FzdCA9PT0gJ3VuZGVmaW5lZCcpe1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoJHRvYXN0LmZpbmQoJyNva0J0bicpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgJHRvYXN0LmRlbGVnYXRlKCcjb2tCdG4nLCAnY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgYWxlcnQoJ3lvdSBjbGlja2VkIG1lLiBpIHdhcyB0b2FzdCAjJyArIHRvYXN0SW5kZXggKyAnLiBnb29kYnllIScpO1xyXG4gICAgICAgICAgICAgICAgICAgICR0b2FzdC5yZW1vdmUoKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGlmICgkdG9hc3QuZmluZCgnI3N1cnByaXNlQnRuJykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAkdG9hc3QuZGVsZWdhdGUoJyNzdXJwcmlzZUJ0bicsICdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBhbGVydCgnU3VycHJpc2UhIHlvdSBjbGlja2VkIG1lLiBpIHdhcyB0b2FzdCAjJyArIHRvYXN0SW5kZXggKyAnLiBZb3UgY291bGQgcGVyZm9ybSBhbiBhY3Rpb24gaGVyZS4nKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGlmICgkdG9hc3QuZmluZCgnLmNsZWFyJykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAkdG9hc3QuZGVsZWdhdGUoJy5jbGVhcicsICdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICB0b2FzdHIuY2xlYXIoJHRvYXN0LCB7IGZvcmNlOiB0cnVlIH0pO1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgZnVuY3Rpb24gZ2V0TGFzdFRvYXN0KCl7XHJcbiAgICAgICAgICAgIHJldHVybiAkdG9hc3RsYXN0O1xyXG4gICAgICAgIH1cclxuICAgICAgICAkKCcjY2xlYXJsYXN0dG9hc3QnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHRvYXN0ci5jbGVhcihnZXRMYXN0VG9hc3QoKSk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgJCgnI2NsZWFydG9hc3RzJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICB0b2FzdHIuY2xlYXIoKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZTEoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RHZW5lcmFsVG9hc3RyLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEdlbmVyYWxUb2FzdHIiLCJleGFtcGxlMSIsImkiLCJ0b2FzdENvdW50IiwiJHRvYXN0bGFzdCIsImdldE1lc3NhZ2UiLCJtc2dzIiwibGVuZ3RoIiwiZ2V0TWVzc2FnZVdpdGhDbGVhckJ1dHRvbiIsIm1zZyIsIiQiLCJvbiIsInNob3J0Q3V0RnVuY3Rpb24iLCJ2YWwiLCJ0aXRsZSIsIiRzaG93RHVyYXRpb24iLCIkaGlkZUR1cmF0aW9uIiwiJHRpbWVPdXQiLCIkZXh0ZW5kZWRUaW1lT3V0IiwiJHNob3dFYXNpbmciLCIkaGlkZUVhc2luZyIsIiRzaG93TWV0aG9kIiwiJGhpZGVNZXRob2QiLCJ0b2FzdEluZGV4IiwiYWRkQ2xlYXIiLCJwcm9wIiwidG9hc3RyIiwib3B0aW9ucyIsImNsb3NlQnV0dG9uIiwiZGVidWciLCJuZXdlc3RPblRvcCIsInByb2dyZXNzQmFyIiwicG9zaXRpb25DbGFzcyIsInByZXZlbnREdXBsaWNhdGVzIiwib25jbGljayIsImFsZXJ0Iiwic2hvd0R1cmF0aW9uIiwiaGlkZUR1cmF0aW9uIiwidGltZU91dCIsImV4dGVuZGVkVGltZU91dCIsInNob3dFYXNpbmciLCJoaWRlRWFzaW5nIiwic2hvd01ldGhvZCIsImhpZGVNZXRob2QiLCJ0YXBUb0Rpc21pc3MiLCJ0ZXh0IiwiSlNPTiIsInN0cmluZ2lmeSIsIiR0b2FzdCIsImZpbmQiLCJkZWxlZ2F0ZSIsInJlbW92ZSIsImNsZWFyIiwiZm9yY2UiLCJnZXRMYXN0VG9hc3QiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/general/toastr.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/general/toastr.js"]();
/******/ 	
/******/ })()
;