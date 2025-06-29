<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Receipt #{{ $order->code_order }}</title>
    <style>
        body {
            background: #f4f4f4;
            font-family: monospace, Courier, sans-serif;
            font-size: 13px;
            padding: 20px;
        }

        .receipt {
            max-width: 360px;
            margin: 0 auto;
            background: #fff;
            padding: 15px 20px;
            border: 1px solid #ccc;
        }

        .text-center {
            text-align: center;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .subtitle {
            font-weight: bold;
            margin-bottom: 6px;
        }

        .info, .summary, .items {
            margin: 10px 0;
        }

        .info div, .summary div, .items div {
            display: flex;
            justify-content: space-between;
        }

        .dashed {
            border-top: 1px dashed #ccc;
            margin: 10px 0;
        }

        .bold {
            font-weight: bold;
        }

        .red {
            color: red;
        }

        .footer {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>

    <div class="receipt">
        <!-- Header -->
        <div class="text-center">
            <img src="public/images/logo.png" alt="" class="title">
            <div class="subtitle">Le-Portrait</div>
            <div>Politeknik Negeri Batam</div>
        </div>

        <!-- Order Info -->
        <div class="info dashed">
            <div><span>Date:</span> <span>{{ $order->created_at->format('d-m-Y H:i') }}</span></div>
            <div><span>Time In:</span> <span>{{ $order->created_at->subMinutes(33)->format('d-m-Y H:i') }}</span></div>
            <div><span>Code Order:</span> <span>{{ $order->code_order ?? '-' }}</span></div>
            <div><span>Customer:</span> <span>{{ $order->first_name }} {{ $order->last_name }}</span></div>
            <div><span>Transfer:</span> <span>{{ $order->payment_method }}</span></div>
        </div>

        <!-- Items -->
        <div class="items">
            
        </div>

        <div class="dashed"></div>

        <!-- Summary -->
        <div class="summary">
            @foreach($order->items as $item)
                <div><span>{{ $item->quantity >= 1 ? $item->quantity . 'x ' : '' }}{{ $item->product->name }}</span>
                     <span>{{ number_format($item->product->price   , 0, ',', '.') }}</span></div>
            @endforeach
        </div>

        <div class="dashed"></div>

        <!-- Total -->
        <div class="summary bold">
            <div><span>Total : </span><span>{{ number_format($order->total, 0, ',', '.') }}</span></div>
        </div>

        <!-- Payment Status -->
        <div class="footer">
            -- {{ strtoupper($order->status == 'paid' ? 'PAID' : 'NOT PAID') }} --
        </div>
    </div>

</body>
</html>
