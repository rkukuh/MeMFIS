<button
    id="{{ $id or '' }}"
    type="{{ $type or 'button' }}"
    name="{{ $name or 'create' }}"
    value="{{ $value or '' }}"
    class="btn btn-primary
           btn-{{ $color or 'primary' }}
           btn-{{ $size or 'md' }}
               {{ $class or '' }}"
    style="{{ $style or '' }}"
    target="{{ $target or '' }}"
    data-toggle="{{ $data_toggle or 'modal' }}"
    data-target="{{ $data_target or '#' }}"
    {{ $attribute or '' }}
>

    <span>
        <i class="la la-{{ $icon or 'plus'}}"></i>

        <span>{{ $text or 'Add' }}</span>
    </span>
</button>
