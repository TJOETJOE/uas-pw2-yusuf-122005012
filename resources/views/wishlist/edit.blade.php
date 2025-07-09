@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Wishlist Item</h2>

    <form action="{{ route('wishlist.update', $wishlist->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ $wishlist->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $wishlist->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $wishlist->price }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" name="link" class="form-control" value="{{ $wishlist->link }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-select">
                <option value="Low" {{ $wishlist->priority == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $wishlist->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $wishlist->priority == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="bought" id="bought"
                {{ $wishlist->bought ? 'checked' : '' }}>
            <label class="form-check-label" for="bought">Mark as Bought</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
