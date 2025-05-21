@extends('layout.list')

@section('title', 'List ')
@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $post )
        <tr>
            <td>{{ $post['id'] }}</td>
            <td>{{ $post['name'] }}</td>
        @endforeach
    </tbody>
</table>

@endsection