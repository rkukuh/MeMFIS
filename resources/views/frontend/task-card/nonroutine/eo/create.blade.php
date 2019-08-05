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
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Engineering Order Task Card
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
                                                EO Number  @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'number')
                                                @slot('text', 'Taskcard Number')
                                                @slot('name', 'number')
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
                                                @slot('id_error', 'title')
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
                                                @slot('id_error', 'company_number')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Revision @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'revision')
                                                        @slot('text', 'Revision')
                                                        @slot('name', 'revision')
                                                        @slot('id_error', 'revision')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Reference @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'reference')
                                                        @slot('text', 'Reference')
                                                        @slot('name', 'reference')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Type @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Taskcard Type')
                                                @slot('id', 'taskcard_non_routine_type')
                                                @slot('name', 'taskcard_non_routine_type')
                                                @slot('id_error', 'taskcard_non_routine_type')
                                            @endcomponent


                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Effectivity (A/C Type) @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Applicability Airplane')
                                                @slot('id', 'applicability_airplane')
                                                @slot('name', 'applicability_airplane')
                                                @slot('multiple','multiple')
                                                @slot('id_error', 'applicability-airplane')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Category @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'category')
                                                @slot('text', 'Category')
                                                @slot('name', 'category')
                                                @slot('id_error', 'category')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
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
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Threshold @include('frontend.common.label.optional')
                                            </label>
                                            <table class="threshold">
                                                <tr>
                                                    <td width="45%"><input type="text" required="required" class="form-control" name="threshold_amount[]"/></td>
                                                    <td width="50%"><select name="threshold_type[]"  class="select form-control js-example-tags"><option value"">Select Threshold</option>
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
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Repeat @include('frontend.common.label.optional')
                                            </label>
                                            <table class="repeat">
                                                <tr>
                                                    <td width="45%"><input type="text" required="required" class="form-control" name="repeat_amount[]"/></td>
                                                    <td width="50%"><select name="repeat_type[]"  class="select form-control js-example-tags">
                                                    <option value"">Select Repeat</option>
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
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Scheduled Priority @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'scheduled_priority_id')
                                                @slot('text', 'Scheduled Priority')
                                                @slot('name', 'scheduled_priority_id')
                                                @slot('id_error', 'scheduled_priority_id')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="prior_to">
                                            <label class="form-control-label" style="margin-top:13px">
                                            </label>

                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    @component('frontend.common.input.radio')
                                                        @slot('id', 'prior_to_date')
                                                        @slot('name', 'prior_to')
                                                        @slot('value', 'date')
                                                        @slot('disabled', 'disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'date')
                                                        @slot('text', 'date')
                                                        @slot('name', 'date')
                                                        @slot('disabled', 'disabled')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    @component('frontend.common.input.radio')
                                                        @slot('id', 'prior_to_hours')
                                                        @slot('name', 'prior_to')
                                                        @slot('value', 'hour')
                                                        @slot('disabled', 'disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'hour')
                                                        @slot('text', 'hour')
                                                        @slot('name', 'hour')
                                                        @slot('disabled', 'disabled')
                                                        @slot('input_append', 'Hours')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    @component('frontend.common.input.radio')
                                                        @slot('id', 'prior_to_cycle')
                                                        @slot('name', 'prior_to')
                                                        @slot('value', 'cycle')
                                                        @slot('disabled', 'disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'cycle')
                                                        @slot('text', 'cycle')
                                                        @slot('name', 'cycle')
                                                        @slot('disabled', 'disabled')
                                                        @slot('input_append', 'Cycle')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row" >
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Recurrence @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'recurrence_id')
                                                @slot('text', 'Recurrence Id')
                                                @slot('name', 'recurrence_id')
                                                @slot('id_error', 'recurrence_id')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6  hidden" id="recurrence_div">
                                            <label class="form-control-label" style="margin-top:13px">
                                            </label>

                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'recurrence')
                                                        @slot('text', 'Recurrence')
                                                        @slot('name', 'recurrence')
                                                        @slot('disabled', 'disabled')
                                                        @slot('id_error', 'recurrence')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-8 col-md-8 col-lg-8">
                                                    <select id="recurrence-select" name="recurrence-select" id="recurrence-select" class="form-control" disabled>
                                                        <option value="">
                                                            Select Recurrence
                                                        </option>
                                                        <option value="cyrcle">
                                                            Cycle
                                                        </option>
                                                        <option value="hourly">
                                                            Hourly
                                                        </option>
                                                        <option value="daily">
                                                            Daily
                                                        </option>
                                                        <option value="yearly">
                                                            Yearly
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Manuals Affected @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'manual_affected_id')
                                                @slot('text', 'Manual Affected')
                                                @slot('name', 'manual_affected_id')
                                                @slot('id_error', 'manual_affected_id')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="note_div">
                                            <label class="form-control-label" style="margin-top:13px">
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '3')
                                                @slot('id', 'note')
                                                @slot('name', 'note')
                                                @slot('text', 'Note')
                                                @slot('disabled', 'disabled')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '20')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-taskcard')
                                                        @slot('class', 'add-taskcard')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @include('frontend.common.buttons.back')
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
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                <h3 class="m-portlet__head-text">
                                    Instructions
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
                                            @slot('attribute', 'disabled')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
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

                                <h3 class="m-portlet__head-text">
                                    Thresholds
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
                                            @slot('attribute', 'disabled')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
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

                                <h3 class="m-portlet__head-text">
                                    Repeats
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
                                            @slot('attribute', 'disabled')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
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
          var counter = 0;
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
              counter++;
          });
          $("table.threshold").on("click", ".ibtnDel", function (event) {
              if (counter >= 1) {
                  $(this).closest("tr").remove();
                  counter -= 1
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
                counter++;
            });
            $("table.repeat").on("click", ".ibtnDel", function (event) {
                if (counter >= 1) {
                    $(this).closest("tr").remove();
                    counter -= 1
                }
            });
        });
    </script>

    <script src="{{ asset('js/frontend/functions/select2/documents-library.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-non-routine-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-non-routine-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

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

    <script src="{{ asset('js/frontend/taskcard/non-routine/eo/create.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script> --}}
@endpush
