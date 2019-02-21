<table>
    <tr>
        <td>
            <label class="form-control-label">
                Job Card No @include('frontend.common.label.required')
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
                Task Card No @include('frontend.common.label.required')
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
                A/C Type @include('frontend.common.label.required')
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
                A/C Serial Number @include('frontend.common.label.required')
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
