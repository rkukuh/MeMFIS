<button
    type="{{ $type or 'button' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'reset' }}"
    value="{{ $value or '' }}"
    class="btn
           btn-{{ $color or 'warning' }}
           btn-{{ $size or 'md' }}
           {{ $class or '' }} reset"
    style="{{ $style or '' }}"
    >

    <span>
        <i class="fa {{ $icon or 'fa-undo' }}"></i>
        <span>{{ $text or 'Reset' }}</span>
    </span>
</button>
