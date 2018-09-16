<label
    class="m-radio m-radio--state-{{ $color or 'primary' }}
           {{ $label_class or '' }}"
    style="{{ $label_style or '' }}">

    <input
        type="radio"
        id="{{ $id or ''}}"
        name="{{ $name or '' }}"
        class="{{ $class or ''}}"
        style="{{ $style or ''}}"
        value="{{ $value or '' }}">

    {{ $text or '' }}

    <span></span>
</label>
