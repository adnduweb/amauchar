<div id="edit_menu"></div>

    <?= form_open('', ['id' => 'menu-add', 'class' => 'kt-form kt-section', 'novalidate' => false, 'style' => 'margin-top:30px;']); ?>
    <h3> <?= lang('Core.add_menu_perso'); ?> </h3>
    <div class="kt-section__content kt-section__content--solid">

        <div class="fv-row mb-7">
            <label class="fs-6 fw-bold mb-2" for="addInputName"><?= lang('Core.name'); ?></label>
            <input type="text" class="form-control form-control-solid" required="" id="name" placeholder="" name="lang[<?= service('request')->getLocale(); ?>][name]" value="<?= $menu_item->getName(); ?>" kl_vkbd_parsed="true">
        </div>

        <div class="fv-row mb-7">
            <label class="fs-6 fw-bold mb-2" for="addInputSlug"><?= lang('Core.slug'); ?> &nbsp;</label>
            <input type="text" class="form-control form-control-solid" required="" id="slug" placeholder="" name="lang[<?= service('request')->getLocale(); ?>][slug]" value="<?= $menu_item->getSlug(); ?>" kl_vkbd_parsed="true">
        </div>

        <div class="fv-row mb-7">
            <label class="fs-6 fw-bold mb-2" for="id"><?= ucfirst(lang('Core.menu_item')); ?></label>
            <select required name="menu_main_id" class="form-control form-control-solid selectpicker file kt-selectpicker" data-actions-box="true" title="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" id="id">
                <?php foreach ($menu_items as $item) { ?>
                    <option <?= ($menu_item->getMainId() == $item->id) ? 'selected' : '' ?> ><?= $item->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="fv-row mb-7">
            <label class="fs-6 fw-bold mb-2" ><?= ucfirst(lang('Core.actif')); ?></label>
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input w-30px h-20px" type="checkbox"  name="active" <?= ($menu_item->getActive() == 1) ? 'checked' : '' ?> value="1">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </div>

    </div>

    <input type="hidden" name="menu_main_id" value="<?= $menu_main->id; ?>" />
    <input type="hidden" name="depth" value="0" />
    <input type="hidden" name="left" value="0" />
    <input type="hidden" name="right" value="0" />
    <input type="hidden" name="id_menu" value="<?= $menu_item->getID(); ?>" />
    <input type="hidden" name="id_menu_lang" value="<?= $menu_item->getIDLang(); ?>" />

    <button class="btn btn-primary btn-sm" id="addButton"> <i class="fa fa-plus-circle" aria-hidden="true"></i> <?= lang('Core.add_menu'); ?></button>
    <?= form_close(); ?>