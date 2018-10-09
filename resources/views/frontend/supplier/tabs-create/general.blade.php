<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Code @include('frontend.common.label.required')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Code')
            @slot('name', 'code')
            @slot('help_text','code')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Name @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Name')
            @slot('name', 'name')
            @slot('help_text','name')
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
            @slot('help_text','npwp')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPPKP @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'NPPKP')
            @slot('name', 'nppkp')
            @slot('help_text','nppkp')
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
            @slot('help_text','top')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Barcode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Barcode')
            @slot('name', 'barcode')
            @slot('help_text','barcode')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Contact Person @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'Contact Person')
            @slot('name', 'contactperson')
            @slot('help_text','contact person')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Contact Person Job Position @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('name', 'contactpersonjobposition')
            @slot('text', 'Contact Person Job Position')
            @slot('help_text','contact person job position')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Active @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.checkbox')
            @slot('text', 'Active')
            @slot('name', 'active')
            @slot('help_text','active')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            AccountCode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('id', 'accountcode')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
            @slot('style', 'width:100%')
            @slot('help_text','accountcode')
        @endcomponent
    </div>
</div>
