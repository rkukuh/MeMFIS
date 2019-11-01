@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    GSE/Tool Returned
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
                        <a href="{{ route('frontend.gse.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                GSE/Tool Returned
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
                                    GSE/Tool Returned
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
                                                Date @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'date')
                                                @slot('text', 'Date')
                                                @slot('name', 'date')
                                                @slot('value',  $groundSupportEquiptment->returned_at)
                                                @slot('id_error','date')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Ref Document No. @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $groundSupportEquiptment->request->number)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Project No.
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('id', 'project_number')
                                                @slot('text', '-')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Storage @include('frontend.common.label.required')
                                            </label>

                                            <select id="item_storage_id" name="item_storage_id" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Storage &mdash;
                                                </option>

                                                @foreach ($storages as $storage)
                                                    <option value="{{ $storage->id }}"
                                                        @if ($storage->id == $groundSupportEquiptment->storage_id) selected @endif>
                                                        {{ $storage->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Type
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'actype')
                                                        @slot('text', '-')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Reg
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'acreg')
                                                        @slot('text', '-')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Returned By @include('frontend.common.label.required')
                                            </label>

                                            <select id="employee" name="employee" class="form-control m-select2" style="width:100%">
                                                <option value="">
                                                    &mdash; Select a Returned By &mdash;
                                                </option>

                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->uuid }}"
                                                        @if ($employee->uuid == $employee_uuid) selected @endif>
                                                        {{ $employee->first_name." ".$employee->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Section Code
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Section Code')
                                                @slot('id', 'section')
                                                @slot('name', 'section')
                                                @slot('value', $groundSupportEquiptment->section)
                                                @slot('id_error', 'section')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Remark
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'note')
                                                @slot('name', 'note')
                                                @slot('value', $groundSupportEquiptment->note))
                                                @slot('text', 'Note')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="m-portlet">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <span class="m-portlet__head-icon m--hide">
                                                                <i class="la la-gear"></i>
                                                            </span>

                                                            @include('frontend.common.label.datalist')

                                                            <h3 class="m-portlet__head-text">
                                                                Tool
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
                                                                            <div class="m-input-icon m-input-icon--left">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                                    @component('frontend.common.buttons.create-new')
                                                                        @slot('text', 'Item')
                                                                        @slot('data_target', '#modal_gse_item_add')
                                                                    @endcomponent

                                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @include('frontend.gse.modal')
                                                        @include('frontend.gse.modal-edit')
                                                        <div class="gse_tool_returned_datatable" id="gse_tool_returned_datatable"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type','button')
                                                        @slot('id', 'update-gse')
                                                        @slot('class', 'update-gse')
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
        let gse_uuid = '{{$groundSupportEquiptment->uuid}}';
    </script>
    <script src="{{ asset('js/frontend/gse/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/employee.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
@endpush
