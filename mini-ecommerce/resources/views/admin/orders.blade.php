@extends('layouts.app')

@section('content')
<div style="max-width: 1100px; margin: 0 auto; padding: 24px; background: white; box-shadow: 0 0 8px rgba(0,0,0,0.1); border-radius: 10px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">All Orders</h1>

    @if($orders->count())
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Customer</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Email</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Address</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Payment</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Total</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Items</th>
                        <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr style="border-top: 1px solid #eee;">
                        <td style="padding: 10px;">{{ $order->name }}</td>
                        <td style="padding: 10px;">{{ $order->email }}</td>
                        <td style="padding: 10px;">{{ $order->address }}</td>
                        <td style="padding: 10px;">{{ $order->payment_type }}</td>
                        <td style="padding: 10px;">${{ number_format($order->total, 2) }}</td>
                        <td style="padding: 10px;">
                            <ul style="padding-left: 20px; margin: 0;">
                                @foreach(json_decode($order->items, true) as $item)
                                    <li>{{ $item['name'] }} x {{ $item['quantity'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td style="padding: 10px;">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color: #777;">No orders have been placed yet.</p>
    @endif
</div>
@endsection
