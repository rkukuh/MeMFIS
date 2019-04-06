<div class="modal fade" id="modal_instruction" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Instruction

                    <small id="instruction" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id=InstructionForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Work Area @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Work Area')
                                    @slot('id', 'work_area')
                                    @slot('name', 'work_area')
                                    @slot('id_error', 'work_area')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Skill @include('frontend.common.label.required')
                                </label>

                                    @component('frontend.common.input.select2')
                                        @slot('text', 'Otr Certification')
                                        @slot('id', 'otr_certification')
                                        @slot('name', 'otr_certification')
                                        @slot('id_error', 'otr-certification')
                                    @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Manhour Estimation @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.decimal')
                                            @slot('id', 'manhour')
                                            @slot('text', 'Manhour')
                                            @slot('name', 'manhour')
                                            @slot('id_error', 'manhour')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Performance Factor @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.decimal')
                                            @slot('id', 'performa')
                                            @slot('text', 'Performa')
                                            @slot('name', 'performa')
                                            @slot('value', '1')
                                            @slot('id_error', 'performa')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Helper Quantity @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.number')
                                            @slot('id', 'helper_quantity')
                                            @slot('text', 'Helper Quantity')
                                            @slot('name', 'helper_quantity')
                                            @slot('value', '0')
                                            @slot('id_error', 'helper_quantity')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Engineer Quantity @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.number')
                                            @slot('id', 'engineer_quantity')
                                            @slot('text', 'Engineer Quantity')
                                            @slot('name', 'engineer_quantity')
                                            @slot('min', '1')
                                            @slot('value', '1')
                                            @slot('id_error', 'engineer_quantity')
                                        @endcomponent
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Sequence @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.number')
                                            @slot('id', 'sequence')
                                            @slot('text', 'Sequence')
                                            @slot('name', 'sequence')
                                            @slot('id_error', 'sequence')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'is_rii')
                                            @slot('name', 'is_rii')
                                            @slot('text', 'RII?')
                                            @slot('style_div','margin-top:30px')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-instruction">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.submit')
                                        @slot('class', 'add-instruction')
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
