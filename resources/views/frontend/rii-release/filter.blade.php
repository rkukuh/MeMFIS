<div class="advanceFilter">
    <div class="hidden" id="advanceFilter">
        <div class="form-group m-form__group row">

            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    A/C Type
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Applicability Airplane')
                    @slot('id', 'applicability_airplane')
                    @slot('name', 'applicability_airplane')
                    @slot('multiple','multiple')
                    @slot('id_error', 'applicability-airplane')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label class="form-control-label">
                    Skill
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Otr Certification')
                    @slot('id', 'otr_certification')
                    @slot('name', 'otr_certification')
                    @slot('id_error', 'otr-certification')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label class="form-control-label">
                    Date
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Date')
                    @slot('id', 'date')
                    @slot('name', 'date')
                    @slot('id_error', 'date')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label class="form-control-label">
                    JC No
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'JC No')
                    @slot('id', 'jc_no')
                    @slot('name', 'jc_no')
                    @slot('id_error', 'jc_no')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Customer
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Customer')
                    @slot('id', 'customer')
                    @slot('name', 'customer')
                    @slot('id_error', 'customer')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label class="form-control-label">
                    Status RII Release
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Status RII Release')
                    @slot('id', 'status')
                    @slot('name', 'status')
                    @slot('id_error', 'status')
                    @slot('class','filter')
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')

<script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/task-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script>


<script src="{{ asset('js/frontend/rii-release/filter.js') }}"></script>


@endpush