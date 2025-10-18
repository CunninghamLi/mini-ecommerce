@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    @if ($errors->any())
        <div style="background-color: #fdd; color: #900; padding: 10px; border-radius: 6px; margin-bottom: 16px;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label>Category</label>
            <input type="text" name="category" value="{{ old('category', $product->category) }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label>Description</label>
            <textarea name="description"
                      style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">{{ old('description', $product->description) }}</textarea>
        </div>

        <div style="margin-bottom: 12px;">
            <label>Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label>Stock Quantity</label>
            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 16px;">
            <label>Product Image</label><br>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="80" class="mb-2" style="border-radius: 6px;">
            @endif
            <input type="file" name="image"
                   style="margin-top: 8px;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit"
                    style="background-color: blue; color: white; font-weight: bold; padding: 10px 20px; border: none; border-radius: 6px;">
                Update Product
            </button>

            <a href="{{ route('products.index') }}"
               style="background-color: gray; color: white; font-weight: bold; padding: 10px 20px; text-decoration: none; border-radius: 6px;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
