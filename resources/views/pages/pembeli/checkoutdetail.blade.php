<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Detail</title>
    <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>

@extends('layout.main')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-4xl">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Checkout Details</h2>

    {{-- Informasi Pembeli --}}
    @if(!empty($checkoutData))
    <div class="bg-white shadow-md rounded-lg p-6 mb-8 border border-gray-200">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Customer Information</h3>
        <div class="space-y-2 text-gray-600">
            <p><span class="font-medium">Nama:</span> {{ $checkoutData['first_name'] ?? '-' }} {{ $checkoutData['last_name'] ?? '' }}</p>
            <p><span class="font-medium">Email:</span> {{ $checkoutData['email'] ?? '-' }}</p>
            <p><span class="font-medium">Alamat:</span> {{ $checkoutData['address'] ?? '-' }}</p>
            <p><span class="font-medium">Telepon:</span> {{ $checkoutData['phone'] ?? '-' }}</p>
            <p><span class="font-medium">Catatan:</span> {{ $checkoutData['notes'] ?? '-' }}</p>
        </div>
    </div>
    @endif

    {{-- Tabel Produk --}}
    @if(count($cart) > 0)
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-gray-200">
        <table class="table-auto w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-4 py-3 border">Product</th>
                    <th class="px-4 py-3 border text-right">Price</th>
                    <th class="px-4 py-3 border text-center">Qty</th>
                    <th class="px-4 py-3 border text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php 
                        $subtotal = $item['price'] * $item['quantity']; 
                        $total += $subtotal; 
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $item['product'] }}</td>
                        <td class="px-4 py-2 border text-right">Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border text-center">{{ $item['quantity'] }}</td>
                        <td class="px-4 py-2 border text-right">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-100 text-gray-800 font-semibold">
                <tr>
                    <td colspan="3" class="px-4 py-3 border text-right">Total</td>
                    <td class="px-4 py-3 border text-right">Rp{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    @else
        <div class="text-center text-red-600 font-semibold mt-4">
            There are no items in your cart.
        </div>
    @endif
</div>
@endsection
