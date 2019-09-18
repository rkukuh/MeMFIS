<div class="px-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Routine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Non Routine</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
        @include('frontend.project.hm.taskcard.routine.index')
        @include('frontend.project.hm.taskcard.routine.basic.modal')
        @include('frontend.project.hm.taskcard.routine.sip.modal')
        @include('frontend.project.hm.taskcard.routine.cpcp.modal')
    </div>
    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
        @include('frontend.project.hm.taskcard.nonroutine.index')
        @include('frontend.project.hm.taskcard.nonroutine.preliminary.modal')
        @include('frontend.project.hm.taskcard.nonroutine.adsb.modal')
        @include('frontend.project.hm.taskcard.nonroutine.cmrawl.modal')
        @include('frontend.project.hm.taskcard.nonroutine.si.modal')
        @include('frontend.project.hm.taskcard.nonroutine.ea.modal')
        @include('frontend.project.hm.taskcard.nonroutine.eo.modal')
        @include('frontend.project.hm.taskcard.nonroutine.modal')
        @include('frontend.project.hm.modal.material.modal')
        @include('frontend.project.hm.modal.tool.modal')
    </div>
</div>
@push('footer-scripts')
    <script src="{{ asset('js/frontend/project/hm/datatables.js')}}"></script>
@endpush
