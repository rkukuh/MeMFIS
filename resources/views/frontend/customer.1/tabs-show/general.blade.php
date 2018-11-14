<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Name @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Name')
            @slot('name', 'name')
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('help_text','name')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Code @include('frontend.common.label.required')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Code')
            @slot('name', 'code')
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('help_text','code')

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
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('help_text','npwp')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP Address @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.textarea')
            @slot('rows', '3')
            @slot('value', 'text')
            @slot('name', 'npwpaddress')
            @slot('text', 'NPWP Address')
            @slot('editable', 'readonly')
            @slot('help_text','npwp address')
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
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('help_text','top')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Type @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Type')
            @slot('value', 'text')
            @slot('name', 'id_type')
            @slot('editable', 'readonly')
            @slot('help_text','type')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Number @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'Number')
            @slot('name', 'id_number')
            @slot('editable', 'readonly')
            @slot('help_text','number')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Active @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.checkbox')
            @slot('text', 'Active')
            @slot('name', 'active')
            @slot('value', 'checked')
            @slot('color', 'disabled')
            @slot('editable', 'disabled')
            @slot('help_text','active')
        @endcomponent
    </div>

</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            AccountCode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
            @slot('editable', 'readonly')
            @slot('help_text','accountcode')
        @endcomponent
    </div>
</div>
