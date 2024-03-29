<div class="modal fade" id="modal_storage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')
                <h5 class="modal-title" id="TitleModalCustomer">Storage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
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
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Description @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('text', 'Description')
                                    @slot('name', 'description')
                                    @slot('id', 'description')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Account Code @include('frontend.common.label.optional')
                                </label>

                                @include('frontend.common.account-code-modal.index')

                                @component('frontend.common.input.hidden')
                                    @slot('id', 'account_code')
                                    @slot('name', 'account_code')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Active @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.checkbox')
                                    @slot('text', 'Active')
                                    @slot('name', 'active')
                                    @slot('id', 'active')
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
@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/account-code.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
