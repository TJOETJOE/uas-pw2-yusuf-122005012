@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Wishlist Item</h2>

    <form action="{{ route('wishlist.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description (optional)</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (optional)</label>
            <input type="number" name="price" class="form-control" step="0.01">
        </div>

        <div class="mb-3">
            <label class="form-label">Link to Store (optional)</label>
            <input type="url" name="link" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-select" required>
                <option value="Low">Low</option>
                <option value="Medium" selected>Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="bought" id="bought">
            <label class="form-check-label" for="bought">Mark as Bought</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
