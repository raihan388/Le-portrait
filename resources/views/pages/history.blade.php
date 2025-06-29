<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media (max-width: 767px) {
            .order-card {
                display: block;
                padding: 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.5rem;
                margin-bottom: 1rem;
            }
            .order-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
            }
            .order-label {
                font-weight: 600;
                color: #4a5568;
            }
            .order-status-badge {
                display: inline-block;
                padding: 0.25rem 0.5rem;
                border-radius: 9999px;
                font-size: 0.75rem;
                margin-top: 0.25rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('components.navbar')

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Order History</h1>
            
            <!-- Desktop Table -->
            <div class="hidden md:block bg-white rounded-xl shadow-md overflow-hidden">
                <div class="grid grid-cols-9 gap-4 bg-gray-100 p-4 font-semibold text-gray-700">
                    <div class="text-center">Code Order</div>
                    <div class="text-center">Name</div>
                    <div class="text-center">Email</div>
                    <div class="text-center">Total</div>
                    <div class="text-center">Payment</div>
                    <div class="text-center">Method</div>
                    <div class="text-center">Status</div>
                    <div class="text-center">Date</div>
                    <div class="text-center">Receipt</div>
                </div>
                
                @foreach($orders as $order)
                <div class="grid grid-cols-9 gap-4 p-4 border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="text-center text-blue-600 font-medium truncate">{{ $order->code_order ?? 'N/A' }}</div>
                    <div class="text-center truncate">{{ $order->first_name }} {{ $order->last_name }}</div>
                    <div class="text-center text-gray-600 truncate">{{ $order->email }}</div>
                    <div class="text-center font-medium">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                    <div class="text-center">
                        @if($order->status == 'paid')
                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">Paid</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">Unpaid</span>
                        @endif
                    </div>
                    <div class="text-center text-xs text-gray-700">{{ ucfirst($order->payment_method ?? 'N/A') }}</div>
                    <div class="text-center">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'processing' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800'
                            ];
                            $color = $statusColors[strtolower($order->order_status)] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs {{ $color }}">
                            {{ ucfirst($order->order_status) }}
                        </span>
                    </div>
                    <div class="text-center text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</div>
                    <div class="text-center">
                        @if(in_array(strtolower($order->order_status), ['completed','processing','pending']))
                            <a href="{{ route('orders.receipt', $order->id) }}" 
                               class="inline-flex items-center px-2 py-1 bg-blue-50 text-blue-600 rounded-md hover:bg-blue-100 transition-colors text-sm"
                               title="Download Receipt">
                                <i class="fas fa-file-invoice mr-1"></i> Receipt
                            </a>
                        @else
                            <span class="text-gray-400 text-xs">N/A</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Mobile Cards -->
            <div class="md:hidden space-y-4">
                @foreach($orders as $order)
                <div class="order-card bg-white shadow rounded-lg">
                    <div class="order-grid">
                        <div>
                            <div class="order-label">Order Code</div>
                            <div class="text-blue-600 font-medium">{{ $order->code_order ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div class="order-label">Date</div>
                            <div>{{ $order->created_at->format('M d, Y') }}</div>
                        </div>
                        <div>
                            <div class="order-label">Customer</div>
                            <div>{{ $order->first_name }} {{ $order->last_name }}</div>
                        </div>
                        <div>
                            <div class="order-label">Total</div>
                            <div>Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <div class="order-label">Payment</div>
                            @if($order->status == 'paid')
                                <span class="order-status-badge bg-green-100 text-green-800">Paid</span>
                            @else
                                <span class="order-status-badge bg-yellow-100 text-yellow-800">Unpaid</span>
                            @endif
                        </div>
                        <div>

                        </div>
                        <div>
                            <div class="order-label">Status</div>
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'processing' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                                $color = $statusColors[strtolower($order->order_status)] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="order-status-badge {{ $color }}">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mt-3 pt-3 border-t flex justify-between items-center">
                        <div class="text-sm text-gray-500">{{ $order->email }}</div>
                        <div>
                            @if(in_array(strtolower($order->order_status), ['completed','processing','pending']))
                                <a href="{{ route('orders.receipt', $order->id) }}" 
                                   class="inline-flex items-center px-2 py-1 bg-blue-50 text-blue-600 rounded-md hover:bg-blue-100 transition-colors text-xs"
                                   title="Download Receipt">
                                    <i class="fas fa-file-invoice mr-1"></i> Receipt
                                </a>
                            @else
                                <span class="text-gray-400 text-xs">N/A</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($orders->hasPages())
            <div class="mt-6">
                {{ $orders->links() }}
            </div>
            @endif
            
            <!-- Empty State -->
            @if($orders->isEmpty())
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No orders yet</h3>
                <p class="mt-1 text-gray-500">Your order history will appear here once you make purchases.</p>
                <div class="mt-6">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Start Shopping
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>

    @include('components.footer')

</body>
</html>