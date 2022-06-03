

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
					};

					axios.post("<?= route_to('page.delete.composer') ?>", packets)
					.then( response => {
						toastr.success(response.data.messages.success); // Notif
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
    KTAppsAdnduWeb.init();  

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