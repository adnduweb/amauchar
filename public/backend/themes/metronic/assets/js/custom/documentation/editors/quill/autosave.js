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

/***/ "./resources/backend/core/js/custom/documentation/editors/quill/autosave.js":
/*!**********************************************************************************!*\
  !*** ./resources/backend/core/js/custom/documentation/editors/quill/autosave.js ***!
  \**********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsQuillAutosave = function () {\n  // Private functions\n  var exampleAutosave = function exampleAutosave() {\n    var Delta = Quill[\"import\"]('delta');\n    var quill = new Quill('#kt_docs_quill_autosave', {\n      modules: {\n        toolbar: true\n      },\n      placeholder: 'Type your text here...',\n      theme: 'snow'\n    }); // Store accumulated changes\n\n    var change = new Delta();\n    quill.on('text-change', function (delta) {\n      change = change.compose(delta);\n    }); // Save periodically\n\n    setInterval(function () {\n      if (change.length() > 0) {\n        console.log('Saving changes', change);\n        /*\r\n        Send partial changes\r\n        $.post('/your-endpoint', {\r\n        partial: JSON.stringify(change)\r\n        });\r\n          Send entire document\r\n        $.post('/your-endpoint', {\r\n        doc: JSON.stringify(quill.getContents())\r\n        });\r\n        */\n\n        change = new Delta();\n      }\n    }, 5 * 1000); // Check for unsaved data\n\n    window.onbeforeunload = function () {\n      if (change.length() > 0) {\n        return 'There are unsaved changes. Are you sure you want to leave?';\n      }\n    };\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleAutosave();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsQuillAutosave.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYmFja2VuZC9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2VkaXRvcnMvcXVpbGwvYXV0b3NhdmUuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsb0JBQW9CLEdBQUcsWUFBWTtBQUNuQztBQUNBLE1BQUlDLGVBQWUsR0FBRyxTQUFsQkEsZUFBa0IsR0FBWTtBQUM5QixRQUFJQyxLQUFLLEdBQUdDLEtBQUssVUFBTCxDQUFhLE9BQWIsQ0FBWjtBQUNBLFFBQUlDLEtBQUssR0FBRyxJQUFJRCxLQUFKLENBQVUseUJBQVYsRUFBcUM7QUFDN0NFLE1BQUFBLE9BQU8sRUFBRTtBQUNMQyxRQUFBQSxPQUFPLEVBQUU7QUFESixPQURvQztBQUk3Q0MsTUFBQUEsV0FBVyxFQUFFLHdCQUpnQztBQUs3Q0MsTUFBQUEsS0FBSyxFQUFFO0FBTHNDLEtBQXJDLENBQVosQ0FGOEIsQ0FVOUI7O0FBQ0EsUUFBSUMsTUFBTSxHQUFHLElBQUlQLEtBQUosRUFBYjtBQUNBRSxJQUFBQSxLQUFLLENBQUNNLEVBQU4sQ0FBUyxhQUFULEVBQXdCLFVBQVVDLEtBQVYsRUFBaUI7QUFDckNGLE1BQUFBLE1BQU0sR0FBR0EsTUFBTSxDQUFDRyxPQUFQLENBQWVELEtBQWYsQ0FBVDtBQUNILEtBRkQsRUFaOEIsQ0FnQjlCOztBQUNBRSxJQUFBQSxXQUFXLENBQUMsWUFBWTtBQUNwQixVQUFJSixNQUFNLENBQUNLLE1BQVAsS0FBa0IsQ0FBdEIsRUFBeUI7QUFDckJDLFFBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLGdCQUFaLEVBQThCUCxNQUE5QjtBQUNBO0FBQ2hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFZ0JBLFFBQUFBLE1BQU0sR0FBRyxJQUFJUCxLQUFKLEVBQVQ7QUFDSDtBQUNKLEtBaEJVLEVBZ0JSLElBQUksSUFoQkksQ0FBWCxDQWpCOEIsQ0FtQzlCOztBQUNBZSxJQUFBQSxNQUFNLENBQUNDLGNBQVAsR0FBd0IsWUFBWTtBQUNoQyxVQUFJVCxNQUFNLENBQUNLLE1BQVAsS0FBa0IsQ0FBdEIsRUFBeUI7QUFDckIsZUFBTyw0REFBUDtBQUNIO0FBQ0osS0FKRDtBQUtILEdBekNEOztBQTJDQSxTQUFPO0FBQ0g7QUFDQUssSUFBQUEsSUFBSSxFQUFFLGdCQUFZO0FBQ2RsQixNQUFBQSxlQUFlO0FBQ2xCO0FBSkUsR0FBUDtBQU1ILENBbkQwQixFQUEzQixDLENBcURBOzs7QUFDQW1CLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBWTtBQUNsQ3JCLEVBQUFBLG9CQUFvQixDQUFDbUIsSUFBckI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2JhY2tlbmQvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9lZGl0b3JzL3F1aWxsL2F1dG9zYXZlLmpzPzAyZmQiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZvcm1zUXVpbGxBdXRvc2F2ZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZUF1dG9zYXZlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHZhciBEZWx0YSA9IFF1aWxsLmltcG9ydCgnZGVsdGEnKTtcclxuICAgICAgICB2YXIgcXVpbGwgPSBuZXcgUXVpbGwoJyNrdF9kb2NzX3F1aWxsX2F1dG9zYXZlJywge1xyXG4gICAgICAgICAgICBtb2R1bGVzOiB7XHJcbiAgICAgICAgICAgICAgICB0b29sYmFyOiB0cnVlXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHBsYWNlaG9sZGVyOiAnVHlwZSB5b3VyIHRleHQgaGVyZS4uLicsXHJcbiAgICAgICAgICAgIHRoZW1lOiAnc25vdydcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gU3RvcmUgYWNjdW11bGF0ZWQgY2hhbmdlc1xyXG4gICAgICAgIHZhciBjaGFuZ2UgPSBuZXcgRGVsdGEoKTtcclxuICAgICAgICBxdWlsbC5vbigndGV4dC1jaGFuZ2UnLCBmdW5jdGlvbiAoZGVsdGEpIHtcclxuICAgICAgICAgICAgY2hhbmdlID0gY2hhbmdlLmNvbXBvc2UoZGVsdGEpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBTYXZlIHBlcmlvZGljYWxseVxyXG4gICAgICAgIHNldEludGVydmFsKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaWYgKGNoYW5nZS5sZW5ndGgoKSA+IDApIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdTYXZpbmcgY2hhbmdlcycsIGNoYW5nZSk7XHJcbiAgICAgICAgICAgICAgICAvKlxyXG4gICAgICAgICAgICAgICAgU2VuZCBwYXJ0aWFsIGNoYW5nZXNcclxuICAgICAgICAgICAgICAgICQucG9zdCgnL3lvdXItZW5kcG9pbnQnLCB7XHJcbiAgICAgICAgICAgICAgICBwYXJ0aWFsOiBKU09OLnN0cmluZ2lmeShjaGFuZ2UpXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICBTZW5kIGVudGlyZSBkb2N1bWVudFxyXG4gICAgICAgICAgICAgICAgJC5wb3N0KCcveW91ci1lbmRwb2ludCcsIHtcclxuICAgICAgICAgICAgICAgIGRvYzogSlNPTi5zdHJpbmdpZnkocXVpbGwuZ2V0Q29udGVudHMoKSlcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgKi9cclxuICAgICAgICAgICAgICAgIGNoYW5nZSA9IG5ldyBEZWx0YSgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSwgNSAqIDEwMDApO1xyXG5cclxuICAgICAgICAvLyBDaGVjayBmb3IgdW5zYXZlZCBkYXRhXHJcbiAgICAgICAgd2luZG93Lm9uYmVmb3JldW5sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBpZiAoY2hhbmdlLmxlbmd0aCgpID4gMCkge1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuICdUaGVyZSBhcmUgdW5zYXZlZCBjaGFuZ2VzLiBBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gbGVhdmU/JztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVBdXRvc2F2ZSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RGb3Jtc1F1aWxsQXV0b3NhdmUuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURm9ybXNRdWlsbEF1dG9zYXZlIiwiZXhhbXBsZUF1dG9zYXZlIiwiRGVsdGEiLCJRdWlsbCIsInF1aWxsIiwibW9kdWxlcyIsInRvb2xiYXIiLCJwbGFjZWhvbGRlciIsInRoZW1lIiwiY2hhbmdlIiwib24iLCJkZWx0YSIsImNvbXBvc2UiLCJzZXRJbnRlcnZhbCIsImxlbmd0aCIsImNvbnNvbGUiLCJsb2ciLCJ3aW5kb3ciLCJvbmJlZm9yZXVubG9hZCIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/backend/core/js/custom/documentation/editors/quill/autosave.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/backend/core/js/custom/documentation/editors/quill/autosave.js"]();
/******/ 	
/******/ })()
;