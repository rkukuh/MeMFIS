@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Customer
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ route('frontend.customer.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Customer
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Customer
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">Identifier</legend>

                                        <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">    

                                        Repeater 1 
                                        <div class='repeater'>
                                          <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">    

                                              {{-- <input type="text" name="text-input" /> --}}
                                              @component('frontend.common.input.text')
                                                @slot('name', 'text-input')
                                                @slot('text', 'Phone')
                                              @endcomponent
                                                    </div>
                                              <input data-repeater-delete class="btn-sm btn btn-danger" type="button" value="Delete"/>
                                            </div>
                                          </div>
                                          <input data-repeater-create type="button" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide" value="Add"/>
                                                                                           </div>
                                        
                                        {{-- Repeater 2
                                          <div class='repeater'>
                                      <!-- Make sure the repeater list value is different from the first repeater  -->
                                          <div data-repeater-list="group-b">
                                            <div data-repeater-item>
                                              <input type="text" name="text-input" value="G"/>
                                              <input data-repeater-delete type="button" value="Delete"/>
                                            </div>
                                      
                                          </div>
                                          <input data-repeater-create type="button" value="Add"/>
                                                                                           </div> --}}

                                                </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Code @include('frontend.common.label.required')
                                                </label>
                                        
                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Code')
                                                    @slot('name', 'code')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Name  @include('frontend.common.label.required')
                                                    </label>
                                            
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Name')
                                                        @slot('name', 'name')
                                                    @endcomponent
                                                </div>   
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    ToP @include('frontend.common.label.required')
                                                </label>
                                        
                                                @component('frontend.common.input.text')
                                                    @slot('text', 'ToP')
                                                    @slot('name', 'top')
                                                @endcomponent
                                            </div>
                                            
                                        </div>
                                    </fieldset>
                                    <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Active * @include('frontend.common.label.optional')
                                                    </label>
                                            
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('text', 'Active')
                                                        @slot('name', 'active')
                                                    @endcomponent
                                                </div>   
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Account Code @include('frontend.common.label.optional')
                                            </label>

                                            @include('frontend.common.account-code.index')

                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'account_code')
                                                @slot('name', 'account_code')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type', 'button')
                                                        @slot('id', 'edit-customer')
                                                        @slot('class', 'edit-customer')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.item.index'))
                                                    @endcomponent
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
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Address
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Address')
                                            @slot('id', 'customer-address')
                                            @slot('data_target', '#modal_address')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.customer.address.modal')

                            <div class="customer_address_datatable" id="customer_address_datatable"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Phone
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Phone')
                                            @slot('id', 'customer-phone')
                                            @slot('data_target', '#modal_phone')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.customer.phone.modal')

                            <div class="customer_phone_datatable" id="customer_phone_datatable"></div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Email
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Email')
                                            @slot('id', 'customer-email')
                                            @slot('data_target', '#modal_email')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.customer.email.modal')

                            <div class="customer_email_datatable" id="customer_email_datatable"></div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Fax
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Fax')
                                            @slot('id', 'customer-fax')
                                            @slot('data_target', '#modal_fax')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.customer.fax.modal')

                            <div class="customer_fax_datatable" id="customer_fax_datatable"></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@push('header-scripts')
    <style>
        fieldset {
            margin-bottom: 30px;
        }

        .padding-datatable {
            padding: 0px
        }

        .margin-info {
            margin-left: 5px
        }
    </style>
@endpush

@push('footer-scripts')
<script>
        $(document).ready(function () {
            $('.repeater').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: false,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {
                    'text-input': 'foo'
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function (deleteElement) {
                //     if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                //     }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.
                ready: function (setIndexes) {
                },
                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: true
            })
        });
        </script>
    {{-- <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/frontend/functions/form-repeater/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/form-repeater/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/form-repeater/fax.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/customer/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/customer/form-reset.js') }}"></script>

@endpush
