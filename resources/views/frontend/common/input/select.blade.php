<select
    id="{{ $id or '' }}"
    name="{{ $name or '' }}"
    class="form-control m-select2
           {{ $class or '' }}"
    style="{{ $style or '' }}">

    <option value="">
        --- Select {{ $entity or '' }} ---
    </option>
</select>

<div class="form-control-feedback text-danger" id="{{ $id_error or '' }}-error"></div>

<span class="m-form__help">
    {{ $help_text or '' }}
</span>
