<button
    type="{{ $type or 'reset' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'submit' }}"
    class="btn
           btn-{{ $color or 'success' }}
           btn-{{ $size or 'md' }}
               {{ $class or '' }}"
    style="{{ $style or '' }}"
    value="{{ $value or '' }}"
    target="{{ $target or '' }}">

    <span>
        <i class="lfa {{ $icon or 'flaticon-file' }}"></i>
        <span>{{ $text or 'Submit' }}</span>
    </span>
</button>
