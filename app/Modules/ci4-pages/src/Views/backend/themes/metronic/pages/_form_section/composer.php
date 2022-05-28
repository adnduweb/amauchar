<div id="kt_<?= $controller; ?>_view_composer" class=" tab-pane fade pagebuilder">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <div class="card-body pt-0">
          
                <div class="row gy-5 g-xl-10">
                 

                    <div class="col-xl-4 mb-xl-10">
                        <div class="comp-holder">
						<div data-table="comp-<?= md5('image-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                                [Image component]
                            </div>
                            <div data-table="comp-<?= md5('titre-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                                [Titre component]
                            </div>
                            <div data-table="comp-<?= md5('texte-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                                [Texte component]
                            </div>
                            <?php if(!empty($widgets)){ ?>
                                <?php foreach($widgets as $widget){ ?>
                                    <?= $widget->compHolder; ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-8 mb-5 mb-xl-10">
                        <h3>Construction de la page</h3>
                        <div id="dropzone" class="editor-view p-5" ondragover='onDragOver(event);' ondrop='onDrop(event);'>
                    	<?php if(!empty($composer)){ ?>

                          <?php foreach($composer->getItems() as $key => $items){ ?>
								<?php foreach($items as $itemsKey => $item){  ?>
									<?php if(in_array($itemsKey, ['titre', 'image', 'texte'])){ ?>
										<?= view('\Adnduweb\Pages\Views\backend\themes\\' . service('settings')->get('App.theme_bo', 'name')  . '\pages\_components\\' . $itemsKey, ['composer' => $composer, 'k' => $key, 'instanceComp' => $items]); ?>
									<?php }else{ ?>

										<?php if(!empty($widgets)){ ?>
											<?php foreach($widgets as $widget){ ?>
												<?php if(!empty($composer->getItemByInstance($itemsKey))){ ?>
												<?= $widget->viewStore; ?>
												<?php } ?>
											<?php } ?>
										<?php } ?>

									<?php } ?>

								<?php } ?>
                          <?php } ?>
                        <?php } ?>
                    </div>



                </div>
               
            </div>

              <!--begin::Modal footer-->
              <div class="modal-footer flex-center">
               
                <!--begin::Button-->
                <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3"> <?= ucfirst(lang('Core.discard')); ?></button>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                    <span class="indicator-label"> <?= ucfirst(lang('Core.save_form')); ?></span>
                    <span class="indicator-progress"><?= ucfirst(lang('Core.please_wait...')); ?> 
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>

            <?php if (! empty($form->id)) { ?> <?= form_hidden('id', $form->id); ?> <?php } ?>
            <?php if (! empty($form->id_page_lang)) { ?> <?= form_hidden('id_page_lang', $form->id_page_lang); ?> <?php } ?>
        <!-- end:: Content -->

    </div>
    </div>
</div>

<?= $this->section('AdminModal') ?>
    <?= view('Adnduweb\Ci4Medias\Views\themes\metronic\_modals\ImageManger') ?>
<?= $this->endSection() ?>

<?= $this->section('AdminAfterExtraJs') ?>


<script type="text/javascript">

"use strict";
// Class definition

var KTComposer = function () {    
    // Private functions
    var composer = function () {
		const deleteButtons = document.querySelectorAll('[data-etat="delete"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
				e.preventDefault();

				if($(this).data('kt_composer_key') !=''){

					const packets = {
						page_id:  $(this).data('kt_composer_page_id'),
						key:  $(this).data('kt_composer_key'),
						token: $('meta[name="X-CSRF-TOKEN"]').attr('content'),
					};

					axios.post("<?= route_to('page-delete-composer') ?>", packets)
					.then( response => {
						toastr.success(response.data.messages.success, _LANG_.updated + "!"); // Notif
					});
			
					$(this).parent().parent().remove();

				}
			});
		});
	}

	return {
        // public functions
        init: function() {
            composer(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTComposer.init();
});

// Global vars
const dropzone = document.getElementById("dropzone");

function onDragStart(event) {
  event.dataTransfer.setData("text/plain", event.currentTarget.dataset.table);
  event.currentTarget.style.backgroundColor = "#e9c46a";
 // event.classList.add('drag-sort-active');
}

function onDragEnd(event) {
  event.currentTarget.style.backgroundColor = "#2a9d8f";
  slist(dropzone);
}
function onDragOver(event) {
    event.preventDefault();   
}

var randomInteger = function (pow) {
	return Math.floor(Math.random() * pow);
};


function onDrop(event) {
  let id = event.dataTransfer.getData("text");
  let timestamp = Math.round(event.timeStamp);
  console.log(timestamp);
  console.log('id ' + id);
 
  if(id != ''){
    const draggableElement = document.querySelector('.hidden #' + id);
    const clone = draggableElement.cloneNode(true);
    clone.classList = 'time_' + timestamp;
    console.log(draggableElement);
    //__i__
    dropzone.appendChild(clone);

    var draggableElementAfter = document.querySelector('#dropzone #' + id + '.time_' + timestamp);
    draggableElementAfter.innerHTML = draggableElementAfter.innerHTML.replaceAll('__i__', timestamp);
    console.log('#dropzone #' + id + '.time_' + timestamp);
    console.log(draggableElementAfter);


    event.dataTransfer.clearData();
   
  }

}



window.addEventListener("DOMContentLoaded", () => {
  slist(document.getElementById("dropzone"));
});



function slist (target) {
  // (A) SET CSS + GET ALL LIST ITEMS
  target.classList.add("slist");
  let items = target.getElementsByTagName("div"), current = null;

  // (B) MAKE ITEMS DRAGGABLE + SORTABLE
  for (let i of items) {
    // (B1) ATTACH DRAGGABLE
    i.draggable = true;
    
    // (B2) DRAG START - YELLOW HIGHLIGHT DROPZONES
    i.ondragstart = (ev) => {
      current = i;
      for (let it of items) {
        if (it != current) { it.classList.add("hint"); }
      }
    };
    
    // (B3) DRAG ENTER - RED HIGHLIGHT DROPZONE
    i.ondragenter = (ev) => {
      if (i != current) { i.classList.add("active"); }
    };

    // (B4) DRAG LEAVE - REMOVE RED HIGHLIGHT
    i.ondragleave = () => {
      i.classList.remove("active");
    };

    // (B5) DRAG END - REMOVE ALL HIGHLIGHTS
    i.ondragend = () => { for (let it of items) {
        it.classList.remove("hint");
        it.classList.remove("active");
    }};
 
    // (B6) DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
    i.ondragover = (evt) => { evt.preventDefault(); };
 
    // (B7) ON DROP - DO SOMETHING
    i.ondrop = (evt) => {
      evt.preventDefault();
      if (i != current) {
        let currentpos = 0, droppedpos = 0;
        for (let it=0; it<items.length; it++) {
          if (current == items[it]) { currentpos = it; }
          if (i == items[it]) { droppedpos = it; }
        }
        if (currentpos < droppedpos) {
          i.parentNode.insertBefore(current, i.nextSibling);
        } else {
            console.log(i);
          i.parentNode.insertBefore(current, i);
        }
      }
    };
  }
}
</script>

<?= $this->endSection() ?>