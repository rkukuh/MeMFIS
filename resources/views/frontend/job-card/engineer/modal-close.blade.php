<div class="modal fade" id="modal_close" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalWorkpackage">Close</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="WorkpackageForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Accomplishment Notes: @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('id', 'note')
                                    @slot('name', 'note')
                                    @slot('text', 'Note')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    With Discrepancy Found: @include('frontend.common.label.required')
                                </label>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        @component('frontend.common.input.radio')
                                            @slot('id', 'yes')
                                            @slot('name', 'discrepancy')
                                            @slot('text', 'Yes')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        @component('frontend.common.input.radio')
                                            @slot('id', 'no')
                                            @slot('name', 'discrepancy')
                                            @slot('text', 'No')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-workpackage')
                                    @slot('type', 'button')
                                @endcomponent

                                @include('frontend.common.buttons.reset')

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>