<div class="modal fade" id="modal_employment_status" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="tittleModal">
                    @include('frontend.common.label.create-new',['class' => "labelModal"])
                </div>
                <h5 class="modal-title" id="TitleModalEmployee">Employment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EmployeeForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id_employ" id="id_employ">
                    <div class="m-portlet__body">

                            @component('frontend.common.input.hidden')
                                @slot('id', 'uuid')
                                @slot('name', 'uuid')
                                @slot('id_error', 'uuid')
                            @endcomponent

                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code 
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code_statuses')
                                    @slot('name', 'code_statuses')
                                    @slot('id_error', 'code_statuses')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name 
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'name')
                                    @slot('name', 'name')
                                    @slot('id_error', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Description 
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('id', 'description')
                                    @slot('name', 'description')
                                    @slot('rows', '5')
                                    @slot('id_error', 'description')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-employee">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            @component('frontend.common.buttons.submit')
                                                @slot('id', 'modal-statuses')
                                            @endcomponent
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
    