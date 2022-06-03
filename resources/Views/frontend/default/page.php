<!DOCTYPE html>
<html class="<?= $html; ?>" lang="<?= service('request')->getLocale(); ?>">

<head>
	<?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_partials\head') ?>
	<?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_partials\stylesheets') ?>
</head>


<!-- begin::Body -->

<body id="<?= ($page->getHomePage() == true) ? 'home' : 'page'; ?>" class="<?= service('themefo')->printHtmlClasses('body', false); ?><?= ($page->getHomePage() == true) ? 'home' : ''; ?> page-template page-template-homepage page page-id-<?= $page->getID(); ?>"  <?= service('theme')->printCssVariables('body'); ?> >
	<?= $this->renderSection('displayAfterBodyOpeningTag') ?>
	<div class="body-wrapper">
	
		<?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_partials\header') ?>
		<aside class="alerts-fixed">
			{alerts}
		</aside>
		<?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_content') ?>

		<?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_partials\footer') ?>

	</div>
    <?= $this->include('\Themes\frontend\/'.service('settings')->get('App.themefo').'/\_partials\javascript') ?>
    
</body>
<!-- end::Body -->
</html>