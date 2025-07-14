<!DOCTYPE html>
<html>
<head>
    <title>Wishlist Item Updated</title>
</head>
<body>
    <h2>Hello!</h2>
    <p>A wishlist item has been updated:</p>

    <ul>
        <li><strong>Name:</strong> {{ $item->name }}</li>
        <li><strong>Priority:</strong> {{ $item->priority }}</li>
        @if($item->price)
            <li><strong>Price:</strong> Rp {{ number_format($item->price, 0, ',', '.') }}</li>
        @endif
        <li><strong>Bought:</strong> {{ $item->bought ? 'Yes' : 'No' }}</li>
        @if($item->link)
            <li><strong>Link:</strong> <a href="{{ $item->link }}">{{ $item->link }}</a></li>
        @endif
        @if($item->description)
            <li><strong>Description:</strong> {{ $item->description }}</li>
        @endif
    </ul>
    <p>Last Updated: {{ $item->updated_at->format('M d, Y H:i') }}</p>

    <p>View your wishlist at: <a href="{{ url('/') }}">{{ url('/') }}</a></p>
</body>
</html>