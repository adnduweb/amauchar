<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>


   
    <section class="section presentation">
        <div class="container">

        <?php if($page->getDisplayTitle()){ ?>
            <div class="container">
                <div class="page-title">
                    <h1 class="section-title"><?= $page->getName(); ?></h1>
                </div>
            </div>
        <?php } ?>

            <div class="row align-items-center">
                <div class="col-md-6 order-md-1">
                    <h1 class="section-title"><?= lang('front.Cibler le besoin'); ?></h1>
                    <p><strong>Écoute. Analyse. Idées </strong></p>
                    <p>
                        Cette premiére étape est très importante. C'est à ce moment précis où nos cerveaux sont le plus en ébulition, où nos neurones s'agitent dans tous les sens 
                        pour concevoir ensemble votre projet. <br /><br />
                       A travers différent support digital, nous commençons à définir les sénarios de ce que sera votre projet . <br />

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

    <section class="section bg-gris mb-10 cahier-des-charges">
        <div class="container">
            
        
        <div class="row align-items-center">
        <div class="col-md-6 col-xl-6 order-md-1">
            <div class="section-page-block-visual big-image">
                        
            <picture>
                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/cahier-des-charges.png" class="adw_lazyload adw_check_if_is_visible img-responsive responsive" alt="Cahier des charges"/>
            </picture>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 order-md-2">
                <h2 class="section-title mb-4">Le cahier des Charges</h2>
                <div class="text-justity">
                    <p>C'est le document référentiel formalisant à la fois les objectifs à atteindre tout en intégrant toutes les contraintes techniques, esthétiques et fonctionnelles de votre projet.</p>
                    <p>Il pose les fondations de votre nouveau projet tant bien sur les attentes du client et du prestataire que sur les aspects design et technique. </p>
                    <p>Un cahier des charges établit entre les deux acteurs de la réalisation du projet permettra de se poser les bonnes questions et de définir les besions et les attentes précisement.</p>
                    <p>Le cahier des charges est une étape incontournable et une des clés de la réussite de votre projet .</p>
                </div>
        </div>
        </div>


        </div>
    </section>

    <section class="section bg-white mb-10 suivi">
        <div class="container">
            
        
            <div class="row align-items-center">
                <div class="col-md-6 col-xl-4 offset-xl-1 order-md-2">
                    <div class="section-page-block-visual big-image">
                                
                    <picture>
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/suivi.png" class="adw_lazyload adw_check_if_is_visible img-responsive responsive" alt="UI/UX AND du Web"/>
                    </picture>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 order-md-1">
                        <h2 class="section-title mb-4">Outils et méthodologie</h2>
                        <div class="text-justity">
                            <p>L'outil collaboratif va vous permettre de suivre le projet et le construire de façon scallable, évolutive et agile. De savoir ce que nous faisons et ou nous en sommes dans le projet</p>
                            <p>Notre méthode nous permet de gagner de temps sur les phases de buggage de votre projet en vous incluant dans le processus de création et de développement. </p>
                            <p>L'avantage majeur de cette méthode est la collaboration et la communication fréquente avec le client. 
                                Le client est ainsi fortement impliqué dans le projet et nous instaurerons immédiatement une relation de confiance entre l’équipe et le client.</p>
                            <p>L'accompagnement le suivi est égaeênt une des clés de la réussite de votre projet</p>
                        
                            <div class="d-flex">
                                <picture>
                                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/asana.jpg" class="adw_lazyload img-50px " alt="Asana"/>
                                </picture>
                                <picture>
                                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/monday.jpg" class="adw_lazyload img-50px " alt="Monday"/>
                                </picture>
                                <picture>
                                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/trello.jpg" class="adw_lazyload img-50px " alt="Trello"/>
                                </picture>

                                <picture>
                                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/agile.jpg" class="adw_lazyload img-50px " alt="Agile"/>
                                </picture>
                            </div>

                        </div>
                </div>
            </div>


        </div>
    </section>

    <?= $this->include('Amauchar\Pages\frontend\themes\/'.$theme_front.'/\_partials\sections\contact') ?>

<?= $this->endSection() ?>
