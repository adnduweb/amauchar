<!doctype html>
<html class=""  lang="<?= service('request')->getLocale(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->include('Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\head') ?>
    <?= $this->include('Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\stylesheets') ?>
</head>

<body <?= service('theme')->printHtmlAttributes('body'); ?> <?= service('theme')->printHtmlClasses('body'); ?>  style="height: 100%!important;" >
	
    <?= $this->renderSection('main') ?>

    <!-- Global Theme JS Bundle (used by all pages)  -->
    <?php foreach (Config('AdminTheme')->assets['js'] as $script) { ?>
        <?= asset_link('backend/themes/metronic/' . $script, 'js'); ?>
    <?php } ?> 

    <?= asset_link('backend/themes/metronic/assets/js/app.js', 'js'); ?>

    <?= asset_link('backend/themes/metronic/assets/js/custom/authentication/sign-in/general.js', 'js'); ?>
    {alerts}
    <?= $this->renderSection('pageAdminScripts') ?>

</body>
</html>