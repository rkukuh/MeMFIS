<div class="modal fade" id="modal_education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="education_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    @component('frontend.common.input.hidden')
                        @slot('id', 'employee_uuid')
                        @slot('name', 'employee_uuid')
                        @slot('value', $employee->uuid)
                    @endcomponent
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                   Institute/University  @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.input')
                                    @slot('id', 'institute')
                                    @slot('name', 'institute')
                                    @slot('id_error', 'institute')
                                @endcomponent    
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Qualification  @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.select2')
                                    @slot('text', 'Qualification')
                                    @slot('name', 'qualification')
                                    @slot('id', 'qualification')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Field of Study  @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.input')
                                    @slot('id', 'field_of_study')
                                    @slot('name', 'field_of_study')
                                    @slot('id_error', 'field_of_study')
                                @endcomponent    
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Graduation Date @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'graduation_date')
                                    @slot('name', 'graduation_date')
                                    @slot('id_error', 'graduation_date')
                                @endcomponent    
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Attach Document
                                </label>
            
                                @component('frontend.common.input.upload')
                                    @slot('label', 'document')
                                    @slot('id', 'education_document')
                                    @slot('name', 'document')
                                    @slot('help_text', 'File must be image or not be stored!')
                                @endcomponent  
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('type', 'button')
                                    @slot('class','button-education')
                                @endcomponent

                                @include('frontend.common.buttons.reset',['id' => 'education-reset'])

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>