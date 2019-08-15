<div class="modal fade" id="modal_bpjs" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')
                <h5 class="modal-title" id="TitleModalEducation">BPJS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EducationForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id_education" id="id_education">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    BPJS Code @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.input')
                                    @slot('id', 'bpjs_code')
                                    @slot('text', 'BPJS Code')
                                    @slot('name', 'bpjs_code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    BPJS Name @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.input')
                                    @slot('id', 'bpjs_name')
                                    @slot('text', 'BPJS Name')
                                    @slot('name', 'bpjs_name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="border p-2">
                                    <legend class="w-auto">Paid by Employees</legend>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Percentage of Basic Salary
                                            </label>
            
                                            @component('frontend.common.input.number')
                                                @slot('id', 'basic_salary')
                                                @slot('text', 'Percentage of Basic Salary')
                                                @slot('name', 'basic_salary')
                                                @slot('input_append','%')
                                            @endcomponent

                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Minimum Value 
                                                    </label>
                    
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'min')
                                                        @slot('text', 'Minimum Value')
                                                        @slot('name', 'min')
                                                        @slot('input_prepend','Rp')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Maximum Value
                                                    </label>
                    
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'max')
                                                        @slot('text', 'Maximum Value')
                                                        @slot('name', 'max')
                                                        @slot('input_prepend','Rp')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="border p-2">
                                    <legend class="w-auto">Paid by Company</legend>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Percentage of Basic Salary
                                            </label>
            
                                            @component('frontend.common.input.number')
                                                @slot('id', 'basic_salary_company')
                                                @slot('text', 'Percentage of Basic Salary')
                                                @slot('name', 'basic_salary_company')
                                                @slot('input_append','%')
                                            @endcomponent

                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Minimum Value 
                                                    </label>
                    
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'min_company')
                                                        @slot('text', 'Minimum Value')
                                                        @slot('name', 'min_company')
                                                        @slot('input_prepend','Rp')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Maximum Value
                                                    </label>
                    
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'max_company')
                                                        @slot('text', 'Maximum Value')
                                                        @slot('name', 'max_company')
                                                        @slot('input_prepend','Rp')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
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
