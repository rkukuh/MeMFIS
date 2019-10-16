<div class="modal fade" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @component('frontend.common.label.create-new')
                    @slot('icon','la la-warning')
                    @slot('text','Confirmation')
                @endcomponent
                <h5 class="modal-title" id="TitleModalWorkpackage">Overtime Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="#">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <i class="la la-warning" style="font-size:10rem;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h5 align="center">Are you sure <br> do you want to reject this transaction ?</h5>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Remark @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('text', 'Remark')
                                    @slot('rows', '5')
                                    @slot('name', 'remark_tool_reject')
                                    @slot('id', 'remark_tool_reject')
                                    @slot('id_error', 'remark_tool_reject')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('text','YES')
                                    @slot('id',"btn_reject")
                                    @slot('icon','')
                                    @slot('type','button')
                                @endcomponent
                                @component('frontend.common.buttons.close')
                                    @slot('text','NO')
                                    @slot('icon','')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    