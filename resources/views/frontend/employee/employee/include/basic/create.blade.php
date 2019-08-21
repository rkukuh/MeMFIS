<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Personal Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Employee ID @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Employee ID')
                        @slot('id', 'employee_id')
                        @slot('name', 'employee_id')
                        @slot('id_error', 'employee_id')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Date of Birth @include('frontend.common.label.required')
                            </label>

                            @component('frontend.common.input.datepicker')
                                @slot('id', 'date')
                                @slot('name', 'date')
                            @endcomponent
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Birthplace
                            </label>
        
                            @component('frontend.common.input.text')
                                @slot('text', 'Birthplace')
                                @slot('id', 'birthplace')
                                @slot('name', 'birthplace')
                                @slot('id_error', 'birthplace')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        First Name @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'First Name')
                        @slot('id', 'first_name')
                        @slot('name', 'first_name')
                        @slot('id_error', 'first_name')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Last Name @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Last Name')
                        @slot('id', 'last_name')
                        @slot('name', 'last_name')
                        @slot('id_error', 'last_name')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                ID Card No
                            </label>
        
                            @component('frontend.common.input.text')
                                @slot('text', 'ID Card Number')
                                @slot('id', 'card_number')
                                @slot('name', 'card_number')
                                @slot('id_error', 'card_number')
                            @endcomponent
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Attach File
                            </label>
        
                            @component('frontend.common.input.upload')
                                @slot('label', 'document')
                                @slot('name', 'document')
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Gender @include('frontend.common.label.required')
                            </label>
                            
                            @component('frontend.common.input.select2')
                                @slot('id', 'gender')
                                @slot('name', 'gender')
                                @slot('id_error', 'gender')
                            @endcomponent    
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Nationality @include('frontend.common.label.required')
                            </label>
        
                            @component('frontend.common.input.text')
                                @slot('text', 'Nationality')
                                @slot('id', 'nationality')
                                @slot('name', 'nationality')
                                @slot('id_error', 'nationality')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Religion @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('id', 'religion')
                        @slot('name', 'religion')
                        @slot('id_error', 'religion')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Marital Status @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('id', 'marital_status')
                        @slot('name', 'marital_status')
                        @slot('id_error', 'marital_status')
                    @endcomponent

                    {{-- Married
                    Married with 1 childs
                    Married with 2 childs
                    Married with 3 childs
                    Not Married
                    Not Married with 1 childs
                    Not Married with 2 childs
                    Not Married with 3 childs --}}
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Contact Information Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Address Line 1 @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Address Line 1')
                        @slot('id', 'address_line_1')
                        @slot('name', 'address_line_1')
                        @slot('id_error', 'address_line_1')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Address Line 2
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Address Line 2')
                        @slot('id', 'address_line_2')
                        @slot('name', 'address_line_2')
                        @slot('id_error', 'address_line_2')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Country @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Country')
                        @slot('id', 'country')
                        @slot('name', 'country')
                        @slot('id_error', 'country')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                City @include('frontend.common.label.required')
                            </label>
        
                            @component('frontend.common.input.text')
                                @slot('text', 'City')
                                @slot('id', 'city')
                                @slot('name', 'city')
                                @slot('id_error', 'city')
                            @endcomponent
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Postal/Zip Code
                            </label>
        
                            @component('frontend.common.input.number')
                                @slot('text', 'Zip Code')
                                @slot('id', 'zip_code')
                                @slot('name', 'zip_code')
                                @slot('id_error', 'zip_code')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Home Phone 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Home Phone')
                        @slot('id', 'home_phone')
                        @slot('name', 'home_phone')
                        @slot('id_error', 'home_phone')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Mobile Phone @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Mobile Phone')
                        @slot('id', 'mobile_phone')
                        @slot('name', 'mobile_phone')
                        @slot('id_error', 'mobile_phone')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Work Phone 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Work Phone')
                        @slot('id', 'work_phone')
                        @slot('name', 'work_phone')
                        @slot('id_error', 'work_phone')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Other Phone 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Other Phone')
                        @slot('id', 'other_phone')
                        @slot('name', 'other_phone')
                        @slot('id_error', 'other_phone')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email 1 @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Email 1')
                        @slot('id', 'email_1')
                        @slot('name', 'email_1')
                        @slot('id_error', 'email_1')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Email 2
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Email 2')
                        @slot('id', 'email_2')
                        @slot('name', 'email_2')
                        @slot('id_error', 'email_2')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Job Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Joined Date @include('frontend.common.label.required')
                            </label>
        
                            @component('frontend.common.input.datepicker')
                                @slot('id', 'period_start_date')
                                @slot('text', 'Date')
                                @slot('name', 'period_start_date')
                                @slot('id_error','period_start_date')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Job Title @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Job Title')
                        @slot('id', 'job_title')
                        @slot('name', 'job_title')
                        @slot('id_error', 'job_title')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Job Position @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Job Position')
                        @slot('id', 'job_position')
                        @slot('class', 'job_position')
                        @slot('name', 'job_position')
                        @slot('id_error', 'job_position')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Employee Status @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Employee Status')
                        @slot('id', 'employee_status')
                        @slot('name', 'employee_status')
                        @slot('id_error', 'employee_status')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Department @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Department')
                        @slot('id', 'department')
                        @slot('name', 'department')
                        @slot('id_error', 'department')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Indirect Supervisor
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Indirect Supervisor')
                        @slot('id', 'inderect_supervisor')
                        @slot('name', 'inderect_supervisor')
                        @slot('id_error', 'inderect_supervisor')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Supervisor 
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Supervisor')
                        @slot('id', 'supervisor')
                        @slot('name', 'supervisor')
                        @slot('id_error', 'supervisor')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-basic-information')
                    @slot('class', 'add-basic-information')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/gender.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/religion.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/marital-status.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/job-title.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/job-position.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/employee-status.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/department.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/indirect-supervisor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/supervisor.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/period-start.js')}}"></script>
@endpush