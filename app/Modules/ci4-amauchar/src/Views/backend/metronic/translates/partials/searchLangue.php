<?= form_open('', ['id' => 'search_translate', 'class' => 'kt-form', 'novalidate' => false]); ?>
<!--begin::Input group-->
    <div class="fv-row mb-5">
        <!--begin::Label-->
        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.choisirLangue')); ?>* : </label>
        <select data-translate-select="select" required name="lang" aria-label="Select a Language" data-placeholder="Select a Language..." data-allow-clear="true" class="form-select form-select-solid fw-bolder selectFilePicker" id="lang">
            <?php foreach (Config('language')->supportedLocales as $k => $lang) { ?>
                <option value="<?= $k; ?>"><?= ucfirst($k); ?></option>
            <?php } ?>
        </select>
        <input type="hidden" class="select_lang_result">
    </div>
        <!--begin::Input group-->
        <div class="fv-row mb-5">
        <!--begin::Label-->
        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.searchInDirLang')); ?>* : </label>
        <select id="fileCore" data-translate-select="select" required name="fileCore" aria-label="Select a file"  data-placeholder="<?= ucfirst(lang('Core.selectAFile')); ?>" class="form-select form-select-solid fw-bolder selectFilePicker fileCore file" data-actions-box="true" title="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" id="fileCore">
        <option></option>
            <?php foreach ($filesCore as $k => $file) { ?>
                <option value="<?= $file['path']; ?>" <?= (isset($fileCoreSelected) && $fileCoreSelected == $file['path']) ? 'selected="selected"': ''; ?>><?= $file['name'] ; ?></option>
            <?php } ?>
        </select>
    </div>

<?= form_close(); ?>