<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>


    <?php if($page->getDisplayTitle()){ ?>
    <div class="container">
        <div class="page-title">
            <h1 class="section-title"><?= $page->getName(); ?></h1>
        </div>
    </div>
    <?php } ?>
    <section class="section presentation">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-md-6 order-md-1">
                        <h1 class="section-title">Expérience utilisateur</h1>
                    <p><strong>Écoute et Compréhension</strong></p>
                    <p>
                        La première étape consite à définir un document, une trame pour accompagner au mieux le client dans sa réflexion.  <br />
                        Etats des lieux, axes de développement du projet. <br /><br/>
                        La réussite d'un projet tient à 50% dans la compréhension du besoin de tous les acteurs y compris le client. 
                    </p>
                </div>
                <div class="col-md-6 order-md-2">
                    <picture>
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-slider-adn-1.jpg" class="adw_lazyload adw_check_if_is_visible img-responsive responsive" alt="UI/UX AND du Web"/>
                    </picture>
                </div>    
            </div>
    
        <?= $page->getDescription(); ?>
        </div>

    </section>
<?= $this->endSection() ?>
