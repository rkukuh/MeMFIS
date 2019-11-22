<select class="form-control m-select2 edit-select2 {{ $class or '' }}" name="{{ $name or '' }}" style="{{ $style or 'width:100%' }}" {{ $multiple or '' }} {{ $disabled or '' }} {{ $required or '' }} >
    <option value="">
        &mdash; Select {{ $OptionText or 'Option'}} &mdash;
    </option>
    @if($options)
        @foreach($options  as $option)
            <option value="{{ $option->id}}" @if($option->id == $value) selected @endif >
                {{ $option->name}}
            </option>
        @endforeach
    @endif
</select>
