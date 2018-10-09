<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('id', 'country')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('style', 'width:100%')
            @slot('help_text','country')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.select')
            @slot('id', 'city')
            @slot('text', 'City')
            @slot('name', 'city')
            @slot('style', 'width:100%')
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
            @slot('text', 'Address')
            @slot('name', 'address')
            @slot('help_text','address')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode @include('frontend.common.label.optional')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
            @slot('help_text','zipcode')
        @endcomponent
    </div>
</div>
