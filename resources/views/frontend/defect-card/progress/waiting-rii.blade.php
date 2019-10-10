@extends('frontend.master')

@section('content')
<form method="POST">

    <div class="m-subheader hidden">
        <div class="d-flex align-items-center ">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Defect Card
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
                        <a href="#" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Defect Card
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Defect Card
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table border="1px" width="100%">
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Date
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Defect Card No.
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Ref Jobcard No.
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Additional Project No.
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                ATA
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Zone
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Complaint
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Mhrs Est.
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Remark
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Created By
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Status
                                            </td>
                                            <td width="70%" style="text-align:center">

                                            </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>

                            <fieldset class="border p-2">
                                <legend class="w-auto font-weight-bold">Propose Correction</legend>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'remove')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'remove')
                                            @slot('text', '1. REMOVE')
                                            @slot('size', '12')
                                            @slot('disabled','disabled')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'repair')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'repair')
                                            @slot('text', '4. REPAIR')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'test')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'test')
                                            @slot('text', '7. TEST')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'install')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'install')
                                            @slot('text', '2. INSTALL')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'replace')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'replace')
                                            @slot('text', '5. REPLACE')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'shop_visit')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'shop-visit')
                                            @slot('text', '8. SHOP VISIT')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'rectification')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'rectification')
                                            @slot('text', '3. RECTIFICATION')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'ndt')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'ndt')
                                            @slot('text', '6. NDT')
                                            @slot('disabled','disabled')
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'other')
                                                    @slot('name', 'propose[]')
                                                    @slot('value', 'other')
                                                    @slot('text', '9. Other')
                                                    @slot('disabled','disabled')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.textarea')
                                                    @slot('id', 'other_text')
                                                    @slot('text', 'other_text')
                                                    @slot('name', 'other_text')
                                                    @slot('rows', '3')
                                                    @slot('id_error', 'other_text')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group m-form__group row mt-4">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Engineer
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'generated')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row mt-4">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table class="table " width="100%" cellpadding="4">
                                        <tr>
                                            <td valign="top" width="4%">1)</td>
                                            <td valign="top" width="48%">
                                                <label class="form-control-label">
                                                Reference
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generated')
                                                @endcomponent
                                            </td>
                                            <td valign="top" width="48%">
                                                <label class="form-control-label">
                                                Helper
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generated')
                                                @endcomponent
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <fieldset class="border p-4">
                                        <legend class="w-auto font-weight-bold">Material(s) List</legend>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <table border="1" cellpadding="4" width="100%" bordercolor="#bec0c2">
                                                    <tr style="background:#e6e9ed">
                                                        <td rowspan="2" align="center"><b>PN</b></td>
                                                        <td rowspan="2" align="center"><b>Material Description</b></td>
                                                        <td colspan="2" align="center"><b>Serial No.</b></td>
                                                        <td rowspan="2" align="center"><b>Qty</b></td>
                                                        <td rowspan="2" align="center"><b>Unit</b></td>
                                                        <td rowspan="2" align="center"><b>IPC Ref.</b></td>
                                                        <td rowspan="2" align="center"><b>Remark</b></td>
                                                    </tr>
                                                    <tr style="background:#e6e9ed">
                                                        <td align="center"><b>Off</b></td>
                                                        <td align="center"><b>On</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <fieldset class="border p-4">
                                        <legend class="w-auto font-weight-bold">Tool(s) List</legend>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <table border="1" cellpadding="4" width="100%" bordercolor="#bec0c2">
                                                    <tr style="background:#e6e9ed">
                                                        <td rowspan="2" align="center"><b>PN</b></td>
                                                        <td rowspan="2" align="center"><b>Material Description</b></td>
                                                        <td colspan="2" align="center"><b>Serial No.</b></td>
                                                        <td rowspan="2" align="center"><b>Qty</b></td>
                                                        <td rowspan="2" align="center"><b>Unit</b></td>
                                                        <td rowspan="2" align="center"><b>IPC Ref.</b></td>
                                                        <td rowspan="2" align="center"><b>Remark</b></td>
                                                    </tr>
                                                    <tr style="background:#e6e9ed">
                                                        <td align="center"><b>Off</b></td>
                                                        <td align="center"><b>On</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            @component('frontend.common.buttons.submit')
                                                @slot('type','button')
                                                @slot('icon','fa-check')
                                                @slot('text','RII Release')
                                            @endcomponent

                                            @include('frontend.common.buttons.back')
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
</form>

@endsection
