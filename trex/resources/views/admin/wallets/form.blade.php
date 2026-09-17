<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
    @method('PUT')
    @endif

    <div class="form-group">
        <label for="type">Wallet Type</label>
        <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $wallet->type ?? '') }}"
            required>
    </div>

    <!-- Add other fields here -->

    <button type="submit" class="btn btn-primary">Save</button>
</form>