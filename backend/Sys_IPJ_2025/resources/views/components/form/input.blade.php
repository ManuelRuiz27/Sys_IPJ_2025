@props(['label', 'name', 'type' => 'text', 'value' => null])
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
