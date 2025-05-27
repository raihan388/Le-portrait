@extends('layout.main')
@section('title')
     <h1 class="text-2xl font-bold mb-4">{{$title}}</h1>
      <p class="text-gray-700 leading-relaxed">
        {{$description}}
      </p>
@endsection
@section('produk')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($produk as $item)
            
            <!-- Product 1 -->
            <div class="bg-white border rounded-lg shadow-sm p-4 flex flex-col h-full">
                <div class="aspect-square bg-gray-100 flex items-center justify-center text-gray-400">
                    <div class="w-full aspect-square mb-4 overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">

                    <img src="{{ $image }}" alt="{{  $image}}" class="max-w-3/4 h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">{{ $item['namaproduk'] }}</h3>
                    <div class="text-red-600 font-bold text-xl mb-2">{{ $item['harga'] }}</div>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 mr-2">
                            <i class="fas fa-star text-sm"></i>
                            <i class="fas fa-star text-sm"></i>
                            <i class="fas fa-star text-sm"></i>
                            <i class="fas fa-star text-sm"></i>
                            <i class="fas fa-star text-sm"></i>
                        </div>
                        <span class="text-sm text-gray-500">{{ $item['ulasan'] }}</span>
                    </div>
                    <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        @endforeach
</div>
@endsection