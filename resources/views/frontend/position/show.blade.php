@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Position
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
                        <a href="{{ route('frontend.position.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Position
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
                                    Position
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
                                                Position Code
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $position->code)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Position Name
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $position->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $position->description)
                                            @endcomponent
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
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Benefits</legend>
                                                <div class="form-group m-form__group row px-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="m-portlet">
                                                                <div class="m-portlet__head">
                                                                    <div class="m-portlet__head-caption">
                                                                        <div class="m-portlet__head-title">
                                                                            <span class="m-portlet__head-icon m--hide">
                                                                                <i class="la la-gear"></i>
                                                                            </span>
                
                                                                            <h3 class="m-portlet__head-text">
                                                                                Current
                                                                            </h3>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="m-portlet m-portlet--mobile">
                                                                    <div class="m-portlet__body">
                                                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-xl-8 order-2 order-xl-1">
                                                                                    <div class="form-group m-form__group row align-items-center">
                                                                                        <div class="col-md-4">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    
                                            
                                                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                                                    <tr>
                                                                                        <td align="center" width="34%"><b>Allowance</b></td>
                                                                                        <td align="center" width="33%"><b>Minimum</b></td>
                                                                                        <td align="center" width="33%"><b>Maximum</b></td>
                                                                                    </tr>
                                                                                    
                                                                                    @if (count($benefits_position[0]->benefit_current) >= 0)
                                                                                        
                                                                                    @for ($i = 0; $i < count($benefits_position[0]->benefit_current); $i++)
                                                                                    <tr>
                                                                                    <td valign="top"><b>{{ $benefits_position[0]->benefit_current[$i]->name }}</b></td>
                                                                                    <td valign="top" align="center">{{ $benefits_position[0]->benefit_current[$i]['pivot']->min }}</td>
                                                                                    <td valign="top" align="center">{{ $benefits_position[0]->benefit_current[$i]['pivot']->max }}</td>
                                                                                    </tr>
                                                                                    @endfor
                                                                                        
                                                                                    @endif

                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>  
                                                <div class="form-group m-form__group row px-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="m-portlet">
                                                                <div class="m-portlet__head">
                                                                    <div class="m-portlet__head-caption">
                                                                        <div class="m-portlet__head-title">
                                                                            <span class="m-portlet__head-icon m--hide">
                                                                                <i class="la la-gear"></i>
                                                                            </span>
                
                                                                            <h3 class="m-portlet__head-text">
                                                                                History
                                                                            </h3>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="m-portlet m-portlet--mobile">
                                                                    <div class="m-portlet__body">
                                                                        
                                                                            @for ($i = 0; $i < count($history); $i++)
                                                                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-xl-8 order-2 order-xl-1">
                                                                                        <div class="form-group m-form__group row align-items-center">
                                                                                            <div class="col-md-4">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                                                      
                                                                                        <h3 class="m-portlet__head-text">
                                                                                            @php
                                                                                                $created_time = $history[$i]['created_at'];
                                                                                                $formatCreatedTime = strtotime($created_time);
    
                                                                                                $updated_time = $history[$i]['updated_at'];
                                                                                                $formatUpdatedTime = strtotime($updated_time);
    
                                                                                                echo date("d F Y", $formatCreatedTime).' to '.date("d F Y", $formatUpdatedTime);
                                                                                            @endphp
                                                                                        </h3>
                                    
                                                                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group m-form__group row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                                                                <tr>
                                                                                                    <td align="center" width="34%"><b>Allowance</b></td>
                                                                                                    <td align="center" width="33%"><b>Minimum</b></td>
                                                                                                    <td align="center" width="33%"><b>Maximum</b></td>
                                                                                                </tr>
                                                                                        @for ($j = 0; $j < count($history[$i]['data']); $j++)
                                                                                                <tr>
                                                                                                    <td valign="top"><b>{{ $history[$i]['data'][$j]['benefit_name'] }}</b></td>
                                                                                                    <td valign="top" align="center">{{ $history[$i]['data'][$j]['min'] }}</td>
                                                                                                    <td valign="top" align="center">{{ $history[$i]['data'][$j]['max'] }}</td>
                                                                                                </tr>
                                                                                        @endfor
    
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            @endfor
                                                                            
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>  
                                            </fieldset>
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

@endpush
