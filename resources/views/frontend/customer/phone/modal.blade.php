<div class="modal fade" id="modal_phone"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalRepeat">
                    Phone

                    <small id="phone" class="m--font-focus"></small>
                </h5>
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
                                        <div id="m_repeater_phone">
                                            <div class="" id="m_repeater_phone">
                                                <div data-repeater-list="">
                                                    <div data-repeater-item class="row">
                                                        <table>
                                                            <tr>
                                                                <td width="30%">
                                                                    <label class="form-control-label">
                                                                        Phone @include('frontend.common.label.required')
                                                                    </label>
        
                                                                    @component('frontend.common.input.text')
                                                                        @slot('name', 'name')
                                                                        @slot('text', 'Phone')
                                                                        @slot('help_text','phone')
                                                                    @endcomponent
                                                                </td>
                                                                <td width="20%">
                                                                    <label class="form-control-label">
                                                                        Ext. @include('frontend.common.label.optional')
                                                                    </label>
        
                                                                    @component('frontend.common.input.text')
                                                                        @slot('name', 'ext')
                                                                        @slot('text', 'Ext')
                                                                        @slot('help_text','ext')
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
                                                                <td width="15%">
                                                                    <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                                                        <span>
                                                                            <i class="la la-trash-o"></i>
                                                                            <span>Delete</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
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
                            <div class="flex">
                                <div class="action-buttons">
                                        @component('frontend.common.buttons.submit')
                                            @slot('class', 'add-item')
                                            @slot('type', 'button')
                                        @endcomponent
                                        @component('frontend.common.buttons.reset')
                                            @slot('class', 'reset-item')
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
