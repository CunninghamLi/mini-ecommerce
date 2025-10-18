@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Product List</h1>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hard-coded visible button for testing --}}
    @auth
        <a href="{{ route('products.create') }}"
           style="display:inline-block; margin-bottom: 16px; padding:10px 20px; background-color:blue; color:white; font-size:16px; font-weight:bold; border-radius:6px;">
            Add Product
        </a>
    @endauth

    <div class="mb-4">
        <input type="text"
               id="search"
               class="w-full p-2 border border-gray-300 rounded"
               placeholder="Search products by name or category...">
    </div>

    <div id="product-results">
        @include('products.partials.product_table', ['products' => $products])
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#search').on('input', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('products.search') }}",
            type: "GET",
            data: { query: query },
            success: function(data) {
                $('#product-results').html(data);
            }
        });
    });
</script>
@endsection
