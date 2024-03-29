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
                                                            @php
                                                            $lastName = null;
                                                            if($employee->last_name != $employee->first_name){
                                                            $lastName = $employee->last_name;
                                                            }
                                                            @endphp
                                                        <td valign="top"><b>Name</b></td>
                                                    <td valign="top" align="center">{{ $employee->first_name.' '.$lastName}}</td>
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
                                                        @php
                                                            $gender = null;
                                                            if($employee->gender == 'f'){
                                                            $gender = 'Female';
                                                            }else if($employee->gender == 'm'){
                                                            $gender = 'Male';
                                                            }
                                                        @endphp
                                                        <td valign="top"><b>Gender</b></td>
                                                        <td valign="top" align="center">{{ $gender }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Nationality</b></td>
                                                    <td valign="top" align="center">{{ $employee->nationality }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Religion</b></td>
                                                    <td valign="top" align="center">{{ $employee->religion }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Martial Status</b></td>
                                                    <td valign="top" align="center">{{ $employee->marital_status }}</td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset class="border p-2 mt-2">
                                                <legend class="w-auto"><b>Contact Information Details</b></legend>
                                                @php
                                                $address_1 = null;
                                                if(isset($addresses['address_1'])){
                                                $address_1 = $addresses['address_1'];
                                                }
                                                @endphp
                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                    <tr>
                                                        <td align="center" width="45%"><b>Contact Information</b></td>
                                                        <td align="center" width="55%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Address Line 1</b></td>
                                                    <td valign="top" align="center">{{ $address_1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>City</b></td>
                                                    <td valign="top" align="center">{{ $employee->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>Country</b></td>
                                                    <td valign="top" align="center">{{ $employee->country }}</td>
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
                                                            $email_1 = null;
                                                            if(isset($emails['email_1'])){
                                                                $email_1 = $emails['email_1'];
                                                            }
                                                            @endphp
                                                        <td valign="top"><b>Email 1</b></td>
                                                        <td valign="top" align="center">{{ $email_1 }}</td>
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

                                            @for ($i = 0; $i < count($history); $i++)
                                            
                                            <div class="my-4">
                                                <div class="d-flex justify-content-end">
                                                    <h3 class="m-portlet__head-text">
                                                        @php
                                                            $created_time = $history[$i]['created_at'];
                                                            $formatCreatedTime = strtotime($created_time);

                                                            $updated_time = $history[$i]['updated_at'];
                                                            $formatUpdatedTime = strtotime($updated_time);

                                                            echo date("d F Y", $formatCreatedTime).' to '.date("d F Y", $formatUpdatedTime);
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
                                                        <td valign="top" align="center">{{ $history[$i]['name'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Employee ID</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['code'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Place & Date of Birth</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['dobdata'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Gender</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['gender'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Nationality</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['nationality'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Religion</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['religion'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Martial Status</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['martial_status'] }}</td>
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
                                                            <td valign="top" align="center">{{ $history[$i]['address_1'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>City</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['city'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Country</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['country'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Mobile Phone</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['mobile_phone'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Email 1</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['email_1'] }}</td>
                                                        </tr>
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
                                                            <td valign="top" align="center">{{ $history[$i]['job_title'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Job Position</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['position'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Employee Status</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['status'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Department</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['department'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Joined Date</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['joined_date'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Supervisor</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['supervisor'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><b>Indirect Supervisor</b></td>
                                                            <td valign="top" align="center">{{ $history[$i]['indirect_supervisor'] }}</td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </div>
                                        
                                            @endfor

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
    