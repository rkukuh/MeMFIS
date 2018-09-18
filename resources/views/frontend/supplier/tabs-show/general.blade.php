<div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Code
                @component('frontend.common.label.required')
                @endcomponent
                </label>
                @component('frontend.common.input.input')
                    @slot('text', 'Code')
                    @slot('name', 'code')
                    @slot('type', 'text')
                    @slot('value', 'text')
                    @slot('editable', 'readonly')
                @endcomponent
            </div>
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
            @slot('value', 'text')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
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
                    @slot('value', 'text')
                    @slot('editable', 'readonly')
                @endcomponent
            </div>        
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            NPPKP
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('text', 'NPPKP')
            @slot('name', 'nppkp')
            @slot('type', 'text')
            @slot('value', 'text')
        @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
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
                    @slot('value', 'text')
                    @slot('editable', 'readonly')
                @endcomponent
            </div>        
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Barcode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('text', 'Barcode')
            @slot('name', 'barcode')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Contact Person
                @component('frontend.common.label.optional')
                @endcomponent
                </label>
                <br>
                @component('frontend.common.input.input')
                    @slot('type', 'text')
                    @slot('value', 'text')
                    @slot('text', 'Contact Person')
                    @slot('name', 'contactperson')
                    @slot('editable', 'readonly')
                @endcomponent
            </div>        
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Contact Person Job Position
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('text', 'Contact Person Job Position')
            @slot('name', 'contactpersonjobposition')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
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
                    @slot('value', 'checked')
                    @slot('color', 'disabled')
                    @slot('editable', 'disabled')
                @endcomponent
            </div>        
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            AccountCode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('text', 'AccountCode')
            @slot('name', 'accountcode')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
