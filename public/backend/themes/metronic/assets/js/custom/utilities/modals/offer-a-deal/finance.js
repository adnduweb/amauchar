(()=>{"use strict";var e={3850:e=>{var t,a,r,i,n,o={init:function(){i=KTModalOfferADeal.getForm(),n=KTModalOfferADeal.getStepperObj(),t=KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-next"]'),a=KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-previous"]'),r=FormValidation.formValidation(i,{fields:{finance_setup:{validators:{notEmpty:{message:"Amount is required"},callback:{message:"The amount must be greater than $100",callback:function(e){var t=e.value;if(t=t.replace(/[$,]+/g,""),parseFloat(t)<100)return!1}}}},finance_usage:{validators:{notEmpty:{message:"Usage type is required"}}},finance_allow:{validators:{notEmpty:{message:"Allowing budget is required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),KTDialer.getInstance(i.querySelector("#kt_modal_finance_setup")).on("kt.dialer.changed",(function(){r.revalidateField("finance_setup")})),t.addEventListener("click",(function(e){e.preventDefault(),t.disabled=!0,r&&r.validate().then((function(e){console.log("validated!"),"Valid"==e?(t.setAttribute("data-kt-indicator","on"),setTimeout((function(){t.removeAttribute("data-kt-indicator"),t.disabled=!1,n.goNext()}),1500)):(t.disabled=!1,Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}))}))})),a.addEventListener("click",(function(){n.goPrevious()}))}};void 0!==e.exports&&(window.KTModalOfferADealFinance=e.exports=o)}},t={};(function a(r){var i=t[r];if(void 0!==i)return i.exports;var n=t[r]={exports:{}};return e[r](n,n.exports,a),n.exports})(3850)})();