<label
    class="m-checkbox
           m-checkbox--{{ $color or 'primary' }}
           {{ $class or '' }}">

    <input
        type="checkbox"
        id="{{ $id or ''}}"
        name="{{ $name or '' }}"
        class="{{ $class or ''}}"
        style="{{$style or ''}}"
        value="{{$value or ''}}"
        {{$editable or ''}}>

    {{$text or '' }}

    <span></span>
</label>

<br>

<span class="m-form__help">
    {{ $help_text or '' }}
</span>
