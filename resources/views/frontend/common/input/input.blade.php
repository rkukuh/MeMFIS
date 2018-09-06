<input type="{{ $type or 'text' }}" class="form-control  m-input {{ $class or '' }}" name="{{ $name or '' }}" id="{{ $name or '' }}" placeholder="{{ $placeholder or $name }}" style="{{$style or ''}}">
<div class="form-control-feedback text-danger" id="{{ $name or '' }}-error"></div>
<span class="m-form__help">
{{ $text or '' }}
</span>

