<div class="modal fade" id="modal_threshold"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalThreshold">
                    Threshold

                    <small id="threshold" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ThresholdForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                        <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Threshold Type @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'threshold_type')
                                                @slot('text', 'Threshold Type')
                                                @slot('name', 'threshold_type')
                                                @slot('id_error', 'threshold-type')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Threshold Amount @include('frontend.common.label.required')
                                            </label>
                                            <div>
                                                @component('frontend.common.input.number')
                                                    @slot('text', 'Threshold Amount')
                                                    @slot('id', 'threshold_amount')
                                                    @slot('name', 'threshold_amount')
                                                    @slot('id_error', 'threshold-amount')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                        @component('frontend.common.buttons.submit')
                                            @slot('class', 'add-threshold')
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
