        <?= form_open(route_to('media.edition.image.save'), ['id' => 'kt_apps_edition_manager_media', 'class' => 'kt-form', 'novalidate' => false]); ?>
            <div class="modal-body">
                <div class="flexbox-container">
                    <div class="flexbox-container-1">
                        <div class="attachment-details">
                        <?php if (!empty($media)) { ?>
                            <?php $file = new \CodeIgniter\Files\File($media->getPath('original')); ?>
                            <?php list($width, $height, $type, $attr) = getimagesize($media->getPath('original')); ?>
                            <div data-type="<?= $media->getType(); ?>" data-media-thumbnail="<?= $media->getMedium() ?>" id="attachment-media-view_<?= $media->getID(); ?>" class="attachment-media-view <?= $media->getType(); ?> landscape attachment-media-view<?= $media->getID(); ?>" data-uuid-media="<?= $media->getUuid(); ?>">
                                <div class="thumbnail thumbnail-image" id="thumbnail-image<?= $media->getID(); ?>">
                                    <img class="details-image" src="<?= $media->getThumbnail() ?>" />

                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div id="cropImage"></div>
                    </div>
                    <div class="attachment-info flexbox-container-2">
                        <div class="information">
                            <div> <strong><?= lang('Medias.Nom du fichier'); ?></strong> : <?= $file->getBasename(); ?> </div>
                            <div> <strong><?= lang('Medias.Taille du fichier'); ?></strong> : <?= bytes2human($file->getSize()); ?></div>
                            <div> <strong><?= lang('Medias.Type du fichier'); ?></strong> : <?= $media->getType(); ?> </div>
                            <div> <strong><?= lang('Medias.Date du fichier'); ?></strong> : <?= $media->setCreatedAt($media->created_at); ?> </div>
                            <?php if ($media->getOrientation() != 'square') { ?>
                                <div> <strong><?= lang('Medias.dimensions du fichier'); ?></strong> : <?= $width; ?> pixels par <?= $height; ?> pixels </div>
                            <?php } ?>
                            <div> <strong><?= lang('Medias.url du fichier'); ?></strong> :  <?= $media->getUrlMedia('original'); ?> </div>
                            <hr>
                            <?php if (setting('Amauchar.settingActiverMultilangue') == true) { ?>
                                <?php $setting_supportedLocales = json_decode(service('Settings')->setting_supportedLocales); ?> 
                                <div class="lang_tabs" data-dft-lang="<?= service('Settings')->setting_lang_iso; ?>" style="display: block;">

                                    <?php foreach ($setting_supportedLocales as $k => $v) {
                                        $langExplode = explode('|', $v); ?>
                                        <a href="javascript:;" data-lang="<?= $langExplode[1]; ?>" data-id_lang="<?= $langExplode[0]; ?>" class="btn <?= (service('Settings')->setting_id_lang == $langExplode[0]) ? 'btn-success active'  : 'btn-primary'; ?> lang_tab btn-icon btn-outline-brand"><?= ucfirst($langExplode[1]); ?></a>
                                    <?php   } ?>
                                </div>
                                <hr>
                            <?php   } ?>
                           
                            <div class="kt-portlet__body">
                                <div class="form-group">
                                    <label><?= ucfirst(lang('Core.titre')); ?></label>
                                    <?= form_input_lang('titre', $media->getLangAll(), 'id="titre" class="form-control form-control-solid form-input-control-lang"', 'text', true); ?> 
                                </div>
                                <div class="form-group">
                                    <label><?= ucfirst(lang('Core.legende')); ?></label>
                                    <?= form_input_lang('legende', $media->getLangAll(), 'id="legende" class="form-control form-control-solid form-input-control-lang"', 'text', true); ?> 
                                </div>
                                <div class="form-group">
                                    <label><?= ucfirst(lang('Core.descriptionAlt')); ?> </label>
                                    <?= form_input_lang('description', $media->getLangAll(), 'id="description" class="form-control form-control-solid form-input-control-lang"', 'text', true); ?> 
                                </div>
                                <?= form_input(['type'  => 'hidden', 'name'  => 'uuid_media', 'id'    => 'uuid_media', 'value' => $media->getUuid(), 'class' => 'id_media']); ?>
                                <?= form_input(['type'  => 'hidden', 'name'  => 'id_media_lang', 'id'    => 'id_media_lang', 'value' => $mediaLang->id_media_lang, 'class' => 'id_media_lang']); ?>

                                <div class="separator separator-dashed my-5"></div>

                                <div class="d-flex flex-row">
                                <?php foreach($supportedLocales as $lang){ ?>
                                    <div class="menu-item ">
                                        <a href="<?= current_url(); ?>" data-choice-lang="<?= $lang['iso_code']; ?>" class="data-choice-lang menu-link px-3"><img class="w-15px h-15px rounded-1 ms-2" src="<?= theme()->getMediaUrl($lang['flag']); ?>" alt="<?= ucfirst(lang($lang['name'])); ?>"/></a>
                                    </div>
                                <?php } ?>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions mt-5">
                                    <button type="submit" class="btn btn-sm btn-light font-weight-bolder kt_apps_edition_manager_media_submit"><?= ucfirst(lang('Core.save')); ?></button>
                                    <button data-imagemanager="reload" data-uuid="<?= $media->getUuid(); ?>" type="button" class="btn btn-sm btn-light btn-danger deleteFileMedia"><?= ucfirst(lang('Core.deleteFile')); ?></button>
                                    <?php if (preg_match('/^image/',  $media->getType()) && $media->extension  != 'svg') { ?>
                                        <button data-crop="true" data-uuid="<?= $media->getUuid(); ?>" type="button" class="btn btn-sm btn-light btn-dark croppedFile"><?= lang('Medias.cropped file'); ?></button>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div id="imageCustom">
                                <?= $this->include('Amauchar\Medias\Views\backend\metronic\imageCustom') ?>
                            </div>
                        </div>
                    </div> 
                <?= form_close(); ?>