<div class="m-portlet__body">
        <div class="form-group m-form__group row ">
            
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Warehouse
                @component('frontend.common.label.required')
                @endcomponent
                </label>
                @component('frontend.common.input.select')
                    @slot('text', 'Warehouse')
                    @slot('name', 'warehouse')
                    @slot('id', 'm_select2_1')
                    @slot('style', 'width:100%')
                @endcomponent

                @component('frontend.common.buttons.create-new')
                    @slot('size', 'sm')
                    @slot('text', 'add warehouse')
                    @slot('data_target', '#modal_werehouse')
                @endcomponent
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Max
                    @component('frontend.common.label.required')
                    @endcomponent
                    </label>
                    @component('frontend.common.input.number')
                        @slot('text', 'Max')
                        @slot('name', 'max')
                    @endcomponent
                </div>
        </div>
        <div class="form-group m-form__group row ">
            
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Min
                @component('frontend.common.label.required')
                @endcomponent
                </label>
                @component('frontend.common.input.number')
                    @slot('text', 'Min')
                    @slot('name', 'min')
                @endcomponent
            </div>
        </div>
    </div>