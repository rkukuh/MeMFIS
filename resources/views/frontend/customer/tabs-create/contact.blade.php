<div class="form-group m-form__group row ">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <label class="form-control-label">
            Phone @include('frontend.common.label.optional')
        </label>
        <div id="m_repeater_1">
            <div class="" id="m_repeater_1">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row" style="margin-top:-20px">
                            <div class="col-md-0">
                                @component('frontend.common.input.numeric')
                                    @slot('text', 'Phone')
                                    @slot('name', 'phone')
                                    @slot('help_text','phone')
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
            <div class="m-form__group form-group row" style="margin-top:-40px">
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
            Email @include('frontend.common.label.optional')
        </label>
        <div id="m_repeater_1a">
            <div class="" id="m_repeater_1a">
                <div data-repeater-list="">
                    <div data-repeater-item class="row">
                        <div class="m-form__group row" style="margin-top:-20px">
                            <div class="col-md-0">
                                @component('frontend.common.input.email')
                                    @slot('text', 'Email')
                                    @slot('name', 'email')
                                    @slot('help_text','email')
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
            <div class="m-form__group form-group row" style="margin-top:-40px">
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
            Fax @include('frontend.common.label.optional')
        </label>
        <div id="m_repeater_1b">
            <div class="" id="m_repeater_1b">
                <div data-repeater-list="">
                    <div data-repeater-item class="row" style="margin-top:-40px">
                        <div class="m-form__group row">
                            <div class="col-md-0">
                                @component('frontend.common.input.numeric')
                                    @slot('text', 'Fax')
                                    @slot('name', 'fax')
                                    @slot('help_text','fax')
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
            <div class="m-form__group form-group row" style="margin-top:-20px">
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
