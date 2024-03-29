@extends('frontend.master')

@section('content')
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

                            @include('frontend.common.label.summary')

                            <h3 class="m-portlet__head-text">
                                Job Card - Release Task
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <table border="1px" width="100%">
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Job Card No
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->number}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Task Card No
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->number)
                                                {{$taskrelease->jobcardable->number}}
                                            @else
                                                {{$taskrelease->jobcardable->eo_header->number}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Type
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->quotationable->aircraft->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Reg
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->quotationable->aircraft_register}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Serial Number
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->quotationable->aircraft_sn}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Inspection Type
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->task)
                                            {{$taskrelease->jobcardable->task->name}}
                                            @else
                                             -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Company Task No
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(isset(json_decode($taskrelease->jobcardable->additionals)->internal_number))
                                                {{json_decode($taskrelease->jobcardable->additionals)->internal_number}}
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
                                            {{$taskrelease->quotation->quotationable->code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Skill
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(sizeof($taskrelease->jobcardable->skills) == 3)
                                                ERI
                                            @elseif(sizeof($taskrelease->jobcardable->skills) == 1)
                                                {{$taskrelease->jobcardable->skills[0]->name}}
                                            @else
                                                -
                                            @endif
                                    </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Est.Mhrs
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->jobcardable->estimation_manhour}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Actual. Mhrs
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->ActualManhour}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Work Area
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(isset($taskrelease->jobcardable->workarea->name))
                                                {{$taskrelease->jobcardable->workarea->name}}
                                            @endif
                                    </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Sequence
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->sequence)
                                            {{$taskrelease->jobcardable->sequence}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Referencce
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->reference)
                                            {{$taskrelease->jobcardable->reference}}
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
                                            @if($taskrelease->jobcardable->title)
                                                {{$taskrelease->jobcardable->title}}
                                            @else
                                                {{$taskrelease->jobcardable->eo_header->title}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Description
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->description)
                                                {{$taskrelease->jobcardable->description}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Helper
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->jobcardable->helper_quantity}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Accomplishment Notes By
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if( $taskrelease->progresses->last()->reason_text !== null)
                                                {{ $taskrelease->progresses->last()->reason_text }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            RII
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->jobcardable->is_rii == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                </table>

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
                                                @if($status == "closed" )
                                                    @component('frontend.common.buttons.release')
                                                        @slot('class', 'release')
                                                        @slot('id', 'release')
                                                    @endcomponent
                                                @endif

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
    </div>
</div>
@endsection

@push('footer-scripts')
    <script>
    $('.footer').on('click', '.release', function () {
        let jobcard_uuid = '{{ $taskrelease->uuid }}';

        swal({
            title: 'Sure want to Release?',
            type: 'question',
            confirmButtonText: 'Yes, Release',
            confirmButtonColor: '#34bfa3',
            cancelButtonText: 'Cancel',
            showCancelButton: true,
        })
        .then(result => {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content'
                        )
                    },
                    type: 'PUT',
                    url: '/taskrelease-jobcard/' + jobcard_uuid + '/',
                    success: function (data) {
                        $('#release').remove();

                        toastr.success('Task has been released.', 'Released', {
                                timeOut: 5000
                            }
                        );

                    },
                    error: function (jqXhr, json, errorThrown) {
                        let errors = jqXhr.responseJSON;

                        $.each(errors.errors, function (index, value) {
                            $('#delete-error').html(value);
                        });
                    }
                });
            }
        });
    });
    </script>
@endpush
