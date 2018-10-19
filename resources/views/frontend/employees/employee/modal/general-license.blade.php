<div class="modal fade" id="modal_general_license" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')
                <h5 class="modal-title" id="TitleModalGeneralLicense">General License</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EducationForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'name4')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                    @slot('style', 'width:100%')
                                @endcomponent

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code_general_license')
                                    @slot('name','code_general_license')
                                    @slot('text', 'Code')
                                @endcomponent
                            </div>

                        </div>
                        <div class="form-group m-form__group row ">
                           
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Aviation Degree @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'aviation_degree')
                                    @slot('text', 'aviation_degree')
                                    @slot('name', 'aviation_degree')
                                    @slot('style', 'width:100%')
                                @endcomponent
                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'Add Aviation Degree')
                                    @slot('data_target', '#modal_aviation_degree')
                                    @slot('style', 'margin-top: 10px;')
                                @endcomponent

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Aviation degree Code @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'aviation_degree_no')
                                    @slot('name','aviation_degree_no')
                                    @slot('text', 'Aviation degree No')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
 
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Exam No @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'exam_no')
                                    @slot('name','exam_no')
                                    @slot('text', 'Exam No')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Exam Date @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'exam_date')
                                    @slot('name','exam_date')
                                @endcomponent
                            </div>

                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Attendance No @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'attendance_no')
                                    @slot('name','attendance_no')
                                    @slot('text', 'Attendance No')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Issued At @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'issued_at')
                                    @slot('name','issued_at')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Valid Until @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'valid_until')
                                    @slot('name','valid_until')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Revoke At @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'revoke_at')
                                    @slot('name','revoke_at')
                                @endcomponent
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer modal-footer-general-license">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                {{-- <div id="button-div" style="height:0px;"> --}}
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('class', 'add-general-license')
                                                        @slot('id', 'add-general-license')
                                                    @endcomponent
                                                {{-- </div>  --}}
                                                    @include('frontend.common.buttons.reset')
                            
                                                    @include('frontend.common.buttons.close')
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
