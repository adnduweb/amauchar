<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>



<section class="section-slider slider">
    <div class="container">
        <div class="slider-wrapper">
            <div class="slider-item">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="slider-visual">
                            <picture>
                                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-slider-adn-1.jpg" class="adw_lazyload adw_check_if_is_visible" alt="Définition du besoin client"/>
                            </picture>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h2 class="section-title">Définir le besoin client</h2>
                        <p><strong>Écoute et Compréhension</strong></p>
                        <p>
                            La première étape consite à définir un document, une trame pour accompagner au mieux le client dans sa réflexion.  <br />
                            Etats des lieux, axes de développement du projet. <br /><br/>
                            La réussite d'un projet tient à 50% dans la compréhension du besoin de tous les acteurs y compris le client. 
                        </p>
                        <a href="<?= base_url(); ?>/demarrage-du-projet/" title="Découvrir" class="btn btn-primary-rounded"><span>Découvrir</span></a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="slider-visual">
                        <picture>
                                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-slider-adn-2.jpg" class="adw_lazyload adw_check_if_is_visible" alt="Ui/UX, Univers graphique"/>
                            </picture>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h2 class="section-title">Ui/UX, Univers graphique</h2>
                        <p><strong>Alliez la technique et le design</strong></p>
                        <p>
                            Le design d’expérience utilisateur (UX) est un moyen de se différencier grâce à la création de valeur ajoutée pour l’utilisateur mais aussi pour le business.<br/><br/>
                            L'expérience utilisateur est primordial dans tout projet, petit, moyen ou grand. Ne pas oublier que dérrière chaque écran se cache un prospect qui a besoin d'être accompagné
                        </p>
                        <a href="<?= base_url(); ?>/ui-ux-design/" title="Découvrir" class="btn btn-primary-rounded"><span>Découvrir</span></a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="slider-visual">
                        <picture>
                                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-slider-adn-3.jpg" class="adw_lazyload adw_check_if_is_visible" alt="Développement & Intégration web"/>
                            </picture>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h2 class="section-title">Développement & Intégration</h2>
                        <p><strong>Passons à la technique !</strong></p>
                        <p>
                            S’appuyant sur la richesse de l’écosystème open-source, nous vous propons le meilleur de la  technologie pour que votre projet soit évolutif et maintenable dans le temps.<br/><br/>
                            Penser, architecturer et développer comme un produit unique. Nous vous accompagnerons au quotidien avant, pendant et aprés votre projet. 
                        </p>
                        <a href="<?= base_url(); ?>/developpement-web/" title="Découvrir" class="btn btn-primary-rounded"><span>Découvrir</span></a>
                    </div>
                </div>
            </div>

            <div class="slider-item">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="slider-visual">
                        <picture>
                                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-slider-adn-4.jpg" class="adw_lazyload adw_check_if_is_visible" alt="Référencement/Monétisation"/>
                            </picture>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h2 class="section-title">Référencement/Monétisation</h2>
                        <p><strong>Référencement naturel & campagne de pub !</strong></p>
                        <p>
                            Positionnez votre site de manière durable sur les moteurs de recherche !<br/><br/>
                            Nous travaillons sur la structure de votre projet, nous mettons les bonnes balises aux bons endroits.
                        </p>
                        <a href="<?= base_url(); ?>/referencement/" title="Découvrir" class="btn btn-primary-rounded"><span>Découvrir</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section home-services">
    <div class="container text-center">
            <h1 class="section-title">Apprendre. Réussir. Ensemble.<span class="text-br flex-center color-violet"> Passion. Energie. Stratégie</span></h1>
            <h2 class="section-intro text-center">ADN du Web, spécialisée dans l'ecommerce et le dévelopepment sur mesure, accompagne les entreprises de toutes tailles dans leur stratégie de visibilité sur le web.</h2>
            <div class="font-weight-normal"><p>Nous accompagnons les entrepreneurs et décideurs à innover et réussir leurs produits en ayant un impact fort sur leurs utilisateurs.<br>
                Chaque collaboration est basée sur la nécessité de résoudre des problèmes métiers, et de créer de la valeur pour votre activité.</p>
            </div>
    </div>
</section>

<section class="section services">
    <div class="container text-center">

          <h2 class="section-title">Nos services</h2>
              <p class="section-intro text-center">Vous avez besoin d'un développement spécifique, un outil complet pour votre entreprise, d'un hébergement sur mesure et dédié avec une haute disponibilité, d'une intégration pour votre nouvelle identité visuelle, une maintenance oue ue stratégie pour un accompagnement au quotidien ? Nous sommes le partenaire qu'il vous faut !.</p>
        <ul class="home-services-list">
      <li>
        <a href="<?= base_url(); ?>/ui-ux-design/" title="Intégration Maquette" class="home-services-list-item">
            <div class="home-services-list-visual">
                <picture>
                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-design-adn.jpg" class=" adw_lazyload" alt="Intégration Maquette" >
                </picture>
            </div>
            <h3 class="home-services-list-title">Intégration Maquette</h3>
            <p>Besoin d'intégrer une nouvelle charte graphique aux normes du web ?</p>
            <span>#Design UI/UX</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url(); ?>/application-developpement/" title="Application Développement" class="home-services-list-item">
            <div class="home-services-list-visual">
                <picture>
                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-dev-adn.jpg" class=" adw_lazyload" alt="Application Développement" >
                </picture>
            </div>
            <h3 class="home-services-list-title">Application Développement</h3>
            <p>Besoin d'un outil ? Intranet/extranet/CRM/WebApp, gestion interne ?</p>
            <span>#Développement web</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url(); ?>/hebergement-personnalise/" title="Hébergement web" class="home-services-list-item">
            <div class="home-services-list-visual">
                <picture>
                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-cloud-adn.jpg" class=" adw_lazyload" alt="Hébergement web" >
                </picture>
            </div>
            <h3 class="home-services-list-title">Hébergement web</h3>
            <p>Une architecture Open Source basée sur les standards du marché.</p>
            <span>#Hébergement personnalisé</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url(); ?>/maintenance/" title="Maintenance" class="home-services-list-item">
            <div class="home-services-list-visual">
                <picture>
                    <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/illus-maintenance-adn.jpg" class=" adw_lazyload" alt="Maintenance" >
                </picture>
            </div>
            <h3 class="home-services-list-title">Maintenance</h3>
            <p>Besoins ponctuels ? Optimisations, Corrections css/html/js, Debug, Paramétrage, Formation</p>
            <span>#maintenance</span>
        </a>
      </li>
    </ul>
  </div>
</section>



<!-- Start Testimonials Area -->
<section class="testimonials_area section-gap section">
    <div class="container text-center">
        <h2 class="section-title">Nos Avis clients</h2>
        <div class="testi_slider owl-carousel carousel" data-items="1" data-responsiveItem="!0" data-nav="true" data-autoplay="2500" data-smartSpeed="1500" data-responsiveClass="!0" data-dots="true"> 
			<?php foreach($codeurAvis as $avis){ ?>
				<?php if ( $avis->rating->id != '22550' && $avis->rating->id != '21944'){ ?>
					<div class="item item_<?= $avis->rating->id; ?>">
						<div class="testi_item">
							<h4><a target="_blank" href="<?= $avis->rating->url; ?>"><?= $avis->rating->rater->name; ?></a></h4>
							<ul class="list">
								<li class="<?= ($avis->rating->rating > 0) ? 'star' : ' ' ; ?>"><i class="icon-xl las la-star"></i></li>
								<li class="<?= ($avis->rating->rating > 1) ? 'star' : ' ' ; ?>"><i class="icon-xl las la-star"></i></li>
								<li class="<?= ($avis->rating->rating > 2) ? 'star' : ' ' ; ?>"><i class="icon-xl las la-star"></i></li>
								<li class="<?= ($avis->rating->rating > 3) ? 'star' : ' ' ; ?>"><i class="icon-xl las la-star"></i></li>
								<li class="<?= ($avis->rating->rating > 4) ? 'star' : ' ' ; ?>"><i class="icon-xl las la-star"></i></li>
							</ul>
							<div class="wow fadeIn" data-wow-duration="1s">
								<p>
									<?= nl2br($avis->rating->content); ?>
								</p>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
	</section>
    <!-- End Testimonials Area -->
    


    <section class="section bg-white mb-10 text-center">
        <div class="container">
            
            <h2 class="section-title">Ils nous ont fait confiance<span class="text-br font-s flex-center color-violet fs-md-5"> Oui nous profitons de notre site internet pour leur ajouter des backlinks</span></h2>
            <div class="confiance owl-carousel carousel mt-5" data-items=5 data-responsiveItem="true" data-nav="false" data-autoplay="2500" data-smartSpeed="21500" data-responsiveClass="true" data-dots="false"> 
                <div class="item">
                    <a target="_blank" href="https://colandmacarthur.com/fr/">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/col-and-macarthur.jpg" class=" adw_lazyload" alt="Col&MacArthur" >
                    </a>
                </div>
                <div class="item">
                    <a target="_blank" href="https://www.nhp-motoculture.fr">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/nhp.jpg" class=" adw_lazyload" alt="nhp motoculture" >
                    </a>
                </div>
                <div class="item">
                    <a target="_blank" href="https://www.deliceslowcarb.com">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/delicelowcarb.jpg" class=" adw_lazyload" alt="Délices low carb" >
                    </a>
                </div>
                <div class="item">
                    <a target="_blank" href="https://www.la-gacilly.fr">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/la-gacilly-web.jpg" class=" adw_lazyload" alt="La gacilly" >
                    </a>
                </div>
                <div class="item">
                    <a target="_blank" href="https://facet-ingenierie.com">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/facet.jpg" class=" adw_lazyload" alt="Facet ingéniérie" >
                    </a>
                </div>
                <div class="item">
                    <a target="_blank" href="https://studiobombyx.com">
                        <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/studio-bombyx.jpg" class=" adw_lazyload" alt="Studio Bombyx" >
                    </a>
                </div>
            </div>
		</div>

        </div>
    </section>

    <?= $this->include('Adnduweb\Pages\frontend\themes\/'.$theme_front.'/\_partials\sections\contact') ?>


<?= $this->endSection() ?>