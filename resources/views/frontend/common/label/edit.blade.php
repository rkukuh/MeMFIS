<span
    class="m-badge
           {{ $color or '' }}
           {{ $length or 'm-badge--wide'}}
           m-badge--rounded"
    style="{{ $style or '' }}"
>

    <i class="la {{ $icon or 'la-file-o' }}"></i>
    <span>{{ $text or 'Edit' }}</span>
</span>

@push('header-scripts')
    <style>
        .m-badge {
            margin-right: 5px;
            font-size: 1rem;
        }
    </style>
@endpush
