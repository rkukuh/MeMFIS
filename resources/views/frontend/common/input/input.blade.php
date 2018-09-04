<input type="{{ $type or 'text' }}" class="form-control  m-input {{ $class or '' }}" name="{{ $name or '' }}" id="{{ $name or '' }}" placeholder="{{ $name or '' }}">
<div class="form-control-feedback text-danger" id="{{ $name or '' }}-error"></div>
<span class="m-form__help">
{{ $text or '' }}
</span>

