<button
    id="{{ $id or '' }}"
    type="{{ $type or 'submit' }}"
    name="{{ $name or 'submit' }}"
    value="{{ $value or '' }}"
    class="btn
           btn-{{ $color or 'warning' }}
           btn-{{ $size or 'md' }}
               {{ $class or '' }} add"
    style="{{ $style or '' }}"
    target="{{ $target or '' }}"
>

    <span>
        <i class="fa {{ $icon or 'fa-pause' }}"></i>

        <span>{{ $text or 'Pause/Pending' }}</span>
    </span>
</button>
