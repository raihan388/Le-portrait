@extends('layout.list')

@section('title', 'ini adalah  judul pada meta')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Produk</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['name'] }}</td>
                    <td>{{ $post['price'] }}</td>
                        
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection