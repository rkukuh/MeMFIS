@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Personnel
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
                        <a href="{{ route('frontend.employee.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Personnel
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
                                            <i class="la la-cog"></i> Personnels
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                            <i class="la la-briefcase"></i> Education
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                            <i class="la la-bell-o"></i> Certification
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_4" role="tab">
                                            <i class="la la-bell-o"></i> General License
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_5" role="tab">
                                            <i class="la la-bell-o"></i> AMEL
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_6" role="tab">
                                            <i class="la la-bell-o"></i> OTR
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown m-tabs__item">
                                        <a class="nav-link m-tabs__link dropdown-toggle" data-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="true"><i class="la la-map-marker"></i>More</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_6_7">Languages</a>
                                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_6_9">Emergency
                                                Contacts</a>
                                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_6_10">Documents</a>
                                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_6_11">Tamporarily
                                                Deactivated Personnels</a>
                                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_6_12">Terminated
                                                Personnel Data</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                @include('frontend.employee.employee.include.employee')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                @include('frontend.employee.employee.include.education')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                @include('frontend.employee.employee.include.certification')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_4" role="tabpanel">
                                @include('frontend.employee.employee.include.general-license')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_5" role="tabpanel">
                                @include('frontend.employee.employee.include.amel')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_6" role="tabpanel">
                                @include('frontend.employee.employee.include.otr')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_7" role="tabpanel">
                                @include('frontend.employee.employee.include.languages')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_9" role="tabpanel">
                                @include('frontend.employee.employee.include.emergency-contact')
                            </div>
                            <div class="tab-pane" id="m_tabs_6_10" role="tabpanel">
                                @include('frontend.employee.employee.include.document')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/frontend/employee/employee/index.js')}}"></script>
@endpush
