<input type="{{ $type or 'text' }}"
       class="form-control
              m-input {{ $class or '' }}"
        id="{{ $id_input or '' }}"
        name="{{ $name or '' }}"
        placeholder="{{ $placeholder or '' }}"
        style="{{$style or ''}}"
        {{$editable or ''}}
        value="{{$value or ''}}">

<div class="form-control-feedback text-danger" id="{{ $id_div or '' }}-error"></div>

<span class="m-form__help">
    {{ $text or '' }}
</span>
