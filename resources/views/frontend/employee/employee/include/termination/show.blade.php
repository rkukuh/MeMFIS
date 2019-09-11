<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Termination Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Termination Date    
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', $employee_termination->termination_date)
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Reason   
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', $employee_termination->reason)
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Remark
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', $employee_termination->remark)
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

@push('footer-scripts')
@endpush