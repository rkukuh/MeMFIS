@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Benefits
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
                                Benefits
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

                                @component('frontend.common.label.edit')
                                    @slot('text','Update')
                                @endcomponent

                                <h3 class="m-portlet__head-text">
                                    Benefits
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">

                                @component('frontend.common.input.hidden')
                                @slot('id', 'position_uuid')
                                @slot('name', 'position_uuid')
                                @slot('value', $uuid)
                                @endcomponent

                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered second" widtd="100%" cellpadding="4">
                                                <tr style="background:#5372c9;color:white;">
                                                    <td width="5%"></td>
                                                    <td width="45%" align="center"><b>Benefits Name</b></td>
                                                    <td width="25%" align="center"><b>Min</b></td>
                                                    <td width="25%" align="center"><b>Max</b></td>
                                                </tr>
                                                @foreach ($benefit as $b)
                                                @if (in_array($b->name, $search))
                                                @php
                                                $key = array_search($b->name, $search)    
                                                @endphp
                                                <tr>
                                                    <td align="center" style="padding-top:25px;">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', str_replace(' ', '', $b->name))
                                                            @slot('name', 'check')
                                                            @slot('checked','checked')
                                                            @slot('value', $b->uuid)
                                                            @slot('onclik','checkboxFunction(this.id)')
                                                            @slot('id_error', str_replace(' ', '', $b->name))
                                                        @endcomponent
                                                    </td>
                                                <td style="padding-top:30px;"><b>{{ $b->name }}</b></td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('name', 'position_min')
                                                            @slot('id', str_replace(' ', '', $b->name).'_min')
                                                            @slot('value', $min[$key])
                                                            @slot('id_error', str_replace(' ', '', $b->name).'_min')
                                                        @endcomponent
                                                    </td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('name', 'position_max')
                                                            @slot('id', str_replace(' ', '', $b->name).'_max')
                                                            @slot('value', $max[$key])
                                                            @slot('id_error', str_replace(' ', '', $b->name).'_max')
                                                        @endcomponent
                                                    </td>
                                                </tr>  
                                                @else
                                                <tr>
                                                    <td align="center" style="padding-top:25px;">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', str_replace(' ', '', $b->name))
                                                            @slot('name', 'check')
                                                            @slot('value', $b->uuid)
                                                            @slot('onclik','checkboxFunction(this.id)')
                                                            @slot('id_error', str_replace(' ', '', $b->name))
                                                        @endcomponent
                                                    </td>
                                                <td style="padding-top:30px;"><b>{{ $b->name }}</b></td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('name', 'position_min')
                                                            @slot('id', str_replace(' ', '', $b->name).'_min')
                                                            @slot('id_error', str_replace(' ', '', $b->name).'_min')
                                                        @endcomponent
                                                    </td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('name', 'position_max')
                                                            @slot('id', str_replace(' ', '', $b->name).'_max')
                                                            @slot('id_error', str_replace(' ', '', $b->name).'_max')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'update-benefit')
                                                        @slot('class', 'update-benefit')
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
        </div>
    </div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/position/update_benefit_edit.js')}}"></script>
@endpush