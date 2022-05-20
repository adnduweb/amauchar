
<script type="text/javascript">


var KTCustomerContactList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_<?= $name; ?>');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initCustomerContactTable = function () {
        // Set date data order

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        window.Ci4DataTables["kt_table_<?= $name; ?>-table"] = $(table).DataTable({
            'responsive': true,
            "info": false,
            "retrieve": true,
            "select": {
				style: 'multi',
				selector: 'td:first-child .checkable',
			},
            "autoWidth": false,
            "serverSide" : true,
            "processing": true,
            'searchDelay': 1000,
            'serverMethod': 'get',
            'headers': window.axios.defaults.headers.common,
            'ajax': {
                'url':current_url + "/datatable-contacts",
                'data': {
                    // CSRF Hash
                    [crsftoken]: $('meta[name="X-CSRF-TOKEN"]').attr('content') // CSRF Token
                },
            },
            'order': [[1, 'asc']],
            "pageLength": 50,
            "lengthChange": true,
            "stateSave": false,
            'rows': {
                beforeTemplate: function(row, data, index) {
                    if (data.active == '0') {
                        row.addClass('notactive');
                    }

                    if (data.active == '1') {
                        row.addClass('bg-danger');
                    }

                }
            }, 
            createdRow: function (row,data) {
                // var stsId = data.active;
                // if (stsId == 1)
                //     $(row).addClass('table-warning');
                // else if (stsId == 2)
                //     $(row).addClass('table-success');
                // else
                //     $(row).addClass('table-danger');
            },
            'columnDefs': [
                {
                    data: 'id',
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return '<td class="text-right py-0 align-middle">\
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">\
                                        <input class="form-check-input group-checkable" type="checkbox" data-id="' + full.id + '" value="' + full.id + '" />\
                                    </div>\
                                </td>';
                    },
                    orderable: false
                },

                { 
                    data: 'company',
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return '<div class="d-flex align-items-center">\
                                    <!--begin::User details-->\
                                    <div class="d-flex flex-column">\
                                        <a href=' + current_url + '" data-kt-contact-action="edit_contact" data-id="' + full.id + '" class="text-gray-800 text-hover-primary mb-1">' + full.company + '</a>\
                                        <span class="text-gray-800 text-hover-primary mb-1">' + full.lastname + ' ' + full.firstname + '</span>\
                                    </div>\
                                    <!--begin::User details-->\
                                </div>';
                    },
                    orderable: false, 
                }, 
                {
                    data: 'lastname',
                    targets: 2,
                    render: function(data, type, full, meta) {
                        return  full.lastname + ', ' + full.firstname;
                    }, 
                    orderable: true,
                    searchable: true  
                },
                {
                    data: 'email',
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return  full.email;
                    }, 
                    orderable: true,
                    searchable: true  
                },
                { 
                    data: 'phone',
                    targets: 4,
                    render: function(data, type, full, meta) {
                           return full.phone ;         
                    },
                    orderable: false,
                    searchable: false
                },             
                {
                    data: null,
                    targets: 5,
                    render: function(data, type, full, meta) {
                        var htmlContent = '';

                            htmlContent += '<a href="javascript:;" class="btn btn-light btn-active-light-primary btn-sm ajax-datatable-action" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions';
                            htmlContent += '<?= service('theme')->getSVG('icons/duotone/arrows/arr072.svg', "svg-icon svg-icon-5 m-0", false, true); ?>';
                            htmlContent += '</a>';
                            htmlContent += ' <!--begin::Menu-->';
                            htmlContent += ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">';
                            htmlContent += '<!--begin::Menu item-->';
                            htmlContent += '<div class="menu-item px-3">';
                            htmlContent += '<a href="' + current_url + '" data-kt-contact-action="edit_contact" data-id="' + full.id + '" class="menu-link px-3">Edit</a>'; 
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu item-->';
                            htmlContent +=  '<!--begin::Menu item-->';
                            htmlContent +=  '<div class="menu-item px-3">';
                            htmlContent +=  '<a href="' + current_url + '" class="menu-link px-3" data-id="' + full.id + '" data-kt-<?= $name; ?>-table-filter="delete_row">Delete</a>';
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu item-->';
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu-->';

                            return htmlContent;     
                    },
                    orderable: false,
                    searchable: false,
                    sClass: "text-end"
                }
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        Ci4DataTables["kt_table_<?= $name; ?>-table"].on('draw', function (jqXHR, settings) {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
            editContact();
            initContactActive();
        });

    }

    $('.allCheck').click(function() {
        if (Ci4DataTables["kt_table_<?= $name; ?>-table"].rows({
                selected: true
            }).count() > 0) {
                Ci4DataTables["kt_table_<?= $name; ?>-table"].rows().deselect();
            return;
        }

        Ci4DataTables["kt_table_<?= $name; ?>-table"].rows().select();
    });



    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-<?= singular($name); ?>-table-filter="search"]');
        filterSearch.addEventListener('change', function (e) {
            Ci4DataTables["kt_table_<?= $name; ?>-table"].search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-<?= singular($name); ?>-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-<?= singular($name); ?>-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            Ci4DataTables["kt_table_<?= $name; ?>-table"].search(filterString).draw();
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-<?= singular($name); ?>-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-<?= singular($name); ?>-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            Ci4DataTables["kt_table_<?= $name; ?>-table"].search('').draw();
        });
    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-<?= $name; ?>-table-filter="delete_row"]');      

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get user name
                const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[0].innerText;

                var id = $(this).data('id');

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + userName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        const packets = {
                            id:  [id],
                            token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
                        };

                        axios.delete("<?= route_to('customer.contact.delete') ?>", { data: packets})
                        .then( response => {
                            toastr.success(response.data.messages.success);
                            const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                            headerCheckbox.checked = false;
                            Ci4DataTables["kt_table_<?= $name; ?>-table"].ajax.reload();

                        })
                        .catch(error => { }); 

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: userName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        toolbarBase = document.querySelector('[data-kt-<?= singular($name); ?>-table-toolbar="base"]');
        toolbarSelected = document.querySelector('[data-kt-<?= singular($name); ?>-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-<?= singular($name); ?>-table-select="selected_count"]');
        const deleteSelected = document.querySelector('[data-kt-<?= singular($name); ?>-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
           // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });
        

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            const ids = [];
             var dtRow = Ci4DataTables["kt_table_<?= $name; ?>-table"].rows('.selected').data().map(function(t, e) {
                ids.push(t.id);  
             });
           
            Swal.fire({
                text: _LANG_.are_you_sure_delete + " " + Ci4DataTables["kt_table_<?= $name; ?>-table"].rows('.selected').data().length + " " + _LANG_.selected_records + " ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: _LANG_.yes_delete + ' !',
                cancelButtonText: _LANG_.no_cancel,
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    const packets = {
                        id:  ids,
                        token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
                    };

                    axios.delete("<?= route_to('customer.contact.delete') ?>", { data: packets})
                    .then( response => {
                        toastr.success(response.data.messages.success);
                        const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                        Ci4DataTables["kt_table_<?= $name; ?>-table"].ajax.reload();
                    })
                    .catch(error => {}); 
                } 
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Select refreshed checkbox DOM elements 
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    const editContact = () => {

        const modalLinkContact = document.getElementById('kt_modal_add_contact');
        const modalContact = new bootstrap.Modal(modalLinkContact);
        const editLinkContact = document.querySelectorAll('[data-kt-contact-action="edit_contact"]');
        //const formDesignation = document.getElementById('kt_form_meubles');

        editLinkContact.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();;
                let id = d.getAttribute('data-id')

                axios.post("<?= route_to('customer.contact.view') ?>", {id: id})
                .then( response => {
                    let contact = response.data.contactItem;
                    let $test = [];
                    for (var key of Object.keys(contact)) {
                        //console.log(key + " -> " + address[key]);
                        if(key != 'country'){
                            if(key != 'customer_id'){
                                var select = document.querySelector('#kt_modal_contact_form input[name="contact['+key+']"]');
                                if(select != undefined) {
                                    select.value = contact[key];
                                }
                            }

                        }else{

                            const $select = document.querySelector('#kt_modal_contact_form #country');
                            $select.forEach((option, i) => {
                                if (option.value === contact.country){
                                    $("#country").val(contact.country).trigger('change');
                                }
                            });

                        }                      
                    }
                    modalContact.show();
                    //editSaveContact();
                })
                .catch(error => {}); 

            });
        } ); 
    }

    const editSaveContact = () => {

        const submitFormContact = document.getElementById('kt_contact__submit');
        const formContact = document.getElementById('kt_modal_contact_form');

        submitFormContact.addEventListener('click', function (e) {
            e.preventDefault();

            let data = new FormData(formContact);
            let obj = {};
            for (let [key, value] of data) {
                obj[key] = value;
            }

            axios.post("<?= route_to('customer.contact.edit.ajax') ?>", data)
            .then( response => {
                toastr.success(response.data.messages.success);
                Ci4DataTables["kt_table_<?= $name; ?>-table"].ajax.reload();
            })
            .catch(error => {}); 

        });
    }

    // Active item
    var initContactActive = () => {

        window.jQuery('[data-kt-contact-update="active"]').on('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            const formData = new FormData();
            formData.append('id', $(this).data('id')); 
            formData.append('action', 'activation'); 

            axios.post("<?= route_to('customer.contact.update') ?>", formData)
            .then( response => {
                Ci4DataTables["kt_table_<?= $name; ?>-table"].ajax.reload();
            })
            .catch(error => {}); 
            
        });
    }


    return {
        // Public functions  
        init: function () {
            if (!table) {
                return;
            }

            initCustomerContactTable();
            initToggleToolbar();
            handleSearchDatatable();
            <?php if ($filterDatabase == true) { ?>
            handleResetForm();
            <?php } ?>
            handleDeleteRows();
            <?php if ($filterDatabase == true) { ?>
            handleFilterDatatable();
            <?php } ?>
            editContact();
            editSaveContact();
            initContactActive();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCustomerContactList.init();
});

</script>