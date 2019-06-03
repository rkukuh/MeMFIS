@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Quotation
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
                    <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Quotation
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.edit')

                            <h3 class="m-portlet__head-text">
                                Quotation
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
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">Project</legend>
                                            <div class="form-group m-form__group row">
                                                <input type="hidden" id="quotation_uuid" name="quotation_uuid" value="{{ $quotation->uuid }}">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Work Order @include('frontend.common.label.required')
                                                            </label>

                                                            <select id="work-order" name="work-order" class="form-control m-select2">
                                                                <option value="">
                                                                    &mdash; Select a Work Order &mdash;
                                                                </option>
                                                                @foreach ($projects as $project)
                                                                <option value="{{ $project->uuid }}" @if ($project->no_wo === $quotation->project->no_wo) selected @endif>
                                                                    {{ $project->no_wo }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Project Title
                                                            </label>
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'project_number')
                                                                @slot('text', $quotation->project->title)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="customer_id" name="customer_id" value="{{ $quotation->customer->uuid }}">

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Project Number
                                                            </label>
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'project_number')
                                                                @slot('text', $quotation->project->code)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Intruction
                                                            </label>
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', '..........')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <fieldset class="border p-2">
                                                    <legend class="w-auto">Identifier Customer</legend>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                                    <li class="nav-item m-tabs__item">
                                                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                                            <i class="la la-bell-o"></i> General
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item m-tabs__item">
                                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                                                            <i class="la la-bell-o"></i> Contact
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item m-tabs__item">
                                                                        <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                                                            <i class="la la-cog"></i> Address
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Name
                                                                            </label>

                                                                            @component('frontend.common.label.data-info')
                                                                                @slot('text', 'XXX')
                                                                                @slot('id', 'name')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Attention
                                                                            </label>

                                                                            @component('frontend.common.input.select2')
                                                                                @slot('text', 'Bp. Romdani')
                                                                                @slot('id', 'attention')
                                                                                @slot('name', 'attention')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Phone
                                                                            </label>

                                                                            @component('frontend.common.input.select2')
                                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                                @slot('id', 'phone')
                                                                                @slot('name', 'phone')
                                                                            @endcomponent

                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Fax
                                                                            </label>

                                                                            @component('frontend.common.input.select2')
                                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                                @slot('id', 'fax')
                                                                                @slot('name', 'fax')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Email
                                                                            </label>

                                                                            @component('frontend.common.input.select2')
                                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                                @slot('id', 'email')
                                                                                @slot('name', 'email')
                                                                            @endcomponent

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <label class="form-control-label">
                                                                                Address
                                                                            </label>

                                                                            @component('frontend.common.input.select2')
                                                                                @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nulla odio consequuntur obcaecati eos error recusandae minima eveniet dolor sed tempora! Ut quidem illum accusantium expedita nulla eos reprehenderit officiis?')
                                                                                @slot('id', 'address')
                                                                                @slot('name', 'address')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                    <div id="map"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Date @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.input.datepicker')
                                                            @slot('id', 'date')
                                                            @slot('text', 'Date')
                                                            @slot('name', 'date')
                                                            @slot('id_error','requested_at')
                                                            @slot('value', $quotation->requested_at)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Valid Until @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.datepicker')
                                                            @slot('id', 'valid_until')
                                                            @slot('text', 'Valid Until')
                                                            @slot('name', 'valid_until')
                                                            @slot('value', $quotation->valid_until)
                                                            @slot('id_error','valid_until')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Currency @include('frontend.common.label.required')
                                                        </label>

                                                        <select id="currency" name="currency" class="form-control m-select2">
                                                            @foreach ($currencies as $currency)
                                                            <option value="{{ $currency->id }}" @if ($currency->id == $quotation->currency_id) selected @endif>
                                                                {{ $currency->name }} ({{ $currency->symbol }})
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Exchange Rate @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'exchange')
                                                            @slot('name', 'exchange')
                                                            @slot('id_error', 'exchange')
                                                            @slot('value', $quotation->exchange_rate)
                                                            @slot('id', 'exchange')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Term of Payment @include('frontend.common.label.required')
                                                </label>
                                                @component('frontend.common.input.number')
                                                    @slot('text', 'Term of Payment')
                                                    @slot('id', 'term_of_payment')
                                                    @slot('value', $quotation->term_of_payment)
                                                    @slot('input_append', 'Days')
                                                    @slot('name', 'term_of_payment')
                                                    @slot('id_error', 'term_of_payment')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Scheduled Payment Type @include('frontend.common.label.required')
                                                </label>
                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'scheduled_payment_type')
                                                    @slot('text', 'Scheduled Payment Type')
                                                    @slot('name', 'scheduled_payment_type')
                                                    @slot('id_error', 'scheduled_payment_type')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Scheduled Payment @include('frontend.common.label.required')
                                                </label>
                                                <div class='repeater'>
                                                    <div data-repeater-list="group-phone">
                                                        <div data-repeater-item>
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-8 col-md-8 col-lg-8">
                                                                    @component('frontend.common.input.text')
                                                                        @slot('name', 'scheduled_payment')
                                                                        @slot('id', 'scheduled_payment')
                                                                        @slot('text', 'Phone')
                                                                        @slot('id_error', 'scheduled_payment_amount')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                                    @include('frontend.common.buttons.create_repeater')
                                                                </div>
                                                                <div class="col-sm-2 col-md-2 col-lg-2">
                                                                    @include('frontend.common.buttons.delete_repeater')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Quotation Title @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '5')
                                            @slot('id', 'title')
                                            @slot('name', 'title')
                                            @slot('text', 'Title')
                                            @slot('id_error', 'title')
                                            @slot('value', $quotation->title)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Description @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '5')
                                            @slot('id', 'description')
                                            @slot('name', 'description')
                                            @slot('text', 'Description')
                                            @slot('value', $quotation->description)
                                            @slot('id_error', 'description')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Term and Condition @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '5')
                                            @slot('id', 'term_and_condition')
                                            @slot('name', 'term_and_condition')
                                            @slot('text', 'Term and Condition')
                                            @slot('value', $quotation->term_of_condition)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show workpackage" data-toggle="tab" href="#" data-target="#m_tabs_workpackage">Workpackage</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link summary" data-toggle="tab" href="#m_tabs_summary">Summary</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            @include('frontend.quotation.summaryEdit')
                                            @include('frontend.quotation.modal-discount')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            @component('frontend.common.buttons.submit')
                                                @slot('type','button')
                                                @slot('id', 'add-quotation')
                                                @slot('class', 'add-quotation')
                                            @endcomponent

                                            @include('frontend.common.buttons.reset')

                                            @component('frontend.common.buttons.back')
                                                @slot('href', route('frontend.quotation.index'))
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
</div>
</div>
@endsection

@push('header-scripts')
<style>
    #map {
        height: 200px;
    }
</style>
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
    let project_id = '{{  $quotation->project->uuid }}';
    let quotation_uuid = '{{  $quotation->uuid }}';
    let currency = '{{  $quotation->currency_id }}';

    function myFunction(object) {
        // var numItems = $('.project').length

        // var x = this.getElementById("type_website");
        var x = object;
        var y = x.name;

        var numb = y.match(/\d/g);
        var z = x.value;
        var projectUuid = z;
        $.ajax({
            url: '/quotation/' + projectUuid + '/project',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // document.getElementsByName('group-website['+numb+'][]')[0].setAttribute("value", "my value is high");
                // alert('masuk');
                // document.getElementByName('group-website['+numb+'][]').innerHTML = 'tes';
                // document.getElementById('telp').innerHTML = 'telp/fax';
                // document.getElementById('attn').innerHTML = 'attn';
                // document.getElementById('address').innerHTML = 'address';
            }
        });

        // var thenum = x.replace( /^\D+/g, '');
        // alert(z);
        // console.log(x.name);
    }
</script>

<script type="text/javascript">
    let attentions = '{{ $attentions }}';
    let attention = '{{ $attention }}';
    if (attentions) {
        let attn = JSON.parse(attentions);
        let attention = JSON.parse(attention);
        $('select[name="attention"]').empty();
        $('select[name="phone"]').empty();
        $('select[name="email"]').empty();
        $('select[name="fax"]').empty();
        $('select[name="address"]').empty();
        for (var i = 0; i < attn.length; i++) {
            if (attn[i].name) {
                $('select[name="attention"]').append(
                    '<option value="' + attn[i].name + '">' + attn[i].name + '</option>'
                );
            }
            if (attn[i].address) {
                $('select[name="address"]').append(
                    '<option value="' + attn[i].address + '">' + attn[i].address + '</option>'
                );
            }
            if (attn[i].fax) {
                $('select[name="fax"]').append(
                    '<option value="' + attn[i].fax + '">' + attn[i].fax + '</option>'
                );
            }
            if (attn[i].phones) {
                $.each(attn[i].phones, function(value) {
                    $('select[name="phone"]').append(
                        '<option value="' + attn[i].phones[value] + '">' + attn[i].phones[value] + '</option>'
                    );
                });
            }
            if (attn[i].emails) {
                $.each(attn[i].emails, function(value) {
                    $('select[name="email"]').append(
                        '<option value="' + attn[i].emails[value] + '">' + attn[i].emails[value] + '</option>'
                    );
                });
            }
        }
        $('select[name="attention"] option[value=' + attention.name + ']').prop("selected", true);
        $('select[name="attention"] option[value=' + attention.name + ']').prop("selected", true);
        $('select[name="attention"] option[value=' + attention.name + ']').prop("selected", true);
        $('select[name="attention"] option[value=' + attention.name + ']').prop("selected", true);
        $('select[name="attention"] option[value=' + attention.name + ']').prop("selected", true);

    } else {
        console.log("empty");

    }
    let simpan = $('.tes').on('click', '.save', function() {
        var usertype = [];
        $("select[name=project]").each(function() {
            usertype.push($(this).val());
            // alert($(this).val());
        });
        var ajaxdata = {
            "UserType": usertype
        };

        console.log(JSON.stringify(ajaxdata));
    });
</script>
<script>
    function initMap() {
        var myLatLng = {
            lat: -7.265757,
            lng: 112.734146
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>

<script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/discount-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/work-order.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-payment-type.js') }}"></script>


<script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/scheduled-payment-type.js') }}"></script>

<script src="{{ asset('js/frontend/quotation/summary.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/form-reset.js') }}"></script>
<script src="{{ asset('js/frontend/functions/datepicker/scheduled-payment.js')}}"></script>
<script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>
<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
<script src="{{ asset('js/frontend/quotation/workpackage-edit.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/edit.js') }}"></script>

@endpush