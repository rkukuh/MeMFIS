<div class="modal fade" id="modal_price_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Price List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    P/N Item
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'pn')
                                    @slot('name', 'pn')
                                    @slot('id', 'pn')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Item Name
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'name')
                                    @slot('name', 'name')
                                    @slot('id', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'unit')
                                    @slot('name', 'unit')
                                    @slot('id', 'unit')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit Price @include('frontend.common.label.required')
                                </label>

                                <div class='repeater'>
                                    <div data-repeater-list="group-email">
                                        <div data-repeater-item>
                                            <div class=" row">
                                                <div class="col-sm-5 col-md-8 col-lg-8">
                                                    @component('frontend.common.input.number')
                                                        @slot('text', 'price')
                                                        @slot('id', 'price')
                                                        @slot('name', 'price')
                                                        @slot('id_error', 'price')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    @include('frontend.common.buttons.create_repeater')
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    @include('frontend.common.buttons.delete_repeater')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-unit')
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
