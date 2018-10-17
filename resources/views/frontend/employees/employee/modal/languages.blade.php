<div class="modal fade" id="modal_languages" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')
                <h5 class="modal-title" id="TitleModalLanguages">Languages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="EducationForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'name5')
                                    @slot('text', 'Name')
                                    @slot('name', 'name')
                                    @slot('style', 'width:100%')
                                @endcomponent

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Language @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'language')
                                    @slot('text', 'Language')
                                    @slot('name', 'language')
                                    @slot('style', 'width:100%')
                                @endcomponent

                                @component('frontend.common.buttons.create-new')
                                    @slot('size', 'sm')
                                    @slot('text', 'Add Language')
                                    @slot('data_target', '#modal_language')
                                    @slot('style', 'margin-top: 10px;')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Reading Level @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'reading')
                                    @slot('text', 'Reading')
                                    @slot('name', 'reading')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Speaking Level @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'speaking')
                                    @slot('text', 'Speaking')
                                    @slot('name', 'speaking')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>

                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Writing Level @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'writing')
                                    @slot('text', 'Writing')
                                    @slot('name', 'writing')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Understanding Level @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'understanding')
                                    @slot('text', 'Understanding')
                                    @slot('name', 'understanding')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                {{-- <div id="button-div" style="height:0px;"> --}}
                                                    @include('frontend.common.buttons.submit')
                                                {{-- </div>  --}}
                                                    @include('frontend.common.buttons.reset')
                            
                                                    @include('frontend.common.buttons.close')
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

               </div>
            </div>
        </div>
    </div>
