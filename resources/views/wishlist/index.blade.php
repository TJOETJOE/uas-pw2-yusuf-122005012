@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>
        <i class="fas fa-list-alt me-2 text-primary"></i>
        My Wishlist
    </h1>

    <a href="{{ route('wishlist.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Add Item
    </a>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <select name="priority" class="form-select">
                <option value="">All Priorities</option>
                <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>Penting Nich</option>
                <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Nanti Dulu</option>
                <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Kapan-Kapan</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="bought" class="form-select">
                <option value="">All Statuses</option>
                <option value="0" {{ request('bought') === '0' ? 'selected' : '' }}>Sebentar Lagi</option>
                <option value="1" {{ request('bought') === '1' ? 'selected' : '' }}>Kebeli</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="">Sort by</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-outline-primary w-100">
                <i class="fas fa-filter me-1"></i> Apply
            </button>
        </div>
    </form>

    @if($items->isEmpty())
        <p class="text-muted"><i class="fas fa-info-circle me-1"></i> No items found.</p>
    @endif

    @foreach($items as $item)
        <small class="text-muted">
            Added {{ $item->created_at->diffForHumans() }}
        </small>

        <div class="card mb-2">
            <div class="card-body">
                <h5>
                    <i class="fas fa-gift me-2 text-secondary"></i>
                    {{ $item->name }}
                    <span class="badge bg-{{ $item->priority == 'High' ? 'danger' : ($item->priority == 'Medium' ? 'warning' : 'secondary') }}">
                        {{ $item->priority }}
                    </span>
                </h5>

                @if($item->price)
                    <p>
                        <i class="fas fa-money-bill-wave me-1"></i>
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </p>
                @endif

                @if($item->description)
                    <p>
                        <i class="fas fa-align-left me-1 text-muted"></i>
                        {{ $item->description }}
                    </p>
                @endif

                @if($item->link)
                    <p>
                        <i class="fas fa-link me-1"></i>
                        <a href="{{ $item->link }}" target="_blank">View Item</a>
                    </p>
                @endif

                <p>
                    <strong><i class="fas fa-check-circle me-1"></i>Status:</strong>
                    {{ $item->bought ? 'Kebeli' : 'Sebentar Lagi' }}
                </p>

                <div class="d-flex gap-2">
                    <a href="{{ route('wishlist.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
