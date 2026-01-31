<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Header -->
    <header class="bg-[#b82a36] text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">Wedding Admin Dashboard</h1>
                    <p class="text-white/80">Johnson & Dorothy - February 21st, 2026</p>
                </div>
                <div class="flex gap-3">
                    <a href="/" class="bg-white text-[#b82a36] px-6 py-2 rounded-lg hover:bg-gray-100 transition font-semibold">
                        View Website
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-white/10 text-white px-6 py-2 rounded-lg hover:bg-white/20 transition font-semibold border border-white/30">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4">
            <div class="flex space-x-8">
                <a href="/admin" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">Dashboard</a>
                <a href="/admin/rsvps" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">RSVPs</a>
                <a href="/admin/payments" class="py-4 border-b-2 border-[#b82a36] text-[#b82a36] font-semibold">Payments</a>
                <a href="/admin/profile" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">Profile</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">All Payments</h2>
                <p class="text-gray-600 mt-1">View all wedding gift contributions</p>
            </div>

            <!-- Payment Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reference</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($payments as $payment)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-semibold text-gray-800">{{ $payment->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">{{ $payment->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-[#d4af37]">{{ $payment->currency }} {{ number_format($payment->amount, 2) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($payment->status === 'success')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Success</span>
                                @elseif($payment->status === 'pending')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">Pending</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">Failed</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs text-gray-500 font-mono">{{ $payment->reference }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($payment->paid_at)
                                    <div class="text-sm text-gray-500">{{ $payment->paid_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-400">{{ $payment->paid_at->format('h:i A') }}</div>
                                @else
                                    <div class="text-sm text-gray-400">Not paid</div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No payments received yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($payments->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $payments->links() }}
            </div>
            @endif
        </div>
        
    </div>

</body>
</html>
