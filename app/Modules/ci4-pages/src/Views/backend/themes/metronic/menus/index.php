<?= $this->extend('Themes\backend\metronic\admin') ?>
<?= $this->section('main') ?>
<div class="card ">
<!--begin::Card header-->
    <div class="card-header border-0 pt-6">
      
        <?php foreach ($menu_items as $item) { ?>
            <div class="me-3">
                 <a href="<?= route_to('menu-index',  $item->id); ?>"class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    Menu : <?= $item->name; ?>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                     
                    <?php if ($item->id != '1') { ?>
                        <div class="menu-item px-5 my-1">
                            <a class="menu-link px-5" href="/<?= route_to('delete-index',  $item->id); ?>"> <?= lang('Core.delete'); ?></a>
                        </diV>
                    <?php } ?>
                    <div class="menu-item px-5 my-1">
                        <a class="menu-link px-5" href="/<?= route_to('edit-index',  $item->id); ?>"><?= lang('Core.edit'); ?></a>
                    </div>
                
                </div>
            </div>
        <?php } ?>

    </div>
                    

    <!--end::Card header-->
    <div class="card-body p-5">

        <div class="row">
            <div class="col-xl-16 col-lg-7 order-lg-3 order-xl-1">
                <h2 style="margin-bottom:30px;">Menu : <?= $menu_item->name; ?></h2>
                    <table id="kt_file_manager_list" class="table align-middle table-row-dashed fs-6 gy-5">
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">          
                            <div id="draggable2">
                            <?= $this->include('\Adnduweb\Pages\Views\backend\themes\metronic\menus\__form_section\get_menu'); ?>
                            </div>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
         
             </div>
            <div class="col-xl-5 col-lg-5 order-lg-3 order-xl-1 kt-section">
                <?= $this->include('\Adnduweb\Pages\Views\backend\themes\metronic\menus\__form_section\form_menu'); ?>
               
            </div>
        </div>


    </div>
    <!--end: Datatable -->
</div>


<?= $this->endSection() ?>

<?= $this->section('AdminAfterExtraJs') ?>

<script type="text/javascript">

(function() {
    new NestedSort({
//   data: [
//     { id: 1, text: "Item 1" },
//     { id: 11, text: "Item 1-1", parent: 1 },
//     { id: 2, text: "Item 2" },
//     { id: 3, text: "Item 3" },
//     { id: 111, text: "Item 1-1-1", parent: 11 },
//     { id: 112, text: "Item 1-1-2", parent: 11 },
//     { id: 31, text: "Item 3-1", parent: 3 }
//   ],
  actions: {
    onDrop(data) { // receives the new list structure JSON after dropping an item
      console.log(data);

        const postData = { data };
        const apiURL = current_url + '/sort-menu';

        fetch(apiURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": csrfHash
            },
            body: JSON.stringify(postData),
        })
            .then(response => response.json())
            //.then(jsonResponse => console.log('Success: ', jsonResponse))
            .then(jsonResponse => toastr.success(jsonResponse.messages.success, _LANG_.updated + "!"))
            .catch(error => console.log('Error: ', error));
            
            
    }
  },
  droppingEdge: 5,
  el: '#draggable2', // a wrapper for the dynamically generated list element
  listClassNames: ['nested-sort'] // an array of custom class names for the dynamically generated list element
})
})();



var remove_accents = function (strAccents) {
        var strAccents = strAccents.split('');
        var strAccentsOut = new Array();
        var strAccentsLen = strAccents.length;
        var accents =    "ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž";
        var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
        for (var y = 0; y < strAccentsLen; y++) {
            if (accents.indexOf(strAccents[y]) != -1) {
                strAccentsOut[y] = accentsOut.substr(accents.indexOf(strAccents[y]), 1);
            } else
                strAccentsOut[y] = strAccents[y];
        }
        strAccentsOut = strAccentsOut.join('');
        strAccentsOut = strAccentsOut.toLowerCase();

        return strAccentsOut;
    }


    var slug = function () {

        var string = $('#menu-add input#name').val();
        console.log(string);
        string = remove_accents(string);
        string = string.replace(/[^a-z0-9\s]/gi, '').replace(/[-\s]/g, '-');

        $('#menu-add input#slug').val(string);
    }

    $('#menu-add input#name').on('keyup', slug);



</script>

<?= $this->endSection() ?>