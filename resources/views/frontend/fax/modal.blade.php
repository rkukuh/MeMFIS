<div class="modal fade" id="modal_fax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalFax">Fax</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="FaxForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Fax @include('frontend.common.label.required')
                                </label>
                                <div id="m_repeater_1a">
                                    <div class="" id="m_repeater_1a">
                                        <div data-repeater-list="">
                                            <div data-repeater-item class="row">
                                                <div class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-6">
                                                        @component('frontend.common.input.text')
                                                            @slot('text', 'fax')
                                                            @slot('name', 'name')
                                                            @slot('placeholder', 'fax')
                                                            @slot('help_text','fax')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-md-3">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('text', 'Primary')
                                                            @slot('name', 'is_primary')
                                                            @slot('help_text','primary')
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
                                    Name @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                    @slot('help_text','name')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    type @include('frontend.common.label.required')
                                </label>
                                    <br>
                                @component('frontend.common.input.radio')
                                    @slot('text', 'Work')
                                    @slot('value', 'work')
                                    @slot('name', 'account_no')
                                @endcomponent
                                <br>
                                @component('frontend.common.input.radio')
                                    @slot('text', 'Personal')
                                    @slot('value', 'personal')
                                    @slot('name', 'account_no')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @include('frontend.common.buttons.submit')
            
                                @include('frontend.common.buttons.reset')
            
                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
