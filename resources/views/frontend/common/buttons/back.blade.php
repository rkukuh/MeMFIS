<a
    href="{{ $href or '' }}"
    id={{ $id or '' }}
    name={{ $name or '' }}
    class="btn
           btn-{{ $color or 'secondary' }}
           btn-{{ $size or 'md' }}
           {{ $class or '' }}"
    style="{{ $style or '' }}">

    <span>
        <i class="la la-{{ $icon or 'undo' }}"></i>
    </span>

    {{ $text or 'Back' }}
</a>
