@role('employee')
@if($account != null)
        @component('frontend.common.input.hidden')
        @slot('id', 'account_uuid')
        @slot('name', 'account_uuid')
        @slot('value', $account->uuid)
        @endcomponent
@endif
@endrole

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>User Account Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email  
                    </label>

                    @php
                    $email = null;
                    if(isset($account->email)){
                        $email = $account->email;
                    }
                @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $email)
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Role 
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', $role)
                    @endcomponent
                </div>
            </div>

            @php
                $password = null;
                if(isset($account->password)){
                    $password = $account->password;
                }
            @endphp
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Password  
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
                        Confirm Password 
                    </label>

                    @component('frontend.common.input.password')
                        @slot('text', 'Confirm Password')
                        @slot('id', 'password_confirmation')
                        @slot('name', 'password_confirmation')
                        @slot('id_error', 'password_confirmation')
                    @endcomponent
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Active 
                    </label><br>

                    <span class="m-bootstrap-switch m-bootstrap-switch--pill">
                        @php
                        $checked = null;
                        if(isset($account->is_active)){
                        if($account->is_active == 1){
                            $checked = 'checked';
                        }
                    }
                    @endphp
                        <input data-switch="true" type="checkbox" data-on-color="success" checked={{ $checked }} disabled>
                    </span>
                </div>
            </div>
            <div class="form-group m-form__group row px-5">
                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                    <div class="flex">
                        <div class="action-buttons">
                            @role('employee')
                                @component('frontend.common.buttons.submit')
                                @slot('type','button')
                                @slot('id', 'edit-account-pass')
                                @slot('class', 'edit-account-pass')
                                @endcomponent


                                @include('frontend.common.buttons.reset')

                                @include('frontend.common.buttons.back')
                            @endrole
                        </div>
                    </div>
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
                    @php
                        $bank_number = null;
                        if(isset($bank['account_number'])){
                            $bank_number = $bank['account_number'];
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $bank_number)
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Bank Account Name 
                    </label>
                    @php
                        $bank_name = null;
                        if(isset($bank['bank_name'])){
                            $bank_name = $bank['bank_name'];
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $bank_name['name'])
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
    <script src="{{ asset('js/frontend/employee/bank-account/create.js') }}"></script>
    <script>
    
    var BootstrapSwitch = {
        init: function() {
            $("[data-switch=true]").bootstrapSwitch({disabled:true});
        }
    };
    jQuery(document).ready(function() {
        BootstrapSwitch.init();
    });

    </script>

<script src="{{ asset('js/frontend/employee/employee/edit_account_pass.js') }}"></script>
@endpush