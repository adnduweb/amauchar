<!-- Global Theme JS Bundle (used by all pages)  -->
<?php foreach (Config('FrontTheme')->layout['assets']['js'] as $script) { ?>
<?= asset_link('frontend/themes/default/' . $script, 'js'); ?>
<?php } ?> 

<?= $this->renderSection('FrontBeforeExtraJs') ?>

<?php if (service('settings')->get('Consent.requireConsent') == 'on'){ ?>
    <script type="text/javascript">
    // Définition de la langue de tarteaucitron en fonction de la langue courante
    var tarteaucitronForceLanguage = '<?= service('request')->getLocale(); ?>'; /* supported: fr, en, de, es, it, pt, pl, ru */
    </script>
    <?= asset_link('frontend/themes/default/plugins/tarteaucitron/tarteaucitron.js', 'js'); ?>
    <?= $this->include('\Themes\frontend\/'.$theme_front.'/\_rgpd\scripts') ?>
 <?php } ?>
 {alerts}
 <?= themefo()->js(); ?>
<!--end::Page Scripts -->

<?= $this->renderSection('FrontAfterExtraJs') ?>