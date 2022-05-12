<!--begin::Header-->
<div id="kt_header" style="" class="header <?= service('theme')->printHtmlClasses('header', false); ?> align-items-stretch" <?= service('theme')->printHtmlClasses('header'); ?>>
	<!--begin::Container-->
	<div class="<?= service('theme')->printHtmlClasses('header-container', false); ?> d-flex align-items-stretch justify-content-between">
		<!--begin::Aside mobile toggle-->
		<?php  if (theme()->getOption('layout', 'aside/display') == true){ ?>
			<div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip" title="Show aside menu">
				<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
					<?= service('theme')->getSVG("icons/duotone/Text/Menu.svg", "svg-icon-2x mt-1"); ?>
				</div>
			</div>
		<?php } ?>
		<!--end::Aside mobile toggle-->

		<?php  if (theme()->getOption('layout', 'aside/display') == false){ ?>
			<!--begin::Logo-->
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
				<a href="<?= site_url(); ?>">
					<img alt="Logo" src="<?=theme()->getMediaUrl('logos/logo-2-dark.svg'); ?>" class="h-35px"/>
				</a>
			</div>
			<!--end::Logo-->
		<?php }else{ ?>
			<!--begin::Mobile logo-->
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
				<a href="<?= site_url(); ?>" class="d-lg-none">
					<img alt="Logo" src="<?=theme()->getMediaUrl('logos/logo-2-dark.svg'); ?>" class="h-15px"/>
				</a>
			</div>
			<!--end::Mobile logo-->
		<?php } ?>

		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			<?php  if (theme()->getOption('layout', 'header/left') == 'menu'){ ?>
				<div class="d-flex align-items-stretch" id="kt_header_nav">
					<?=  $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\header\_menu'); ?>
				</div>
			<?php }elseif(theme()->getOption('layout', 'header/left')=== 'page-title'){ ?>
				<div class="d-flex align-items-center" id="kt_header_nav">
					<?=  $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\page-title\_' . theme()->getOption('layout', 'page/le')['layout']); ?>
				</div>
			<?php } ?>
			<!--end::Navbar-->

			<!--begin::Topbar-->
	        <div class="d-flex align-items-stretch flex-shrink-0">
				<?=  $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\topbar\_base'); ?>
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->
<?php if(service('session')->get('entantque')) { ?>
	<?= util()->notice('Core.Attention Vous êtes connecté en tant que : ' . auth()->user()->last_name . '<br/> Pour revenir à votre compte vous pouvez cliquer <a href="'.route_to('user.return.compte', service('session')->entantque).'">ici</a> ' . auth()->user()->first_name, 'danger', '') ; ?>
<?php } ?>