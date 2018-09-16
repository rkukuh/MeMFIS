<div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                            Name *
                                            </label>

                                        @component('frontend.common.input.input')
                                            @slot('text', 'Name')
                                            @slot('name', 'name')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        NPWP
                                        </label>
                                        @component('frontend.common.input.input')
                                            @slot('text', 'NPWP')
                                            @slot('name', 'npwp')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        NPPKP
                                        </label>
                                        @component('frontend.common.input.input')
                                            @slot('text', 'NPPKP')
                                            @slot('name', 'nppkp')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        ToP
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                            @slot('text', 'ToP')
                                            @slot('name', 'top')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Barcode
                                        </label>                            
                                        @component('frontend.common.input.input')
                                            @slot('text', 'Barcode')
                                            @slot('name', 'barcode')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Contact Person
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                            @slot('text', 'Contact Person')
                                            @slot('name', 'contactperson')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Contact Person Job Position
                                            </label>
                                            
                                            @component('frontend.common.input.input')
                                            @slot('text', 'Contact Person Job Position')
                                            @slot('name', 'contactpersonjobposition')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Active *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.checkbox')
                                        @slot('text', 'Active')
                                        @slot('name', 'active')
                                        @slot('color', 'disabled')
                                        @slot('editable', 'disabled')
                                        @slot('value', 'checked')
                                    @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        AccountCode *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                            @slot('text', 'AccountCode')
                                            @slot('name', 'accountcode')
                                            @slot('type', 'text')
                                            @slot('value', 'text')
                                            @slot('editable', 'readonly')
                                        @endcomponent
                                    </div>
                                </div>