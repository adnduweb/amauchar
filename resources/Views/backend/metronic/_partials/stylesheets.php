<link rel="shortcut icon" href="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/favicons/favicon.ico'); ?>" />

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<!-- Fonts -->
<?= theme()->includeFonts(); ?>
<!--end::Fonts -->

<!-- Global Theme Styles (used by all pages) -->
<?php foreach (Config('AdminTheme')->assets['css'] as $style) { ?>
    <?= asset_link('backend/themes/metronic/' . $style, 'css'); ?>
<?php } ?>

<!--begin::Lang Skins(used by all pages) -->
<script src="<?= base_url('backend/themes/' . service('settings')->get('App.themebo') . '/languages/lang_'. service('request')->getLocale() . '.js'); ?>" type="text/javascript"></script>

<?= theme()->css(); ?>