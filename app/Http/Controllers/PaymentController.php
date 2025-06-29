<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{
    public function process(Order $order)
    {
        Config::$serverKey     = config('midtrans.serverKey');
        Config::$isProduction  = config('midtrans.isProduction');
        Config::$isSanitized   = config('midtrans.isSanitized');
        Config::$is3ds         = config('midtrans.is3ds');

        $midtransOrderId = 'ORDER-' . time();

        $order->midtrans_order_id = $midtransOrderId;
        $order->save();

        $params = [
            'transaction_details' => [
                'order_id'    => $midtransOrderId,
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->first_name,
                'last_name'  => $order->last_name,
                'email'      => $order->email,
                'phone'      => $order->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        dd($snapToken);
        return view('pages.pembeli.payment', compact('order', 'snapToken'));
    }

    public function handleNotification(Request $request)
    {
        try {
            $notif = new Notification();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $fraud = $notif->fraud_status;
            $orderId = $notif->order_id;

            Log::info("Notifikasi diterima: Order ID {$orderId}, Status: {$transaction}");

            $order = Order::where('midtrans_order_id', $orderId)->first();
            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Update status sesuai status dari Midtrans
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $order->status = 'challenge';
                    } else {
                        $order->status = 'success';
                        $order->paid_at = now();
                    }
                }
            } elseif ($transaction == 'settlement') {
                $order->status = 'success';
                $order->paid_at = now();
            } elseif ($transaction == 'pending') {
                $order->status = 'pending';
            } elseif ($transaction == 'deny' || $transaction == 'cancel' || $transaction == 'expire') {
                $order->status = 'failed';
            }

            $order->save();

            return response()->json(['message' => 'Notification handled']);
        } catch (\Exception $e) {
            Log::error("Midtrans Notification Error: " . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }

    public function receipt($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        dd(Order::where('id', $id)->get());
        return view('pages.payment.receipt', compact('order'));
    }

    public function getSnapToken(Request $request)
{
    $cartItems = session('checkout.items', []);

    $total = collect($cartItems)->sum(function($item) {
        return $item['price'] * $item['quantity'];
    });

    $params = [
        'transaction_details' => [
            'order_id' => uniqid(), // atau pakai $order->id kalau sudah ada
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => 'Contoh',
            'last_name' => 'User',
            'email' => 'contoh@mail.com',
            'phone' => '081234567890',
        ]
    ];

    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    try {
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['snapToken' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}
