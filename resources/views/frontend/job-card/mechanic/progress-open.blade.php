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
                                                Task Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->number}}
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
                                                Company Task No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(isset(json_decode($jobcard->taskcard->additionals)->internal_number))
                                                    {{json_decode($jobcard->taskcard->additionals)->internal_number}}
                                                @else
                                                    -
                                                @endif
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
                                                Inspection Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->task->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(sizeof($jobcard->taskcard->skills) == 3)
                                                    ERI
                                                @elseif(sizeof($jobcard->taskcard->skills) == 1)
                                                    {{$jobcard->taskcard->skills[0]->name}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Est. Mhrs
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->estimation_manhour}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Work Area
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(isset($jobcard->taskcard->workarea->name))
                                                    {{$jobcard->taskcard->workarea->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Sequence
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->sequence}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if($jobcard->taskcard->is_rii == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Reference
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->reference}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Title
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->title}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Description
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->Description}}
                                            </td>
                                        </tr>
                                        @if($jobcard->taskcard->helper_quantity != 0)
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Helper
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->helper_quantity}}
                                            </td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
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
                                <div class="col-sm-6 col-md-6 col-lg-6">
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

                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            <form method="POST" action="{{route('frontend.jobcard-mechanic.update',$jobcard->uuid)}}">
                                                {{method_field('PATCH')}}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="progress" value="{{$status->uuid}}">
                                                @include('frontend.common.buttons.execute')
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
    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/type.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/type.js')}}"></script>


    <script src="{{ asset('js/frontend/journal.js')}}"></script>
@endpush
