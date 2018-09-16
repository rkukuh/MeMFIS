<div class="modal fade" id="modal_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalEmail">Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EmailForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Email
                                </label>
                                <div id="m_repeater_1a">
                                    <div class="" id="m_repeater_1a">
                                        <div data-repeater-list="">
                                            <div data-repeater-item class="row">
                                                <div class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-6">
                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Email')
                                                            @slot('name', 'name')
                                                            @slot('placeholder', 'Email')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-md-3">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('text', 'Primary')
                                                            @slot('name', 'is_primary')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                                            <span>
                                                                <i class="la la-trash-o"></i>
                                                                <span>Delete</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-form__group form-group row">
                                        <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>Add</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
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
                            @slot('class', 'add')
                            @slot('color', 'success')
                        @endcomponent
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
