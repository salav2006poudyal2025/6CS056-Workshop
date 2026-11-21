@props([
    'action',
    'label' => 'Delete',
])

<form method="POST" action="{{ $action }}" class="delete-form">
    @csrf
    @method('DELETE')
    <button
        type="submit"
        class="button button-danger"
        onclick="return confirm('Are you sure you want to delete this item?')"
    >{{ $label }}</button>
</form>
