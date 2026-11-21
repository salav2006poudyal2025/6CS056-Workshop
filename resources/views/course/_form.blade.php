@props([
    'course' => null,
])

<x-form-input
    name="name"
    label="Name"
    :value="$course?->name"
    required
/>

<x-form-textarea
    name="description"
    label="Description"
    :value="$course?->description"
    :rows="5"
/>

<x-form-input
    name="duration"
    label="Duration (days)"
    type="number"
    :value="$course?->duration"
    required
/>

<x-form-input
    name="fee"
    label="Fee"
    type="number"
    :value="$course?->fee"
    required
/>

<div class="form-group">
    <label for="difficulty">Difficulty</label>
    <select id="difficulty" name="difficulty" required>
        <option value="">Select difficulty</option>
        @foreach (['Easy', 'Medium', 'Hard'] as $difficulty)
            <option
                value="{{ $difficulty }}"
                @selected(old('difficulty', $course?->difficulty) === $difficulty)
            >{{ $difficulty }}</option>
        @endforeach
    </select>
    @error('difficulty')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group checkbox-group">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input
            type="checkbox"
            name="is_active"
            value="1"
            @checked(old('is_active', $course?->is_active ?? true))
        >
        Active
    </label>
    @error('is_active')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
