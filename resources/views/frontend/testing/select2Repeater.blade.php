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

                            @include('frontend.common.label.create-new')

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
                                            <label class="form-control-label">
                                                Customer Code @include('frontend.common.label.required')
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
                                                Term of Payment @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Term of Payment')
                                                @slot('id', 'payment_term')
                                                @slot('name', 'payment_term')
                                                @slot('id_error', 'payment_term')
                                            @endcomponent
                                        </div>

                                    </div>
                                </fieldset>
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Phone @include('frontend.common.label.required')
                                                    </label>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Ext. @include('frontend.common.label.optional')
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    <label class="form-control-label">
                                                        Type.
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                </div>

                                            </div>
                                            <div class='repeater'>
                                                <div data-repeater-list="group-phone">
                                                    <div data-repeater-item>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.input.text')
                                                                @slot('name', 'phone')
                                                                @slot('text', 'Phone')
                                                            @endcomponent
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                        @component('frontend.common.input.text')
                                                                            @slot('name', 'ext')
                                                                            @slot('text', 'Ext')
                                                                        @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('text', 'Work')
                                                                        @slot('name', 'type_phone')
                                                                        @slot('id', 'type_phone')
                                                                        @slot('value', 'work')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('name', 'type_phone')
                                                                        @slot('id', 'type_phone')
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @include('frontend.common.buttons.delete_repeater')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @include('frontend.common.buttons.create_repeater')
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Fax @include('frontend.common.label.required')
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                    <label class="form-control-label">
                                                        Type.
                                                    </label>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                </div>

                                            </div>
                                            <div class='repeater'>
                                                <div data-repeater-list="group-fax">
                                                    <div data-repeater-item>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.input.text')
                                                                    @slot('text', 'fax')
                                                                    @slot('name', 'name')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('text', 'Work')
                                                                        @slot('name', 'type_fax')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('value', 'work')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('name', 'type_fax')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @include('frontend.common.buttons.delete_repeater')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @include('frontend.common.buttons.create_repeater')
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Website @include('frontend.common.label.required')
                                                    </label>
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Type.
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                </div>

                                            </div>
                                            <div class='repeater'>
                                                <div data-repeater-list="group-website">
                                                    <div data-repeater-item>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.input.text')
                                                                    @slot('text', 'website')
                                                                    @slot('name', 'name')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('text', 'Company Profile')
                                                                        @slot('name', 'type_website')
                                                                        @slot('id', 'type_website')
                                                                        @slot('value', 'company_profile')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('name', 'type_website')
                                                                        @slot('id', 'type_website')
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @include('frontend.common.buttons.delete_repeater')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @include('frontend.common.buttons.create_repeater')
                                            </div>
                                        </div>
                                </div>

                                <select
                                {{-- id="{{ $id or '' }}" --}}
                                name="unit"
                                class="form-control m-select2 unit unit2"
                                style="width: 100%">

                                <option value="">
                                    &mdash; Select unitt &mdash;
                                </option>
                            </select>
                                <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Email @include('frontend.common.label.required')
                                                    </label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                </div>

                                            </div>
                                            <div class='repeater'>
                                                <div data-repeater-list="group-email">
                                                    <div data-repeater-item>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                {{-- @component('frontend.common.input.email')
                                                                    @slot('name', 'name')
                                                                    @slot('placeholder', 'Email')
                                                                @endcomponent --}}
                                                                {{-- @component('frontend.common.input.select2')
                                                                    @slot('class', 'unit unit2') --}}
                                                                    {{-- @slot('text', 'Unit') --}}
                                                                    {{-- @slot('style', 'width: 100%') --}}
                                                                    {{-- @slot('name', 'unit_id')
                                                                    @slot('id_error', 'unit') --}}
                                                                {{-- @endcomponent --}}
                                                                <select
                                                                {{-- id="{{ $id or '' }}" --}}
                                                                id="tes"
                                                                name="unit"
                                                                class="form-control m-select2 unit unit2"
                                                                style="width: 100%">

                                                                <option value="">
                                                                    &mdash; Select unitt &mdash;
                                                                </option>
                                                            </select>

                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @include('frontend.common.buttons.delete_repeater')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input data-repeater-create type="button" id="repeater-button" value="Add"/>
                                            {{-- @include('frontend.common.buttons.create_repeater') --}}
                                            </div>
                                        </div>
                                </div>
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
                                                @component('frontend.common.buttons.submit')
                                                    @slot('type','button')
                                                    @slot('id', 'add-item')
                                                    @slot('class', 'add-item')
                                                @endcomponent

                                                @include('frontend.common.buttons.reset')

                                                @include('frontend.common.buttons.back')

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
                                        @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <button>Add new select</button>
  <div id="dynamic-container">

  </div> --}}
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


{{-- <script src="{{ asset('js/frontend/functions/select2/tes.js') }}"></script> --}}
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script> --}}
<script>
        $(document).ready(function () {
            // $('.repeater').repeater({
            //     show: function () {
            //         $(this).find('span').remove()
            //         $(this).find('select').select2({})
            //         $(this).slideDown() },
            //     hide: function (remove) {
            //         $(this).slideUp(remove); }
            //     })
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
                    'text-input': ''
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                    // $(this).fadeIn();
                    $(this).find(".select2-container--default").remove();
                    $(this).find(".unit2").select2({
                    placeholder: "Placeholder text",
                    allowClear: true
                    });
                    $('.select2-container--default').css('width','100%');
                    // $(this).find(".unit2").select2();
                    // $(this).find('span').remove()
                    // $(this).find('select').select2()
                    // $(this).slideDown()
                    // $('.select2-container').remove();
                    // $('.unit').select2({
                    // placeholder: "Placeholder text",
                    // allowClear: true
                    // });
                    // $('.select2-container').css('width','100%');
                    // $(this).find('select').next('.select2-container').remove();
                    // $(this).find('select').select2();
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
<script>
$(".unit").select2({
  placeholder: "To be done by...",
  allowClear: true
});
</script>

{{-- <script type="text/javascript">

    $("#repeater-button").click(function(){
        setTimeout(function(){

            $(".unit").select2({
                placeholder: "Select a state",
                allowClear: true
            });

        }, 100);
    });

</script> --}}


     {{-- <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script> --}}
{{--    <script src="{{ asset('js/frontend/functions/select2/term-of-payment.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/term-of-payment.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/frontend/testing/select2repeater.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/frontend/item/form-reset.js') }}"></script> --}}
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/> --}}
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> --}}



@endpush
