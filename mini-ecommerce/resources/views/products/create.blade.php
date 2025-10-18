@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 24px; background: white; box-shadow: 0 0 8px rgba(0,0,0,0.1); border-radius: 10px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Add New Product</h1>

    @if ($errors->any())
        <div style="margin-bottom: 16px; padding: 12px; background-color: #fee2e2; color: #991b1b; border-radius: 6px;">
            <ul style="margin-left: 20px; padding-left: 10px;">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 16px;">
            <label><strong>Name:</strong></label><br>
            <input type="text" name="name" value="{{ old('name') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label><strong>Category:</strong></label><br>
            <input type="text" name="category" value="{{ old('category') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label><strong>Description:</strong></label><br>
            <textarea name="description" required
                      style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom: 16px;">
            <label><strong>Price:</strong></label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label><strong>Stock Quantity:</strong></label><br>
            <input type="number" name="stock_quantity" value="{{ old('stock_quantity') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label><strong>Image (optional):</strong></label><br>
            <input type="file" name="image" style="margin-top: 6px;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit"
                    style="background-color: green; color: white; font-weight: bold; padding: 10px 16px; border: none; border-radius: 6px;">
                Create Product
            </button>

            <a href="{{ route('products.index') }}"
               style="background-color: gray; color: white; font-weight: bold; padding: 10px 16px; text-decoration: none; border-radius: 6px;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
