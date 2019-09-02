@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center ">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Job Card
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
                        <a href="{{ route('frontend.journal.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Job Card
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Job Card
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table border="1px" width="100%">
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Job Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Task Card EO No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->jobcardable->eo_header->number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Project No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->code}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft_register}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft_sn}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Refrences
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if($jobcard->jobcardable->eo_header->reference)
                                                {{$jobcard->jobcardable->eo_header->reference}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Title
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->jobcardable->eo_header->title}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Instruction
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->jobcardable->description}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Category
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->jobcardable->eo_header->type->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Scheduled Priority
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{App\Models\Type::find($jobcard->jobcardable->eo_header->scheduled_priority_id)->name}} {{$jobcard->jobcardable->eo_header->scheduled_priority_text}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Recurrence
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{App\Models\Type::find($jobcard->jobcardable->eo_header->recurrence_id)->name}} {{$jobcard->jobcardable->eo_header->recurrence_amount}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Manuals Affected
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{App\Models\Type::find($jobcard->jobcardable->eo_header->manual_affected_id)->name}} {{$jobcard->jobcardable->eo_header->manual_affected_text}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(sizeof($jobcard->jobcardable->skills) == 3)
                                                    ERI
                                                @elseif(sizeof($jobcard->jobcardable->skills) == 1)
                                                    {{$jobcard->jobcardable->skills[0]->name}}
                                                @else
                                                    -
                                                @endif                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if($jobcard->is_rii == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-striped table-bordered second" width="100%" cellpadding="4">
                                <tr>
                                    <td colspan="5" align="center"><b>Material(s) Required</b></td>
                                </tr>
                                <tr>
                                    <td width="5%" align="center"><b>No</b></td>
                                    <td width="20%" align="center"><b>Part Number</b></td>
                                    <td width="50%" align="center"><b>Item Description</b></td>
                                    <td width="10%" align="center"><b>Qty</b></td>
                                    <td width="15%" align="center"><b>Unit</b></td>
                                </tr>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($materials as $material)
                                <tr>
                                    <td width="5%" align="center" valign="top">{{$i++}}</td>
                                    <td width="20%" align="center" valign="top">{{$material->code}}</td>
                                    <td width="50%" valign="top">{{$material->name}}</td>
                                    <td width="10%" align="center" valign="top">{{$material->pivot->quantity}}</td>
                                    <td width="15%" align="center" valign="top">{{App\Models\Unit::find($material->pivot->unit_id)->name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-striped table-bordered second" width="100%" cellpadding="4">
                                <tr>
                                    <td colspan="5" align="center"><b>Tool(s) Required / Special Tooling</b></td>
                                </tr>
                                <tr>
                                    <td width="5%" align="center"><b>No</b></td>
                                    <td width="20%" align="center"><b>Part Number</b></td>
                                    <td width="50%" align="center"><b>Item Description</b></td>
                                    <td width="10%" align="center"><b>Qty</b></td>
                                    <td width="15%" align="center"><b>Unit</b></td>
                                </tr>
                                @php
                                $j=1;
                                @endphp
                                @foreach ($tools as $tool)
                                <tr>
                                    <td width="5%" align="center" valign="top">{{$j++}}</td>
                                    <td width="20%" align="center" valign="top">{{$tool->code}}</td>
                                    <td width="50%" valign="top">{{$tool->name}}</td>
                                    <td width="10%" align="center" valign="top">{{$tool->pivot->quantity}}</td>
                                    <td width="15%" align="center" valign="top">{{App\Models\Unit::find($tool->pivot->unit_id)->name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <table border="1px" width="100%" style="margin-top:10px">
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Helper
                                        </td>
                                        <td width="70%" style="text-align:center">
                                        {{-- @if(isset($jobcard->helpers))
                                            @foreach($jobcard->helpers as $helper)
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <select name="helper" style="width:100%" class="form-control m-select2">
                                                        <option value=""></option>
                                                        @foreach($employees as $employee)
                                                        <option value="{{ $employee->code }}" @if($employee->code == $helper->code) selected @endif>{{ $employee->first_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.select2')
                                                        @slot('text', 'helper')
                                                        @slot('name', 'helper')
                                                        @slot('id_error', 'helper')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        @endif --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Station
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @component('frontend.common.input.select2')
                                                @slot('text', 'station')
                                                @slot('name', 'station')
                                                @slot('id', 'station')
                                                @slot('id_error', 'station')
                                            @endcomponent
                                        </td>
                                    </tr>
                            </table>

                            <table border="1px" width="100%" style="margin-top:10px">
                                <tr>
                                    <td align="center" style="background-color:beige;padding:10px;"><b>ACCOMPLISHMENT RECORD</b></td>
                                </tr>
                            </table>
                            @php $additionals = json_decode($jobcard->additionals) @endphp

                            <div class="form-group m-form__group row mt-1">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group m-form__group row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                TSN
                                            </label>
                                            @component('frontend.common.label.data-info')
                                                @if($additionals->TSN != null)
                                                    @slot('text', $additionals->TSN)
                                                @else
                                                    @slot('text', '-')
                                                @endif
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                CSN
                                            </label>
                                            @component('frontend.common.label.data-info')
                                                @if($additionals->CSN != null)
                                                    @slot('text', $additionals->CSN)
                                                @else
                                                    @slot('text', '-')
                                                @endif
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 mt-4">
                                    <table border="1px" width="100%" style="margin-top:10px">
                                        <tr>
                                            <td align="center" style="background-color:beige;padding:10px;" colspan="3"><b>ENTERED IN</b></td>
                                        </tr>
                                        <tr height="80">
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'ac')
                                                    @slot('name', 'logbook[]')
                                                    @slot('text', 'A/C Log Book')
                                                    @slot('value', 'ac-logbook')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </td>
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'eng')
                                                    @slot('name', 'logbook[]')
                                                    @slot('text', 'ENG. Log Book')
                                                    @slot('value', 'eng-logbook')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </td>
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'apu')
                                                    @slot('name', 'logbook[]')
                                                    @slot('text', 'APU Log Book')
                                                    @slot('value', 'apu-logbook')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            <form method="POST" action="">
                                                {{method_field('PATCH')}}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="progress" value="">
                                                @include('frontend.common.buttons.back')
                                            </form>
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
<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/type.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/type.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/station.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/station.js')}}"></script>

{{-- @if(sizeof($jobcard->helpers) == 0) --}}
<script src="{{ asset('js/frontend/functions/fill-combobox/helper.js')}}"></script>
{{-- @endif --}}
<script src="{{ asset('js/frontend/functions/select2/helper.js')}}"></script>
{{-- <!--
    <script>
        $( document ).ready(function() {
        let helpers = {!! $jobcard->helpers !!}
        console.log($('select[name^=helper]').length);
        $('select[name^=helper]').each()
        $('select[name^=helper]').select2().trigger('change');
        // $('select[name^=helper] option[value='+helpers[key].code+']').attr('selected','selected');
        });

    </script> -->
    <script>
        $( document ).ready(function() {
            $('.helper').each( function() {
                console.log( $(this).select2() );
            });
        console.log($('.helper').length);
        });

    </script> --}}



    <script src="{{ asset('js/frontend/journal.js')}}"></script>
    <script src="{{ asset('js/frontend/workpackage/routine/index.js')}}"></script>
@endpush
