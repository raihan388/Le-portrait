@extends('layout.main')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('title')
    <h1 class="text-2xl font-bold mb-4"> {{ $categoryFormatted }} - {{ ucfirst($brand) }}</h1>
@endsection

@section('produk')
    @if($products->isEmpty())
        <p class="text-gray-500">Tidak ada produk yang ditemukan untuk brand ini.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                @include('components.produk-card', ['product' => $product])
            @endforeach
        </div>
    @endif
@endsection
