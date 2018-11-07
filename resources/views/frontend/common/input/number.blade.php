<div class="input-group">
    <table>
        <tr>
            <td> 
                @if (isset($input_prepend))
                    <div class="input-group-append">
                        <span class="input-group-text">
                            {{ $input_prepend or '' }}
                        </span>
                    </div>
                @endif
            </td>
            <td>
                <input
                    type="number"
                    id="{{ $id or $name }}"
                    name="{{ $name or '' }}"
                    class="form-control m-input text-right
                           {{ $class or '' }}"
                    style="{{ $style or ''}}"
                    value="{{ $value or ''}}"
                    placeholder="{{ $placeholder or '' }}"
                    {{ $disabled or ''}}
                >
            </td>
            <td>
                @if (isset($input_append))
                    <div class="input-group-append">
                        <span class="input-group-text">
                            {{ $input_append or '' }}
                        </span>
                    </div>
                @endif
            </td>
        </tr>
    </table>
</div>
    <div class="form-control-feedback text-danger" id="{{ $id_error or '' }}-error"></div>

    <span class="m-form__help">
        {{ $help_text or '' }}
    </span>
</div>
