<div class="modal fade" id="modal_ht_crr" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalHT/CRRR">HT/CRR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            CRI No @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                            @slot('text', 'CRI No')
                            @slot('id', 'cri')
                            @slot('name', 'cri')
                            @slot('id_error', 'cri')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            P/N @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                            @slot('text', 'Part Number')
                            @slot('id', 'code')
                            @slot('name', 'code')
                            @slot('id_error', 'code')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Description @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                            @slot('text', 'Description')
                            @slot('id', 'description')
                            @slot('name', 'description')
                            @slot('id_error', 'description')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Skill @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                            @slot('text', 'Skill')
                            @slot('id', 'skill')
                            @slot('name', 'skill')
                            @slot('id_error', 'skill')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Removal Mhrs @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                            @slot('text', 'Removal')
                            @slot('id', 'removal')
                            @slot('name', 'removal')
                            @slot('id_error', 'removal')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Installation Mhrs @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select2')
                            @slot('text', 'Installaton')
                            @slot('id', 'installaton')
                            @slot('name', 'installaton')
                            @slot('id_error', 'installaton')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Removal By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                            @slot('text', 'Removal')
                            @slot('id', 'removal_by')
                            @slot('name', 'removal_by')
                            @slot('id_error', 'removal_by')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Installation By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                            @slot('text', 'Installaton')
                            @slot('id', 'installaton_by')
                            @slot('name', 'installaton_by')
                            @slot('id_error', 'installaton_by')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Engineer By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                            @slot('text', 'Engineer')
                            @slot('id', 'engineer_by')
                            @slot('name', 'engineer_by')
                            @slot('id_error', 'engineer_by')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            RII Required? @include('frontend.common.label.optional')
                        </label>

                        @component('frontend.common.input.checkbox')
                            @slot('text', 'Required')
                            @slot('id', 'rii')
                            @slot('name', 'rii')
                            @slot('id_error', 'installaton')
                        @endcomponent
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="flex">
                    <div class="action-buttons">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.close')
                                    @slot('text', 'Close')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
