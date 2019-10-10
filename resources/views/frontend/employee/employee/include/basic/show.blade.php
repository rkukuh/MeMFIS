<div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <fieldset class="border p-2">
                <legend class="w-auto"><b>Personal Details</b></legend>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Employee ID 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->code)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Date of Birth 
                                </label>
    
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->dob)
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Birthplace
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->dob_place)
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            First Name 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->first_name)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Last Name 
                        </label>
                        @php
                            $lastName = null;
                            if($employee->last_name != $employee->first_name){
                                $lastName = $employee->last_name;
                            }
                        @endphp
                        @component('frontend.common.label.data-info')
                            @slot('text', $lastName)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    ID Card No
                                </label>
            
                                @php
                                $document = null;
                                if(isset($documents['ktp'])){
                                $document = $documents['ktp'];
                                }
                                @endphp
                                @component('frontend.common.label.data-info')
                                    @slot('text', $document)
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Attach File
                                </label>
            
                                @php
                            $files = null;
                            if(isset($file['id_card'])){
                            $files = $file['id_card'];
                            }
                            @endphp
                            @component('frontend.common.input.upload')
                                @slot('text', $files)
                            @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Gender 
                                </label>
                                
                                @php
                                  $gender = null;
                                  if($employee->gender == 'f'){
                                    $gender = 'Female';
                                  }else if($employee->gender == 'm'){
                                    $gender = 'Male';
                                  }
                                @endphp
                                @component('frontend.common.label.data-info')
                                    @slot('text', $gender)
                                @endcomponent  
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Nationality 
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->nationality)
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Religion 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->religion)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Marital Status 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->marital_status)
                        @endcomponent
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <fieldset class="border p-2">
                <legend class="w-auto"><b>Contact Information Details</b></legend>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Address Line 1 
                        </label>
    
                        @php
                            $address_1 = null;
                            if(isset($addresses['address_1'])){
                                $address_1 = $addresses['address_1'];
                            }
    
                            $address_2 = null;
                            if(isset($addresses['address_2'])){
                                $address_2 = $addresses['address_1'];
                            }
                        @endphp
                        @component('frontend.common.label.data-info')
                            @slot('text', $address_1)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Address Line 2
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $address_2)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Country 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->country)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    City 
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->city)
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Postal/Zip Code
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->zip)
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Home Phone 
                        </label>
    
                        @php
                            $home_phone = null;
                            if(isset($phones['home'])){
                                $home_phone = $phones['home'];
                            }
    
                            $mobile_phone = null;
                            if(isset($phones['mobile'])){
                                $mobile_phone = $phones['mobile'];
                            }
    
                            $work_phone = null;
                            if(isset($phones['work'])){
                                $work_phone = $phones['work'];
                            }
    
                            $other_phone = null;
                            if(isset($phones['other'])){
                                $other_phone = $phones['other'];
                            }
                        @endphp
                        @component('frontend.common.label.data-info')
                            @slot('text', $home_phone)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Mobile Phone 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $mobile_phone)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Work Phone 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $work_phone)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Other Phone 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $other_phone)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Email 1 
                        </label>
    
                        @php
                            $email_1 = null;
                            if(isset($emails['email_1'])){
                                $email_1 = $emails['email_1'];
                            }
    
                            $email_2 = null;
                            if(isset($emails['email_2'])){
                                $email_2 = $emails['email_2'];
                            }
    
                        @endphp
                        @component('frontend.common.label.data-info')
                            @slot('text', $email_1)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Email 2
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $email_2)
                        @endcomponent
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <fieldset class="border p-2">
                <legend class="w-auto"><b>Job Details</b></legend>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Joined Date 
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @slot('text', $employee->joined_date)
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Job Tittle 
                        </label>
    
                        @php
                             $jobTittle  = null;
                             if(isset($jobDetails['job_tittle'])){
                                $jobTittle = $jobDetails['job_tittle'];
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
                        @component('frontend.common.label.data-info')
                            @slot('text', $jobTittle)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Job Position 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $position)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Employee Status 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $status)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Department 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $department)
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Indirect Supervisor
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $indirect)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Supervisor 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $supervisor)
                        @endcomponent
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    
    
    <div class="form-group m-form__group row mt-5">
        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
            @component('frontend.common.buttons.create-new')
                @slot('text', 'View History/Past Data')
                @slot('data_target', '#modal_history')
                @slot('icon','la la-history')
            @endcomponent
        </div>
    </div>
    
    @include('frontend.employee.employee.include.basic.modal-history')
    
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12 footer">
            <div class="flex">
                <div class="action-buttons">
    
                    @include('frontend.common.buttons.back')
    
                </div>
            </div>
        </div>
    </div>

