<button type="button" 
        name="{{ $name or 'create' }}" 
        value="{{ $value or '' }}" 
        class="btn btn-{{ $color or 'default' }} btn-{{ $size or 'md' }} {{ $class or '' }} " 
        style="{{ $style or '' }}"
        data-dismiss="{{ $data_dismiss = 'modal' }}">
        <span>

        <i class="la la-close"></i>

    

<span>{{ $text or 'Close' }}</span>
</span>                                
</button>
