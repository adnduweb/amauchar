<script type="text/javascript">

KTUtil.onDOMContentLoaded(function () {

    const croppedFile = document.querySelector('[data-kt-filemanager="croppedFile"]');

    croppedFile.addEventListener('click', function (e) {
        var uuid = $(this).data('uuid');

        const packets = {
                uuid:  $(this).data('uuid'),
                token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
        };

        axios.post("<?= route_to('medias.crop.template') ?>", packets)
        .then( response => {
            console.log(response);
            //$('#cropImage2').html(response.data.cropImage);
            $('#getCroppedCanvasModal .modal-body').html(response.data.cropImage);
            $('#getCroppedCanvasModal').modal('show');
            setTimeout(function () {
                KTCropperADNDUWEB.init();
            }, 200);
        })
        .catch(error => {}); 
    });



    // Class definition
    var KTCropperADNDUWEB = function () {

        // Private functions
        var initCropperADNDUWEB = function () {
            var image = document.getElementById('image-upload');

            var options = {
                crop: function (event) {
                    document.getElementById('dataX').value = Math.round(event.detail.x);
                    document.getElementById('dataY').value = Math.round(event.detail.y);
                    document.getElementById('dataWidth').value = Math.round(event.detail.width);
                    document.getElementById('dataHeight').value = Math.round(event.detail.height);
                    document.getElementById('dataRotate').value = event.detail.rotate;
                    document.getElementById('dataScaleX').value = event.detail.scaleX;
                    document.getElementById('dataScaleY').value = event.detail.scaleY;

                    var lg = document.getElementById('cropper-preview-lg');
                    lg.innerHTML = '';
                    lg.appendChild(cropper.getCroppedCanvas({ width: 256, height: 160 }));

                    var md = document.getElementById('cropper-preview-md');
                    md.innerHTML = '';
                    md.appendChild(cropper.getCroppedCanvas({ width: 128, height: 80 }));

                    var sm = document.getElementById('cropper-preview-sm');
                    sm.innerHTML = '';
                    sm.appendChild(cropper.getCroppedCanvas({ width: 64, height: 40 }));

                    var xs = document.getElementById('cropper-preview-xs');
                    xs.innerHTML = '';
                    xs.appendChild(cropper.getCroppedCanvas({ width: 32, height: 20 }));
                },
            };

            var cropper = new window.Cropper(image, options);

            var buttons = document.getElementById('cropper-buttons');
            var methods = buttons.querySelectorAll('[data-method]');
            methods.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    var method = button.getAttribute('data-method');
                    var option = button.getAttribute('data-option');
                    var option2 = button.getAttribute('data-second-option');

                    try {
                        option = JSON.parse(option);
                    }
                    catch (e) {
                    }

                    var result;
                    if (!option2) {
                        result = cropper[method](option, option2);
                    }
                    else if (option) {
                        result = cropper[method](option);
                    }
                    else {
                        result = cropper[method]();
                    }

                    if (method === 'getCroppedCanvas') {

                        var modal = document.getElementById('getCroppedCanvasModal');
                        var modalBody = modal.querySelector('.modal-body');
                        modalBody.innerHTML = '';
                        modalBody.appendChild(result);

                        cropper.getCroppedCanvas(option).toBlob((blob) => {
                                const formData = new FormData();

                                console.log(image.getAttribute('data-uuid'));

                                // Pass the image file name as the third parameter if necessary.
                                formData.append('uuid', image.getAttribute('data-uuid'));
                                formData.append('field', false);
                                formData.append('imageCustomEdition', true);
                                formData.append('croppedImage', blob, image.getAttribute('data-mine'));

                                axios.post("<?= route_to('medias.crop.store') ?>", formData)
                                .then( response => {
                                    console.log(response);
                                    toastr.success(response.data.messages.success);
                                    $('#getCroppedCanvasModal').modal('hide');
                                    $('#getCroppedCanvasModal .modal-body').html('');
                                    Ci4DataTables["kt_table_media_dimensions-table"].ajax.reload();
                                })
                                .catch(error => {}); 


                                // $.ajax({
                                //     type: 'POST',
                                //     url: current_url + "/cropFile",
                                //     data: formData,
                                //     processData: false,
                                //     contentType: false,
                                //     dataType: "json",
                                //     success: function(result, status, xhr) {

                                //         $.notify({
                                //             title: (result.success.message) ? _LANG_.updated + "!" : _LANG_.warning + "!",
                                //             message: (result.success.message) ? result.success.message : result.error.message
                                //         }, {
                                //             type: (result.success.message) ? 'success' : 'warning'
                                //         });

                                //         if (xhr.status == 200) {
                                //             $('#cropImage').fadeOut();
                                //             $('#cropImage').html('');
                                //             $('.attachment-media-view').fadeIn();
                                //             $('#imageCustom').html(result.imageCustomEdition);
                                //         }

                                //     }
                                // });
                            }, $('#image-upload').attr('data-mine'));

                    }

                    var input = document.querySelector('#putData');
                    try {
                        input.value = JSON.stringify(result);
                    }
                    catch (e) {
                        if (!result) {
                            input.value = result;
                        }
                    }
                });
            });

            // set aspect ratio option buttons
            var radioOptions = document.getElementById('setAspectRatio').querySelectorAll('[name="aspectRatio"]');
            radioOptions.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    cropper.setAspectRatio(e.target.value);
                });
            });

            // set view mode
            var viewModeOptions = document.getElementById('viewMode').querySelectorAll('[name="viewMode"]');
            viewModeOptions.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    cropper.destroy();
                    cropper = new Cropper(image, Object.assign({}, options, { viewMode: e.target.value }));
                });
            });

            var toggleoptions = document.getElementById('toggleOptionButtons').querySelectorAll('[type="checkbox"]');
            toggleoptions.forEach(function (checkbox) {
                checkbox.addEventListener('click', function (e) {
                    var appendOption = {};
                    appendOption[e.target.getAttribute('name')] = e.target.checked;
                    options = Object.assign({}, options, appendOption);
                    cropper.destroy();
                    cropper = new Cropper(image, options);
                })
            });
        };

        return {
            // public functions
            init: function () {
                initCropperADNDUWEB();
            },
        };
    }();

});

var KTMediaDimensionsList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_media_dimensions');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;
    var sizeDefault = ['thumbnails', 'small', 'medium', 'large'];

    // Private functions
    var initMediaDimensionTable = function () {
        // Set date data order

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        window.Ci4DataTables["kt_table_media_dimensions-table"] = $(table).DataTable({
            'responsive': true,
            "info": false,
            "retrieve": true,
            "info": false,
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
                'url':baseController + "/datatable-dimensions",
                'data': {
                    // CSRF Hash
                    [crsftoken]: $('meta[name="X-CSRF-TOKEN"]').attr('content'), // CSRF Token
                    'uuid': table.getAttribute('data-uuid')
                },
            },
            'order': [[1, 'asc']],
            "pageLength": 10,
            "lengthChange": true,
            "stateSave": true,
            'columnDefs': [
    
                {
                    data: 'dimension',
                    targets: 0,
                    render: function(data, type, full, meta) {

                        return ' <div class="d-flex align-items-center"><a href="'+current_url+'#" class="symbol symbol-50px">\
                                    <span class="symbol-label" style="background-image:url('+full.urlThumbnail+'); ?>"></span>\
                                </a>\
                                <div class="ms-5">\
                                     <div class="fs-7 text-muted"> ' + full.dimension + '</div>\
                                        <div class="fs-7 text-muted">\
                                         <a target="_blank" href="' + full.url + '" class="symbol symbol-50px">Voir le lien</a>\
                                    </div>\
                                </div><div>';
                    }, 
                    orderable: false,
                    searchable: false ,
                },
                {
                    data: 'size',
                    targets: 1,
                    render: function(data, type, full, meta) {

                        return  full.size;
                    }, 
                    orderable: false,
                    searchable: false  
                },
                {
                    data: 'width',
                    targets: 2,
                    render: function(data, type, full, meta) {

                        return full.width + 'x' + full.height;
                    }, 
                    orderable: false,
                    searchable: false  
                },
                {
                    data: 'date',
                    targets: 3,
                    render: function(data, type, full, meta) {

                        return  full.date;
                    }, 
                    orderable: false,
                    searchable: false  
                },
                {
                    data: null,
                    targets: 4,
                    render: function(data, type, full, meta) {
                        var htmlContent = '';
                        if(sizeDefault.includes(data.dimension)){
                            htmlContent += '...';
                            return htmlContent;
                        }else{

                            htmlContent += '<td class="text-end">';
                            htmlContent += '<a href="javascript:;" class="btn btn-light btn-active-light-primary btn-sm ajax-datatable-action" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions';
                            htmlContent += '<?= theme()->getSVG('icons/duotone/arrows/arr072.svg', "svg-icon svg-icon-5 m-0", false, true); ?>';
                            htmlContent += '</a>';
                            htmlContent += ' <!--begin::Menu-->';
                            htmlContent += ' <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">';
                            htmlContent +=  '<!--begin::Menu item-->';
                            htmlContent +=  '<div class="menu-item px-3">';
                            htmlContent +=  '<a href="#" class="menu-link px-3" data-uuid="' + full.uuid + '" data-width="' + full.width + '"  data-height="' + full.height + '" data-filename="' + full.filename + '-' + full.width +'x' + full.height + '" data-kt-media_dimensions-table-filter="delete_row">Delete</a>';
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
        Ci4DataTables["kt_table_media_dimensions-table"].on('draw', function (jqXHR, settings) {
            handleDeleteRows();
        });

    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-media_dimensions-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                let uuid = $(this).data('uuid');
                let filename = $(this).data('filename');
                let width = $(this).data('width');
                let height = $(this).data('height');

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete ?",
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
                            uuid:  [uuid],
                            filename: [filename],
                            dimensions: [width + 'x' + height],
                            token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
                            custom: true
                        };

                        axios.delete("<?= route_to('medias.remove.file.custom') ?>", { data: packets})
                        .then( response => {
                            toastr.success(response.data.messages.success);
                            Ci4DataTables["kt_table_media_dimensions-table"].ajax.reload();
                        })
                        .catch(error => { }); 

                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: " Item was not deleted.",
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


    return {
        // Public functions  
        init: function () {
            if (!table) {
                return;
            }

            initMediaDimensionTable();
            handleDeleteRows();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {

    const tabsImages = document.querySelector('[data-kt-tabs="images"]');
    tabsImages.addEventListener('click', function (e) {
        KTMediaDimensionsList.init();
    });

});


</script>