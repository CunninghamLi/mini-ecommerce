<table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc;">
    <thead style="background-color: #f3f3f3;">
        <tr>
            <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Category</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Price</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Stock</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Image</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr style="border-top: 1px solid #ccc;">
            <td style="padding: 10px;">{{ $product->name }}</td>
            <td style="padding: 10px;">{{ $product->category }}</td>
            <td style="padding: 10px;">${{ $product->price }}</td>
            <td style="padding: 10px;">{{ $product->stock_quantity }}</td>
            <td style="padding: 10px;">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="50" style="border-radius: 4px;">
                @endif
            </td>
            <td style="padding: 10px;">
                <a href="{{ route('products.edit', $product) }}"
                   style="background-color: orange; color: white; font-size: 14px; padding: 4px 8px; text-decoration: none; border-radius: 4px; display: inline-block;">
                    Edit
                </a>

                <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button
                        style="background-color: red; color: white; font-size: 14px; padding: 4px 8px; border: none; border-radius: 4px;">
                        Delete
                    </button>
                </form>

                <form method="POST" action="{{ route('cart.add', $product->id) }}" style="display:inline;">
                    @csrf
                    <button
                        style="background-color: green; color: white; font-size: 14px; padding: 4px 8px; border: none; border-radius: 4px;">
                        Add to Cart
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="padding: 10px; text-align: center; color: #777;">No products found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
