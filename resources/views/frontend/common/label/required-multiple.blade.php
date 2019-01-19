<{{ $html_tag or 'span' }}
    class="{{$class or ''}}"
    style="font-weight: {{ $font_weight or 'bold' }};
    color:{{ $color or 'red' }};">

    {{ $text or '*' }}

    <small class="text-muted" style="font-weight: normal;">
        <em>(multiple)</em>
    </small>

</{{ $html_tag or 'span' }}>
