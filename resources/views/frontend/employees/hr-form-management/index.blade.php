@extends('frontend.master')

@section('content')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    HR Form
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
                        <a href="{{ route('frontend.hr-form.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                HR Form
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<div class="m-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="m-portlet m-portlet--tabs">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                    <i class="la la-cog"></i> HR Forms
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                    <i class="la la-briefcase"></i> Employee Forms
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                @include('frontend.employees.hr-form-management.include.hr-form')
                        </div>
                        <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                @include('frontend.employees.hr-form-management.include.employee-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('footer-scripts')
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
    <script src="{{ asset('js/frontend/employee/hr-form-management.js')}}"></script>
@endpush
