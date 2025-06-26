@extends('layout.main')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="text-3xl font-bold mb-4">Pembayaran Berhasil!</h2>
    <p class="mb-4">Terima kasih telah melakukan pembayaran.</p>
    <a href="{{ route('homepage.show') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection
