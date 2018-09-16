<a class="btn
          btn-{{ $color or 'default' }}
          btn-{{ $size or 'md' }}
          {{ $class or '' }}"
    href="{{ $href or '' }}"
    style="{{ $style or '' }}">

    <span>
        <i class="la la-{{ $icon or 'undo' }}"></i>
    </span>

    {{ $text or 'Back' }}
</a>
