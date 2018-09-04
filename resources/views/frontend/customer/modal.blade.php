<!--begin::Modal-->
<div class="modal fade" id="modal_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TitleModalCustomer">New Customers</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
                            <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Name *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Name')
                                        @slot('name', 'name')
                                        @slot('type', 'text')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Country *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.select')
                                            @slot('text', 'Country')
                                            @slot('name', 'country')
                                            @slot('id', 'm_select2_1')
                                            @slot('style', 'width:100%')

                                        @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        City *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.select')
                                            @slot('text', 'City')
                                            @slot('name', 'city')
                                            @slot('id', 'm_select2_2')
                                            @slot('style', 'width:100%')

                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Address *
                                        </label>
                                        @component('frontend.common.input.textarea')
                                            @slot('text', 'Address')
                                            @slot('name', 'address')
                                            @slot('rows', '3')

                                        @endcomponent
                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Phone
                                        </label>
                                        <div id="m_repeater_1">                    
                                        <div class="" id="m_repeater_1">
                                            <div data-repeater-list="" >
                                                <div data-repeater-item class="row">     
                                                        <div class="m-form__group row">
                                                        <div class="col-md-0">
                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Phone')
                                                            @slot('name', 'phone')
                                                            @slot('type', 'number')
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
                                        <div class="m-form__group form-group row">
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
                                        Email
                                        </label>
                                        <div id="m_repeater_1a">                    
                                        <div class="" id="m_repeater_1a">
                                            <div data-repeater-list="" >
                                                <div data-repeater-item class="row">     
                                                        <div class="m-form__group row">
                                                        <div class="col-md-0">
                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Email')
                                                            @slot('name', 'email')
                                                            @slot('type', 'email')
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
                                        <div class="m-form__group form-group row">
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
                                        Fax
                                        </label>
                                        <div id="m_repeater_1b">                    
                                        <div class="" id="m_repeater_1b">
                                            <div data-repeater-list="" >
                                                <div data-repeater-item class="row">     
                                                        <div class="m-form__group row">
                                                        <div class="col-md-0">
                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Fax')
                                                            @slot('name', 'fax')
                                                            @slot('type', 'number')
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
                                        <div class="m-form__group form-group row">
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
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                    @component('frontend.common.input.radio')
                                                            @slot('name', 'tes')
                                                            @slot('Text', 'Tes')
                                                            @slot('value', 'Tes2')
                                                        @endcomponent

                                    <!-- ini -->
                                    <!-- <div class="m-checkbox-list"> -->
											<!-- <label class="m-checkbox m-checkbox--success">
											<input type="checkbox" > Success state
											<span></span>
											</label>
											<label class="m-checkbox m-checkbox--brand">
											<input type="checkbox" > Brand state
											<span></span>
											</label>
											<label class="m-checkbox m-checkbox--primary">
											<input type="checkbox" > Primary state
											<span></span>
											</label> -->
										<!-- </div> -->
                                    </div>

                                    </div>


                                </div>

                    <div class="modal-footer">
                          @component('frontend.common.buttons.close')
                            @slot('color', 'secondary')
                            @slot('size', 'md')
                            @slot('data_dismiss', 'modal')
                          @endcomponent

                          @component('frontend.common.buttons.submit')
                            @slot('color', 'success')
                            @slot('size', 'md')
                            @slot('class', 'add')
                        
                          @endcomponent

                    </div>
                    </div>
                            </form>
                </div>
                </div>
                </div>
                <!--end::Modal-->
