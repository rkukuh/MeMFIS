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
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        @component('frontend.common.input.checkbox')
                            @slot('id', 'default')
                            @slot('name', 'default')
                            @slot('text', 'TaskCard Performance Factor')
                            @slot('style_div','margin-top:10px')
                            @slot('help_text','If Checked, Project will use TaskCard Performance Factor')
                            @slot('icon', 'fa-info-circle m--font-info')
                            @slot('disabled','disabled')
                        @endcomponent
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
                    @slot('text', $project_workpackage->total_manhours_with_performance_factor)
                @endcomponent

            </div>
        </div>
    </div>
</div>
