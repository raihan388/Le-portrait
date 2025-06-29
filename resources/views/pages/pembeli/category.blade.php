@extends('layout.main')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')
     <h1 class="text-2xl font-bold text-gray-900">{{$item['title']}}</h1>
      <p class="text-gray-700 leading-relaxed">
        {{$item['description']}}
      </p>
@endsection
@section('produk')
    @include('components.produk-card')
@endsection