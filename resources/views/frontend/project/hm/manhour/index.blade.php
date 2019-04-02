<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Total Mhrs (Based on MPD)
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.text')
                    @slot('id', 'mhrs')
                    @slot('name', 'mhrs')
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
                    @slot('id', 'mhrs')
                    @slot('name', 'mhrs')
                @endcomponent
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        @component('frontend.common.input.checkbox')
                            @slot('id', 'default')
                            @slot('name', 'default')
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
</div>

