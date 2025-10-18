@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 24px; background: white; box-shadow: 0 0 8px rgba(0,0,0,0.1); border-radius: 10px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 16px;">Your Cart</h1>

    @if(session('success'))
        <div style="margin-bottom: 16px; padding: 10px; background-color: #d1fae5; color: #065f46; border-radius: 6px;">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead style="background-color: #f3f4f6;">
                        <tr>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Product</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Image</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Price</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Quantity</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Subtotal</th>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">{{ $item['name'] }}</td>
                            <td style="padding: 10px;">
                                @if ($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" width="50" style="border-radius: 4px;">
                                @endif
                            </td>
                            <td style="padding: 10px;">${{ number_format($item['price'], 2) }}</td>
                            <td style="padding: 10px;">
                                <input type="number" name="quantities[{{ $id }}]" value="{{ $item['quantity'] }}" min="1"
                                       style="width: 60px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                            </td>
                            <td style="padding: 10px;">${{ number_format($subtotal, 2) }}</td>
                            <td style="padding: 10px;">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button style="background-color: red; color: white; border: none; padding: 6px 12px; font-size: 12px; border-radius: 4px;">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                <h4 style="font-size: 16px; font-weight: bold;">Total: ${{ number_format($total, 2) }}</h4>
                <div style="display: flex; gap: 10px;">
                    <button type="submit"
                            style="background-color: blue; color: white; padding: 10px 16px; border: none; font-weight: bold; border-radius: 6px;">
                        Update Cart
                    </button>
                    <a href="{{ route('checkout.form') }}"
                       style="background-color: green; color: white; padding: 10px 16px; text-decoration: none; font-weight: bold; border-radius: 6px;">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </form>
    @else
        <p style="color: #777;">Your cart is empty.</p>
    @endif
</div>
@endsection
