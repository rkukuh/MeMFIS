
<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @foreach($htcrr_infos->skills as $key => $skill)
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    {{ $skill }}
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.label.data-info')
                    @slot('text', $engineers[$key])
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.label.data-info')
                    @slot('text', $htcrr_infos->engineer_qty[$key])
                @endcomponent
            </div>
        </div>
        @endforeach
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    TAT
                </label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.label.data-info')
                        @slot('text', $htcrr_infos->tat)
                    @endcomponent
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
<script src="{{ asset('js/frontend/functions/select2/airframe.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/powerplant.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/radio.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/electrical.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/cabin.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/instrument.js')}}"></script>
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/employee.js')}}"></script> --}}

@endpush
