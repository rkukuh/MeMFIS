<!-- begin::Modal-->
<div class="modal fade" id="modal_taskcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TitleModalTaskCard">TaskCard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--begin::Form -->
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="TaskCardForm">
                            <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Code *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Code')
                                        @slot('name', 'code')
                                        @slot('type', 'text')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Name *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                        @slot('text', 'Name')
                                        @slot('name', 'name')
                                        @slot('type', 'text')
                                    @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Description *
                                        </label>

                                    @component('frontend.common.input.textarea')
                                        @slot('name', 'description')
                                        @slot('rows', '3')
                                        @slot('text', 'Description')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Upload TaskCard *
                                        </label>
                                        <br>
                                    @component('frontend.common.input.upload')
                                        @slot('text', 'file')
                                        @slot('name', 'file')
                                    @endcomponent

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
