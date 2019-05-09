<div class="modal fade" id="modal_pause" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalWorkpackage">Pause</h5>
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
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'break')
                                    @slot('name', 'break')
                                    @slot('text', 'Rest Time/ Beak Time')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'waiting')
                                    @slot('name', 'waiting')
                                    @slot('text', 'Waiting for Material')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'other')
                                    @slot('name', 'other')
                                    @slot('text', 'Other')
                                @endcomponent
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @component('frontend.common.input.text')
                                    @slot('id', 'reason')
                                    @slot('name', 'reason')
                                    @slot('text', 'reason')
                                @endcomponent
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
