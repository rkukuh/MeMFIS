<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country *
        </label>
        <br>
        @component('frontend.common.input.select')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('id', 'm_select2_1')
            @slot('style', 'width:100%')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City *
        </label>
        <br>
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
            Address *
        </label>
        @component('frontend.common.input.textarea')
            @slot('rows', '3')
            @slot('text', 'Address')
            @slot('name', 'address')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode *
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
        @endcomponent
    </div>
</div>
