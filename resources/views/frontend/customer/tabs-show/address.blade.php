<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Country *
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('text', 'Country')
            @slot('name', 'country')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            City *
        </label>
        <br>
        @component('frontend.common.input.input')
            @slot('text', 'City')
            @slot('name', 'city')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('editable', 'readonly')
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
            @slot('value', 'text')
            @slot('text', 'Address')
            @slot('name', 'address')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            ZipCode *
        </label>
        @component('frontend.common.input.input')
            @slot('type', 'text')
            @slot('value', 'text')
            @slot('text', 'ZipCode')
            @slot('name', 'zipcpde')
            @slot('editable', 'readonly')
        @endcomponent
    </div>
</div>
