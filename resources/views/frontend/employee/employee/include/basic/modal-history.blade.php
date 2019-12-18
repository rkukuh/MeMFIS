<div class="modal fade" id="modal_history" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @include('frontend.common.label.show')
                    <h5 class="modal-title" id="TitleModalEducation">Basic Historical Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-portlet__body pb-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>

                                                <h3 class="m-portlet__head-text">
                                                    Current
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto"><b>Personal Details</b></legend>
                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                    <tr>
                                                        <td align="center" width="45%"><b>Personal Information</b></td>
                                                        <td align="center" width="55%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Name</b></td>
                                                        <td valign="top" align="center">{{ $employee->first_name.' '.$employee->last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Employee ID</b></td>
                                                        <td valign="top" align="center">{{ $employee->code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Place & Date of Birth</b></td>
                                                        <td valign="top" align="center">{{ $employee->dob.' & '.$employee->dob_place }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Gender</b></td>
                                                        <td valign="top" align="center">{{ $employee->gender->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Nationality</b></td>
                                                        <td valign="top" align="center">{{ $employee->nationalities->first()->nationality }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Religion</b></td>
                                                        <td valign="top" align="center">{{ $employee->religion->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Martial Status</b></td>
                                                        <td valign="top" align="center">{{ $employee->marital_status->name }}</td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset class="border p-2 mt-2">
                                                <legend class="w-auto"><b>Contact Information Details</b></legend>
                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                    <tr>
                                                        <td align="center" width="45%"><b>Contact Information</b></td>
                                                        <td align="center" width="55%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Address Line 1</b></td>
                                                    <td valign="top" align="center">@if(array_key_exists('primary', $addresses)) {{ $addresses['primary']->address }} @else - @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>City</b></td>
                                                    <td valign="top" align="center">{{ $employee->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Country</b></td>
                                                    <td valign="top" align="center">{{ $employee->country->name }}</td>
                                                    </tr>
                                                    <tr>
                                                            @php
                                                            $mobile_phone = null;
                                                            if(isset($phones['mobile'])){
                                                                $mobile_phone = $phones['mobile'];
                                                            }
                                                            @endphp
                                                        <td valign="top"><b>Mobile Phone</b></td>
                                                        <td valign="top" align="center">{{ $mobile_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                            @php
                                                            $primary = null;
                                                            if(isset($emails['primary'])){
                                                                $primary = $emails['primary'];
                                                            }
                                                            @endphp
                                                        <td valign="top"><b>Primary</b></td>
                                                        <td valign="top" align="center">{{ $primary }}</td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset class="border p-2 mt-2">
                                                <legend class="w-auto"><b>Job Details</b></legend>
                                                @php
                                                $jobTitle  = null;
                                                if(isset($jobDetails['job_title'])){
                                                    $jobTitle = $jobDetails['job_title'];
                                                    }
                                                    
                                                $position  = null;
                                                if(isset($jobDetails['position'])){
                                                    $position = $jobDetails['position'];
                                                }

                                                $status  = null;
                                                if(isset($jobDetails['status'])){
                                                    $status = $jobDetails['status'];
                                                }

                                                $department  = null;
                                                if(isset($jobDetails['department'])){
                                                    $department = $jobDetails['department'];
                                                }

                                                $indirect  = null;
                                                if(isset($jobDetails['indirect'])){
                                                    $indirect = $jobDetails['indirect'];
                                                }

                                                $supervisor  = null;
                                                if(isset($jobDetails['supervisor'])){
                                                    $supervisor = $jobDetails['supervisor'];
                                                    }
                                                @endphp
                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                    <tr>
                                                        <td align="center" width="45%"><b>job Details Information</b></td>
                                                        <td align="center" width="55%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Job Title</b></td>
                                                    <td valign="top" align="center">{{ $jobTitle }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Job Position</b></td>
                                                    <td valign="top" align="center">{{ $position }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Employee Status</b></td>
                                                    <td valign="top" align="center">{{ $status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Department</b></td>
                                                    <td valign="top" align="center">{{ $department }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Joined Date</b></td>
                                                    <td valign="top" align="center">{{ $employee->joined_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Supervisor</b></td>
                                                    <td valign="top" align="center">{{ $supervisor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Indirect Supervisor</b></td>
                                                    <td valign="top" align="center">{{ $indirect }}</td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body pt-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>

                                                <h3 class="m-portlet__head-text">
                                                    History
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">

                                            @foreach($employee->ebdh as $history)
                                                <div class="my-4">
                                                    <div class="d-flex justify-content-end">
                                                        <h3 class="m-portlet__head-text">
                                                            @php
                                                            $data = json_decode( $history->history_data );
                                                            @endphp
                                                        </h3>
                                                    </div>
                                                    <fieldset class="border p-2">
                                                        <legend class="w-auto"><b>Personal Details</b></legend>
                                                        <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                            <tr>
                                                                <td align="center" width="45%"><b>Personal Information</b></td>
                                                                <td align="center" width="55%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Name</b></td>
                                                            <td valign="top" align="center">{{ $data->first_name }} {{ $data->last_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Employee ID</b></td>
                                                                <td valign="top" align="center">{{ $data->code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Place & Date of Birth</b></td>
                                                                <td valign="top" align="center">{{ $data->dob_place }},{{ $data->dob }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Gender</b></td>
                                                                <td valign="top" align="center">{{ $data->gender->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Nationality</b></td>
                                                                <td valign="top" align="center">{{ $data->nationality->nationality }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Religion</b></td>
                                                                <td valign="top" align="center">{{ $data->religion->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Martial Status</b></td>
                                                                <td valign="top" align="center">{{ $data->marital_status->name }}</td>
                                                            </tr>
                                                        </table>
                                                    </fieldset>
                                                    <fieldset class="border p-2 mt-2">
                                                        <legend class="w-auto"><b>Contact Information Details</b></legend>
                                                        <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                            <tr>
                                                                <td align="center" width="45%"><b>Contact Information</b></td>
                                                                <td align="center" width="55%"></td>
                                                            </tr>
                                                            @if(sizeof($data->addresses) > 0)
                                                                @foreach($data->addresses as $key => $address)
                                                                <tr>
                                                                    <td valign="top"><b>Address Line {{ $address->type->name }}</b></td>
                                                                    <!-- TODO address -->
                                                                    <td valign="top" align="center">{{ $address->address }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                            <tr>
                                                                <td valign="top"><b>City</b></td>
                                                                <td valign="top" align="center">{{ $data->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Country</b></td>
                                                                <td valign="top" align="center">{{ $data->country->name }}</td>
                                                            </tr>
                                                            @if(sizeof($data->phones) > 0)
                                                                @foreach($data->phones as $key => $phone)
                                                                <tr>
                                                                    <td valign="top"><b>Mobile Phone {{ $phone->type->name }}</b></td>
                                                                    <!-- TODO Mobile Phone -->
                                                                    <td valign="top" align="center">{{ $phone->number }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                            @if(sizeof($data->emails) > 0)
                                                                @foreach($data->emails as $key => $email)
                                                                <tr>
                                                                    <td valign="top"><b>Email {{ $email->type->name }}</b></td>
                                                                    <!-- TODO Mobile Phone -->
                                                                    <td valign="top" align="center">{{ $email->address }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </fieldset>
                                                    <fieldset class="border p-2 mt-2">
                                                        <legend class="w-auto"><b>Job Details</b></legend>
                                                        <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                            <tr>
                                                                <td align="center" width="45%"><b>job Details Information</b></td>
                                                                <td align="center" width="55%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Job Title</b></td>
                                                                <td valign="top" align="center">@if($data->job_title) {{ $data->job_title->name }} @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Job Position</b></td>
                                                                <td valign="top" align="center">@if($data->position) {{ $data->position->name }} @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Employee Status</b></td>
                                                                <td valign="top" align="center">@if($data->statuses) {{ $data->statuses->name }} @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Department</b></td>
                                                                <td valign="top" align="center">@if($data->department) {{ $data->department->name }} @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Joined Date</b></td>
                                                                <td valign="top" align="center">{{ $data->joined_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Supervisor</b></td>
                                                                <td valign="top" align="center">@if($data->supervisor) {{ $data->supervisor->first_name }} {{ $data->supervisor->last_name }}@endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top"><b>Indirect Supervisor</b></td>
                                                                <td valign="top" align="center">@if($data->indirect_supervisor) {{ $data->indirect_supervisor->first_name }} {{ $data->indirect_supervisor->last_name }}@endif</td>
                                                            </tr>
                                                        </table>
                                                    </fieldset>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                <div class="flex">
                                    <div class="action-buttons">
                                        @include('frontend.common.buttons.close')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    