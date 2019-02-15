<div class="modal fade show" id="modal_check" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalCheck">Check Stocl</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CheckForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Item
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Item')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Quantity
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', '2')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Status
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', '')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Expired Date
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', '12-12-2012')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Location
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Storage A')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                    @include('frontend.common.buttons.close')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
