<{{ $html_tag or 'small' }}
    class="text-{{ $color or 'muted' }}"
    style="font-weight: {{ $font_weight or 'normal' }};
                        {{ $style or '' }};">

    {{ $text or '(optional)' }}

</{{ $html_tag or 'small' }}>
