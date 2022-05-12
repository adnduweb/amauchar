<script type="text/javascript">

"use strict";

// Class definition
var KTAppBlocsNotes = function () {

    const addBlocsTypes = () => {

        const modalLink = document.getElementById('kt_add_blocs_type');
        const modal = new bootstrap.Modal(modalLink);
        const submitFormBlocsTypes = document.getElementById('kt_blocnotes_submit');
        const formBlocsType = document.getElementById('kt_blocstype_form');

         submitFormBlocsTypes.addEventListener('click', function (e) {
            e.preventDefault();

            let data = new FormData(formBlocsType);
            let obj = {};
            for (let [key, value] of data) {
                obj[key] = value;
            }

            axios.post("<?= route_to('blocsnotestype.create') ?>", obj)
            .then( response => {

               let options = "";
               response.data.list.forEach(p => {
                    options += `<option value="${p.id_type_blocnote}">${p.titre}</option>`;
                });
                $('#blocnote_type_id').html(options);
                toastr.success(response.data.messages.success);
                console.log(modal);
                modal.hide();
            })
            .catch(error => {}); 

         });
    }


    // Public methods
    return {
        init: function () {
            addBlocsTypes();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppBlocsNotes.init();
});


 
</script>