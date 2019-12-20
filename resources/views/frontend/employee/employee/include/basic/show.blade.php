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
                            @if($employee->code)
                                @slot('text', $employee->code)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Date of Birth 
                                </label>
    
                                @component('frontend.common.label.data-info')
                                    @if($employee->dob)
                                        @slot('text', $employee->dob)
                                    @else
                                        @slot('text', '-')
                                    @endif
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Birthplace
                                </label>
            
                                @component('frontend.common.label.data-info')
                                    @if($employee->dob_place)    
                                        @slot('text', $employee->dob_place)
                                    @else
                                        @slot('text', '-')
                                    @endif
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
                            @if($employee->first_name)
                                @slot('text', $employee->first_name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Last Name 
                        </label>
                        
                        @component('frontend.common.label.data-info')
                            @if($employee->last_name)
                                @slot('text', $employee->last_name)
                            @else
                                @slot('text', '-')
                            @endif
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
                                    @if($document)
                                        @slot('text', $document)
                                    @else
                                        @slot('text', '-')
                                    @endif
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
                                
                               
                                @component('frontend.common.label.data-info')
                                    @if($employee->gender)
                                        @slot('text', $employee->gender->name)
                                    @else
                                        @slot('text', '-')
                                    @endif
                                @endcomponent  
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Nationality 
                                </label>

                                @component('frontend.common.label.data-info')
                                    @if($employee->nationalities->first())
                                        @slot('text', $employee->nationalities->first()->nationality)
                                    @else
                                        @slot('text', '-')
                                    @endif
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
                            @slot('text', $employee->religion->name)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Marital Status 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->marital_status->name)
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
    
                        @component('frontend.common.label.data-info')
                            @if(array_key_exists('primary', $addresses))
                                @slot('text', $addresses['primary']->address)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Address Line 2
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if(array_key_exists('secondary', $addresses))
                                @slot('text', $addresses['secondary']->address)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Country 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $employee->country->name)
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
                            Primary 
                        </label>
    
                        @php
                            $primary = null;
                            if(isset($emails['primary'])){
                                $primary = $emails['primary'];
                            }
    
                            $secondary = null;
                            if(isset($emails['secondary'])){
                                $secondary = $emails['secondary'];
                            }
    
                        @endphp
                        @component('frontend.common.label.data-info')
                            @slot('text', $primary)
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Secondary
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @slot('text', $secondary)
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
                                    @if($employee->joined_date)
                                        @slot('text', $employee->joined_date)
                                    @else
                                        @slot('text', '-')
                                    @endif
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Job Title 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if($employee->job_title)
                                @slot('text', $employee->job_title->name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Job Position 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if($employee->position)
                                @slot('text', $employee->position->name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Employee Status 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if($employee->statusses)
                                @slot('text', $employee->statusses->name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Department 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if(sizeof($employee->department) > 0)
                                @slot('text', $employee->department->first()->name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Indirect Supervisor
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if($employee->indirect_supervisor)
                                @slot('text', $employee->indirect_supervisor->name)
                            @else
                                @slot('text', '-')
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Supervisor 
                        </label>
    
                        @component('frontend.common.label.data-info')
                            @if($employee->supervisor)
                                @slot('text', $employee->supervisor->name)
                            @else
                                @slot('text', '-')
                            @endif
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

