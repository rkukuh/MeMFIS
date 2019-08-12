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
                    @slot('id', 'total_mhrs')
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
                @component('frontend.common.label.data-info')
                    @slot('id', 'perfoma')
                    @slot('name', 'perfoma')
                    @slot('text', $project_workpackage->performance_factor)
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
                    @slot('text', $project_workpackage->total_manhours_with_performance_factor)
                @endcomponent

            </div>
        </div>
    </div>
</div>
