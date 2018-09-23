<div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Code @include('frontend.common.label.required')
            </label>

            @component('frontend.common.input.text')
                @slot('text', 'Code')
                @slot('name', 'code')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Name @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.text')
                @slot('text', 'Name')
                @slot('name', 'name')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Barcode @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.text')
                @slot('text', 'Barcode')
                @slot('name', 'barcode')
            @endcomponent
        </div>
        {{-- <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Bank @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.select')
                @slot('text', 'Bank')
                @slot('name', 'bank')
                @slot('id', 'm_select2_1')
                @slot('style', 'width:100%')
            @endcomponent

            @component('frontend.common.buttons.create-new')
                @slot('size', 'sm')
                @slot('text', 'add bank')
                @slot('data_target', '#modal_bank')
            @endcomponent
        </div> --}}
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Category @include('frontend.common.label.required')
            </label>

            @component('frontend.common.input.select')
                @slot('text', 'Category')
                @slot('name', 'category')
                @slot('id', 'm_select2_2')
                @slot('style', 'width:100%')
            @endcomponent

            @component('frontend.common.buttons.create-new')
                @slot('size', 'sm')
                @slot('text', 'add category')
                @slot('data_target', '#modal_category')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Description @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.textarea')
                @slot('rows', '3')
                @slot('name', 'description')
                @slot('text', 'Description')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Active @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.checkbox')
                @slot('text', 'Active')
                @slot('name', 'active')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                IsPPn @include('frontend.common.label.required')
            </label>

            @component('frontend.common.input.checkbox')
                @slot('text', 'IsPPn')
                @slot('name', 'isppn')
            @endcomponent

            {{-- @component('frontend.common.input.text')
                @slot('text', 'IsPPn')
                @slot('name', 'isppn')
            @endcomponent --}}
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                IsStock
            </label>
            @component('frontend.common.input.checkbox')
                @slot('text', 'IsStock')
                @slot('name', 'isstock')
            @endcomponent

            {{-- @component('frontend.common.input.text')
                @slot('text', 'IsStock')
                @slot('name', 'isstock')
            @endcomponent --}}
        </div>
    </div>
    <div class="form-group m-form__group row ">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                xPicture @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.upload')
                @slot('text', 'xPicture')
                @slot('name', 'xpicture')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                AccountCode @include('frontend.common.label.optional')
            </label>

            @component('frontend.common.input.text')
                @slot('text', 'AccountCode')
                @slot('name', 'accountcode')
            @endcomponent
        </div>
    </div>
