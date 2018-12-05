<div class="modal fade" id="modal_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCustomer">Customer</h5>
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
                                    Customer Code @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code')
                                    @slot('text', 'Code')
                                    @slot('name', 'code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    name @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'name')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Term of Payment @include('frontend.common.label.required')
                                </label>
                        
                                @component('frontend.common.input.select2')
                                    @slot('text', 'Term of Payment')
                                    @slot('id', 'payment_term')
                                    @slot('name', 'payment_term')
                                    @slot('id_error', 'payment_term')
                                    @slot('style', 'width:100%')
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
    <script src="{{ asset('js/frontend/functions/select2/term-of-payment.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/term-of-payment.js') }}"></script>
@endpush
