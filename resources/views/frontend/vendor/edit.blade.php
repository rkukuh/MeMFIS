@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Vendor
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
                    <a href="{{ route('frontend.supplier.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Vendor
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-7">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.edit')

                            <h3 class="m-portlet__head-text">
                                Vendor
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Vendor Name @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('text', 'Name')
                                            @slot('name', 'name')
                                            @slot('value', $vendor->name)
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Term of Payment
                                        </label>

                                        @component('frontend.common.input.number')
                                            @slot('id', 'term_of_payment')
                                            @slot('text', 'Term of Payment')
                                            @slot('name', 'term_of_payment')
                                            @slot('value', $vendor->payment_term)
                                            @slot('input_append', 'Hari')
                                            @slot('id_error', 'term_of_payment')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Phone @include('frontend.common.label.required')
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                <label class="form-control-label">
                                                    Ext.
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                            </div>
                                        </div>
                                        <div class="repeaterPhone">
                                            @if(isset($vendor->phones) && sizeof($vendor->phones) > 0)
                                                @for($counter = 0 ; $counter < sizeof($vendor->phones); $counter++)
                                                    <div class="repeaterRow">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                                @component('frontend.common.input.text')
                                                                    @slot('name', 'phone_array')
                                                                    @slot('value', $vendor->phones[$counter]->number)
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @component('frontend.common.input.text')
                                                                    @slot('name', 'ext')
                                                                    @slot('value', $vendor->phones[$counter]->ext)
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                                @if( $vendor->phones[$counter]->type->name === "Company" )
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('text', 'Company')
                                                                        @slot('name', 'type_phone_'.$counter)
                                                                        @slot('id', 'type_phone')
                                                                        @slot('value', 'company')
                                                                        @slot('checked', 'checked')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_phone')
                                                                        @slot('name', 'type_phone_'.$counter)
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                                @else
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('text', 'Company')
                                                                        @slot('name', 'type_phone_'.$counter)
                                                                        @slot('id', 'type_phone')
                                                                        @slot('value', 'company')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_phone')
                                                                        @slot('name', 'type_phone_'.$counter)
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                        @slot('checked', 'checked')
                                                                    @endcomponent
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.delete_repeater')
                                                                    @slot('class', 'DeleteRow')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.create_repeater')
                                                                    @slot('class', 'AddRow')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @else
                                                <div class="repeaterRow">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.text')
                                                                @slot('name', 'phone_array')
                                                                @slot('text', 'Phone')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                            @component('frontend.common.input.text')
                                                                @slot('name', 'ext')
                                                                @slot('text', 'Ext')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.input.radio')
                                                                @slot('text', 'Company')
                                                                @slot('name', 'type_phone_1')
                                                                @slot('id', 'type_phone')
                                                                @slot('value', 'company')
                                                            @endcomponent
                                                            @component('frontend.common.input.radio')
                                                                @slot('id', 'type_phone')
                                                                @slot('name', 'type_phone_1')
                                                                @slot('text', 'Personal')
                                                                @slot('value', 'personal')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('class', 'DeleteRow')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('class', 'AddRow')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                                <div class="repeaterRow CopyPhone hidden">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.text')
                                                                @slot('name', 'phone_array')
                                                                @slot('text', 'Phone')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                            @component('frontend.common.input.text')
                                                                @slot('name', 'ext')
                                                                @slot('text', 'Ext')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.input.radio')
                                                                @slot('text', 'Company')
                                                                @slot('name', 'type_phone')
                                                                @slot('id', 'type_phone')
                                                                @slot('value', 'company')
                                                            @endcomponent
                                                            @component('frontend.common.input.radio')
                                                                @slot('id', 'type_phone')
                                                                @slot('name', 'type_phone')
                                                                @slot('text', 'Personal')
                                                                @slot('value', 'personal')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('class', 'DeleteRow')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('class', 'AddRow')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Fax @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                            </div>
                                        </div>
                                        <div class="repeaterFax">
                                            @if(isset($vendor->faxes) && sizeof($vendor->faxes) > 0)
                                                @for($counter=0 ; $counter < sizeof($vendor->faxes); $counter++)
                                                    <div class="repeaterRow">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                                @component('frontend.common.input.text')
                                                                    @slot('text', 'fax')
                                                                    @slot('name', 'fax')
                                                                    @slot('value', $vendor->faxes[$counter]->number)
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                                @if( $vendor->faxes[$counter]->type->name === "Company" )
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('name', 'type_fax_'.$counter))
                                                                        @slot('text', 'Company')
                                                                        @slot('value', 'company')
                                                                        @slot('checked','checked')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('name', 'type_fax_'.$counter))
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                                @else
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('name', 'type_fax_'.$counter))
                                                                        @slot('text', 'Company')
                                                                        @slot('value', 'company')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_fax')
                                                                        @slot('name', 'type_fax_'.$counter))
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                        @slot('checked','checked')
                                                                    @endcomponent
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.delete_repeater')
                                                                    @slot('class', 'DeleteRow')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.create_repeater')
                                                                    @slot('class', 'AddRow')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @else
                                                <div class="repeaterRow">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.text')
                                                                @slot('text', 'fax')
                                                                @slot('name', 'fax')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.input.radio')
                                                                @slot('text', 'Company')
                                                                @slot('name', 'type_fax')
                                                                @slot('id', 'type_fax')
                                                                @slot('value', 'company')
                                                            @endcomponent
                                                            @component('frontend.common.input.radio')
                                                                @slot('name', 'type_fax')
                                                                @slot('id', 'type_fax')
                                                                @slot('text', 'Personal')
                                                                @slot('value', 'personal')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('class', 'DeleteRow')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('class', 'AddRow')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="repeaterRow CopyFax hidden">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        @component('frontend.common.input.text')
                                                            @slot('text', 'fax')
                                                            @slot('name', 'fax')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('text', 'Company')
                                                            @slot('name', 'type_fax')
                                                            @slot('id', 'type_fax')
                                                            @slot('value', 'company')
                                                        @endcomponent
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'type_fax')
                                                            @slot('id', 'type_fax')
                                                            @slot('text', 'Personal')
                                                            @slot('value', 'personal')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.delete_repeater')
                                                            @slot('class', 'DeleteRow')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('class', 'AddRow')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Email @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                            </div>
                                        </div>
                                        <div class="repeaterEmail">
                                            @if(isset($vendor->emails) && sizeof($vendor->emails) > 0)
                                                @for($counter=0 ; $counter < sizeof($vendor->emails); $counter++)
                                                    <div class="repeaterRow">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                                @component('frontend.common.input.email')
                                                                    @slot('name', 'email_array')
                                                                    @slot('placeholder', 'Email')
                                                                    @slot('value',$vendor->emails[$counter]->address)
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                                @if($vendor->emails[$counter]->type->name === "Company")
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_email')
                                                                        @slot('name', 'type_email_'.$counter)
                                                                        @slot('text', 'Company')
                                                                        @slot('value', 'company')
                                                                        @slot('checked','checked')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_email')
                                                                        @slot('name', 'type_email_'.$counter)
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                    @endcomponent
                                                                @else
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_email')
                                                                        @slot('name', 'type_email_'.$counter)
                                                                        @slot('text', 'Company')
                                                                        @slot('value', 'company')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'type_email')
                                                                        @slot('name', 'type_email_'.$counter)
                                                                        @slot('text', 'Personal')
                                                                        @slot('value', 'personal')
                                                                        @slot('checked','checked')
                                                                    @endcomponent
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.delete_repeater')
                                                                    @slot('class', 'DeleteRow')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.create_repeater')
                                                                    @slot('class', 'AddRow')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            @else
                                                <div class="repeaterRow">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.email')
                                                                @slot('name', 'email_array')
                                                                @slot('placeholder', 'Email')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.input.radio')
                                                                @slot('text', 'Company')
                                                                @slot('name', 'type_email')
                                                                @slot('id', 'type_email')
                                                                @slot('value', 'company')
                                                            @endcomponent
                                                            @component('frontend.common.input.radio')
                                                                @slot('name', 'type_email')
                                                                @slot('id', 'type_email')
                                                                @slot('text', 'Personal')
                                                                @slot('value', 'personal')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.delete_repeater')
                                                                @slot('class', 'DeleteRow')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                            @component('frontend.common.buttons.create_repeater')
                                                                @slot('class', 'AddRow')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="repeaterRow CopyEmail hidden">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        @component('frontend.common.input.email')
                                                            @slot('name', 'email_array')
                                                            @slot('placeholder', 'Email')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('text', 'Company')
                                                            @slot('name', 'type_email')
                                                            @slot('id', 'type_email')
                                                            @slot('value', 'company')
                                                        @endcomponent
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'type_email')
                                                            @slot('id', 'type_email')
                                                            @slot('text', 'Personal')
                                                            @slot('value', 'personal')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.delete_repeater')
                                                            @slot('class', 'DeleteRow')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('class', 'AddRow')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Document @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                            </div>
                                        </div>
                                        <div class="repeaterDocument">
                                            <div class="repeaterRow">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        @component('frontend.common.input.upload')
                                                            @slot('label', 'document')
                                                            @slot('name', 'document')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        <select name="type_document" class="form-control selectDocument">
                                                            <option value="">
                                                                Select a Document Type
                                                            </option>

                                                            @foreach ($documents as $document)
                                                            <option value="{{ $document->uuid }}">
                                                                {{ $document->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.delete_repeater')
                                                            @slot('class', 'DeleteRow')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('class', 'AddRow')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="repeaterRow CopyDocument hidden">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        @component('frontend.common.input.upload')
                                                            @slot('label', 'document')
                                                            @slot('name', 'document')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                        <select name="type_document" class="form-control">
                                                            <option value="">
                                                                Select a Document Type
                                                            </option>

                                                            @foreach ($documents as $document)
                                                            <option value="{{ $document->uuid }}">
                                                                {{ $document->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.delete_repeater')
                                                            @slot('class', 'DeleteRow')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('class', 'AddRow')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-md-7 col-lg-7">
                                    <label class="form-control-label">
                                        Account Code @include('frontend.common.label.optional')
                                    </label>

                                    @include('frontend.common.account-code.index')

                                    @component('frontend.common.input.hidden')
                                        @slot('id', 'account_code')
                                        @slot('name', 'account_code')
                                    @endcomponent

                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto"><b>Bank Account Information</b></legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Bank Name
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('text', 'Bank Account Name')
                                                            @slot('id', 'bank_name')
                                                            @slot('name', 'bank_name')
                                                            @slot('id_error', 'bank_name')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Bank Account Name
                                                        </label>

                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Bank Account Name')
                                                            @slot('id', 'bank_account_name')
                                                            @slot('name', 'bank_account_name')
                                                            @slot('value', $vendor->bank_accounts->first()->name)
                                                            @slot('id_error', 'bank_account_name')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Bank Account Number
                                                        </label>

                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Bank Account Number')
                                                            @slot('id', 'bank_account_number')
                                                            @slot('name', 'bank_account_number')
                                                            @slot('value', $vendor->bank_accounts->first()->number)
                                                            @slot('id_error', 'bank_account_number')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Currency
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'currency')
                                                            @slot('text', 'Currency')
                                                            @slot('name', 'currency')
                                                            @slot('id_error', 'currency')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Swift Code
                                                        </label>

                                                        @component('frontend.common.input.text')
                                                            @slot('text', 'Swift Code')
                                                            @slot('id', 'swift_code')
                                                            @slot('name', 'swift_code')
                                                            @slot('value', $vendor->bank_accounts->first()->swift_code)
                                                            @slot('id_error', 'swift_code')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Active
                                        </label><br>

                                        @component('frontend.common.input.switch')
                                            @slot('text', 'Active')
                                            @slot('name', 'active')
                                            @slot('id', 'active')
                                            @if(empty($vendor->banned_at))
                                            @slot('checked','checked')
                                            @endif
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.update')
                                                    @slot('type','button')
                                                    @slot('id', 'edit-vendor')
                                                    @slot('class', 'edit-vendor')
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
        <div class="col-lg-5">
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
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="tab-content">
                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                            @component('frontend.common.buttons.create-new')
                                                @slot('text', 'Address')
                                                @slot('id', 'vendor-address')
                                                @slot('data_target', '#modal_address')
                                            @endcomponent

                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                @include('frontend.vendor.address.modal')
                                <div class="vendor_address_datatable" id="vendor_address_datatable"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                <legend class="w-auto">Attention(s)</legend>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="repeaterAttention">
                                    @if($attentions)
                                        @foreach($attentions as $attention)
                                            <div class="repeaterRow">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Name
                                                        </label>

                                                        @component('frontend.common.input.text')
                                                            @slot('name', 'attn-name')
                                                            @slot('value', $attention->name)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Position
                                                        </label>

                                                        @component('frontend.common.input.text')
                                                            @slot('text', 'Purchasing')
                                                            @slot('name', 'attn-position')
                                                            @slot('value', $attention->position)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Phone
                                                        </label>

                                                        <select name="attn-phone" class="form-control attn-phone" multiple>
                                                            @if(isset($attention->phones))
                                                                @foreach($attention->phones as $attnPhone)
                                                                <option value="{{ $attnPhone }}" selected>{{ $attnPhone }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Fax
                                                        </label>

                                                        @component('frontend.common.input.text')
                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                            @slot('name', 'attn-fax')
                                                            @slot('value', $attention->fax)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Email
                                                        </label>

                                                        <select name="attn-email" class="form-control attn-email" multiple>
                                                            @if(isset($attention->emails))
                                                                @foreach($attention->emails as $emails)
                                                                <option value="{{ $emails }}" selected>{{ $emails }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        @component('frontend.common.buttons.delete_repeater')
                                                            @slot('class', 'DeleteRow')
                                                            @slot('size', 'col-sm-6')
                                                        @endcomponent
                                                        @component('frontend.common.buttons.create_repeater')
                                                            @slot('class', 'AddRow')
                                                            @slot('size', 'col-sm-6')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else

                                    <div class="repeaterRow">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Name
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('name', 'attn-name')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Position
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('name', 'attn-position')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Phone
                                                    </label>

                                                    @component('frontend.common.input.select2')
                                                        @slot('text', 'Phone Number')
                                                        @slot('name', 'attn-phone')
                                                        @slot('class', 'attn-phone')
                                                        @slot('multiple', 'multiple')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2 hidden">
                                                    <label class="form-control-label">
                                                        Extension
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('name', 'attn-ext')
                                                        @slot('text', 'Ext')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Fax
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', '+62xxxxxxx / 07777777')
                                                        @slot('name', 'attn-fax')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Email
                                                    </label>

                                                    @component('frontend.common.input.select2')
                                                        @slot('text', 'Email Address')
                                                        @slot('name', 'attn-email')
                                                        @slot('class', 'attn-email')
                                                        @slot('multiple', 'multiple')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    @component('frontend.common.buttons.delete_repeater')
                                                        @slot('class', 'DeleteRow')
                                                        @slot('size', 'col-sm-6')
                                                    @endcomponent
                                                    @component('frontend.common.buttons.create_repeater')
                                                        @slot('class', 'AddRow')
                                                        @slot('size', 'col-sm-6')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="repeaterRow CopyAttention hidden">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Name
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('name', 'attn-name')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Position
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Purchasing')
                                                    @slot('name', 'attn-position')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Phone
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Phone Number')
                                                    @slot('name', 'attn-phone')
                                                    @slot('multiple', 'multiple')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 hidden">
                                                <label class="form-control-label">
                                                    Extension
                                                </label>
                                                @component('frontend.common.input.text')
                                                    @slot('name', 'attn-ext')
                                                    @slot('text', 'Ext')
                                                @endcomponent
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Fax
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                    @slot('name', 'attn-fax')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Email
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Email Address')
                                                    @slot('name', 'attn-email')
                                                    @slot('multiple', 'multiple')
                                                @endcomponent
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.buttons.delete_repeater')
                                                    @slot('class', 'DeleteRow')
                                                    @slot('size', 'col-sm-6')
                                                @endcomponent
                                                @component('frontend.common.buttons.create_repeater')
                                                    @slot('class', 'AddRow')
                                                    @slot('size', 'col-sm-6')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('header-scripts')
<style>
    fieldset {
        margin-bottom: 10px;
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

    var BootstrapSwitch = {
        init: function() {
            $("[data-switch=true]").bootstrapSwitch();
        }
    };


    $( document ).ready(function() {
        $('.selectDocument').select2();
        BootstrapSwitch.init()
    });
</script>
<script>
    let vendor_uuid = '{{ $vendor->uuid }}';

    $('.search-journal').html('{{$coa}}');
</script>

<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/website.js') }}"></script> --}}
<script src="{{ asset('js/frontend/vendor/edit.js') }}"></script>
<script src="{{ asset('js/frontend/vendor/form-reset.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
{{-- <script src="{{ asset('js/frontend/functions/select2/type-document.js') }}"></script> --}}
{{-- <script src="{{ asset('js/frontend/functions/select2/type-website.js') }}"></script> --}}
<script src="{{ asset('js/frontend/functions/select2/attn-phone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/attn-email.js') }}"></script>
<script src="{{ asset('js/frontend/vendor/repeater.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/bank.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>
@endpush
