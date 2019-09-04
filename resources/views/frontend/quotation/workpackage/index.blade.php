@extends('frontend.master')

@section('content')
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
                          Project View - {{ $workPackage->title }}
                        </h3>
                    </div>
                </div>
            </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="px-2 py-2">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_taskcard">Taskcard List(s)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_tool_material">Material & Tool Taskcard List</a>
                                    </li>
                                    <li class="nav-item" id="tabs_facility">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_facility">Facility</a>
                                    </li>
                                </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="m_tabs_taskcard" role="tabpanel">
                                        @include('frontend.quotation.taskcard.index')
                                    </div>
                                    <div class="tab-pane" id="m_tabs_tool_material" role="tabpanel">
                                        @include('frontend.quotation.item.index')
                                        @include('frontend.quotation.workpackage.modal')
                                    </div>
                                    <div class="tab-pane" id="m_tabs_facility" role="tabpanel">
                                        @include('frontend.quotation.facility.index')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>


@endsection

@push('footer-scripts')
    <script>
        let workPackage_uuid = '{{ $workPackage->uuid }}';
        let project_uuid = '{{  $quotation->quotationable->uuid }}';
        let currencyCode = '{{  $quotation->currency->code }}';
        let quotation_uuid = '{{ $quotation->uuid }}';
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/workpackage/job-request.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>

@endpush
