<div class="form-group m-form__group row ">
        {{-- <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Code
            @component('frontend.common.label.required')
            @endcomponent
            </label>
            @component('frontend.common.input.text')
            @slot('text', 'Code')
            @slot('name', 'code')
            @endcomponent
        </div> --}}
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Unit
            @component('frontend.common.label.required')
            @endcomponent
            </label>
            @component('frontend.common.input.select')
            @slot('text', 'Unit')
            @slot('name', 'id_unit')
            @slot('id', 'unit')
            @slot('style', 'width:100%')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Qty
                @component('frontend.common.label.required')
                @endcomponent
                </label>
                @component('frontend.common.input.number')
                @slot('text', 'Qty')
                @slot('name', 'qty')
                @endcomponent
            </div>
    </div>
    <div class="form-group m-form__group row ">
       
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Purchasing Price
            @component('frontend.common.label.required')
            @endcomponent
            </label>
            @component('frontend.common.input.number')
            @slot('name', 'purchasingprice')
            @slot('text', 'Purchasing Price')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    SellingPrice
                @component('frontend.common.label.required')
                @endcomponent
                </label>
                <div id="m_repeater_1a">
                    <div class="" id="m_repeater_1a">
                        <div data-repeater-list="">
                            <div data-repeater-item class="row">
                                <div class="m-form__group row">
                                    <div class="col-md-0">
                                        @component('frontend.common.input.text')
                                        @slot('name', 'sellingprice')
                                        @slot('text', 'Selling Price')
                                        @endcomponent
                                    </div>
                                    <div class="col-md-1">
                                        <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                            <span>
                                                <i class="la la-trash-o"></i>
                                                <span>Delete</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Add</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>