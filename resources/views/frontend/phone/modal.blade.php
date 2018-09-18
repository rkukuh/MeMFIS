<div class="modal fade" id="modal_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPhone">Phone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PhoneForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Phone
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                <div id="m_repeater_1a">
                                    <div class="" id="m_repeater_1a">
                                        <div data-repeater-list="">
                                            <div data-repeater-item class="row">
                                                <table>
                                                    <tr>
                                                        <td width="30%">
                                                            @component('frontend.common.input.input')
                                                                @slot('name', 'name')
                                                                @slot('text', 'Phone')
                                                                @slot('placeholder', 'phone')
                                                            @endcomponent
                                                        </td>
                                                        <td width="5%"></td>
                                                        <td width="15%">
                                                            @component('frontend.common.input.radio')
                                                                @slot('text', 'Work')
                                                                @slot('name', 'type')
                                                                @slot('value', 'work')
                                                            @endcomponent
                                                        </td>
                                                        <td width="15%">
                                                            @component('frontend.common.input.radio')
                                                                @slot('name', 'type')
                                                                @slot('text', 'Personal')
                                                                @slot('value', 'personal')
                                                            @endcomponent
                                                        </td>
                                                        <td width="35%">
                                                            <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                                                <span>
                                                                    <i class="la la-trash-o"></i>
                                                                    <span>Delete</span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-6">
                                                        @component('frontend.common.input.input')
                                                            @slot('name', 'name')
                                                            @slot('text', 'Phone')
                                                            @slot('placeholder', 'phone')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-md-0">
                                                        @component('frontend.common.input.radio')
                                                            @slot('text', 'Work')
                                                            @slot('name', 'type')
                                                            @slot('value', 'work')
                                                        @endcomponent

                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'type')
                                                            @slot('text', 'Personal')
                                                            @slot('value', 'personal')
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
                                <label class="form-control-label">
                                    Name
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.input')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                    @slot('type', 'text')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    type
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.radio')
                                    @slot('text', 'Work')
                                    @slot('value', 'work')
                                    @slot('name', 'account_no')
                                @endcomponent

                                @component('frontend.common.input.radio')
                                    @slot('text', 'Personal')
                                    @slot('value', 'personal')
                                    @slot('name', 'account_no')
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
                </form>
            </div>
        </div>
    </div>
</div>
