<a
    href="{{ $href or '' }}"
    id={{ $id or '' }}
    name={{ $name or '' }}
    class="btn m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air
            btn-{{ $color or 'default' }}
            btn-{{ $size or 'md' }}
                {{ $class or '' }}"
    style="{{ $style or '' }}">

    <span>
        <i class="la la-{{ $icon or 'plus'}}"></i>
        {{ $text or 'Add' }}
    </span>

</a>
