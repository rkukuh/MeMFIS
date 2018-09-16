<!-- begin::Modal-->
<div class="modal fade" id="modal_quotation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TitleModalQuotation">Quotation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--begin::Form -->
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="QuotationForm">
                            <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Customer *
                                        </label>

                                        @component('frontend.common.input.select')
                                            @slot('text', 'Customer')
                                            @slot('name', 'customer')
                                            @slot('id', 'm_select2_1')
                                            @slot('style', 'width:100%')
                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Currency *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.select')
                                            @slot('text', 'Currency')
                                            @slot('name', 'currency')
                                            @slot('id', 'm_select2_2')
                                            @slot('style', 'width:100%')
                                        @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Valid Until *
                                        </label>

                                    @component('frontend.common.input.datepicker')
                                        @slot('name', 'description')
                                        @slot('rows', '3')
                                        @slot('text', 'Description')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Subject *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.textarea')
                                            @slot('name', 'subject')
                                            @slot('rows', '3')
                                            @slot('text', 'Subject')
                                        @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Workpackage *
                                        </label>

                                        @component('frontend.common.input.select')
                                            @slot('text', 'Workpackage')
                                            @slot('name', 'workpackage')
                                            @slot('id', 'm_select2_3')
                                            @slot('style', 'width:100%')
                                        @endcomponent
                                        @component('frontend.common.buttons.create-new')
                                        @slot('text', 'add Workpackage')
                                        @slot('size', 'sm')
                                        @slot('data_target', '#modal_workpackage')            
                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Additonal *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.select')
                                            @slot('text', 'Additional')
                                            @slot('name', 'additional')
                                            @slot('id', 'm_select2_4')
                                            @slot('style', 'width:100%')
                                        @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                        Term and Condition *
                                        </label>

                                        <div class="summernote" id="m_summernote_1"></div>

                                    </div>

                                    </div>
                                    
                                    
                                </div>

                    <div class="modal-footer">
                          @component('frontend.common.buttons.close')
                            @slot('color', 'secondary')
                            @slot('size', 'md')
                            @slot('data_dismiss', 'modal')
                          @endcomponent

                          @component('frontend.common.buttons.submit')
                            @slot('color', 'success')
                            @slot('size', 'md')
                            @slot('class', 'add')
                        
                          @endcomponent

                    </div>
                    </div>
                            </form>
                </div>
                </div>
                </div>
                <!--end::Modal-->
