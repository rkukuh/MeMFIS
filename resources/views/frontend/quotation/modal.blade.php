<div class="modal fade" id="modal_quotation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalQuotation">Quotation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="QuotationForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Customer @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'customer')
                                    @slot('text', 'Customer')
                                    @slot('name', 'customer')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Currency @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'currency')
                                    @slot('text', 'Currency')
                                    @slot('name', 'currency')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Valid Until @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('rows', '3')
                                    @slot('name', 'description')
                                    @slot('text', 'Description')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Subject @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('name', 'subject')
                                    @slot('text', 'Subject')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Workpackage @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'm_select2_3')
                                    @slot('text', 'Workpackage')
                                    @slot('name', 'workpackage')
                                    @slot('style', 'width:100%')
                                @endcomponent

                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'add Workpackage')
                                    @slot('data_target', '#modal_workpackage')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Additonal @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'm_select2_4')
                                    @slot('text', 'Additional')
                                    @slot('name', 'additional')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Term and Condition @include('frontend.common.label.required')
                                </label>


                                <div class="summernote" id="m_summernote_1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add')
                                @endcomponent
        
                                @component('frontend.common.buttons.reset')
                                @endcomponent
        
                                @component('frontend.common.buttons.close')
                                    @slot('data_dismiss', 'modal')
                                @endcomponent
        
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
