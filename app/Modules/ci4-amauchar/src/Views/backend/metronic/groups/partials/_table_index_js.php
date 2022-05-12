<script type="text/javascript">


var KTGroupsList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_<?= $name; ?>');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initGroupsTable = function () {
        // Set date data order

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        window.Ci4DataTables["kt_table_<?= $name; ?>-table"] = $(table).DataTable({
            'responsive': true,
            "info": false,
            "retrieve": true,
            "info": false,
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
              //processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
              //'processing': _LANG_.loading_wait,
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
            "lengthChange": true,
            "stateSave": true,
            'rows': {
                beforeTemplate: function(row, data, index) {
                    if (data.active == '0') {
                        row.addClass('notactive');
                    }
                }
            },
            'columnDefs': [
                {
                    data: 'title',
                    targets: 0,
                    render: function(data, type, full, meta) {

                        return '<a href="' + current_url + '/show/' + full.alias + '" class="text-dark fw-bolder text-hover-primary fs-6 capitalize"> ' + full.title + '</a>';
                    }, 
                    orderable: true,
                    searchable: true  
                },
                {
                    data: 'description',
                    width: '60%',
                    targets: 1,
                    orderable: true,
                    searchable: true  
                },
                {
                    data: 'user_count',
                    targets: 2,
                    orderable: true,
                    searchable: true  
                },
                {
                    data: null,
                    targets: 3,
                    render: function(data, type, full, meta) {
                        var htmlContent = '';
                        if(data.is_natif == 1){
                            htmlContent += '...';
                            return htmlContent;
                        }else{

                            htmlContent += '<td class="text-end">';
                            htmlContent += '<a href="javascript:;" class="btn btn-sm btn-light btn-active-light-primary ajax-datatable-action" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions';
                            htmlContent += '<?= theme()->getSVG('icons/duotone/arrows/arr072.svg', "svg-icon svg-icon-5 m-0", false, true); ?>';
                            htmlContent += '</a>';
                            htmlContent += ' <!--begin::Menu-->';
                            htmlContent += ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">';
                            htmlContent += '<!--begin::Menu item-->';
                            htmlContent += '<div class="menu-item px-3">';
                            htmlContent += '<a href="' + current_url + '/show/' + full.alias + '" class="menu-link px-3">Edit</a>'; 
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
        Ci4DataTables["kt_table_<?= $name; ?>-table"].on('draw', function (jqXHR, settings) {});

    }


    return {
        // Public functions  
        init: function () {
            if (!table) {
                return;
            }
            initGroupsTable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTGroupsList.init();
});

</script>