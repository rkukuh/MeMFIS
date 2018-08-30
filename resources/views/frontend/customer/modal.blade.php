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
                                        <input type="text" class="form-control form-control-danger m-input" name="name" id="name" placeholder="name">
                                        <div class="form-control-feedback text-danger" id="name-error"></div>
                                        <span class="m-form__help">
                                            Name
                                        </span>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Country *
                                        </label>
                                        <br>
                                        <select class="form-control m-select2" id="m_select2_1" name="country">
                                            <option value="AK">
                                                Alaska
                                            </option>
                                            <option value="HI">
                                                Hawaii
                                            </option>
                                        </select>
                                        <div class="form-control-feedback text-danger" id="country-error"></div>
                                        <span class="m-form__help">
                                            Country
                                        </span>
                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        City *
                                        </label>
                                        <br>
                                        <select class="form-control m-select2" id="m_select2_2" name="city">
                                            <option value="AK">
                                                Alaska
                                            </option>
                                            <option value="HI">
                                                Hawaii
                                            </option>
                                        </select>                                        <!-- <input type="text" class="form-control form-control-danger m-input" name="city" id="city" placeholder="city"> -->
                                        <div class="form-control-feedback text-danger" id="city-error"></div>
                                        <span class="m-form__help">
                                            City
                                        </span>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Address *
                                        </label>
                                        <textarea class="form-control m-input m-input--air"  name="address" id="address" rows="3"  placeholder="Address"></textarea>
                                        <div class="form-control-feedback text-danger" id="address-error"></div>
                                        <span class="m-form__help">
                                            Address
                                        </span>
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

                                                        <input type="text" class="form-control form-control-danger m-input" name="phone" id="phone" placeholder="phone">
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

                                                        <input type="text" class="form-control form-control-danger m-input" name="email" id="email" placeholder="email">
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

                                                        <input type="text" class="form-control form-control-danger m-input" name="fax" id="fax" placeholder="fax">
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
                                    </div>

                                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-success add" id="button">
    						<i class="fa flaticon-file"></i>
								<span id="simpan">
	    							Simpan
								</span>
                          </button>
                    </div>
                    </div>
                            </form>
                </div>
                </div>
                </div>
                <!--end::Modal-->
