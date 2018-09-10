<textarea class="form-control m-input m-input--air {{ $class or '' }}"  name="{{ $name or '' }}" id="{{ $name or '' }}" style="{{$style or ''}}" rows="{{ $rows or '' }}"  placeholder="{{ $placeholder or $name }}"></textarea>
<div class="form-control-feedback text-danger" id="{{ $name or '' }}-error"></div>
    <span class="m-form__help">
        {{ $text or '' }}
    </span>
