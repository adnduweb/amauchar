
<script type="text/javascript">

var KTTranslate = function () {

    var element = document.getElementById('kt_translate');
    var selectFilePicker;
    var target = document.querySelector("#kt_translate .card");
    var blockUI = new KTBlockUI(target);

    var initRepeater = function () {
        $("#kt_repeater_1").repeater({
            initEmpty: !1,
            show: function() {
                btnSaveTranslate();
                btnDeleteTranslate();
                searchData();
                $(this).slideDown();
            },
            hide: function(e) {
                confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
            },
            isFirstItemUndeletable: true,
        });
    }


    var initTranslate = function () {
        //console.log('dfsgsdgsdgsd');

        const form = document.querySelector("form#search_translate");
        const selectFilePicker = element.querySelectorAll('[data-translate-select="select"]');
       

        var options = {
            dir: document.body.getAttribute('direction'),
            placeholder: "Select a state"
        };

        $('.selectFilePicker').select2(options).on('change', function (e) {

            if ($(this).attr('name') == 'lang' && $(".selectFilePicker.fileTheme option").prop("selected") && $(".selectFilePicker.fileCore option ").prop("selected")) {
                 return false;
            }
            if ($(this).attr('name') == 'lang') {
                $("#fileCore ").val("")
                $('#response').html('');
                
            }

           
            blockUI.block();

            const formData = new FormData(form);

            axios.post("<?= route_to('translate.getfile'); ?>", formData)
            .then( response => {

                  let options = "<option value> Sélectionner </option>";
                response.data.fileCore.forEach(p => {
                    var selected = (response.data.fileCoreSelected == p.path) ? 'selected="selected"' : ''; 
                    options += `<option ${selected} value="${p.path}">${p.name}</option>`;
                });

                $('#fileCore').html(options);

                $('#response').html(response.data.viewLangue);
                initRepeater();
                blockUI.release();
                searchData();
                btnSaveTranslate();
                btnDeleteTranslate();
                
            })
            .catch(error => {
                blockUI.release();
                //console.log("ERROR:: ",error.response.data);
            });

        });

    }

    var btnSaveTranslate = function () {
        //console.log('dfsgsdgsdgsd');

        const form = document.querySelector("form#save_translate");
        const selectFilePicker = element.querySelectorAll('[data-translate-select="select"]');
        const btnSave = element.querySelectorAll('[data-kt-translate-action="save_row"]');

      
        btnSave.forEach(d => {

            d.addEventListener('click', function (e) {
                e.preventDefault();

                blockUI.block();

                const formData = new FormData(form);

                axios.post("<?= route_to('translate.savefile'); ?>", formData)
                .then( response => {
                    toastr.success(response.data.messages.sucess); // Notif
                    $('#response').html(response.data.html);
                    blockUI.release();
                })
                .catch(error => { blockUI.release(); });

            });
        });
    }

    var btnSaveTranslateText = function () {
        //console.log('dfsgsdgsdgsd');

        const selectFilePicker = element.querySelectorAll('[data-translate-select="select"]');
        const form = document.querySelectorAll(".saveText_translate");
        //const btnSave = element.querySelectorAll('[data-kt-translate-action="save_row"]');

       
        form.forEach(d => {
            const btnSave = d.querySelector('[data-kt-translate-action="save_row"]');   
            btnSave.addEventListener('click', function (e) {
                e.preventDefault();

                blockUI.block();

                const formData = new FormData(d);

                axios.post("<?= route_to('translate.savetextfile'); ?>", formData)
                .then( response => {
                    toastr.success(response.data.messages.sucess); // Notif
                    $('#response').html(response.data.html);
                    blockUI.release();
                })
                .catch(error => { blockUI.release(); });
            });
        });
    }

    var btnDeleteTranslate = function () {
        //console.log('dfsgsdgsdgsd');

        const form = document.querySelector("form#save_translate");
        const selectFilePicker = element.querySelectorAll('[data-translate-select="select"]');
        const btnDelete = element.querySelectorAll('[data-kt-translate-action="delete_row"]');
      
        btnDelete.forEach(d => {

            d.addEventListener('click', function (e) {
                e.preventDefault();

                 // Select parent row
                 const parent = e.target.closest('.form-group.row');

                $(parent).remove();

                blockUI.block();

                const formData = new FormData(form);


                axios.post("<?= route_to('translate.deletetexte'); ?>", formData)
                .then( response => {
                    toastr.success(response.data.messages.sucess); // Notif
                    $('#response').html(response.data.html);
                    blockUI.release();
                })
                .catch(error => { blockUI.release(); });
            });
        });
    }

    var searchData = function () {
        //console.log('dfsgsdgsdgsd');

        const selectFilePicker = element.querySelectorAll('[data-translate-select="select"]');
        const form             = document.querySelector("#save_translate");
        const filterSearch     = document.querySelector('[data-kt-translate-table-filter="search"]');
        const btnDelete        = element.querySelectorAll('[data-kt-translate-action="delete_row"]');     


        filterSearch.addEventListener('keyup', e => {
            e.preventDefault();

            if(filterSearch.value.length > 3) {

               // blockUI.block();

                const formData = new FormData();
                formData.append('value', filterSearch.value);
                formData.append('lang', $('#lang').val());
                formData.append('search', true);

                axios.post("<?= route_to('translate.searchtexte'); ?>", formData)
                .then( response => {
                    $('#response').html(response.data.viewSearchDirect);
                    blockUI.release();
                    btnSaveTranslateText();
                })
                .catch(error => { blockUI.release(); });
            }

        });
    }

    return {
        // Public functions  
        init: function () {
            initRepeater();
            initTranslate();
            btnSaveTranslate();
            btnDeleteTranslate();
            searchData();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTTranslate.init();
});



</script>