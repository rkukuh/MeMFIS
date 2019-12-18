@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Release To Service
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

                            @include('frontend.common.label.create-new')

                            <h3 class="m-portlet__head-text">
                                Release To Service
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="taskcardform" name="taskcardform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Project No @include('frontend.common.label.required')
                                        </label>

                                        <select name="project" id="project" class="form-control m-select2" style="width:100%" disabled>
                                            @foreach ($projects as $project)
                                            <option value="{{$project->id}}" @if($project->id == $rts->project->id) selected @endif>{{$project->code}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C Type @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $rts->project->aircraft->name)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Date @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.datepicker')
                                            @slot('id', 'date')
                                            @slot('text', 'Date')
                                            @slot('name', 'date')
                                            @slot('id_error', 'date')
                                            @slot('value', $rts->created_at)
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C Reg @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $rts->project->aircraft_register)
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Work Performed @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $rts->project->aircraft_sn)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.input.text')
                                            @slot('id', 'work_performed')
                                            @slot('text', 'Work Performed')
                                            @slot('name', 'work_performed')
                                            @slot('id_error', 'work_performed')
                                            @slot('placeholder','Optional')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.input.text')
                                            @slot('id', 'work_performed')
                                            @slot('text', 'Work Performed')
                                            @slot('name', 'work_performed')
                                            @slot('id_error', 'work_performed')
                                            @slot('placeholder','Optional')
                                            @slot('value', $rts->work_performed)
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Work Data / CAMP Reference @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '5')
                                            @slot('id', 'work_data')
                                            @slot('name', 'work_data')
                                            @slot('text', 'Work Data')
                                            @slot('value', $rts->work_data)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Exception(s) @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '5')
                                            @slot('id', 'exceptions')
                                            @slot('name', 'exceptions')
                                            @slot('text', 'exceptions')
                                            @slot('value', $rts->exception)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Approval @include('frontend.common.label.optional')
                                        </label>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'DGCA')
                                                    @slot('name', 'approval[]')
                                                    @slot('text', 'Indonesia DGCA No : 145D-093')
                                                    @slot('value', 'Indonesia DGCA No : 145D-093')
                                                    @slot('style_div','margin-top:30px')
                                                    @slot('checked', 'checked')
                                                @endcomponent
                                            </div>
                                            <!-- <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                        @slot('id', 'FAA')
                                                        @slot('name', 'approval[]')
                                                        @slot('text', 'Federal Aviation Administration - FAA')
                                                        @slot('value', 'Federal Aviation Administration - FAA')
                                                        @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                        @slot('id', 'EASA')
                                                        @slot('name', 'approval[]')
                                                        @slot('text', 'European Union Aviation Safety Agency - EASA')
                                                        @slot('value', 'European Union Aviation Safety Agency - EASA')
                                                        @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.save-and-print')
                                                    @slot('type','button')
                                                    @slot('id', 'add-rts')
                                                    @slot('class', 'add-rts')
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

@push('header-scripts')

@endpush

@push('footer-scripts')
<script src="{{ asset('js/frontend/rts/create.js') }}"></script>
<script src="{{ asset('js/frontend/rts/form-reset.js') }}"></script>

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

<script>


</script>

@endpush