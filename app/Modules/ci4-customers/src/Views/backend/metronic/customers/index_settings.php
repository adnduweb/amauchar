<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

<?= view('Amauchar\Customers\Views\backend\metronic\customers\partials\cartd_top', ['customerCount' => $customerCount, 'active' => $active, 'name' => $name]) ?>

    <div class="card card-flush">
        <!--begin::Card-->
        <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header pt-8">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Preferences</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Form-->
            <?= form_open(route_to($name . '.settings'), ['id' => 'kt_file_manager_settings', 'class' => 'kt-form', 'novalidate' => false]); ?>

                <!--begin::Input group-->
                <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"> <?= ucfirst(lang('Customer.delayNew')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" type="number" value="<?= old('delayNew') ? old('delayNew') : setting('Customer.delayNew'); ?>" name="delayNew" id="delayNew-format">
                        <p class="text-muted mt-2 mx-2"> <?= ucfirst(lang('Customer.enNbreJours')); ?></p>
                    </div>
                    <!--end::Col-->
                    
                </div>
                <!--end::Input group-->
                
             

                <div class="fv-row row mb-15">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="fs-6 fw-bold"><?= ucfirst(lang('Customer.fakeCustomer')); ?></label>
                        </div>
                    
                        <div class="col-md-9">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox"  name="fakeCustomer" value="1">
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fv-row row mb-15">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="fs-6 fw-bold"><?= ucfirst(lang('Customer.deleteAllCustomer')); ?></label>
                        </div>
                    
                        <div class="col-md-9">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox"  name="deleteAllCustomer" value="1">
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
                </div>
            <?= form_close(); ?>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    </div>


<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->endSection() ?>