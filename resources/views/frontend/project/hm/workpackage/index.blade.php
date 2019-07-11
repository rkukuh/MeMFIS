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
                                Project View
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
                                            <a class="nav-link" data-toggle="tab" href="#m_tabs_manhour">Manhours Propotion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#m_tabs_facility">Facility Used</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#m_tabs_enginner" id="engineer_team_tab">Engineer Team</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="m_tabs_taskcard" role="tabpanel">
                                        @include('frontend.project.hm.taskcard.index')
                                    </div>
                                    <div class="tab-pane" id="m_tabs_manhour" role="tabpanel">
                                        @include('frontend.project.hm.manhour.index')
                                    </div>
                                    <div class="tab-pane" id="m_tabs_facility" role="tabpanel">
                                        @include('frontend.project.hm.facility.index')
                                    </div>
                                    <div class="tab-pane" id="m_tabs_enginner" role="tabpanel">
                                        @include('frontend.project.hm.engineer.index')
                                    </div>

                                    @include('frontend.project.hm.modal.material.routine-si')
                                    @include('frontend.project.hm.modal.tool.routine-si')
                                    @include('frontend.project.hm.modal.sequence')
                                    @include('frontend.project.hm.modal.predecessor')
                                    @include('frontend.project.hm.modal.successor')

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @include('frontend.common.buttons.back')
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
        </div>
    </div>
</div>


@endsection

@push('footer-scripts')
    <script>
        let workPackage_uuid = '{{ $workPackage->uuid }}';
        let anyChanges = false;
    </script>
    <script src="{{ asset('js/frontend/project/hm/workpackage.js') }}"></script>
    <script src="{{ asset('js/frontend/project/hm/repeater.js') }}"></script>
    <script src="{{ asset('js/frontend/project/hm/modal/datatables.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/modal/successor.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/modal/predecessor.js') }}"></script>
@endpush
