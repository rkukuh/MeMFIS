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

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EmployeeStatusesForm">
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code  @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code_statuses')
                                    @slot('name', 'code_statuses')
                                    @slot('id_error', 'code_statuses')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name  @include('frontend.common.label.required')
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
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            @component('frontend.common.buttons.submit')
                                                @slot('class', 'modal-change')
                                                @slot('type', 'button')
                                            @endcomponent
                                            @include('frontend.common.buttons.reset',['id' => 'reset'])
                            
                                            @include('frontend.common.buttons.close',['id' => 'close'])
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
    