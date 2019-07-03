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
                                                {{$jobcard->number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Task Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->number}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft_register}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->aircraft_sn}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Inspection Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Company Task No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(isset(json_decode($jobcard->taskcard->additionals)->internal_number))
                                                    {{json_decode($jobcard->taskcard->additionals)->internal_number}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Project No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->quotation->project->code}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Inspection Type
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
                                                @if(sizeof($jobcard->taskcard->skills) == 3)
                                                    ERI
                                                @elseif(sizeof($jobcard->taskcard->skills) == 1)
                                                    {{$jobcard->taskcard->skills[0]->name}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Est. Mhrs
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->estimation_manhour}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Work Area
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if(isset($jobcard->taskcard->workarea->name))
                                                    {{$jobcard->taskcard->workarea->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Sequence
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->sequence}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                @if($jobcard->taskcard->is_rii == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Reference
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->reference}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Title
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->title}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Description
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->Description}}
                                            </td>
                                        </tr>
                                        @if($jobcard->taskcard->helper_quantity != 0)
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Helper
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                {{$jobcard->taskcard->helper_quantity}}
                                            </td>
                                        </tr>
                                        @endif

                                    </table>
                                    @if($jobcard->taskcard->helper_quantity != 0)
                                        <table border="1px" width="100%" style="margin-top:10px">
                                            <tr>
                                                <td width="30%" style="background-color:beige;padding:10px;">
                                                    Helper
                                                </td>
                                                <td width="70%" style="text-align:center">
                                                @if(isset($jobcard->helpers))
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
                                                @endif
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            <form method="POST" action="{{route('frontend.jobcard-engineer.update',$jobcard->uuid)}}">
                                                {{method_field('PATCH')}}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="progress" value="{{$status->uuid}}">
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

@if(sizeof($jobcard->helpers) == 0)
<script src="{{ asset('js/frontend/functions/fill-combobox/helper.js')}}"></script>
@endif
<script src="{{ asset('js/frontend/functions/select2/helper.js')}}"></script>
<!-- 
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
        
    </script>



    <script src="{{ asset('js/frontend/journal.js')}}"></script>
@endpush
