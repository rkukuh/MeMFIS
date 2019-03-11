<div class="px-4 pb-4">
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
    </table>
</div>