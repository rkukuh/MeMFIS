<div class="modal fade" id="modal_helper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalWorkpackage">Add Helper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Helper
                                </label>
                                @component('frontend.common.input.select')
                                    @slot('id', 'defectcard_helper')
                                    @slot('name', 'employee')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Reference
                                </label>
                                @component('frontend.common.input.text')
                                    @slot('id', 'reference')
                                    @slot('name', 'reference')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('text', 'Add Helper')
                                    @slot('class', 'add_helper')
                                @endcomponent

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/employee.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/employee-name.js')}}"></script>
@endpush