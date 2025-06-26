@extends('layout.main')

@section('content')
<div class="container mx-auto p-10 text-center">
  <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>
  <p>Total: <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></p>
  <button id="pay-button" class="btn btn-primary mt-4">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var payBtn = document.getElementById('pay-button');
  if (payBtn) {
    payBtn.addEventListener('click', function () {
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          alert("Pembayaran berhasil!");
          console.log(result);
          window.location.href = "{{ route('/receipt', ['order' => $order->id]) }}";
        },
        onPending: function(result){
          alert("Menunggu pembayaran...");
          console.log(result);
        },
        onError: function(result){
          alert("Pembayaran gagal.");
          console.log(result);
        },
        onClose: function(){
          alert("Kamu menutup popup sebelum menyelesaikan pembayaran.");
        }
      });
    });
  }
});
</script>
@endsection
