<form action="{{ $href }}" method="post" id="deleteForm-{{ $id }}" class="d-inline">
    @csrf
    @method('DELETE')

    <button type="button" class="btn mb-2  btn-danger" onclick="confirmDelete({{ $id }})">
        {{ __('keywords.delete_button') }}
    </button>
</form>
