<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>


   
    <section class="section presentation">
        <div class="container">

        <?php if($page->getDisplayTitle()){ ?>
            <div class="container">
                <div class="page-title">
                    <h1 class="section-title"><?= $page->getName(); ?></h1>
                    <h2 class="section-title mb-4">Et si on échangeait ?</h2>
                </div>
            </div>
        <?php } ?>

  
        </div>

    </section>

    <section class="section bg-gris mb-10 cahier-des-charges">
        <div class="container">

        <div class="mb-10">
           
            <p>Le support téléphonique est disponible du lundi au vendredi de 08H00 à 12h30 et de 13H30 à 17H00.</p>
            <p>Téléphone, courriel, formulaire de contact...</p>
            Avec nous, construisez l’application web ou l'ecommerce qui répond à vos enjeux.
            Nous vous aidons à réussir votre business.
            N’hésitez pas à nous contacter !
        </div>
        
        <div class="row align-items-center">
        <div class="col-md-6 col-xl-6 order-md-1">

            <form method="post" id="kt_form_contact" class="kt_form_contact kt_form" novalidate action="<?= uri_string(); ?>">
                <?= csrf_field() ?>

                <div class="d-flex flex-wrap gap-5">

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.firstname'); ?><span class="hs-form-required">*</span></label>
                        <input required data-pristine-required-message="Ce champs est requis" type="text" id="firstname" name="firstname" class="form-control mb-2" value="<?= old('firstname') ?>">
                    </div>

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.lastname'); ?><span class="hs-form-required">*</span></label>
                        <input type="text" required data-pristine-required-message="Ce champs est requis" id="lastname" name="lastname" class="form-control mb-2" value="<?= old('lastname') ?>">
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-5">

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.email'); ?><span class="hs-form-required">*</span></label>
                        <input type="email" required data-pristine-required-message="Ce champs est requis" data-pristine-email-message="Ce champ nécessite une adresse e-mail valide"  id="email" name="email" class="form-control mb-2" value="<?= old('email') ?>">
                    </div>

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.phone'); ?><span class="hs-form-required">*</span></label>
                        <input type="text" required data-pristine-required-message="Ce champs est requis" id="phone" name="phone" class="form-control mb-2" value="<?= old('phone') ?>">
                    </div>

                </div>

                <div class="d-flex flex-wrap gap-5">

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.entreprise'); ?><span class="hs-form-required">*</span></label>
                        <input type="text" required data-pristine-required-message="Ce champs est requis" id="entreprise" name="entreprise" class="form-control mb-2" value="<?= old('entreprise') ?>">
                    </div>

                    <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                        <label><?= lang('Front.fonction'); ?><span class="hs-form-required">*</span></label>
                        <select required data-pristine-required-message="Ce champs est requis" id="fonction" class="form-control mb-2" name="fonction">
                            <option value="" disabled="" selected="">Veuillez sélectionner</option>
                            <option value="Dirigeant(e)" >Dirigeant(e)</option>
                            <option value="Directeur(trice)" >Directeur(trice)</option>
                            <option value="Responsable / Manager" >Responsable / Manager</option>
                            <option value="Chargé(e)" >Chargé(e)</option>
                            <option value="Développeur(se)" >Développeur(se)</option>
                            <option value="Analyste" >Analyste</option>
                            <option value="Consultant(e)" >Consultant(e)</option>
                            <option value="Freelance" >Freelance</option>
                            <option value="Enseignant(e)" >Enseignant(e)</option>
                            <option value="Étudiant(e)" >Étudiant(e)</option>
                            <option value="Autre" >Autre fonction</option>
                        </select>
                    </div>
                
                </div>

                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <label><?= lang('Front.CommentVousAttenduParlerDeNous'); ?><span class="hs-form-required">*</span></label>
                    <input type="text" required data-pristine-required-message="Ce champs est requis" id="ou" name="ou" class="form-control mb-2" value="<?= old('ou') ?>">
                </div>

                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <label><?= lang('Front.votreProjet'); ?><span class="hs-form-required">*</span></label>
                    <textarea id="projet" required data-pristine-required-message="Ce champs est requis" name="projet" rows="5" class="form-control mb-2"> </textarea>
                </div>
              
                <div class="rgpd_text fs-8">
                    <p>theTribe a besoin des coordonnées que vous nous fournissez pour vous contacter au sujet de nos produits et services. 
                    Vous pouvez vous désabonner de ces communications à tout moment. Consultez notre Politique de confidentialité pour en savoir plus sur nos modalités de désabonnement, 
                    ainsi que sur nos politiques de confidentialité et sur notre engagement vis-à-vis de la protection et de la vie privée.</p>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary-rounded" value="<?= lang('Front.submit'); ?>">
                </div>
            </form>

           

        </div>
        <div class="col-md-6 col-xl-6 order-md-2">
                <div class="text-center">
                <img data-src="<?= base_url(); ?>/frontend/themes/<?= $theme_front;?>/img/idee.png" class="adw_lazyload adw_check_if_is_visible "  width="300" alt="Idée contact"/>
                    <div class="mt-80 ml-5 d-flex flex-wrap flex-column text-center"> 
                        <div class="col-lg-12 my-1"> 
                            <div class="contact-box"> <h4>+06 84 63 53 90</h4> </div> 
                        </div> 
                        <div class="col-lg-12 my-1"> 
                            <div class="contact-box">
                                <h4>contact@adnduweb.com</h4> 
                            </div>
                        </div> 
                        <div class="col-lg-12 my-1"> 
                            <div class="contact-box"> 
                                <h4>codeur.com/-adn-du-web</h4>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

<?= $this->endSection() ?>

<?= $this->section('FrontAfterExtraJs') ?>


<script type="text/javascript">

var pristine;
window.onload = function () {

   var form = document.getElementById("kt_form_contact");

   let defaultConfig = {
    // class of the parent element where the error/success class is added
    classTo: 'fv-row',
    errorClass: 'has-danger',
    successClass: 'has-success',
    // class of the parent element where error text element is appended
    errorTextParent: 'fv-row',
    // type of element to create for the error text
    errorTextTag: 'div',
    // class of the error text element
    errorTextClass: 'text-help' 
};


   pristine = new window.pristine(form, defaultConfig, true);
   console.log(pristine);

   form.addEventListener('submit', function (e) {
      e.preventDefault();
      var valid = pristine.validate();

      if(valid == true){
        form.submit();
      }

   });


};

</script>

<?= $this->endSection() ?>