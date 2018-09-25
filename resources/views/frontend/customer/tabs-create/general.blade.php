<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Name  @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Name')
            @slot('name', 'name')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Code @include('frontend.common.label.required')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Code')
            @slot('name', 'code')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'NPWP')
            @slot('name', 'npwp')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP Address @include('frontend.common.label.optional')
        </label>

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
            ToP @include('frontend.common.label.required')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'ToP')
            @slot('name', 'top')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Type @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('id', 'type')
            @slot('text', 'Type')
            @slot('name', 'id_type')
            @slot('style', 'width:100%')
        @endcomponent

        @component('frontend.common.buttons.create-new')
            @slot('size', 'sm')
            @slot('text', 'add Type')
            @slot('data_target', '#modal_')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Number @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('id', 'number')
            @slot('text', 'Number')
            @slot('name', 'id_number')
            @slot('style', 'width:100%')
        @endcomponent

        @component('frontend.common.buttons.create-new')
            @slot('size', 'sm')
            @slot('text', 'add Number')
            @slot('data_target', '#modal_')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Active * @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.checkbox')
            @slot('text', 'Active')
            @slot('name', 'active')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            AccountCode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
            @slot('id', 'accountcode')
            @slot('style', 'width:100%')
        @endcomponent
    </div>
    {{-- <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Leveling @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Leveling')
            @slot('name', 'leveling')
        @endcomponent
    </div> --}}
</div>
{{-- <div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            xType @include('frontend.common.label.optional')
        </label>

        <div id="m_repeater_1c">
            <div class="" id="m_repeater_1c">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.text')
                                    @slot('id', 'xtype')
                                    @slot('text', 'xType')
                                    @slot('name', 'xtype')
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
</div> --}}
