<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Total Manhours
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.label.data-info')
                    @slot('id', 'total_mhrs')
                    @slot('text', number_format($total_mhrs, 2, ",","."))
                    @slot('value', $total_mhrs)
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
    <div class="col-sm-12 col-md-12 col-lg-12 footer-manhour">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-manhour')
                    @slot('class', 'add-manhour')
                @endcomponent

                @include('frontend.common.buttons.reset')

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
            document.getElementById('total').innerHTML = numberFormat.format(total.toFixed(2));
            let performa = 0;
        });

        $("#default").change(function() {
            if(this.checked) {
                let total  = ($('#default').val()*total_mhrs);
                performa = $('#default').val();
                document.getElementById('perfoma').value = $('#default').val();
                $("#perfoma").prop('disabled', true);
                document.getElementById('total').innerHTML = numberFormat.format(total.toFixed(2));
            }
            else{
                let total  = (1.6*total_mhrs);
                performa = 1.6;
                document.getElementById('perfoma').value = 1.6;
                $("#perfoma").prop('disabled', false);
                document.getElementById('total').innerHTML = numberFormat.format(total.toFixed(2));
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
