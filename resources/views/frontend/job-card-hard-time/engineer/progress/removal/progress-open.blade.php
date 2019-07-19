@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Job Card Hard Time
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
                        <a href="{{ route('frontend.workpackage.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Job Card Hard Time
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
                                    Job Card Hard Time
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="m-portlet__body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Removal</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Installation</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">

                                                    <div class="form-group m-form__group row mt-5">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <table border="1px" width="100%">
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Job Card No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            CRI No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->code}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Type
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft->name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Reg
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft_register}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Serial Number
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft_sn}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Project No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->code}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item Description
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->description}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item Part Number
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->part_number}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Position
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->position}}
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                            <form method="POST" action="{{route('frontend.jobcard-hardtime-engineer.update',$htcrr->uuid)}}">

                                                            <table class="mt-3" border="1px" width="100%">
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item S/N Off
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.text')
                                                                                @slot('id', 'item_sn_removal')
                                                                                @slot('name', 'item_sn_removal')
                                                                                @slot('id_error', 'item_sn_removal')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Remark
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.textarea')
                                                                                @slot('rows', '5')
                                                                                @slot('id', 'description_removal')
                                                                                @slot('name', 'description_removal')
                                                                                @slot('text', 'Description')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            RII
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.checkbox')
                                                                                @slot('id', 'is_rii_removal')
                                                                                @slot('name', 'is_rii_removal')
                                                                                @slot('text', 'IS RII?')
                                                                                @slot('size', '2')
                                                                                @slot('value', 1)
                                                                                @slot('style_div', 'margin-top:20px; padding:0;')
                                                                                @slot('padding_left', '0')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                            <div class="flex">
                                                                <div class="action-buttons">
                                                                        {{method_field('PATCH')}}
                                                                        {!! csrf_field() !!}
                                                                        <input type="hidden" name="progress" value="{{$status->uuid}}">
                                                                        @include('frontend.common.buttons.execute')
                                                                    </form>
                                                                    @include('frontend.common.buttons.back')

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">

                                                    <div class="form-group m-form__group row mt-5">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <table border="1px" width="100%">
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Job Card No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            CRI No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->code}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Type
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft->name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Reg
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft_register}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            A/C Serial Number
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->aircraft_sn}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Project No
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->project->code}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item Description
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->description}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Position
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            {{$htcrr->position}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            RII
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.checkbox')
                                                                                @slot('id', 'is_rii_installtation')
                                                                                @slot('name', 'is_rii_installtation')
                                                                                @slot('text', 'IS RII?')
                                                                                @if($htcrr->position == 1)
                                                                                    @slot('checked', 'checked')
                                                                                @endif
                                                                                @slot('size', '2')
                                                                                @slot('style_div', 'margin-top:20px; padding:0;')
                                                                                @slot('padding_left', '0')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                            <table class="mt-3" border="1px" width="100%">
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item P/N ON
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.text')
                                                                                @slot('id', 'item_pn_installtation')
                                                                                @slot('name', 'item_pn_installtation')
                                                                                @slot('id_error', 'title')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Item S/N ON
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.text')
                                                                                @slot('id', 'item_sn_installtation')
                                                                                @slot('name', 'item_sn_installtation')
                                                                                @slot('id_error', 'title')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" style="background-color:beige;padding:10px;">
                                                                            Remark
                                                                        </td>
                                                                        <td width="70%" style="text-align:center">
                                                                            @component('frontend.common.input.textarea')
                                                                                @slot('rows', '5')
                                                                                @slot('id', 'description_installtation')
                                                                                @slot('name', 'description_installtation')
                                                                                @slot('text', 'Description')
                                                                            @endcomponent
                                                                        </td>
                                                                    </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                            <div class="flex">
                                                                <div class="action-buttons">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
