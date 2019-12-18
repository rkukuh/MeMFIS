@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Propose Leave
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
                        <a href="{{ route('frontend.leave.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Propose Leave
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

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Propose Leave
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
                                            @hasanyrole('hrd|admin')
                                                <label class="form-control-label">
                                                    Propose Leave To @include('frontend.common.label.optional')
                                                </label>
                                            
                                                @include('frontend.common.employee.index')
                                            @endrole
                                            @hasanyrole('employee')
                                                <label class="form-control-label">
                                                    Employee Name 
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('id', 'employee')
                                                    @slot('text', 'generate from user login')
                                                @endcomponent
                                            @endrole
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Leave Types @include('frontend.common.label.required')
                                            </label>
                                            
                                            @component('frontend.common.input.edit-select2')
                                                @slot('name', 'leave_type')
                                                @slot('options', $types)
                                                @slot('value', $leave->leaveType->uuid)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 mt-5">
                                           <span id="note_remaining" class="text-danger mt-5">10 Days Remaining</span>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Date Start @include('frontend.common.label.required')
                                            </label>
                                         
                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'start_date')
                                                @slot('name', 'start_date')
                                                @slot('value', $leave->start_date)
                                                @slot('id_error','start_date')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Date End @include('frontend.common.label.required')
                                            </label>
                                         
                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'exp_date')
                                                @slot('text', 'Date End')
                                                @slot('name', 'exp_date')
                                                @slot('value', $leave->end_date)
                                                @slot('id_error','exp_date')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('value', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'edit-propose-leave')
                                                        @slot('class', 'edit-propose-leave')
                                                        @slot('text', 'Update Leave Proposal')
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
    <script> 
        let url = "{{ route('frontend.leave.update', ['leave' => $leave->uuid]) }}"
    </script>
    <script src="{{ asset('js/frontend/propose-leave/propose-leave/edit.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/edit-select2.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/expired-date.js')}}"></script>
@endpush
