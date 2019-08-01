@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Company Structure & Department
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
                        <a href="{{ route('frontend.company.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Company Structure & Department
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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Company Structure & Department
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">

                                        @component('frontend.common.input.hidden')
                                        @slot('id', 'company_uuid')
                                        @slot('name', 'company_uuid')
                                        @slot('value', $company->uuid)
                                        @endcomponent

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Code 
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'code')
                                                @slot('name', 'code')
                                                @slot('value',$company->code)
                                                @slot('id_error', 'code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Name
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'name')
                                                @slot('id', 'name')
                                                @slot('name', 'name')
                                                @slot('value',$company->name)
                                                @slot('id_error', 'name')
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
                                                @slot('value',$company->description)
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Company Type   
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'company')
                                                @slot('name', 'company')
                                                @slot('id_error', 'company-airplane')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Parent Structure
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'parent_structure')
                                                @slot('name', 'parent_structure')
                                                @slot('id_error', 'parent_structure')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'edit-company-structure')
                                                        @slot('class', 'edit-company-structure')
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
    <script src="{{ asset('js/frontend/functions/select2/company.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/parent-structure.js') }}"></script>

    <script src="{{ asset('js/frontend/company/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/company/form-reset.js') }}"></script>
@endpush
