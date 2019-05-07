<div class="modal fade" id="add-rir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                        @component('frontend.common.label.create-new')
                            @slot('icon', 'fa fa-plus-circle')
                            @slot('text', 'Add Item')
                        @endcomponent
                        RIR (Receiving Insspection Report)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    @component('frontend.common.input.select')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Select Item')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-4">
                                    @component('frontend.common.input.input')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Quantity')
                                    @endcomponent
                                </div>
                                <div class="col-4">
                                    @component('frontend.common.input.select')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Unit')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    @component('frontend.common.input.input')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'S/N no')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot">
                        <div class="m-form__actions">
                            <div class="col align-self-end" align="right">
                                @component('frontend.common.buttons.submit')
                                    @slot('name', 'save')
                                @endcomponent
                                @component('frontend.common.buttons.reset')
                                    @slot('name', 'reset')
                                @endcomponent
                                @component('frontend.common.buttons.back')
                                    @slot('name', 'back')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-rir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @component('frontend.common.label.create-new')
                        @slot('icon', 'fa fa-edit')
                        @slot('text', 'Edit Item')
                    @endcomponent
                    RIR (Receiving Insspection Report)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    @component('frontend.common.input.select')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Select Item')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-4">
                                    @component('frontend.common.input.input')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Quantity')
                                    @endcomponent
                                </div>
                                <div class="col-4">
                                    @component('frontend.common.input.select')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'Unit')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    @component('frontend.common.input.input')
                                        @slot('name', 'part')
                                        @slot('placeholder', 'S/N no')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot">
                        <div class="m-form__actions">
                            <div class="col align-self-end" align="right">
                                @component('frontend.common.buttons.submit')
                                    @slot('name', 'save')
                                @endcomponent
                                @component('frontend.common.buttons.reset')
                                    @slot('name', 'reset')
                                @endcomponent
                                @component('frontend.common.buttons.back')
                                    @slot('name', 'back')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>