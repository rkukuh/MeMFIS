<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('editable', 'readonly')
            @slot('help_text','country')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'City')
            @slot('name', 'city')
            @slot('value', 'text')
            @slot('editable', 'readonly')
            @slot('help_text','city')
        @endcomponent
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Address @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.textarea')
            @slot('rows', '3')
            @slot('value', 'text')
            @slot('text', 'Address')
            @slot('name', 'address')
            @slot('editable', 'readonly')
            @slot('help_text','address')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('value', 'text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
            @slot('editable', 'readonly')
            @slot('help_text','zipcode')
        @endcomponent
    </div>
</div>
