<label
        class="m-checkbox
               m-checkbox--{{ $color or 'primary' }}
        {{ $class or '' }}">

    <input
            type="checkbox"
            id="{{ $id or ''}}"
            name="{{ $name or '' }}"
            class="{{ $class or ''}}"
            style="{{ $style or ''}}"
            value="{{ $value or ''}}"
            onclick="{{ $onclik or ''}}"
            {{ $checked or ''}}
            {{ $disabled or ''}}
    >

    {{ $text or '' }}

    <span></span>
</label>