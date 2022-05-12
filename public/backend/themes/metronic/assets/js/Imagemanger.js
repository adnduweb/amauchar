"use strict";

// Class definition
var KTImageManager = function() {

    // Elements
    var modal;
    var modalEl;
    var uuid = [];
    var id = [];
    var url = [];

    var bouttonCancelImageManager = document.querySelector('[data-kt-imagemanager-input-action="cancel"]');
    var editImageManagerModal = document.querySelector('[data-kt-modalimagemanager-action="edit"]');

    var bouttonInserer = document.querySelector('[kt-filemanager-modal="inserer"]');
    var repeaterCreate = document.querySelector("[data-repeater-create]");
    var listMediaContainer = document.querySelector("#list-media-container");

    var initRepeaterCreate = () => {
        if (repeaterCreate != undefined) {
            repeaterCreate.addEventListener('click', function(e) {
                initImageManager();
            });
        }
    }

    var initImageManager = () => {

        document.querySelector('#kt_modal_image_manager').addEventListener('hide.bs.modal', function() {
            console.log('Modal Close !');
            bouttonImageManager.forEach(d => {
                d.setAttribute('data-kt-filemanager-state', false);
            });
        });

        var bouttonImageManager = document.querySelectorAll('[data-kt-filemanager="imageManager"]');
        var listMediaContainer = modalEl.querySelector('#list-media-container');
        bouttonImageManager.forEach(d => {

            d.addEventListener('click', function(e) {
                modal.hide();
                var packets = {
                    type: d.getAttribute('data-kt-filemanager-type'),
                };

                axios.post(base_url + segementAdmin + "/medias/get-image-manager", packets)
                    .then(response => {
                        d.setAttribute('data-kt-filemanager-state', true);
                        modal.show();
                        console.log('Modal Open !');

                        listMediaContainer.innerHTML = response.data.listMedia;

                    })
                    .catch(error => {});
            });
        });

    }

    // Init dropzone
    var initImageManagerDropzone = () => {

        var listMediaContainer = document.querySelector("#list-media-container");
        var blockUI = new KTBlockUI(listMediaContainer);

        var elements = $('#kt_modal_image_manager').find('.dz-clickable');
        if (elements.length > 0)
            return;


        Dropzone.autoDiscover = false;
        var DropZone = new Dropzone('#kt_modal_upload_dropzone_modal', {
            url: Medias.urlUpload + "?time=" + $.now(),
            maxFiles: 50,
            maxFilesize: 5,
            acceptedFiles: Medias.acceptedFiles,
            uploadmultiple: true,
            addRemoveLinks: !0,
            timeout: 60000,
            params: function(files, xhr, chunk) {
                if (chunk) {
                    return {
                        dzUuid: chunk.file.upload.uuid,
                        dzChunkIndex: chunk.index,
                        dzTotalFileSize: chunk.file.size,
                        dzCurrentChunkSize: chunk.dataBlock.data.size,
                        dzTotalChunkCount: chunk.file.upload.totalChunkCount,
                        dzChunkByteOffset: chunk.index * this.options.chunkSize,
                        dzChunkSize: this.options.chunkSize,
                        dzFilename: chunk.file.name,
                        userID: 1,
                    };
                }
            },
            chunking: true, // enable chunking
            forceChunking: true, // forces chunking when file.size < chunkSize
            chunkSize: 75387608, // chunk size 1,000,000 bytes (~1MB)
            retryChunks: true, // retry chunks on failure
            retryChunksLimit: 3, // retry maximum of 3 times (default is 3)
            headers: {
                'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },

        });

        DropZone.on("addedfile", function(o) {
            console.log('addedfile');
        });
        DropZone.on("sending", function(file, xhr, formData) {
            blockUI.block();
        });

        DropZone.on("queuecomplete", function(file, response) {
            if (DropZone.files[0].status == Dropzone.SUCCESS) {

                var packets = {
                    type: 'image',
                    uploadFinal: true,
                    token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
                };

                axios.post(Medias.urlUploadFinal, packets)
                    .then(response => {
                        blockUI.release();
                        $('#list-media-container').html(response.data.listMedia);
                        DropZone.removeAllFiles();
                    })
                    .catch(error => {});

            }
        });

        DropZone.on('success', function(file, response) {
            console.log(file, response);
        });
        DropZone.on("error", function(file, response, xhr) {
            console.log('errored', file, response, xhr); // for debugging
            if (typeof xhr !== 'undefined') {
                this.defaultOptions.error(file, xhr.statusText); // use xhr err (from server)
            } else {
                this.defaultOptions.error(file, response); // use default (from dropzone)
            }
        });

    }

    var initSelectedImageManager = () => {

        var selectMedia = listMediaContainer.querySelectorAll('.cardImage');

        $(modalEl).on('click', '.cardImage', function(e) {

            $('.cardImage').removeClass('image-selected');
            uuid = [];
            id = [];
            url = [];
            if ($(this).hasClass('image-selected')) {
                $(this).removeClass('image-selected');
            } else {
                console.log('Images Sélectionnées');
                $(this).addClass('image-selected');
                bouttonInserer.removeAttribute('disabled');
            }

            if ($(this).hasClass('image-selected')) {
                var imageSelected = listMediaContainer.querySelectorAll('.image-selected');

                imageSelected.forEach(function(el, index, array) {
                    uuid.push(el.getAttribute('data-kt-filemanager-uuid-media'));
                    id.push(el.getAttribute('data-kt-filemanager-id-media'));
                    url.push(el.getAttribute('data-kt-filemanager-url-image'));
                });

            }
        });

    }

    var handleInserer = () => {

        var butonInserer = document.querySelector('[kt-filemanager-modal="inserer"]');

        butonInserer.addEventListener('click', function(t) {

            var inputs = document.querySelector('[data-kt-filemanager-state="true"]').nextElementSibling
            var container = document.querySelector('[data-kt-filemanager-state="true"]').parentNode
            var imageInputWrapper = container.querySelector('.image-input-wrapper');
            var imageInput = container.querySelector('.image-input');

            if (imageInputWrapper) {
                imageInputWrapper.style.backgroundImage = "url('" + url[0] + "')";
                if (imageInput) {
                    imageInput.classList.remove('image-input-empty');
                } else {
                    container.classList.remove('image-input-empty');
                }
            }

            inputs.querySelector('.uuid_media').value = uuid;
            inputs.querySelector('.id_media').value = id;
            inputs.querySelector('.url_media_medium').value = url;
            console.log('Images Insérees');
            $('#list-media-container').html('');
            modal.hide();
        });

    }

    const initImageManageReset = () => {

        if (bouttonCancelImageManager != null) {

            var inputs = bouttonCancelImageManager.parentNode;
            var imageInputWrapper = inputs.querySelector('.image-input-wrapper');

            bouttonCancelImageManager.addEventListener('click', function(e) {
                imageInputWrapper.style.backgroundImage = "url('" + Medias.url_media_default + "')";
                inputs.querySelector('.uuid_media').value = '';
                inputs.querySelector('.id_media').value = Medias.id_media_default;
                inputs.querySelector('.url_media_medium').value = Medias.url_media_default;
                console.log('supression image');
            });
        }
    }

    const initImageManageEditModal = () => {
        // alert('fgsdgd');

        $(modalEl).on('click', '.modalimagemanager-action-edit', function(e) {
            console.log('edition image');
            let uuid = $(this).data('uuid-media');

            axios.post(Medias.editionImage, { uuid: uuid })
                .then(response => {
                    //console.log(response);
                    // blockUI.release();
                    $('#list-media-edition').html(response.data.editionMediaManager);
                    // DropZone.removeAllFiles();
                })
                .catch(error => {});
        });
    }

    const initImageManageSaveModal = () => {

        $(modalEl).on('click', '.kt_apps_edition_manager_media_submit', function(e) {
            e.preventDefault();

            console.log('save Edition image');
            var form = document.getElementById('kt_apps_edition_manager_media');
            var formElement = new FormData(form);

            axios.post(Medias.saveEditionImage, formElement)
                .then(response => {
                    toastr.success(response.data.messages.sucess); // Notif
                })
                .catch(error => {});

        });
    }


    const initImageManageDeleteModal = () => {

        $(modalEl).on('click', '.deleteFileMedia', function(e) {
            e.preventDefault();
            var uuid = $(this).data('uuid');

            console.log('delete image');

            const packets = {
                uuid: [uuid],
                imageEditionManager: true,
                type: 'image'
            };

            axios.delete(Medias.deleteEditionImage, { data: packets })
                .then(response => {
                    toastr.success(response.data.messages.sucess); // Notif
                    $('#list-media-container').html(response.data.listMedia);
                    $('#list-media-edition').html('');
                })
                .catch(error => {});

        });
    }




    return {

        // public functions
        init: function(event) {
            // Elements
            modalEl = document.querySelector('#kt_modal_image_manager');

            if (!modalEl) {
                return;
            }

            modal = new bootstrap.Modal(modalEl);

            initImageManager();
            initRepeaterCreate();
            initSelectedImageManager();
            handleInserer();
            initImageManagerDropzone();
            initImageManageReset();
            initImageManageEditModal();
            initImageManageSaveModal();
            initImageManageDeleteModal();

        },
    };
}();

// // Webpack support
// if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
//     module.exports = KTImageManager;
// }

// window.addEventListener("DOMContentLoaded", (event) => {
//     console.log("DOM entièrement chargé et analysé");
// });

// $(document).ready(function() {
//     KTImageManager.init();
// });