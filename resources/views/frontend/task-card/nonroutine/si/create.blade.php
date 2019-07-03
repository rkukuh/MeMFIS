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

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Special Instruction Task Card
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
                                                    Special Instruction Number @include('frontend.common.label.required')
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
                                                <label class="form-control-label">
                                                    A/C Type @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Applicability Airplane')
                                                    @slot('id', 'applicability_airplane')
                                                    @slot('name', 'applicability_airplane')
                                                    @slot('multiple','multiple')
                                                    @slot('help_text','You can chose multiple value')
                                                    @slot('id_error', 'applicability-airplane')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Work Area @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Work Area')
                                                    @slot('id', 'work_area')
                                                    @slot('name', 'work_area')
                                                    @slot('id_error', 'work-area')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Skill @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Otr Certification')
                                                    @slot('id', 'otr_certification')
                                                    @slot('name', 'otr_certification')
                                                    @slot('id_error', 'otr-certification')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Manhour Estimation @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.decimal')
                                                    @slot('id', 'manhour')
                                                    @slot('text', 'Manhour')
                                                    @slot('name', 'manhour')
                                                    @slot('id_error', 'manhour')
                                                    @slot('min','1')
                                                    @slot('value','1')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Performa Factor @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.decimal')
                                                    @slot('id', 'performa')
                                                    @slot('text', 'Performa')
                                                    @slot('name', 'performa')
                                                    @slot('id_error', 'performa')
                                                    @slot('min','1')
                                                    @slot('value','1')
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
                                                            @slot('min', '1')
                                                            @slot('value', '1')
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
                                                            @slot('min','0')
                                                            @slot('value', '0')
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
                                                    @slot('id_error', 'instruction')
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

                                <h3 class="m-portlet__head-text">
                                    Tools Requirement
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
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

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

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/work-area.js') }}"></script>

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

    <script src="{{ asset('js/frontend/taskcard/non-routine/si/create.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script> --}}
@endpush
