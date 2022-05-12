<script type="text/javascript">

var KTUserList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_<?= $name; ?>');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initUserTable = function () {
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
            'searchDelay': 400,
            'serverMethod': 'get',
            'headers': window.axios.defaults.headers.common,
            'language': {
              'processing': '<div class="blockui-overlay " style="z-index: 1;"><span class="spinner-border text-primary"></span></div>',
              'noRecords': _LANG_.no_record_found,
            },
            'ajax': {
                'url':current_url + "/datatable",
                'data': {
                    // CSRF Hash
                    [crsftoken]: $('meta[name="X-CSRF-TOKEN"]').attr('content') // CSRF Token
                },
            },
            // 'order': [],
            'order': [[1, 'asc']],
            "pageLength": 10,
            "lengthChange": false,
            "stateSave": false,
            'rows': {
                beforeTemplate: function(row, data, index) {
                    if (data.active == '0') {
                        row.addClass('notactive');
                    }
                }
            },
            'columnDefs': [
                { 
                    data: 'uuid',
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return '<td class="text-right py-0 align-middle">\
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">\
                                        <input class="form-check-input group-checkable" type="checkbox" data-uuid="' + full.uuid + '" value="' + full.uuid + '" />\
                                    </div>\
                                </td>';
                    },
                    orderable: false
                }, 
                { 
                    data: 'raison_social',
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return '<div class="d-flex align-items-center">\
                                    <!--begin:: Avatar -->\
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">\
                                        <a href="' + current_url + '/edit/' + full.uuid + '">\
                                            <div class="symbol-label fs-3 bg-light-danger text-danger">' + (full.raison_social).substr(0,1).toUpperCase() + '</div>\
                                        </a>\
                                    </div>\
                                    <!--end::Avatar-->\
                                    <!--begin::User details-->\
                                    <div class="d-flex flex-column">\
                                        <a href="' + current_url + '/edit/' + full.uuid + '" class="text-gray-800 text-hover-primary mb-1">' + full.raison_social + ' </a>\
                                        <span class="text-gray-800 text-hover-primary mb-1">' + full.email + '</span>\
                                    </div>\
                                    <!--begin::User details-->\
                                </div>';
                    },
                    orderable: false, 
                }, 
                { 
                    data: 'email',
                    targets: 2,
                    render: function(data, type, full, meta) {
                       
                        return '<div class="badge badge-primary fw-bolder capitalize">' + full.email + '</div>';                    
                    },
                    orderable: true,
                    searchable: true
                },  
                { 
                    data: 'adresse',
                    targets: 3,
                    render: function(data, type, full, meta) {
                       
                        return '<div class="badge badge-primary fw-bolder capitalize">' + full.adresse + '</div>';                    
                    },
                    orderable: true,
                    searchable: true
                },   
                { 
                    data: 'created_at',
                    targets: 4,
                    render: function(data, type, full, meta) {
                        var ukDatea = full.created_at.split(' ');
                        var date = ukDatea[0].split('-');
                        return '<div class="badge badge-light fw-bolder">' + (date[2] + '-' + date[1] + '-' + date[0]) + ' à ' + ukDatea[1] + '</div>' ;         
                    },
                    orderable: false,
                    searchable: false
                },    
                { 
                    data: null,
                    targets: 5,
                    render: function(data, type, full, meta) {
                        var htmlContent = '';
                        if(full.id == 1){
                            htmlContent += '<td class="text-end">';
                            htmlContent += '<a href="javascript:;" class="btn btn-light btn-active-light-primary btn-sm ajax-datatable-action" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions';
                            htmlContent += '<?= theme()->getSVG('icons/duotone/arrows/arr072.svg', "svg-icon svg-icon-5 m-0", false, true); ?>';
                            htmlContent += '</a>';
                            htmlContent += ' <!--begin::Menu-->';
                            htmlContent += ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">';
                            htmlContent += '<!--begin::Menu item-->';
                            htmlContent += '<div class="menu-item px-3">';
                            htmlContent += '<a href="' + current_url + '/edit/' + full.uuid + '" class="menu-link px-3">Edit</a>'; 
                            htmlContent +=  '</div>';
                            htmlContent +=  '</td>';

                            return htmlContent; 
                        }else{

                            htmlContent += '<td class="text-end">';
                            htmlContent += '<a href="javascript:;" class="btn btn-light btn-active-light-primary btn-sm ajax-datatable-action" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions';
                            htmlContent += '<?= theme()->getSVG('icons/duotone/arrows/arr072.svg', "svg-icon svg-icon-5 m-0", false, true); ?>';
                            htmlContent += '</a>';
                            htmlContent += ' <!--begin::Menu-->';
                            htmlContent += ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">';
                            htmlContent += '<!--begin::Menu item-->';
                            htmlContent += '<div class="menu-item px-3">';
                            htmlContent += '<a href="' + current_url + '/edit/' + full.uuid + '" class="menu-link px-3">Edit</a>'; 
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu item-->';
                            htmlContent +=  '<!--begin::Menu item-->';
                            htmlContent +=  '<div class="menu-item px-3">';
                            htmlContent +=  '<a href="#" class="menu-link px-3" data-uuid="' + full.uuid + '" data-kt-<?= $name; ?>-table-filter="delete_row">Delete</a>';
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu item-->';
                            htmlContent +=  '</div>';
                            htmlContent +=  '<!--end::Menu-->';
                            htmlContent +=  '</td>';

                            return htmlContent;     
                        }
                       
                    }, 
                    orderable: false,
                    searchable: false  
                }
                      
            ],
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        Ci4DataTables["kt_table_<?= $name; ?>-table"].on('draw', function (jqXHR, settings) {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
            initUserActive();
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

                // Get role name
                const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[0].innerText;

                var uuid = $(this).data('uuid');

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
                            uuid:  [uuid]
                        };

                        axios.delete("<?= route_to(singular($name) . '.delete') ?>", { data: packets})
                        .then( response => {
                            toastr.success(response.data.messages.sucess);
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
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            //var dtRow = Ci4DataTables["kt_table_<?= $name; ?>-table"].rows($(this).closest("tr"));
            const ids = [];
             var dtRow = Ci4DataTables["kt_table_<?= $name; ?>-table"].rows('.selected').data().map(function(t, e) {
                ids.push(t.uuid);  
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
                        uuid:  ids
                    };

                    axios.delete("<?= route_to(singular($name) . '.delete') ?>", { data: packets})
                    .then( response => {
                        toastr.success(response.data.messages.sucess);
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


    // Active item
    var initUserActive = () => {

        window.jQuery('[data-kt-user-update="active"]').on('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            const formData = new FormData();
            formData.append('uuid', $(this).data('uuid')); 
            formData.append('action', 'activation'); 

            axios.post("<?= route_to('users.update') ?>", formData)
            .then( response => {
                toastr.success(response.data.messages.sucess); // Notif
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

            initUserTable();
            initToggleToolbar();
            handleSearchDatatable();
            <?php if ($filterDatabase == true) { ?>
            handleResetForm();
            <?php } ?>
            handleDeleteRows();
            <?php if ($filterDatabase == true) { ?>
            handleFilterDatatable();
            <?php } ?>
            initUserActive();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUserList.init();
});

</script>