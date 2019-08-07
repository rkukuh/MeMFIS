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
                                Job Card - Required Inpection Inspentor
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <table border="1px" width="100%">
                                    {{-- <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;font-weight:bold">
                                            Total Task Card(s)
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            1000 Item (s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;font-weight:bold">
                                            Total Manhour(s) (included performance factor)
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            500 mhrs
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2" style="background-color:beige;padding:10px;font-weight:bold">
                                            Skill Needed
                                        </td>
                                    </tr> --}}
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
                                            {{$taskrelease->taskcard->number}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Type
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->project->aircraft->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Reg
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->project->aircraft_register}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            A/C Serial Number
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->quotation->project->aircraft_sn}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Inspection Type
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->task->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Company Task No
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(isset(json_decode($taskrelease->taskcard->additionals)->internal_number))
                                                {{json_decode($taskrelease->taskcard->additionals)->internal_number}}
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
                                            {{$taskrelease->quotation->project->code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Skill
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(sizeof($taskrelease->taskcard->skills) == 3)
                                                ERI
                                            @elseif(sizeof($taskrelease->taskcard->skills) == 1)
                                                {{$taskrelease->taskcard->skills[0]->name}}
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
                                            {{$taskrelease->actual}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Actual. Mhrs
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->estimation_manhour}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Work Area
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if(isset($taskrelease->taskcard->workarea->name))
                                                {{$taskrelease->taskcard->workarea->name}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Sequence
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->sequence}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Referencce
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->reference}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Title
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->title}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Description
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->Description}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Helper
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            {{$taskrelease->taskcard->helper_quantity}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Accomplishment Notes By
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            xxx
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            RII
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @if($taskrelease->taskcard->is_rii == 1)
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
                                                @if($status == "released" )
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
                        url: '/riirelease-jobcard/rii-release/' + jobcard_uuid + '/',
                        success: function (data) {
                            $('#release').remove();

                            toastr.success('RII has been released.', 'Released', {
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
