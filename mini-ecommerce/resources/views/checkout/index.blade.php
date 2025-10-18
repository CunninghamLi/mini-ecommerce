@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 24px; background: white; box-shadow: 0 0 8px rgba(0,0,0,0.1); border-radius: 10px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Checkout</h1>

    @if(session('error'))
        <div style="margin-bottom: 16px; padding: 10px; background-color: #fee2e2; color: #991b1b; border-radius: 6px;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf

        <div style="margin-bottom: 16px;">
            <label style="font-weight: bold;">Name</label><br>
            <input type="text" name="name" required
                   value="{{ old('name', auth()->user()->name ?? '') }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label style="font-weight: bold;">Email</label><br>
            <input type="email" name="email" required
                   value="{{ old('email', auth()->user()->email ?? '') }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label style="font-weight: bold;">Address</label><br>
            <input type="text" name="address" required
                   value="{{ old('address') }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold;">Payment Type</label><br>
            <select name="payment_type" required
                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="E-transfer">E-transfer</option>
            </select>
        </div>

        <button type="submit"
                style="background-color: green; color: white; font-weight: bold; padding: 10px 20px; border: none; border-radius: 6px;">
            Place Order
        </button>
    </form>
</div>
@endsection
