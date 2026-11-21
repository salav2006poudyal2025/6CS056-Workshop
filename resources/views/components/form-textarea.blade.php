@props([
    'name',
    'label',
    'value' => null,
    'rows' => 4,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>
