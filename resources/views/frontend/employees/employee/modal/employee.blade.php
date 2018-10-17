<div class="modal fade" id="modal_employee" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')
                <h5 class="modal-title" id="TitleModalEmployee">Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EmployeeForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code')
                                    @slot('text', 'Code')
                                    @slot('name', 'code')
                                    @slot('id_error', 'code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    First Name @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'first_name')
                                    @slot('text', 'First Name')
                                    @slot('name', 'first_name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Middle Name @include('frontend.common.label.optional')
                                    </label>
        
                                    @component('frontend.common.input.text')
                                        @slot('id', 'middle_name')
                                        @slot('text', 'Middle Name')
                                        @slot('name', 'middle_name')
                                    @endcomponent
                                    </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Last Name @include('frontend.common.label.optional')
                                 </label>
            
                                    @component('frontend.common.input.text')
                                        @slot('id', 'last_name')
                                        @slot('text', 'Last Name')
                                        @slot('name', 'last_name')
                                    @endcomponent
                                </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Date of birth @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'dob')
                                    @slot('name','dob')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Gender @include('frontend.common.label.required')
                                    </label>
                                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding:0px">
                                        @component('frontend.common.input.radio')
                                            @slot('id', 'gender')
                                            @slot('name','gender')
                                            @slot('text', 'Male')
                                            @slot('value', 'm')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding:0px">
                                        @component('frontend.common.input.radio')
                                            @slot('id', 'gender')
                                            @slot('name','gender')
                                            @slot('text', 'Female')
                                            @slot('value', 'f')
                                        @endcomponent
                                    </div>
    
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Hired At @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'hired_at')
                                    @slot('name','hired_at')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                {{-- <div id="button-div" style="height:0px;"> --}}
                                                    @include('frontend.common.buttons.submit')
                                                {{-- </div>  --}}
                                                    @include('frontend.common.buttons.reset')
                            
                                                    @include('frontend.common.buttons.close')
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

               </div>
            </div>
        </div>
    </div>
