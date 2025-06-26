@extends('layout.main')

@section('content')
    <div class="modal show d-block" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Struk Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Tanggal Transaksi:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Metode Pembayaran:</strong> Midtrans (Snap)</p>
                    <p><strong>Alamat Pengiriman:</strong> {{ $order->address }}</p>

                    <hr>
                    <h6>Rincian Pesanan:</h6>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->product_name }} x{{ $item->quantity }}
                            <span>Rp {{ number_format($item->unit_amount * $item->quantity, 0, ',', '.') }}</span>
                        </li>
                    </ul>

                    <div class="text-end">
                        <strong>Total Transaksi: Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
@endsection
