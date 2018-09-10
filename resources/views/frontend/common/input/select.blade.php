

<select class="form-control m-select2 {{ $class or '' }}" id="{{ $id or '' }}" name="{{ $name or '' }}" style="{{ $style or '' }}">
    <option value="">
        --- Select{{ $text or '' }}---
    </option>
</select>
<div class="form-control-feedback text-danger" id="{{ $name or '' }}-error"></div>
<span class="m-form__help">
    {{ $label or '' }}
</span>
