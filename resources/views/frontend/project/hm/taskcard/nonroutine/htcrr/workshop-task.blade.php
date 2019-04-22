<div class="modal fade" id="modal_workshop_task" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalHWorkshopTask">Workshop Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Complaint @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.textarea')
                            @slot('text', 'Complaint')
                            @slot('id', 'complaint')
                            @slot('name', 'complaint')
                            @slot('row', '3')
                            @slot('id_error', 'complaint')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Workshop Skill @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                            @slot('text', 'Workship Skill')
                            @slot('id', 'skill')
                            @slot('name', 'skill')
                            @slot('id_error', 'skill')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Job Request @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.textarea')
                            @slot('text', 'Job Request')
                            @slot('id', 'job_request')
                            @slot('name', 'job_request')
                            @slot('row', '3')
                            @slot('id_error', 'job_request')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Estimate Manhours @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                            @slot('text', 'Manhours')
                            @slot('id', 'manhours')
                            @slot('name', 'manhours')
                            @slot('id_error', 'manhours')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Instruction @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.textarea')
                            @slot('text', 'instruction')
                            @slot('id', 'instruction')
                            @slot('name', 'instruction')
                            @slot('row', '3')
                            @slot('id_error', 'instruction')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Quantity Helper @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                            @slot('text', 'qty_helper')
                            @slot('id', 'qty_helper')
                            @slot('name', 'qty_helper')
                            @slot('id_error', 'qty_helper')
                        @endcomponent

                        @component('frontend.common.input.checkbox')
                            @slot('text', 'Rii Required?')
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
