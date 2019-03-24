<div class="modal fade" id="modal_repeat"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalRepeat">
                    Repeat

                    <small id="repeat" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="RepeatForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                        <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Repeat Type @include('frontend.common.label.required')
                                            </label>
                                            <div>
                                            @component('frontend.common.input.select2')
                                                @slot('id', 'repeat_type')
                                                @slot('text', 'Repeat Type')
                                                @slot('name', 'repeat_type')
                                                @slot('id_error', 'repeat-type')
                                            @endcomponent
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Repeat Amount @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.number')
                                                @slot('text', 'Repeat Amount')
                                                @slot('id', 'repeat_amount')
                                                @slot('name', 'repeat_amount')
                                                @slot('id_error', 'repeat-amount')
                                            @endcomponent
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                        @component('frontend.common.buttons.submit')
                                            @slot('class', 'add-repeat')
                                            @slot('type', 'button')
                                        @endcomponent
                                        @component('frontend.common.buttons.reset')
                                            @slot('class', 'reset-item')
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
