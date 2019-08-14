@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Benefits
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ route('frontend.benefit.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Benefits
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Benefits
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Benefits Code @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Benefits Code')
                                                @slot('id', 'benefits_code')
                                                @slot('name', 'benefits_code')
                                                @slot('id_error', 'benefits_code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Benefits Name @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Benefits Name')
                                                @slot('id', 'benefits_name')
                                                @slot('name', 'benefits_name')
                                                @slot('id_error', 'benefits_name')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Calculation Reference
                                            </label>
        
                                            @component('frontend.common.input.select2')
                                                @slot('id', 'calculation_reference')
                                                @slot('name', 'calculation_reference')
                                                @slot('id_error', 'calculation_reference')
                                            @endcomponent    

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Pro-rate Base Calculation
                                            </label>
        
                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Pro-rate Base Calculation')
                                                @slot('id', 'pro_rate_base_calculation')
                                                @slot('name', 'pro_rate_base_calculation')
                                                @slot('id_error', 'pro_rate_base_calculation')
                                            @endcomponent    
                                    
                                        </div>
                                    </div>


                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-benefits')
                                                        @slot('class', 'add-benefits')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @include('frontend.common.buttons.back')

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/calculation-reference.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/pro-rate-base-calculation.js') }}"></script>
    <script src="{{ asset('js/frontend/benefit/create.js') }}"></script>
@endpush
