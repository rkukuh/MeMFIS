<div class="modal fade" id="general_tool_note"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalItem">
                    Marketing Note

                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ItemForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="workpackage_uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Marketing Notes @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('text', 'Note')
                                    @slot('name', 'note')
                                    @slot('id', 'note')
                                    @slot('rows', '3')
                                    @slot('id_error', 'note')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.update')
                                        @slot('class', 'discount')
                                        @slot('type', 'button')
                                    @endcomponent
                                    @component('frontend.common.buttons.reset')
                                        @slot('class', 'reset-sequance')
                                    @endcomponent
                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
