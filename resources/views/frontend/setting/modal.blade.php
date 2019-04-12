<div class="modal fade" id="modal_setting" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalItem">Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Name @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                            @slot('text', 'title')
                            @slot('id', 'title')
                            @slot('name', 'title')
                            @slot('id_error', 'title')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Value @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                            @slot('text', 'title')
                            @slot('id', 'title')
                            @slot('name', 'title')
                            @slot('id_error', 'title')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Of @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select2')
                            @slot('text', 'Of')
                            @slot('id', 'of')
                            @slot('name', 'of')
                            @slot('id_error', 'of')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label class="form-control-label">
                            Description @include('frontend.common.label.optional')
                        </label>

                        @component('frontend.common.input.textarea')
                            @slot('rows', '5')
                            @slot('id', 'description')
                            @slot('name', 'description')
                            @slot('text', 'Description')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('type','button')
                                    @slot('id', 'add-workpackage')
                                    @slot('class', 'add-workpackage')
                                @endcomponent

                                @include('frontend.common.buttons.reset')

                                @component('frontend.common.buttons.close')
                                    @slot('text', 'Close')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('footer-scripts')
  <script src="{{ asset('js/frontend/functions/select2/of.js') }}"></script>
@endpush