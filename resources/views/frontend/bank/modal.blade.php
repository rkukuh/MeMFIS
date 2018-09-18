<div class="modal fade" id="modal_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCustomer">Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="BankForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Code')
                                    @slot('name', 'code')
                                    @slot('id', 'code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'bank_name')
                                    @slot('id', 'bank_name')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @component('frontend.common.buttons.close')
                            @slot('size', 'md')
                            @slot('color', 'secondary')
                            @slot('data_dismiss', 'modal')
                        @endcomponent

                        @component('frontend.common.buttons.submit')
                            @slot('size', 'md')
                            @slot('class', 'add2')
                            @slot('color', 'success')
                        @endcomponent
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
