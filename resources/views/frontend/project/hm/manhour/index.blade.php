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
                            @slot('style_div','margin-top:10px')
                            @slot('help_text','If Checked, Project will use TaskCard Performance Factor')
                            @slot('icon', 'fa-info-circle m--font-info')
                        @endcomponent
                    </div>
                    <!-- <div class="col-sm-1 col-md-1 col-lg-1"  style="margin-left:-350px;margin-top:10px">
                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="" data-original-title="If Checked, Project will use TaskCard Performance Factor"></i>
                    </div> -->
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
