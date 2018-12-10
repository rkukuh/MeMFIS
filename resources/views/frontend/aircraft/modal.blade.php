<div class="modal fade" id="modal_aircraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalAircraft">Aircraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="AircraftForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Code')
                                    @slot('name', 'code')
                                    @slot('id', 'code')
                                    @slot('id_error', 'code')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                    @slot('id', 'name')
                                    @slot('id_error', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Manufacture @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.select2')
                                    @slot('name', 'manufacturer_id')
                                    @slot('id', 'manufacturer_id')
                                    @slot('text', 'Manufacturer')
                                    @slot('style', 'width: 100%')
                                    @slot('id_error', 'manufacturer_id')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-aircraft')
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
