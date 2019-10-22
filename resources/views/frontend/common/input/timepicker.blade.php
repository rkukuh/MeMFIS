<div class="input-group">
    <table style="width:{{ $width or '100%' }};" >
        <tr>
            @if (isset($input_prepend))
                <td style="width:5%;">
                    <div class="input-group-append">
                        <span class="input-group-text">
                                {{ $input_prepend or '' }}
                            </span>
                    </div>
                </td>
            @endif

            <td style="width: 90%;">
                    <input
                    type="text"
                    id="{{ $id or 'm_timepicker_1' }}"
                    name="{{ $name or '' }}"
                    class="form-control {{ $class or '' }}"
                    style="{{ $style or '' }}"
                    value="{{ $value or null }}"
                    placeholder="{{ $placeholder or 'Select time'}}"
                    readonly {{ $disabled or '' }}>
            </td>

            @if (isset($input_append))
                <td style="width: 5%;">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            {{ $input_append or '' }}
                        </span>
                    </div>
                </td>
            @endif
        </tr>
    </table>
</div>
<div class="form-control-feedback text-danger" id="{{ $id_error or '' }}-error"></div>
<div>
    <span class="m-form__help">
        {{ $help_text or '' }}
    </span>
</div>
    
