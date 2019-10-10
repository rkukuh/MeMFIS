<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Total Manhours
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @if(isset($htcrr_infos->total_manhours))
                    @component('frontend.common.label.data-info')
                        @slot('id', 'total_mhrs')
                        @slot('name', 'total_mhrs')
                        @slot('text', $htcrr_infos->total_manhours)
                    @endcomponent
                @else
                    @include('frontend.common.label.data-info-nodata')
                @endif
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Performance Factor
                </label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @if(isset($htcrr_infos->performance_factor))
                    @component('frontend.common.label.data-info')
                        @slot('id', 'perfoma')
                        @slot('name', 'perfoma')
                        @slot('text', $htcrr_infos->performance_factor)
                    @endcomponent
                @else
                    @include('frontend.common.label.data-info-nodata')
                @endif
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
                @if(isset($htcrr_infos->total_manhours_with_performance_factor))
                    @component('frontend.common.label.data-info')
                        @slot('id', 'total')
                        @slot('name', 'total')
                        @slot('text', $htcrr_infos->total_manhours_with_performance_factor)
                    @endcomponent
                @else
                    @include('frontend.common.label.data-info-nodata')
                @endif
            </div>
        </div>
    </div>
</div>
