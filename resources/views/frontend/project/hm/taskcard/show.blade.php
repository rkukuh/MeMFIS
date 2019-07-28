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
        @include('frontend.project.hm.taskcard.routine.show')
    </div>
    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
        @include('frontend.project.hm.taskcard.nonroutine.show')
        @include('frontend.project.hm.taskcard.nonroutine.htcrr.workshop-task')
        @include('frontend.project.hm.modal.material.htcrr')
        @include('frontend.project.hm.modal.tool.htcrr')
    </div>
</div>
@push('footer-scripts')

@endpush