<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Termination Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Termination Date    
                    </label>

                    @php
                        $termination_date = null;
                        if(isset($employee_termination->termination_date)){
                            $termination_date = $employee_termination->termination_date;
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $termination_date)
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Reason   
                    </label>

                    @php
                        $employee_reason = null;
                        if(isset($employee_termination->reason)){
                            $employee_reason = $employee_termination->reason;
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $employee_reason)
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Remark
                    </label>

                    @php
                        $employee_remark = null;
                        if(isset($employee_termination->remark)){
                            $employee_remark = $employee_termination->remark;
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $employee_remark)
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Attach Document
                            </label>

                            @php
                                $document = null;
                                if(isset($document_termination[0]->file_name)){
                                    $document = $document_termination[0]->file_name;
                                }
                            @endphp
                            @component('frontend.common.label.data-info')
                                @slot('text', $document)
                            @endcomponent
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
