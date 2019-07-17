<div class="modal fade" id="modal_uom"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalUoM">
                    UoM (Unit of Measurement)
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="UoMForm" name="form_uom">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row item-info">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 class="item-name">
                                    {{ $item->name }}

                                    <small class="text-muted"> {{ $item->code }}</small>
                                </h5>

                                <h6>
                                    Primary Unit:
                                    {{ $item->unit->name }} ({{ $item->unit->symbol }})
                                </h6>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit @include('frontend.common.label.required')
                                </label>
                                <div class="row">
                                    <div class="col-1">
                                        @component('frontend.common.label.data-info')
                                            @slot('text', '1')
                                            @slot('padding','10')
                                        @endcomponent
                                    </div>
                                    <div class="col-11">
                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Unit')
                                            @slot('id', 'item_unit_id')
                                            @slot('name', 'item_unit_id')
                                            @slot('id_error', 'item_unit')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Quantity @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('text', 'Quantity')
                                    @slot('id', 'uom_quantity')
                                    @slot('name', 'uom_quantity')
                                    @slot('input_append', $item->unit->symbol)
                                    @slot('id_error', 'uom_quantity')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('type', 'button')
                                    @slot('class', 'add-uom')
                                @endcomponent

                                @component('frontend.common.buttons.reset')
                                    @slot('class', 'reset-uom')
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

@push('header-scripts')
    <style>
        .item-info {
            background-color: beige;
        }
    </style>
@endpush
