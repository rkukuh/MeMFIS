<div class="modal fade show" id="modal_manufacturer" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalManufacturer">Manufacturer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ManufacturerForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Code')
                                    @slot('name', 'code_manufacturer')
                                    @slot('id', 'code_manufacturer')
                                    @slot('id_error', 'code_manufacturer')
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
                                @slot('name', 'name_manufacturer')
                                @slot('id', 'name_manufacturer')
                                @slot('id_error', 'name_manufacturer')
                            @endcomponent
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-manufacturer')
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
