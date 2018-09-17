<div class="modal fade" id="modal_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalDepartment">Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="DepartmentForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Department *
                                </label>
                                @component('frontend.common.input.input')
                                    @slot('name', 'name')
                                    @slot('type', 'text')
                                    @slot('text', 'Department Name')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Parent *
                                </label>
                                <br>
                                @component('frontend.common.input.select')
                                    @slot('text', 'Parent')
                                    @slot('parent_id', 'name')
                                    @slot('id', 'm_select2_1')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @component('frontend.common.buttons.submit')
                            @slot('size', 'md')
                            @slot('class', 'add')
                        @endcomponent

                        @component('frontend.common.buttons.reset')
                            @slot('size', 'md')
                        @endcomponent

                        @component('frontend.common.buttons.close')
                            @slot('size', 'md')
                            @slot('data_dismiss', 'modal')
                        @endcomponent
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
