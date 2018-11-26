<div class="modal fade" id="modal_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalUnit">Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="UnitForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'name_category')
                                    @slot('id', 'name_category')
                                    @slot('id_error', 'name-category')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Symbol @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Symbol')
                                    @slot('name', 'symbol')
                                    @slot('id', 'symbol')
                                    @slot('id_error', 'symbol')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Type @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.select2')
                                    @slot('name', 'type')
                                    @slot('id', 'type')
                                    @slot('text', 'Type')
                                    @slot('style', 'width: 100%')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-category')
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
