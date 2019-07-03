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
                                    Preliminary Task Card
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
                                                Preliminary Number @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'number')
                                                @slot('text', 'Taskcard Number')
                                                @slot('name', 'number')
                                                @slot('value', $taskcard->number)
                                                @slot('id_error', 'number')
                                            @endcomponent
                                        </div>
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

                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Company Task Number @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskCard->additionals))
                                                @component('frontend.common.input.text')
                                                    @slot('id', 'company_number')
                                                    @slot('text', 'Company Task Number')
                                                    @slot('name', 'company_number')
                                                    @slot('id_error', 'company_number')
                                                @endcomponent
                                            @else
                                                @component('frontend.common.input.text')
                                                    @slot('id', 'company_number')
                                                    @slot('text', 'Company Task Number')
                                                    @slot('name', 'company_number')
                                                    @slot('value', json_decode($taskCard->additionals)->internal_number)
                                                    @slot('id_error', 'company_number')
                                                @endcomponent
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C Type @include('frontend.common.label.required')
                                            </label>

                                            <select id="applicability_airplane" name="applicability_airplane" class="form-control m-select2" multiple>
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
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Manhour Estimation @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.decimal')
                                                @slot('id', 'manhour')
                                                @slot('text', 'Manhour')
                                                @slot('name', 'manhour')
                                                @slot('id_error', 'manhour')
                                                @slot('value', $taskcard->estimation_manhour)
                                            @endcomponent
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
                                                        @slot('min',0)
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
                                                        @slot('min',0)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Instruction @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '20')
                                                @slot('id', 'instruction')
                                                @slot('name', 'instruction')
                                                @slot('text', 'instruction')
                                                @slot('value', $taskcard->description)
                                                @slot('id_error', 'instruction')
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

                            @include('frontend.task-card.nonroutine.si.tool.modal')

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

                            @include('frontend.task-card.nonroutine.si.item.modal')

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

        $(document).ready(function () {
          $(".js-example-tags").select2();
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
              cols += '<option value"">Select Threshold</option>';
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
                cols += '<option value"">Select Repeat</option>';
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
                if (counterRepeats >= 1) {
                    $(this).closest("tr").remove();
                    counterRepeats -= 1
                }
            });
        });
    </script>
    <script>
        let taskcard_uuid = '{{$taskcard->uuid}}';
    </script>

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/category.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/category-taskcard.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/scheduled-priority.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-priority.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/recurrence.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/recurrence.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/manual-affected.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/manual-affected.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/version.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/non-routine/preliminary/edit.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/threshold-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/threshold-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/repeat-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/repeat-type.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script> --}}
@endpush
