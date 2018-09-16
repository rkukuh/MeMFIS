<input
    type="{{ $type or 'text' }}"
    id="{{ $id or '' }}"
    name="{{ $name or '' }}"
    class="form-control m-input
           {{ $class or '' }}"
    style="{{$style or ''}}"
    placeholder="{{ $placeholder or '' }}"
    value="{{$value or ''}}"
    {{$editable or ''}}>

<div class="form-control-feedback text-danger" id="{{ $id_error or '' }}-error"></div>

<span class="m-form__help">
    {{ $text or '' }}
</span>
