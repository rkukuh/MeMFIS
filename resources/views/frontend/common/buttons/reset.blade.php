<button
    type="{{ $type or 'button' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'create' }}"
    value="{{ $value or '' }}"
    class="btn
           btn-{{ $color or 'warning' }}
           btn-{{ $size or 'md' }}
           {{ $class or '' }}"
    style="{{ $style or '' }}"
    data-dismiss="{{ $data_dismiss or 'modal' }}">

    <span>
        <i class="la la-{{ $icon or 'mail-reply' }}"></i>
        <span>{{ $text or 'Reset' }}</span>
    </span>
</button>
