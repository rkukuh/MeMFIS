<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Phone
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <div id="m_repeater_1">
            <div class="" id="m_repeater_1">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.number')
                                    @slot('text', 'Phone')
                                    @slot('name', 'phone')
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
        <div class="form-control-feedback text-danger" id="phone-error"></div>
        <span class="m-form__help">
            Phone
        </span>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Email
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <div id="m_repeater_1a">
            <div class="" id="m_repeater_1a">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.email')
                                    @slot('text', 'Email')
                                    @slot('name', 'email')
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
        <div class="form-control-feedback text-danger" id="email-error"></div>
        <span class="m-form__help">
            Email
        </span>
    </div>
</div>
<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Fax
        @component('frontend.common.label.optional')
        @endcomponent
        </label>
        <div id="m_repeater_1b">
            <div class="" id="m_repeater_1b">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.number')
                                    @slot('text', 'Fax')
                                    @slot('name', 'fax')
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
        <div class="form-control-feedback text-danger" id="fax-error"></div>
        <span class="m-form__help">
            Fax
        </span>
    </div>
</div>
