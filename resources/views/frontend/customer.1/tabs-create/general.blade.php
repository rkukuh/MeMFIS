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
                Name  @include('frontend.common.label.required')
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
            ToP @include('frontend.common.label.required')
        </label>

        @component('frontend.common.input.text')
            @slot('text', 'ToP')
            @slot('name', 'top')
        @endcomponent
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Active * @include('frontend.common.label.optional')
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
                    Account Code @include('frontend.common.label.optional')
                </label>

                @include('frontend.common.account-code.index')

                @component('frontend.common.input.hidden')
                    @slot('id', 'account_code')
                    @slot('name', 'account_code')
                @endcomponent
            </div>
</div>
