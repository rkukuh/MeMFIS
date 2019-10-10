@component('frontend.common.input.hidden')
        @slot('id', 'employee_uuid')
        @slot('name', 'employee_uuid')
        @slot('value', $employee->uuid)
@endcomponent


    @if($account != null)
        @component('frontend.common.input.hidden')
        @slot('id', 'account_uuid')
        @slot('name', 'account_uuid')
        @slot('value', $account->uuid)
        @endcomponent
    @endif

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>User Account Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email  @include('frontend.common.label.required')
                    </label>

                    @php
                        $email = null;
                        if(isset($account->email)){
                            $email = $account->email;
                        }
                    @endphp
                    @component('frontend.common.input.email')
                        @slot('text', 'Email')
                        @slot('id', 'email')
                        @slot('name', 'email')
                        @slot('value', $email)
                        @slot('id_error', 'email')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Role @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('id', 'role')
                        @slot('name', 'role')
                        @slot('id_error', 'role')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Password  @include('frontend.common.label.required')
                    </label>

                    @php
                        $password = null;
                        if(isset($account->password)){
                            $password = $account->password;
                        }
                    @endphp
                    @component('frontend.common.input.password')
                        @slot('text', 'Password')
                        @slot('id', 'password')
                        @slot('name', 'password')
                        @slot('value',$password)
                        @slot('id_error', 'password')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Confirm Password @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.password')
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
                        <input name="isActive" data-switch="true" type="checkbox" data-on-color="success" checked={{ $checked }}>
                    </span>
                </div>
            </div>

            <div class="form-group m-form__group row px-5">
                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                    <div class="flex">
                        <div class="action-buttons">
                            @if ($account == null)
                            @component('frontend.common.buttons.submit')
                            @slot('type','button')
                            @slot('id', 'create-account')
                            @slot('class', 'create-account')
                            @endcomponent
                            @else    
                            @component('frontend.common.buttons.submit')
                            @slot('type','button')
                            @slot('id', 'edit-account')
                            @slot('class', 'edit-account')
                            @endcomponent
                            @endif
                            

                            @include('frontend.common.buttons.reset')

                            @include('frontend.common.buttons.back')

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
                        Bank Account Number  @include('frontend.common.label.required')
                    </label>

                    @php
                        $bank_number = null;
                        if(isset($bank['account_number'])){
                            $bank_number = $bank['account_number'];
                        }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('text', 'Bank Account Number')
                        @slot('id', 'bank_account_number')
                        @slot('name', 'bank_account_number')
                        @slot('value', $bank_number)
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

            <div class="form-group m-form__group row px-5">
                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                    <div class="flex">
                        <div class="action-buttons">
                            @if ($bank != null)
                            @component('frontend.common.buttons.submit')
                                @slot('type','button')
                                @slot('id', 'edit-bank')
                                @slot('class', 'edit-bank')
                            @endcomponent    
                            @else
                            @component('frontend.common.buttons.submit')
                                @slot('type','button')
                                @slot('id', 'create-bank')
                                @slot('class', 'create-bank')
                            @endcomponent    
                            @endif
                            

                            @include('frontend.common.buttons.reset')

                            @include('frontend.common.buttons.back')

                        </div>
                    </div>
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
                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/role.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/bank.js') }}"></script>
    <script src="{{ asset('js/frontend/employee/employee/create_account.js') }}"></script>
    <script src="{{ asset('js/frontend/employee/employee/edit_account.js') }}"></script>
    <script src="{{ asset('js/frontend/employee/employee/create_bank.js') }}"></script>
    <script src="{{ asset('js/frontend/employee/employee/edit_bank.js') }}"></script>
    <script>
    
    var BootstrapSwitch = {
        init: function() {
            $("[data-switch=true]").bootstrapSwitch();
        }
    };


    jQuery(document).ready(function() {
        BootstrapSwitch.init()
    });
    </script>
@endpush