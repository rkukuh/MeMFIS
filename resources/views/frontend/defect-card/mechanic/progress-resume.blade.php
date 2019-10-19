@extends('frontend.master')

@section('content')

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
                                                {{ $defectcard->created_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Defect Card No.
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->code }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Ref Jobcard No.
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->jobcard->number }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Additional Project No.
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->project_additional->code }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->project_additional->aircraft->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->project_additional->aircraft_register }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->project_additional->aircraft_sn }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                ATA
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->ata }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Zone
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $zones }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Complaint
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->complaint }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Mhrs Est.
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->estimation_manhour }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $defectcard->skill }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                            @if($defectcard->is_rii)
                                                YES
                                            @else
                                                NO  
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Remark
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if($defectcard->description) {{ $defectcard->description }} @else - @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Created By
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $created_by }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Status
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{ $status->name }}
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
                                            @if(in_array('remove',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('repair',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('test',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('install',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('replace',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('shop-visit',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('rectification',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                            @if(in_array('ndt',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
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
                                                    @if(in_array('other',$propose_corrections))
                                                        @slot('checked', 'checked')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.textarea')
                                                    @slot('id', 'other_text')
                                                    @slot('text', 'other_text')
                                                    @slot('name', 'other_text')
                                                    @slot('rows', '3')
                                                    @slot('id_error', 'other_text')
                                                    @if(empty($propose_correction_text))
                                                        @slot('disabled','disabled')
                                                    @endif
                                                    @slot('value', $propose_correction_text)
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
                                        @slot('text', $defectcard->progresses->first()->progressedBy->first_name )
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row mt-4">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table class="table " width="100%" cellpadding="4">
                                        @if(sizeof($defectcard->helpers) > 0)
                                            @foreach($defectcard->helpers as $key => $helper)
                                            <tr>
                                                <td valign="top" width="4%">{{$key + 1}})</td>
                                                <td valign="top" width="48%">
                                                    <label class="form-control-label">
                                                        Reference
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('name', 'reference[]')
                                                        @slot('value', $helper->pivot->additionals)
                                                    @endcomponent
                                                </td>
                                                <td valign="top" width="48%">
                                                    <label class="form-control-label">
                                                        Helper
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('name', 'helper[]')
                                                        @slot('text', $helper->first_name)
                                                    @endcomponent
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3"><i>No helper</i></td>
                                            </tr>
                                        @endif
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
                                                    @if(sizeof($defectcard->materials) > 0)
                                                        @foreach($defectcard->materials as $material)
                                                        <tr>
                                                            <td style="width:25%">{{ $material->code }}</td>
                                                            <td style="width:25%">{{ $material->description }}</td>
                                                            <td>{{ $material->pivot->sn_off }}</td>
                                                            <td>{{ $material->pivot->sn_on }}</td>
                                                            <td>{{ $material->pivot->quantity }}</td>
                                                            <td>{{ $material->unit->name }}</td>
                                                            <td>{{ $material->pivot->ipc_ref }}</td>
                                                            <td>{{ $material->pivot->note }}</td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8" align="center"><i>No material is needed in this defect card.</i></td>
                                                        </tr>
                                                    @endif
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
                                                    @if(sizeof($defectcard->tools) > 0)
                                                        @foreach($defectcard->tools as $tool)
                                                        <tr>
                                                            <td style="width:25%">{{ $tool->code }}</td>
                                                            <td style="width:25%">{{ $tool->description }}</td>
                                                            <td>{{ $tool->pivot->sn_off }}</td>
                                                            <td>{{ $tool->pivot->sn_on }}</td>
                                                            <td>{{ $tool->pivot->quantity }}</td>
                                                            <td>{{ $tool->unit->name }}</td>
                                                            <td>{{ $tool->pivot->ipc_ref }}</td>
                                                            <td>{{ $tool->pivot->note }}</td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8" align="center"><i>No tool is needed in this defect card.</i></td>
                                                        </tr>
                                                    @endif
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

                                            @include('frontend.defect-card.mechanic.modal-pause')
                                            @component('frontend.common.buttons.pause')
                                                @slot('data_target', '#modal_pause')
                                            @endcomponent

                                            @include('frontend.defect-card.mechanic.modal-close')
                                            @component('frontend.common.buttons.close')
                                            @slot('data_target', '#modal_close')
                                                @slot('class', 'ml-2')
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


@endsection

@push('footer-scripts')
    <script>
        let uuid = '{{$defectcard->uuid}}';
    </script>
    <script src="{{ asset('js/frontend/defect-card/items.js')}}"></script>
@endpush