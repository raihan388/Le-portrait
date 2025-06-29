<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function history()
    {
       $orders = Order::where('email', Auth::user()->email)
            ->latest()
            ->paginate(10);

        return view('pages.history', compact('orders'));
    }
    public function receipt($orderId)
{
    $order = Order::with(['items.product'])->findOrFail($orderId);
    
    // Pastikan hanya pemilik order yang bisa download
    if ($order->email !== auth()->user()->email) {
        abort(403);
    }
    
    $pdf = PDF::loadView('pages.payment.receipt', compact('order'));
    
    return $pdf->download('receipt-'.$order->code_order.'.pdf');
}

}
