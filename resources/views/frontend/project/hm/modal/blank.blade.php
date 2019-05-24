<div class="modal fade" id="modal_blank_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalproject">Blank Workpackage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="BlankWorkpackageForm">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Blank workpackage title @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Blank workpackage title')
                                    @slot('name', 'title')
                                    @slot('id', 'title')
                                    @slot('id_error', 'title')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-blank-workpackage')
                                    @slot('type', 'button')
                                @endcomponent

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
