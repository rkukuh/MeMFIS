<button type="reset"
        name="{{ $name or 'submit' }}"
        value="{{ $value or '' }}"
        target="{{ $target or '' }}"
        class="btn
               btn-{{ $color or 'default' }}
               btn-{{ $size or 'md' }}
               {{ $class or '' }}"
        style="{{ $style or '' }}">

        <span>
            <i class="lfa {{ $icon or 'flaticon-file' }}"></i>
            <span>{{ $text or 'Submit' }}</span>
        </span>
</button>
