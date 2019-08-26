@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center ">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Job Card
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
                        <a href="{{ route('frontend.journal.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Job Card
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
                                    Job Card
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
                                                Job Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Task Card EO No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Project No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Refrences
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Title
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Instruction
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Category
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Scheduled Priority
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Recurrence
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Manuals Affected
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <h1>Material(s) Required</h1>
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 order-2 order-xl-1">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-6">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="basic_datatable wp-datatable" id="scrolling_both"></div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <h1>Tool(s) Required / Special Tooling</h1>
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 order-2 order-xl-1">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-6">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="basic_datatable wp-datatable" id="scrolling_both"></div>

                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <table border="1px" width="100%" style="margin-top:10px">
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Helper
                                        </td>
                                        <td width="70%" style="text-align:center">
                                        {{-- @if(isset($jobcard->helpers))
                                            @foreach($jobcard->helpers as $helper)
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <select name="helper" style="width:100%" class="form-control m-select2">
                                                        <option value=""></option>
                                                        @foreach($employees as $employee)
                                                        <option value="{{ $employee->code }}" @if($employee->code == $helper->code) selected @endif>{{ $employee->first_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.select2')
                                                        @slot('text', 'helper')
                                                        @slot('name', 'helper')
                                                        @slot('id_error', 'helper')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        @endif --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Station
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            @component('frontend.common.input.number')
                                                @slot('name', 'csn')
                                            @endcomponent
                                        </td>
                                    </tr>
                            </table>

                            <table border="1px" width="100%" style="margin-top:10px">
                                <tr>
                                    <td align="center" style="background-color:beige;padding:10px;"><b>ACCOMPLISHMENT RECORD</b></td>
                                </tr>
                            </table>

                            <div class="form-group m-form__group row mt-1">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group m-form__group row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                TSN
                                            </label>

                                            @component('frontend.common.input.number')
                                                @slot('text', 'Tsn')
                                                @slot('name', 'tsn')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                CSN
                                            </label>

                                            @component('frontend.common.input.number')
                                                @slot('text', 'Csn')
                                                @slot('name', 'csn')
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 mt-4">
                                    <table border="1px" width="100%" style="margin-top:10px">
                                        <tr>
                                            <td align="center" style="background-color:beige;padding:10px;" colspan="3"><b>ENTERED IN</b></td>
                                        </tr>
                                        <tr height="80">
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', '')
                                                    @slot('name', '')
                                                    @slot('text', 'A/C Log Book')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </td>
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', '')
                                                    @slot('name', '')
                                                    @slot('text', 'A/C Log Book')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </td>
                                            <td align="center">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', '')
                                                    @slot('name', '')
                                                    @slot('text', 'A/C Log Book')
                                                    @slot('style_div','margin-top:30px')
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
                                            <form method="POST" action="">
                                                {{method_field('PATCH')}}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="progress" value="">
                                                @include('frontend.common.buttons.execute')
                                            </form>
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
<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/type.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/type.js')}}"></script>

{{-- @if(sizeof($jobcard->helpers) == 0) --}}
<script src="{{ asset('js/frontend/functions/fill-combobox/helper.js')}}"></script>
{{-- @endif --}}
<script src="{{ asset('js/frontend/functions/select2/helper.js')}}"></script>
{{-- <!--
    <script>
        $( document ).ready(function() {
        let helpers = {!! $jobcard->helpers !!}
        console.log($('select[name^=helper]').length);
        $('select[name^=helper]').each()
        $('select[name^=helper]').select2().trigger('change');
        // $('select[name^=helper] option[value='+helpers[key].code+']').attr('selected','selected');
        });

    </script> -->
    <script>
        $( document ).ready(function() {
            $('.helper').each( function() {
                console.log( $(this).select2() );
            });
        console.log($('.helper').length);
        });

    </script> --}}



    <script src="{{ asset('js/frontend/journal.js')}}"></script>
    <script src="{{ asset('js/frontend/workpackage/routine/index.js')}}"></script>
@endpush
