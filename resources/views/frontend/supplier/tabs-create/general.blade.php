<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Name
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'Name')
            @slot('name', 'name')
            @slot('type', 'text')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPWP
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'NPWP')
            @slot('name', 'npwp')
            @slot('type', 'text')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPPKP
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('text', 'NPPKP')
            @slot('name', 'nppkp')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ToP
        @component('frontend.common.label.required')
        @endcomponent
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('text', 'ToP')
            @slot('name', 'top')
            @slot('type', 'text')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Barcode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('text', 'Barcode')
            @slot('name', 'barcode')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Contact Person
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('text', 'Contact Person')
            @slot('name', 'contactperson')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Contact Person Job Position
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('name', 'contactpersonjobposition')
            @slot('text', 'Contact Person Job Position')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Active
        @component('frontend.common.label.optional')
        @endcomponent
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
            AccountCode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
        @endcomponent
    </div>
</div>
