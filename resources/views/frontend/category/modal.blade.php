<div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCategory">Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CategoryForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('text', 'Code')
                                    @slot('name', 'code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Description @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('name', 'description')
                                    @slot('text', 'Description')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Account Code @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'accountcode')
                                    @slot('text', 'AccountCode')
                                    @slot('name', 'accountcode')
                                    @slot('style', 'width:100%')
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
