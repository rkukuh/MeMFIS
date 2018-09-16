<a  href="{{ $href or '' }}"
    style="{{ $style or '' }}"
    class="btn
          btn-{{ $color or 'default' }}
          btn-{{ $size or 'md' }}
          {{ $class or '' }}">

    <span>
        <i class="la la-{{ $icon or 'undo' }}"></i>
    </span>

    {{ $text or 'Back' }}
</a>
