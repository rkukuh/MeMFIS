<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>User Account Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email  @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.email')
                        @slot('text', 'Email')
                        @slot('id', 'email')
                        @slot('name', 'email')
                        @slot('id_error', 'email')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Role @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Role')
                        @slot('id', 'role')
                        @slot('name', 'role')
                        @slot('id_error', 'role')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Passoword  @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.password')
                        @slot('text', 'Password')
                        @slot('id', 'password')
                        @slot('name', 'password')
                        @slot('id_error', 'password')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Confirm Password @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.password')
                        @slot('text', 'Confirm Password')
                        @slot('id', 'confirm_password')
                        @slot('name', 'confirm_password')
                        @slot('id_error', 'confirm_password')
                    @endcomponent
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Active 
                    </label><br>

                    <span class="m-bootstrap-switch m-bootstrap-switch--pill">
                        <input data-switch="true" type="checkbox" data-on-color="success" checked="checked">
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
                        Bank Account Number  @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Bank Account Number')
                        @slot('id', 'bank_account_number')
                        @slot('name', 'bank_account_number')
                        @slot('id_error', 'bank_account_number')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Bank Account Name @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Bank Account Name')
                        @slot('id', 'bank_name')
                        @slot('name', 'bank_name')
                        @slot('id_error', 'bank_name')
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

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-account')
                    @slot('class', 'add-account')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @include('frontend.common.buttons.back')

            </div>
        </div>
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