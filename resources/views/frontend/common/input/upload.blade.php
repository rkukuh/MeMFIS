<div class="custom-file">
    <input
        type="file"
        id="{{ $id or '' }}"
        name="{{ $name or '' }}"
        class="custom-file-input
               {{ $class or '' }}"
        style="{{$style or ''}}">

    <label class="custom-file-label" for="{{ $for or '' }}">
        {{ $text or '' }}
    </label>
</div>
