<div class="px-4">
    <div class="m-portlet__body">
        <div class="form-group m-form__group row ">

            <input type="hidden" id="uuid" name="uuid" value="{{$project}}">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <label class="form-control-label">
                    Job Request Description @include('frontend.common.label.required')
                </label>
                @component('frontend.common.input.textarea')
                    @slot('text', 'Description')
                    @slot('name', 'description')
                    @slot('id', 'description')
                    @slot('rows', '5')
                    @slot('id_error', 'description')
                    @if(isset($job_request))
                    @slot('value',$job_request->pivot->description)
                    @endif
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row ">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Total Manhours @include('frontend.common.label.required')
                </label>
                @component('frontend.common.label.data-info')
                    @slot('id', 'total_mhrs')
                    @slot('name', 'total_mhrs')
                    @slot('text', $project_workpackage->total_manhours_with_performance_factor)
                @endcomponent

            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Manhours Rate @include('frontend.common.label.required')
                </label>
                @component('frontend.common.input.number')
                    @slot('text', 'rate')
                    @slot('name', 'rate')
                    @slot('id', 'rate')
                    @slot('id_error', 'rate')
                    @if(isset($job_request))
                    @slot('value',$job_request->pivot->manhour_rate)
                    @endif
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-12 col-md-12 col-lg-12 footer">
                <div class="flex">
                    <div class="action-buttons">
                        @component('frontend.common.buttons.submit')
                            @slot('type','button')
                            @slot('id', 'add-job-request')
                            @slot('class', 'add-job-request')
                        @endcomponent

                        @include('frontend.common.buttons.reset')

                        @component('frontend.common.buttons.back')
                            @slot('href', route('frontend.quotation.edit', ['quotation' => $quotation->uuid]))
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        @include('frontend.quotation.taskcard.routine.index')
        @include('frontend.quotation.taskcard.routine.basic.modal')
        @include('frontend.quotation.taskcard.routine.sip.modal')
        @include('frontend.quotation.taskcard.routine.cpcp.modal')
    </div>
    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
        @include('frontend.quotation.taskcard.nonroutine.index')
        @include('frontend.quotation.taskcard.nonroutine.adsb.modal')
        @include('frontend.quotation.taskcard.nonroutine.cmrawl.modal')
        @include('frontend.quotation.taskcard.nonroutine.si.modal')
        @include('frontend.quotation.taskcard.nonroutine.htcrr.modal')
        @include('frontend.quotation.taskcard.nonroutine.htcrr.workshop-task')
    </div>
</div>

