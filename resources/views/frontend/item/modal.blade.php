<div class="modal fade" id="modal_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCustomer">Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form -->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
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
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Barcode
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'Barcode')
                                    @slot('name', 'barcode')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Bank
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.select')
                                    @slot('text', 'Bank')
                                    @slot('name', 'bank')
                                    @slot('id', 'm_select2_1')
                                    @slot('style', 'width:100%')
                                @endcomponent

                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'add bank')
                                    @slot('data_target', '#modal_bank')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Category
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.select')
                                    @slot('text', 'Category')
                                    @slot('name', 'category')
                                    @slot('id', 'm_select2_1')
                                    @slot('style', 'width:100%')
                                @endcomponent

                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'add category')
                                    @slot('data_target', '#modal_category')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Description
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('name', 'description')
                                    @slot('text', 'Description')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Active
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.checkbox')
                                    @slot('text', 'Active')
                                    @slot('name', 'active')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    IsPPn
                                @component('frontend.common.label.required')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('text', 'IsPPn')
                                    @slot('name', 'isppn')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    IsStock
                                </label>
                                <br>
                                @component('frontend.common.input.text')
                                    @slot('text', 'IsStock')
                                    @slot('name', 'isstock')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    xPicture
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                @component('frontend.common.input.upload')
                                    @slot('text', 'xPicture')
                                    @slot('name', 'xpicture')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    AccountCode
                                @component('frontend.common.label.optional')
                                @endcomponent
                                </label>
                                <br>
                                @component('frontend.common.input.text')
                                    @slot('text', 'AccountCode')
                                    @slot('name', 'accountcode')
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
