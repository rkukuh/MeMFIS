<label class="m-checkbox m-checkbox--{{ $color or 'primary' }} {{ $class or '' }}">
<input type="checkbox" name="{{ $name or '' }}" style="{{$style or ''}}">{{ $text or '' }} 
<span></span>

</label>
<br>
<span class="m-form__help">
{{ $text or '' }}
</span>