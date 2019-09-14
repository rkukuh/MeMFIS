<div class="modal fade" id="modal_job_tittle" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new',['class' => 'labelModal-Job'])
                <h5 class="modal-title" id="TitleModalEmployee">Job Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EmployeeForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id_employ" id="id_employ">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                @component('frontend.common.input.hidden')
                                @slot('id', 'employee_uuid')
                                @slot('name', 'employee_uuid')
                                @endcomponent
                                
                                <label class="form-control-label">
                                    Job Title Code  @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code_job_tittle')
                                    @slot('name', 'code_job_tittle')
                                    @slot('id_error', 'code_job_tittle')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Job Title Name  @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'name_job_tittle')
                                    @slot('name', 'name_job_tittle')
                                    @slot('id_error', 'name_job_tittle')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Description 
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('id', 'description_job_tittle')
                                    @slot('name', 'description_job_tittle')
                                    @slot('rows', '5')
                                    @slot('id_error', 'description_job_tittle')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Specification 
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('id', 'specification')
                                    @slot('name', 'specification')
                                    @slot('rows', '3')
                                    @slot('id_error', 'specification')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-employee">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                {{-- <div id="button-div" style="height:0px;"> --}}
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('class', 'modal-change-job-tittle')
                                                        @slot('type', 'button')
                                                    @endcomponent
                                                    {{-- </div>  --}}
                                                    @include('frontend.common.buttons.reset',['id' => 'reset-job-tittle'])
                            
                                                    @include('frontend.common.buttons.close',['id' => 'close-job-tittle'])
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
    