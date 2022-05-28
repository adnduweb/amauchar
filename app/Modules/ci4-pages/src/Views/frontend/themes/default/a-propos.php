<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>

<section class="section pb-0">
    <?php if($page->getDisplayTitle()){ ?>
    <div class="container">
        <div class="page-title">
            <h1 class="section-title"><?= $page->getName(); ?></h1>
        </div>
    </div>
    <?php } ?>
</section>

<?php if(!empty($composer->getItems())){ ?>

    <!-- carousels -->
    <?php $instance = $composer->getItemBykey(4106); ?>
    <?php if(!empty($instance)){ ?>
        <module data-type="carousel" data-id="<?= $instance[service('request')->getLocale()]['type']; ?>" data-format="one" id="<?= md5('carousel' . $instance[service('request')->getLocale()]['type']); ?>" data-options="<?= json_encode($instance[service('request')->getLocale()]); ?>"></module>
    <?php } ?>

    <section class="section home-services">
        <div class="container text-center">
            <!-- titre -->
            <?php $instance = $composer->getItemBykey(3614); ?>
            <?= view('Themes\frontend\default\_components\titre', ['instance' => $instance]); ?>

            <!-- texte -->
            <div class="mt-4 font-weight-normal">
                <?php $instance = $composer->getItemBykey(218436); ?>
                <?= view('Themes\frontend\default\_components\texte', ['instance' => $instance]); ?>
            </div>
        </div>
    </section>



    <section class="section bg-gris mb-10 cahier-des-charges">
        <div class="container">
            
        
        <div class="row align-items-center">
        <div class="col-md-6 col-xl-6 order-md-1">
            <div class="section-page-block-visual big-image">
                <?php $instance = $composer->getMediaBykey(8366);  ?>
                <?= view('Themes\frontend\default\_components\image', ['instance' => $instance, 'media' => $instance['media'], 'responsive' => false, 'dir' => 'original']); ?>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 order-md-2">
                <?php $instance = $composer->getItemBykey(3614); ?>
                <?= view('Themes\frontend\default\_components\titre', ['instance' => $instance]); ?>

                <div class="text-justity">
                    <?php $instance = $composer->getItemBykey(218436); ?>
                    <?= view('Themes\frontend\default\_components\texte', ['instance' => $instance]); ?>
                </div>
        </div>
        </div>


        </div>
    </section>

    <?php 

$cart = service('cart');

// Insert an array of values
$cart->insert(array(
   'id'      => 'sku_1234ABCD',
   'qty'     => 1,
   'price'   => '19.56',
   'name'    => 'T-Shirt',
   'options' => array('Size' => 'L', 'Color' => 'Red')
));

?>


<?php } ?>


<section class="section">
    <div class="container">
        <?= $page->getDescription(); ?>
    </div>

</section>
<?= $this->endSection() ?>