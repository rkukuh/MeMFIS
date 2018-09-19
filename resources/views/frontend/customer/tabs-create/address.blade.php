<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.select')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('id', 'm_select2_1')
            @slot('style', 'width:100%')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.select')
            @slot('text', 'City')
            @slot('name', 'city')
            @slot('id', 'm_select2_2')
            @slot('style', 'width:100%')
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
            @slot('text', 'Address')
            @slot('name', 'address')
            @slot('placeholder', 'Address')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        @component('frontend.common.input.text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
        @endcomponent
    </div>
</div>
