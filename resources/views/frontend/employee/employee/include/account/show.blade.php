<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>User Account Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email  
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Role 
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Passoword  
                    </label>

                    @component('frontend.common.input.password')
                        @slot('text', 'Password')
                        @slot('id', 'password')
                        @slot('name', 'password')
                        @slot('id_error', 'password')
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Confirm Password 
                    </label>

                    @component('frontend.common.input.password')
                        @slot('text', 'Confirm Password')
                        @slot('id', 'confirm_password')
                        @slot('name', 'confirm_password')
                        @slot('id_error', 'confirm_password')
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Active 
                    </label><br>

                    <span class="m-bootstrap-switch m-bootstrap-switch--pill">
                        <input data-switch="true" type="checkbox" data-on-color="success" checked="checked" disabled>
                    </span>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Bank Account Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Bank Account Number  
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Bank Account Name 
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
            </div>

            <div class="form-group m-form__group row mt-5">
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                    @component('frontend.common.buttons.create-new')
                        @slot('text', 'View History/Past Data')
                        @slot('data_target', '#modal_history_account')
                        @slot('icon','la la-history')
                    @endcomponent
                </div>
            </div>
            
        </fieldset>

        @include('frontend.employee.employee.include.account.modal-history')
    </div>
</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/role.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/bank.js') }}"></script>
    <script>
    
    var BootstrapSwitch = {
        init: function() {
            $("[data-switch=true]").bootstrapSwitch();
        }
    };
    jQuery(document).ready(function() {
        BootstrapSwitch.init();
    });

    </script>
@endpush