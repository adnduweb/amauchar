<!-- Fonts -->
<link href='https://fonts.gstatic.com' crossorigin rel='preconnect' />
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<!-- Fonts -->
<?= service('themefo')->includeFonts(); ?>
<!--end::Fonts -->


<!-- Global Theme Styles (used by all pages) -->
<?php foreach (Config('FrontTheme')->layout['assets']['css'] as $style) { ?>
   <?= asset_link('frontend/themes/default/' . $style, 'css'); ?>
<?php } ?>

 <?php if (service('settings')->get('Pages.consent', 'requireConsent') == 1){ ?>
    <link href="<?= site_url(); ?>/frontend/themes/default/plugins/tarteaucitron/css/tarteaucitron.css" rel="stylesheet" type="text/css">
 <?php } ?>
 <?= service('themefo')::css(); ?> 

 <?php if(!empty($page->getPageBuilder())){ ?>
       <style> <?= $page->getPageBuilder()->css; ?></style>
    <?php } ?>


 <?= $this->renderSection('displayInHeadTag') ?>

