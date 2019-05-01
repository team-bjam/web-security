<div class="text-input">
    <label for="text_input_{{ $name }}">{{ $label}}</label>
<input id="text_input_{{ $name }}" type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}">
    @if(isset(errors()[$name]))
        <ul>
            @foreach(errors()[$name] as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
