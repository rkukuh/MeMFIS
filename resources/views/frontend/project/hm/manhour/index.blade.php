<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Total Mhrs (Based on MPD)
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.label.data-info')
                    @slot('text', $total_mhrs)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Performance Factor
                </label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'perfoma')
                    @slot('name', 'perfoma')
                    @slot('value', '1.6')
                @endcomponent
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        @component('frontend.common.input.checkbox')
                            @slot('id', 'default')
                            @slot('name', 'default')
                            @slot('value', $total_pfrm_factor)
                            @slot('text', 'TaskCard Performance Factor')
                            {{-- @slot('checked', 'checked') --}}
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1"  style="margin-left:-200px">
                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="" data-original-title="If Checked, Project will use TaskCard Performance Factor"></i>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group m-form__group row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        Total Mhrs (Included Performance Factor)
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    @component('frontend.common.label.data-info')
                        @slot('id', 'total')
                    @endcomponent

                </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <table>
            <tr>
                <td>
                    <label class="form-control-label">
                        Inspector @include('frontend.common.label.required')
                    </label>
                </td>
                <td>
                    @component('frontend.common.input.number')
                        @slot('text', 'inspector')
                        @slot('id', 'inspector')
                        @slot('input_append', '%')
                        @slot('name', 'inspector')
                        @slot('id_error', 'inspector')
                    @endcomponent
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-control-label">
                        Engineer @include('frontend.common.label.required')
                    </label>
                </td>
                <td>
                    @component('frontend.common.input.number')
                        @slot('text', 'engineer')
                        @slot('id', 'engineer')
                        @slot('input_append', '%')
                        @slot('name', 'engineer')
                        @slot('id_error', 'engineer')
                    @endcomponent
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-control-label">
                        Mechanic @include('frontend.common.label.required')
                    </label>
                </td>
                <td>
                    @component('frontend.common.input.number')
                        @slot('text', 'mechanic')
                        @slot('id', 'mechanic')
                        @slot('input_append', '%')
                        @slot('name', 'mechanic')
                        @slot('id_error', 'mechanic')
                    @endcomponent
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-control-label">
                        Supporting @include('frontend.common.label.required')
                    </label>
                </td>
                <td>
                    @component('frontend.common.input.number')
                        @slot('text', 'supporting')
                        @slot('id', 'supporting')
                        @slot('input_append', '%')
                        @slot('name', 'supporting')
                        @slot('id_error', 'supporting')
                    @endcomponent
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-control-label">
                        Total
                    </label>
                </td>
                <td>
                    @component('frontend.common.input.number')
                        @slot('text', 'supporting')
                        @slot('id', 'supporting')
                        @slot('input_append', '%')
                        @slot('name', 'supporting')
                        @slot('value', '100')
                        @slot('disabled', 'disabled')
                        @slot('id_error', 'supporting')
                    @endcomponent
                </td>
            </tr>
        </table>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-project')
                    @slot('class', 'add-project')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @component('frontend.common.buttons.back')
                    @slot('href', route('frontend.workpackage.index'))
                @endcomponent
            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
    <script>
        let total_mhrs = '{{ $total_mhrs }}';
    </script>

    <script>
        $(document).ready(function () {
            let project_prfm_factor = $('#perfoma').val();
            let total  = project_prfm_factor*total_mhrs;
            document.getElementById('total').innerHTML = total.toFixed(2);

        });
        $("#default").change(function() {
            if(this.checked) {
                let total  = ($('#default').val()*total_mhrs);
                document.getElementById('perfoma').value = $('#default').val();
                $("#perfoma").prop('disabled', true);
                document.getElementById('total').innerHTML = total.toFixed(2);
            }
            else{
                let total  = (1.6*total_mhrs);
                document.getElementById('perfoma').value = 1.6;
                $("#perfoma").prop('disabled', false);
                document.getElementById('total').innerHTML = total.toFixed(2);
            }
        });

        const $source = document.querySelector('#perfoma');
        const $result = document.querySelector('#total');

        const typeHandler = function(e) {
        $result.innerHTML = (e.target.value*total_mhrs).toFixed(2);
        }

        $source.addEventListener('input', typeHandler) // register for oninput
        $source.addEventListener('propertychange', typeHandler) // for IE8

    </script>
@endpush
