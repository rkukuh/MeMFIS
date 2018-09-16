<button type="button"
        name="{{ $name or 'create' }}"
        value="{{ $value or '' }}"
        target="{{ $target or '' }}"
        class="btn m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air
               btn-{{ $color or 'default' }}
               btn-{{ $size or 'md' }}
               {{ $class or '' }}"
        style="{{ $style or '' }}"
        data-toggle="{{ $data_toggle = 'modal' }}"
        data-target="{{ $data_target or '#' }}">

        <span>
            <i class="la la-{{ $icon or 'plus'}}"></i>
            <span>{{ $text or 'Add' }}</span>
        </span>
</button>
