<div class="modal fade" id="modal_account_code" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalJournal">Journal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <div class="modal-body"> --}}

                {{-- <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="JournalForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body"> --}}
                        {{-- <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Code @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'code-journal')
                                    @slot('text', 'Code')
                                    @slot('name', 'code-journal')
                                    @slot('id_error', 'code')
                                    @slot('help_text','code')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Name @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.text')
                                    @slot('id', 'name-journal')
                                    @slot('text', 'Name')
                                    @slot('name', 'name-journal')
                                    @slot('help_text','name')
                                @endcomponent
                            </div>
                        </div> --}}
                        {{-- <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Type @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'type')
                                    @slot('text', 'Type')
                                    @slot('name', 'type')
                                    @slot('type', 'text')
                                    @slot('style', 'width:100%')
                                    @slot('help_text','type')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Level @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.numeric')
                                    @slot('value', '1')
                                    @slot('text', 'Level')
                                    @slot('name', 'level')
                                    @slot('help_text','level')
                                    @slot('id_error', 'code')
                                @endcomponent
                            </div>
                        </div> --}}
                        {{-- <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Description @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('id', 'description-journal')
                                    @slot('name', 'description-journal')
                                    @slot('text', 'Description')
                                    @slot('description', 'text')
                                    @slot('help_text','description')
                                @endcomponent
                            </div>
                        </div> --}}
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__body">
                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input" placeholder="Search..."
                                                            id="generalSearch">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span><i class="la la-search"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                            @component('frontend.common.buttons.create')
                                                @slot('text', 'Add Item')
                                                @slot('href', route('frontend.item.create') )
                                            @endcomponent
    
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m_datatable1" id="fisrt"></div>

                                {{-- @include('frontend.item.uom.modal') --}}

                                {{-- <div class="m_datatable_journal" id="scrolling_both"></div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                {{-- <div id="button-div" style="height:0px;"> --}}
                                                        @component('frontend.common.buttons.submit')
                                                            @slot('class', 'add-journal')
                                                            @slot('id', 'add-journal')
                                                            @slot('type','button')
                                                        @endcomponent
                                                {{-- </div>  --}}
                                                    @include('frontend.common.buttons.reset')

                                                    @include('frontend.common.buttons.close')
                                            </div>
                                    </div>
                            </div>
                        </div>
                    {{-- </div>
                </form> --}}
               {{-- </div> --}}
            </div>
        </div>
    </div>
