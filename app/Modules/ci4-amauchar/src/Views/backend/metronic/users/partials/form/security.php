<!--begin:::Tab pane-->
<div class="tab-pane fade active show" id="kt_user_view_overview_security" role="tabpanel">
    <?= $this->include('Amauchar\Core\backend\metronic\users\partials\form\tabs\_profile') ?>
    <?= $this->include('Amauchar\Core\backend\metronic\users\partials\form\tabs\_auth_two_step') ?>
    <?php if( auth()->user()->id == $form->id){ ?> 
        <?= $this->include('Amauchar\Core\backend\metronic\users\partials\form\tabs\_notifications_email') ?>         
    <?php } ?>
</div>
