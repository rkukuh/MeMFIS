<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'City')
            @slot('name', 'city')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Address
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.textarea')
            @slot('rows', '3')
            @slot('value', 'text')
            @slot('text', 'Address')
            @slot('name', 'address')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
