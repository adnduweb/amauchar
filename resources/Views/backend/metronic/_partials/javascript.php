<script>
	var HOST_URL = "<?= current_url(); ?>";
</script>
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
	var optionsPortlet = {
		bodyToggleSpeed: 400,
		tooltips: true,
		tools: {
			toggle: {
				collapse: _LANG_.expand,
				expand: _LANG_.collapse
			},
			reload: _LANG_.reload,
			remove: _LANG_.remove,
			fullscreen: {
				on: 'Fullscreen',
				off: 'Exit Fullscreen'
			}
		},
		sticky: {
			offset: 300,
			zIndex: 101
		}
	};
</script>
<!-- end::Global Config -->

<!-- Global Theme JS Bundle (used by all pages)  -->
<?php foreach (Config('AdminTheme')->assets['js'] as $script) { ?>
    <?= asset_link('backend/themes/metronic/' . $script, 'js'); ?>
<?php } ?> 
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://unpkg.com/htmx.org@1.5.0"></script>
{alerts}
<?= theme()->js(); ?>

<!--end::Page Scripts -->
<?= asset_link('backend/themes/metronic/assets/js/app.js', 'js'); ?>

<?= '' //asset_link('backend/themes/metronic/assets/js/Imagemanger.js', 'js'); ?>
<?php if(file_exists(env('DOCUMENT_ROOT') . '/backend/themes/' . service('settings')->get('App.themebo') . '/assets/js/custom.js')){ ?>
    <?= asset_link('backend/themes/metronic/assets/js/custom.js', 'js'); ?>
<?php } ?>
