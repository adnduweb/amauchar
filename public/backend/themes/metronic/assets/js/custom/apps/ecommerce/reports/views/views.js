(()=>{"use strict";var t,e,n={init:function(){var n,r;(t=document.querySelector("#kt_ecommerce_report_views_table"))&&(e=$(t).DataTable({info:!1,order:[],pageLength:10}),function(){var t=moment().subtract(29,"days"),e=moment(),n=$("#kt_ecommerce_report_views_daterangepicker");function r(t,e){n.html(t.format("MMMM D, YYYY")+" - "+e.format("MMMM D, YYYY"))}n.daterangepicker({startDate:t,endDate:e,ranges:{Today:[moment(),moment()],Yesterday:[moment().subtract(1,"days"),moment().subtract(1,"days")],"Last 7 Days":[moment().subtract(6,"days"),moment()],"Last 30 Days":[moment().subtract(29,"days"),moment()],"This Month":[moment().startOf("month"),moment().endOf("month")],"Last Month":[moment().subtract(1,"month").startOf("month"),moment().subtract(1,"month").endOf("month")]}},r),r(t,e)}(),n="Product Views Report",(new $.fn.dataTable.Buttons(t,{buttons:[{extend:"copyHtml5",title:n},{extend:"excelHtml5",title:n},{extend:"csvHtml5",title:n},{extend:"pdfHtml5",title:n}]}).container().appendTo($("#kt_ecommerce_report_views_export")),document.querySelectorAll("#kt_ecommerce_report_views_export_menu [data-kt-ecommerce-export]")).forEach((function(t){t.addEventListener("click",(function(t){t.preventDefault();var e=t.target.getAttribute("data-kt-ecommerce-export");document.querySelector(".dt-buttons .buttons-"+e).click()}))})),document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup",(function(t){e.search(t.target.value).draw()})),r=document.querySelector('[data-kt-ecommerce-order-filter="rating"]'),$(r).on("change",(function(t){var n=t.target.value;"all"===n&&(n=""),e.column(2).search(n).draw()})))}};KTUtil.onDOMContentLoaded((function(){n.init()}))})();