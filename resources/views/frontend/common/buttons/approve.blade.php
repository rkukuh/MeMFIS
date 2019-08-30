<button
    type="{{ $type or 'button' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'approve' }}"
    value="{{ $value or '' }}"
    class="btn
           btn-{{ $color or 'success' }}
           btn-{{ $size or 'md' }}
           {{ $class or '' }} clse"
    style="{{ $style or '' }}"
    target="{{ $target or '' }}"
    data-toggle="{{ $data_toggle or 'modal' }}"
    data-target="{{ $data_target or '#' }}"
    {{ $attribute or '' }}
    data-dismiss="{{ $data_dismiss or 'modal' }}">
    <span>
        <i class="fa {{ $icon or 'fa-check' }}"></i>
        <span>{{ $text or 'Approve' }}</span>
    </span>
</button>
