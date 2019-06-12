@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Taskcard
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
                        <a href="{{ route('frontend.taskcard.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Material
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-7">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Routine Task Card
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
                                                Title @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'title')
                                                @slot('text', 'Title')
                                                @slot('name', 'title')
                                                @slot('value', $taskcard->title)
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task Card Number @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'number')
                                                @slot('text', 'Taskcard Number')
                                                @slot('name', 'number')
                                                @slot('value', $taskcard->number)
                                                @slot('id_error', 'number')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Company Task Number @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'company_number')
                                                @slot('text', 'Company Task Number')
                                                @slot('name', 'company_number')
                                                @slot('value', 'company_number')
                                                @slot('id_error', 'company_number')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Type @include('frontend.common.label.required')
                                            </label>

                                            <select id="taskcard_routine_type" name="taskcard_routine_type" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Taskcard Routine Type &mdash;
                                                </option>

                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"
                                                        @if ($type->id == $taskcard->type_id) selected @endif>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Aircraft Applicability @include('frontend.common.label.required')
                                            </label>

                                            <select id="applicability_airplane" name="applicability_airplane" class="form-control m-select2" multiple style="width:100%">
                                                @if ($taskcard->aircrafts->isEmpty())
                                                    @foreach ($aircrafts as $aircraft)
                                                        <option value="{{ $aircraft->id }}">
                                                            {{ $aircraft->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($aircrafts as $aircraft)
                                                        <option value="{{ $aircraft->id }}"
                                                            @if(in_array( $aircraft->id ,$aircraft_taskcards)) selected @endif>
                                                            {{ $aircraft->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @component('frontend.common.label.help-text')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        ATA @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'ata')
                                                        @slot('text', 'ATA')
                                                        @slot('name', 'ata')
                                                        @slot('value', $taskcard->ata)
                                                        @slot('id_error', 'ata')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('id', 'is_rii')
                                                        @slot('name', 'is_rii')
                                                        @slot('text', 'RII?')
                                                        @if ($taskcard->is_rii == 1)
                                                            @slot('checked', 'checked')
                                                        @endif
                                                        @slot('style_div','margin-top:30px')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task @include('frontend.common.label.required')
                                            </label>

                                            <select id="task_type_id" name="task_type_id" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Taskcard &mdash;
                                                </option>

                                                @foreach ($tasks as $task)
                                                    <option value="{{ $task->id }}"
                                                        @if ($task->id == $taskcard->task_id) selected @endif>
                                                        {{ $task->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Skill @include('frontend.common.label.required')
                                            </label>

                                            <select id="otr_certification" name="otr_certification" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Skill &mdash;
                                                </option>

                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}"
                                                        @if ($skill->id == $taskcard->skill_id) selected @endif>
                                                        {{ $skill->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Manhour Estimation @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.decimal')
                                                        @slot('id', 'manhour')
                                                        @slot('text', 'Manhour')
                                                        @slot('name', 'manhour')
                                                        @slot('value', $taskcard->estimation_manhour)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Performance Factor
                                                    </label>

                                                    @component('frontend.common.input.decimal')
                                                        @slot('id', 'performa')
                                                        @slot('text', 'Performa')
                                                        @slot('name', 'performa')
                                                        @slot('value', $taskcard->performance_factor)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Engineer Quantity @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'engineer_quantity')
                                                        @slot('text', 'Engineer Quantity')
                                                        @slot('name', 'engineer_quantity')
                                                        @slot('value', $taskcard->engineer_quantity)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Helper Quantity @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'helper_quantity')
                                                        @slot('text', 'Helper Quantity')
                                                        @slot('name', 'helper_quantity')
                                                        @slot('value', $taskcard->helper_quantity)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Work Area @include('frontend.common.label.optional')
                                            </label>

                                            <select id="work_area" name="work_area" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Work Area &mdash;
                                                </option>

                                                @foreach ($work_areas as $work_area)
                                                    <option value="{{ $work_area->id }}"
                                                        @if ($work_area->id == $taskcard->work_area) selected @endif>
                                                        {{ $work_area->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Access @include('frontend.common.label.optional')
                                            </label>

                                            <select id="access" name="access" class="form-control m-select2" multiple style="width:100%">
                                                @if ($taskcard->accesses->isEmpty())
                                                    @foreach ($accesses as $access)
                                                        <option value="{{ $access->id }}">
                                                            {{ $access->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($accesses as $access)
                                                        <option value="{{ $access->id }}"
                                                            @if(in_array( $access->id ,$access_taskcards)) selected @endif>
                                                            {{ $access->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @component('frontend.common.label.help-text')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Zone @include('frontend.common.label.optional')
                                            </label>

                                            <select id="zone" name="zone" class="form-control m-select2" multiple style="width:100%">
                                                @if ($taskcard->zones->isEmpty())
                                                    @foreach ($zones as $zone)
                                                        <option value="{{ $zone->id }}">
                                                            {{ $zone->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($zones as $zone)
                                                        <option value="{{ $zone->id }}"
                                                            @if(in_array( $zone->id ,$zone_taskcards)) selected @endif>
                                                            {{ $zone->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @component('frontend.common.label.help-text')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Source @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'source')
                                                @slot('text', 'Source')
                                                @slot('name', 'source')
                                                @slot('value', $taskcard->source)
                                            @endcomponent

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Related Card @include('frontend.common.label.optional')
                                            </label>

                                            <select id="relationship" name="relationship" class="form-control m-select2" multiple style="width:100%">
                                                @if ($taskcard->related_to->isEmpty())
                                                    @foreach ($taskcards as $taskCard)
                                                        <option value="{{ $taskCard->id }}">
                                                            {{ $taskCard->title }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($taskcards as $taskCard)
                                                        <option value="{{ $taskcard->id }}"
                                                            @if(in_array( $taskCard->id ,$relation_taskcards)) selected @endif>
                                                            {{ $taskCard->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @component('frontend.common.label.help-text')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Version @include('frontend.common.label.optional')
                                                    </label>
                                                    @php
                                                        $versions = json_decode($taskcard->version, TRUE);
                                                    @endphp

                                                    <select id="version" name="version" class="form-control m-select2" multiple style="width:100%">
                                                        <option value="">
                                                            &mdash; Select a Version &mdash;
                                                        </option>

                                                        @if (isset($versions))
                                                            @foreach ($versions as $version)
                                                                <option selected>
                                                                    {{ $version }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Effectivity @include('frontend.common.label.optional')
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Effectifity')
                                                        @slot('id', 'effectifity')
                                                        @slot('name', 'effectifity')
                                                        @slot('value', $taskcard->effectivity)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task Card Attachment @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.upload')
                                                @slot('text', 'Taskcard')
                                                @slot('id', 'taskcard')
                                                @slot('name', 'taskcard')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Documents library @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Document')
                                                @slot('id', 'document')
                                                @slot('name', 'document')
                                                @slot('multiple','multiple')
                                                @slot('help_text','You can chose multiple value')
                                                @slot('id_error', 'document')
                                            @endcomponent

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="stringer_div">
                                            <label class="form-control-label">
                                                Stringer @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'stringer')
                                                @slot('text', 'Stringer')
                                                @slot('name', 'stringer')
                                                @slot('id_error', 'stringer')
                                            @endcomponent
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="station_div">
                                            <label class="form-control-label">
                                                Station @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'station')
                                                @slot('text', 'Station')
                                                @slot('name', 'station')
                                                @slot('id_error', 'station')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="service_bulletin_div">
                                            <label class="form-control-label">
                                                Ref. Service Bulletins @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'service_bulletin')
                                                @slot('text', 'Service Bulletins')
                                                @slot('name', 'service_bulletin')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="section_div">
                                            <label class="form-control-label">
                                                Section(s) @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'section')
                                                @slot('text', 'Section')
                                                @slot('name', 'section')
                                                @slot('id_error', 'section')
                                                @slot('multiple','multiple')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label" id="threshold">
                                                Threshold @include('frontend.common.label.optional')
                                            </label>
                                            <table class="threshold">
                                                @if($taskcard->thresholds->isEmpty())
                                                    <tr>
                                                        <td width="45%">
                                                            <input type="number" required="required" class="form-control" name="threshold_amount[]"/>
                                                        </td>
                                                        <td width="50%"><select name="threshold_type[]"  class="select form-control js-example-tags"><option value"">Select</option>
                                                        @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                        <option value="{{$maintenanceCycle->uuid}}">{{$maintenanceCycle->name}}</option>
                                                        @endforeach
                                                        </select></td>
                                                        <td width="5%">
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('id', 'addrow')
                                                        @endcomponent
                                                        </td>
                                                    </tr>
                                                @else
                                                    @for($i = 0 ; $i < sizeof($taskcard->thresholds); $i++)
                                                    <tr>
                                                        <td width="45%">
                                                            <input type="number" required="required" class="form-control" name="threshold_amount[]" value="{{ $taskcard->thresholds[$i]->amount }}"/>
                                                        </td>
                                                        <td width="50%"><select name="threshold_type[]"  class="select form-control js-example-tags"><option value"">Select</option>
                                                        @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                        <option value="{{$maintenanceCycle->uuid}}" @if($taskcard->thresholds[$i]->type->uuid == $maintenanceCycle->uuid) selected @endif>{{$maintenanceCycle->name}}</option>
                                                        @endforeach
                                                        </select></td>
                                                        <td width="5%">
                                                        @if($i < 1)
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('id', 'addrow')
                                                            @endcomponent
                                                        @else
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('id', 'addrow')
                                                                @slot('class', 'ibtnDel')
                                                            @endcomponent
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                @endif
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Repeat @include('frontend.common.label.optional')
                                            </label>
                                            <table class="repeat">
                                                @if($taskcard->repeats->isEmpty())
                                                    <tr>
                                                        <td width="45%"><input type="number" required="required" class="form-control" name="repeat_amount[]"/></td>
                                                        <td width="50%"><select name="repeat_type[]"  class="select form-control js-example-tags">
                                                        <option value"">Select </option>
                                                        @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                        <option value="{{$maintenanceCycle->uuid}}">{{$maintenanceCycle->name}}</option>
                                                        @endforeach
                                                        </select></td>
                                                        <td width="5%">
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('id', 'addrow2')
                                                            @endcomponent
                                                        </td>
                                                    </tr>
                                                @else
                                                @for($i = 0 ; $i < sizeof($taskcard->repeats); $i++)
                                                <tr>
                                                    <td width="45%"><input type="text" required="required" class="form-control" name="repeat_amount[]" value="{{ $taskcard->repeats[$i]->amount }}"/></td>
                                                    <td width="50%"><select name="repeat_type[]"  class="select form-control js-example-tags">
                                                    <option value"">Select</option>
                                                    @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                    <option value="{{$maintenanceCycle->uuid}}" @if($taskcard->repeats[$i]->type->uuid == $maintenanceCycle->uuid) selected @endif>{{$maintenanceCycle->name}}</option>
                                                    @endforeach
                                                    </select></td>
                                                    <td width="5%">
                                                        @if($i < 1)
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('id', 'addrow2')
                                                            @endcomponent
                                                        @else
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('id', 'addrow2')
                                                                @slot('class', 'ibtnDel')
                                                            @endcomponent
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endfor
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Instruction @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '20')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                                @slot('value', $taskcard->description)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type', 'button')
                                                        @slot('id', 'edit-taskcard')
                                                        @slot('class', 'edit-taskcard')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.taskcard.index'))
                                                    @endcomponent
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
            <div class="col-lg-5">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Tools Requirement
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-tools-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Tool Taskcard')
                                            @slot('id', 'tool_taskcard')
                                            @slot('data_target', '#modal_tool')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.task-card.routine.tool.modal')

                            <div class="tool_datatable" id="tool_datatable"></div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Materials Requirement
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Item Taskcard')
                                            @slot('id', 'item_taskcard')
                                            @slot('data_target', '#modal_item')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.task-card.routine.item.modal')

                            <div class="item_datatable" id="item_datatable"></div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet hidden">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Threshold
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Threshold Taskcard')
                                            @slot('id', 'threshold_taskcard')
                                            @slot('data_target', '#modal_threshold')
                                        @endcomponent

                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.task-card.routine.threshold.modal')

                            <div class="threshold_datatable" id="item_datatable"></div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet hidden">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Repeat
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Repeat Taskcard')
                                            @slot('id', 'repeat_taskcard')
                                            @slot('data_target', '#modal_repeat')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.task-card.routine.repeat.modal')

                            <div class="repeat_datatable" id="item_datatable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header-scripts')
    <style>
        fieldset {
            margin-bottom: 30px;
        }

        .padding-datatable {
            padding: 0px
        }

        .margin-info {
            margin-left: 5px
        }
        textarea {
            min-height: 5em;
            width: 100%;
        }

    </style>
@endpush

@push('footer-scripts')
    <script>
        let TaskCard_uuid = '{{ $taskcard->uuid }}';
    </script>

    <script>
        var autoExpand = function (field) {

        // Reset field height
        field.style.height = 'inherit';

        // Get the computed styles for the element
        var computed = window.getComputedStyle(field);

        // Calculate the height
        var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
                    + parseInt(computed.getPropertyValue('padding-top'), 10)
                    + field.scrollHeight
                    + parseInt(computed.getPropertyValue('padding-bottom'), 10)
                    + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

        field.style.height = height + 'px';

        };

        document.addEventListener('input', function (event) {
        if (event.target.tagName.toLowerCase() !== 'textarea') return;
        autoExpand(event.target);
        }, false);
    </script>
    <script>
        let taskcard_uuid = '{{$taskcard->uuid}}';
        $('.js-example-tags').select2();
        $(document).ready(function () {
          var counterThresholds = {!! sizeof($taskcard->thresholds) !!};
          var counterRepeats = {!! sizeof($taskcard->repeats) !!};
          var maintenanceCycles = {!! json_encode($MaintenanceCycles->toArray()) !!}
          $("#addrow").on("click", function () {
              var x = 1;
              var newRow = $("<tr>");
              var cols = "";
              x = x+1;
              cols += '<td width="45%"><input type="text" required="required" class="form-control" name="threshold_amount[]"/></td>';
              cols += '<td width="50%"><select name="threshold_type[]" class="select form-control ">';
              cols += '<option value"">Select</option>';
              for (var i = 0; i < (maintenanceCycles.length - 1); i++) {
                  if(maintenanceCycles[i].id == 1){
                  }else{
                  cols += '<option value="' + maintenanceCycles[i].uuid + '" >' + maintenanceCycles[i].name + ' </option>';
                  }
              };
              cols += '</select></td>';
              cols += '<td width="5%"><div data-repeater-delete="" class="btn btn-danger btn-sm ibtnDel" value="Delete"><span><i class="la la-trash-o"></i></span></div></td>';
              newRow.append(cols);
              $("table.threshold").append(newRow);
              $('.select').select2();
              counterThresholds++;
          });
          $("table.threshold").on("click", ".ibtnDel", function (event) {
              if (counterThresholds >= 1) {
                  $(this).closest("tr").remove();
                  counterThresholds -= 1
              }
          });
          $("#addrow2").on("click", function () {
                var x = 1;
                var newRow = $("<tr>");
                var cols = "";
                x = x+1;
                cols += '<td width="45%"><input type="text" required="required" class="form-control"  name="repeat_amount[]"/></td>';
                cols += '<td width="50%"><select name="repeat_type[]" class="select form-control ">';
                cols += '<option value"">Select</option>';
                for (var i = 0; i < (maintenanceCycles.length - 1); i++) {
                    if(maintenanceCycles[i].id == 1){
                    }else{
                    cols += '<option value="' + maintenanceCycles[i].uuid + '" >' + maintenanceCycles[i].name + ' </option>';
                    }
                };
                cols += '</select></td>';
                cols += '<td width="5%"><div data-repeater-delete="" class="btn btn-danger btn-sm ibtnDel" value="Delete"><span><i class="la la-trash-o"></i></span></div></td>';
                newRow.append(cols);
                $("table.repeat").append(newRow);
                $('.select').select2();
                counterRepeats++;
            });
            $("table.repeat").on("click", ".ibtnDel", function (event) {
                console.log("Repeats count : "+counterRepeats);
                if (counterRepeats >= 1) {
                    $(this).closest("tr").remove();
                    counterRepeats -= 1
                }
            });
        });
    </script>

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>


    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/ac-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/access.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/threshold-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/threshold-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/repeat-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/repeat-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-engine.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-engine.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/section.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/section.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/documents-library.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/version.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/routine/edit.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/routine/form-reset.js') }}"></script>
@endpush
