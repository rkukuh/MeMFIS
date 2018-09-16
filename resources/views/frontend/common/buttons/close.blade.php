<button
    type="{{ $type or 'button' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'create' }}"
    value="{{ $value or '' }}"
    class="btn
           btn-{{ $color or 'default' }}
           btn-{{ $size or 'md' }}
           {{ $class or '' }}"
    style="{{ $style or '' }}"
    data-dismiss="{{ $data_dismiss or 'modal' }}">

    <span>
        <i class="la la-{{ $icon or 'close' }}"></i>
        <span>{{ $text or 'Close' }}</span>
    </span>
</button>
