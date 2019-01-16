<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Routine</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Non Routine</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
        @include('frontend.workpackage.routine.index')
        @include('frontend.workpackage.routine.basic.modal')
        @include('frontend.workpackage.routine.sip.modal')
        @include('frontend.workpackage.routine.cpcp.modal')
    </div>
    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
        @include('frontend.workpackage.nonroutine.index')
        @include('frontend.workpackage.nonroutine.adsb.modal')
        @include('frontend.workpackage.nonroutine.cmrawl.modal')
        @include('frontend.workpackage.nonroutine.si.modal')
    </div>
</div>
