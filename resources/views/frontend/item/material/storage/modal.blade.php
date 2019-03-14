<div class="modal fade" id="modal_storage_stock"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalMinMaxStock">
                    Storage Stock

                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="MinMaxStockForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                            <div class="form-group m-form__group row item-info">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="item-name">
                                    {{ $item->name }}

                                    <small class="text-muted"> {{ $item->code }}</small>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Storage @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Storage')
                                    @slot('id_error', 'storage')
                                    @slot('id', 'item_storage_id')
                                    @slot('name', 'item_storage_id')
                                @endcomponent

                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'add storage')
                                    @slot('style', 'margin-top: 10px;')
                                    @slot('data_target', '#modal_storage')
                                @endcomponent
                            </div>

                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Min @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('id', 'min')
                                    @slot('text', 'Min')
                                    @slot('name', 'min')
                                    @slot('id_error', 'min')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Max @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.number')
                                        @slot('id', 'max')
                                        @slot('text', 'Max')
                                        @slot('name', 'max')
                                        @slot('id_error', 'max')
                                    @endcomponent
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-stock')
                                    @slot('type', 'button')
                                @endcomponent

                                @component('frontend.common.buttons.reset')
                                    @slot('class', 'reset-storage')
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
