<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Name *
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'Name')
            @slot('name', 'name')
            @slot('type', 'text')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Code
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'Code')
            @slot('name', 'code')
            @slot('type', 'text')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'NPWP')
            @slot('name', 'npwp')
            @slot('type', 'text')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP Address
        </label>
        <br>
        @component('frontend.common.input.textarea')
            @slot('text', 'NPWP Address')
            @slot('name', 'npwpaddress')
            @slot('placeholder', 'NPWP Address')
            @slot('rows', '3')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ToP
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('text', 'ToP')
            @slot('name', 'top')
            @slot('type', 'text')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Type
        </label>
        <br>
        @component('frontend.common.input.select')
            @slot('text', 'Type')
            @slot('name', 'id_type')
            @slot('id', 'm_select2_3')
            @slot('style', 'width:100%')
        @endcomponent
        @component('frontend.common.buttons.create-new')
            @slot('text', 'add Type')
            @slot('size', 'sm')
            @slot('data_target', '#modal_')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Number
        </label>
        <br>
        @component('frontend.common.input.select')
            @slot('text', 'Number')
            @slot('name', 'id_number')
            @slot('id', 'm_select2_4')
            @slot('style', 'width:100%')
        @endcomponent
        @component('frontend.common.buttons.create-new')
            @slot('text', 'add Number')
            @slot('size', 'sm')
            @slot('data_target', '#modal_')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Active *
        </label>
        <br>
        @component('frontend.common.input.checkbox')
            @slot('text', 'Active')
            @slot('name', 'active')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            AccountCode *
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
            @slot('type', 'text')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Leveling
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('text', 'Leveling')
            @slot('name', 'leveling')
            @slot('type', 'text')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            xType
        </label>
        <div id="m_repeater_1c">
            <div class="" id="m_repeater_1c">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.input')
                                    @slot('text', 'xType')
                                    @slot('name', 'xtype')
                                    @slot('type', 'text')
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
        <div class="form-control-feedback text-danger" id="phone-error"></div>
        <span class="m-form__help">
            xType
        </span>
    </div>
</div>
