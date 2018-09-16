<label class="m-radio
              m-radio--state-{{ $color or 'primary' }}
              {{ $class or '' }}
        {{ $style or '' }}">

    <input type="radio"
           name="{{ $name or '' }}"
           value="{{ $value or '' }}"
           style="{{$style or ''}}">

    {{ $text or '' }}

    <span></span>
</label>
