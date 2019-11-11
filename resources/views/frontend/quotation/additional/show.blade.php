@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Additional Task
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
                            Additional Task
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

                            @include('frontend.common.label.show')

                            <h3 class="m-portlet__head-text">
                                Additonal Task
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <table class="table table-striped table-bordered second" width="100%"
                                            cellpadding="4">
                                            <tr>
                                                <td align="center" width="14%"><b>Date</b></td>
                                                <td align="center" width="16%"><b>Project No.</b></td>
                                                <td align="center" width="28%"><b>Project Title</b></td>
                                                <td align="center" width="14%"><b>A/C Type</b></td>
                                                <td align="center" width="14%"><b>A/C Reg</b></td>
                                                <td align="center" width="14%"><b>A/C SN</b></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top">{{$project->created_at}}</td>
                                                <td align="center" valign="top">{{$project->code}}</td>
                                                <td align="center" valign="top">{{$project->title}}</td>
                                                <td align="center" valign="top">{{$project->aircraft->name}}</td>
                                                <td align="center" valign="top">{{$project->aircraft_register}}</td>
                                                <td align="center" valign="top">{{$project->aircraft_sn}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">Identifier Customer</legend>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-tools">
                                                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x"
                                                            role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active"
                                                                    data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                                    <i class="la la-bell-o"></i> General
                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab"
                                                                    href="#m_tabs_6_2" role="tab">
                                                                    <i class="la la-bell-o"></i> Contact
                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link " data-toggle="tab"
                                                                    href="#m_tabs_6_3" role="tab">
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
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <label class="form-control-label">
                                                                        Customer Name
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text',
                                                                    $quotation->quotationable->customer->name)
                                                                    @slot('id', 'name')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <label class="form-control-label">
                                                                        Attention
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->name)
                                                                    @slot('id', 'name')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <label class="form-control-label">
                                                                        Level
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $quotation->quotationable->customer->levels->last()->name)
                                                                    @slot('id', 'level')
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

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->phone)
                                                                    @slot('id', 'phone')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <label class="form-control-label">
                                                                        Fax
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->fax)
                                                                    @slot('id', 'fax')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <label class="form-control-label">
                                                                        Email
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->email)
                                                                    @slot('id', 'email')
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

                                                                    @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->address)
                                                                    @slot('id', 'name')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <label class="form-control-label">
                                                                        City
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                            @slot('text', $attention->fax)
                                                                            @slot('id', 'name')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <label class="form-control-label">
                                                                        Country
                                                                    </label>

                                                                    @component('frontend.common.label.data-info')
                                                                            @slot('text', $attention->fax)
                                                                            @slot('id', 'name')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Date
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                        @slot('text', $quotation->requested_at)
                                                        @slot('id', 'name')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Valid Until
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                        @slot('text', $quotation->valid_until)
                                                        @slot('id', 'name')
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
                                                            Currency
                                                        </label>

                                                        @foreach ($currencies as $currency)
                                                        @if ($currency->id == $quotation->currency_id)
                                                        @component('frontend.common.label.data-info')
                                                        @slot('id', 'Currency')
                                                        @slot('text', $currency->name.'('.$currency->symbol.')')
                                                        @endcomponent
                                                        @endif
                                                        @endforeach

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Exchange Rate
                                                        </label>


                                                        @component('frontend.common.label.data-info')
                                                        @slot('text', number_format($quotation->exchange_rate))
                                                        @slot('id', 'name')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Quotation Title
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $quotation->title)
                                            @slot('id', 'name')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Description
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $quotation->description)
                                            @slot('id', 'name')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row mb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">Scheduled Payment :</legend>
                                            <table id="scheduled_payments_datatables" class="table table-striped table-bordered" width="100%">
                                                <tfoot><th></th><th></th><th colspan="2"></th></tfoot>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Term and Condition
                                        </label>
                                        @component('frontend.common.label.data-info')
                                        @slot('text', $quotation->term_of_condition)
                                        @slot('id', 'name')
                                        @endcomponent
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show defectcard" data-toggle="tab" href="#"
                                                    data-target="#m_tabs_1_1">Defect Card List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link items" data-toggle="tab"
                                                    href="#m_tabs_1_2">Material(s) & Tool List(s)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link summary" data-toggle="tab"
                                                    href="#m_tabs_1_3">Summary</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                @include('frontend.quotation.additional.defect-card.index')
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                @include('frontend.quotation.additional.material-tool.index')
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                @include('frontend.quotation.additional.summary.index')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.back')
                                                @slot('href', route('frontend.workpackage.index'))
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
    let project_uuid = '{{$project->uuid}}';
    let quotation_uuid  = '{{ $quotation->uuid}}';
    let currencyCode    = '{{ $quotation->currency->code }}';
    let customer_uuid   = '{{ $quotation->quotationable->customer->uuid }}';
    let dataSet = {!! $quotation->scheduled_payment_amount !!}
</script>

<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/additional/show.js')}}"></script>
<script src="{{ asset('js/frontend/quotation/additional/summary.js') }}"></script>
<script src="{{ asset('/assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/scheduled-payment.js') }}"></script>
@endpush
