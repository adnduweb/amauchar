
<script type="text/javascript">
"use strict";

// Class definition
var KTAppVassortsCreations = function () {

    // Category status handler
    const handleStatus = () => {
        const target = document.getElementById('kt_ecommerce_add_product_status');
        const select = document.getElementById('kt_ecommerce_add_product_status_select');
        const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];

        var options = {
            dir: document.body.getAttribute('direction'),
        };

        $(select).select2(options).on('change', function (e) {
            const value = e.target.value;

            switch (value) {
                case "2": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-success');
                    break;
                }
                case "1": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-warning');
                    break;
                }
                case "0": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-danger');
                    break;
                }
                case "1": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-primary');
                    break;
                }
                default:
                    break;
            }
        });
    }

    const addDesignations = () => {

        const modalLink = document.getElementById('kt_vassorts_designations_modal');
        const modal = new bootstrap.Modal(modalLink);
        const submitFormDesignation = document.getElementById('kt_designations_submit');
        const formDesignation = document.getElementById('kt_form_designations');

         submitFormDesignation.addEventListener('click', function (e) {
            e.preventDefault();

            let data = new FormData(formDesignation);
            let obj = {};
            for (let [key, value] of data) {
                obj[key] = value;
            }

            axios.post("<?= route_to('designation.create') ?>", obj)
            .then( response => {

               let options = "";
               response.data.list.forEach(p => {
                    options += `<option value="${p.id}">${p.name}</option>`;
                });
                $('#designation_id').html(options);
                toastr.success(response.data.messages.success);
                console.log(modal);
                modal.hide();
            })
            .catch(error => {}); 

         });
    }

    const addMarques = () => {

        const modalLink = document.getElementById('kt_vassorts_marques_modal');
        const modal = new bootstrap.Modal(modalLink);
        const submitFormDesignation = document.getElementById('kt_marques_submit');
        const formDesignation = document.getElementById('kt_form_marques');

        submitFormDesignation.addEventListener('click', function (e) {
        e.preventDefault();

        let data = new FormData(formDesignation);
        let obj = {};
        for (let [key, value] of data) {
            obj[key] = value;
        }

        axios.post("<?= route_to('marque.create') ?>", obj)
        .then( response => {

            let options = "";
            response.data.list.forEach(p => {
                options += `<option value="${p.id}">${p.name}</option>`;
            });
            console.log(options);
            $('#marque_id').html(options);
            toastr.success(response.data.messages.success);
            console.log(modal);
            modal.hide();
        })
        .catch(error => {}); 

        });
    }

    const addMeubles = () => {

        const modalLinkMeuble = document.getElementById('kt_vassorts_meubles_modal');
        const modalMeuble = new bootstrap.Modal(modalLinkMeuble);
        const submitFormMeuble = document.getElementById('kt_meubles_submit');
        const formDesignation = document.getElementById('kt_form_meubles');

        submitFormMeuble.addEventListener('click', function (e) {
        e.preventDefault();

        let data = new FormData(formDesignation);
        let obj = {};
        for (let [key, value] of data) {
            obj[key] = value;
        }

        axios.post("<?= route_to('meuble.create') ?>", obj)
        .then( response => {

            let options = "";
            response.data.list.forEach(p => {
                options += `<option value="${p.id}">${p.name}</option>`; 
            });
            $('#meuble_id').html(options);
            toastr.success(response.data.messages.success);
            modalMeuble.hide();
        })
        .catch(error => {}); 

        });
    }

    // Public methods
    return {
        init: function () {
            handleStatus();
            // addDesignations();
            // addMarques();
            // addMeubles();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppVassortsCreations.init();
    KTAppsAdnduWeb.init();   
    KTImageManager.init();
});


</script>