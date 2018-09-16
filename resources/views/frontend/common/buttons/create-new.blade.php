<button
    type="{{ $type or 'button' }}"
    id="{{ $id or '' }}"
    name="{{ $name or 'create' }}"
    value="{{ $value or '' }}"
    class="btn m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air
           btn-{{ $color or 'default' }}
           btn-{{ $size or 'md' }}
               {{ $class or '' }}"
    style="{{ $style or '' }}"
    target="{{ $target or '' }}"
    data-toggle="{{ $data_toggle or 'modal' }}"
    data-target="{{ $data_target or '#' }}">

    <span>
        <i class="la la-{{ $icon or 'plus'}}"></i>
        <span>{{ $text or 'Add' }}</span>
    </span>
</button>
