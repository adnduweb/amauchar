<!doctype html>
<html lang="<?= service('request')->getLocale(); ?>">
<head>
    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\head') ?>
    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\stylesheets') ?>
    
    <?php if(isset($addJsDef)) { ?>
    <script type="text/javascript">
        <?php
        $htmlJs = "";
        foreach ($addJsDef as $k => $v) {
            $htmlJs .= ' let ' . $k . ' = ';
            if (preg_match('`\[(.+)\]`iU', $v)) {
                $htmlJs .=  $v;
            }
            elseif (preg_match('#{#', $v)) {
                $htmlJs .=  $v;
            } 
             else {
                $htmlJs .= "'" . $v . "'";
            }

            $htmlJs .= '; ' . "\n\t\t";
        }
        echo $htmlJs;
    ?>
    </script>
    <?php } ?>
    <?= $this->renderSection('pageAdminStyles') ?>
</head>

<body <?= service('theme')->printHtmlAttributes('body'); ?> <?= service('theme')->printHtmlClasses('body'); ?>  <?= service('theme')->printCssVariables('body'); ?>  <?= (service('settings')->get('App.asideToogle', 'user:' . user_id()) == 1) ? 'data-kt-aside-minimize="on"' : '' ?> >

    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\content') ?>

    <?php if((new \Amauchar\Core\Entities\User())->isSuperHero() == true || (new \Amauchar\Core\Entities\User())->isSuperCaptain() == true) { ?>
        <!-- begin::Modal En tant que -->
        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\entantque') ?> 
        <!-- end::Modal En tant que -->
     <?php } ?>
     <?= $this->renderSection('AdminModal') ?>

     <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\aside/_modals/_modal_devis') ?> 

    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\javascript') ?>


<?= $this->renderSection('pageAdminScripts') ?>
</body>
</html>
