@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Quotation
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
                        <a href="{{ route('frontend.quotation-workshop.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Quotation
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

                                @include('frontend.common.label.show')

                                <h3 class="m-portlet__head-text">
                                    Quotation
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
                                                Part Number   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Serial Number   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Complaint   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Job Request   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mt-5">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active btn-brand text-white" data-toggle="tab" href="#m_tabs_evaluation_cost">Evaluation Cost</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link btn-brand text-white" data-toggle="tab" href="#m_tabs_full_package_cost">Full Package Cost</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link btn-brand text-white" data-toggle="tab" href="#m_tabs_summary">Summary</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                @include('frontend.quotation-workshop.item.summary.show')
                                                @include('frontend.quotation-workshop.item.evaluation-cost.show')
                                                @include('frontend.quotation-workshop.item.full-packages-cost.show')
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

    <script src="{{ asset('js/frontend/quotation-workshop/summary.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/scheduled-payment.js') }}"></script>
@endpush
