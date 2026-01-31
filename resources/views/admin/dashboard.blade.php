<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wedding Management</title>
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
                <a href="/admin" class="py-4 border-b-2 border-[#b82a36] text-[#b82a36] font-semibold">Dashboard</a>
                <a href="/admin/rsvps" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">RSVPs</a>
                <a href="/admin/payments" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">Payments</a>
                <a href="/admin/profile" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800">Profile</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- RSVP Stats -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Total RSVPs</h3>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-bold text-gray-800">{{ $totalRsvps }}</p>
                <p class="text-sm text-gray-500 mt-2">Responses received</p>
            </div>

            <!-- Attending -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Attending</h3>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-bold text-green-600">{{ $attendingCount }}</p>
                <p class="text-sm text-gray-500 mt-2">{{ $totalGuests }} total guests</p>
            </div>

            <!-- Not Attending -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Not Attending</h3>
                    <div class="bg-red-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-bold text-red-600">{{ $notAttendingCount }}</p>
                <p class="text-sm text-gray-500 mt-2">Declined invitation</p>
            </div>

            <!-- Payments -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 text-sm font-semibold uppercase">Total Gifts</h3>
                    <div class="bg-[#d4af37]/20 p-3 rounded-full">
                        <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-bold text-[#b82a36]">GHS {{ number_format($totalAmount, 2) }}</p>
                <p class="text-sm text-gray-500 mt-2">{{ $totalPayments }} contributions</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Recent RSVPs -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Recent RSVPs</h2>
                </div>
                <div class="p-6">
                    @if($recentRsvps->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentRsvps as $rsvp)
                            <div class="flex items-start justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2">
                                        <h3 class="font-semibold text-gray-800">{{ $rsvp->name }}</h3>
                                        @if($rsvp->attending)
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Attending</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">Not Attending</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-600">{{ $rsvp->email }}</p>
                                    <p class="text-sm text-gray-600">{{ $rsvp->phone }}</p>
                                    @if($rsvp->attending)
                                        <p class="text-xs text-gray-500 mt-1">Guests: {{ $rsvp->guests }}</p>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500">{{ $rsvp->created_at->diffForHumans() }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-6 text-center">
                            <a href="/admin/rsvps" class="text-[#b82a36] hover:underline font-semibold">View All RSVPs →</a>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No RSVPs yet</p>
                    @endif
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Recent Gifts</h2>
                </div>
                <div class="p-6">
                    @if($recentPayments->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentPayments as $payment)
                            <div class="flex items-start justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">{{ $payment->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $payment->email }}</p>
                                    <p class="text-lg font-bold text-[#d4af37] mt-1">GHS {{ number_format($payment->amount, 2) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">{{ $payment->paid_at->diffForHumans() }}</p>
                                    <span class="inline-block mt-1 px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Paid</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-6 text-center">
                            <a href="/admin/payments" class="text-[#b82a36] hover:underline font-semibold">View All Payments →</a>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No payments yet</p>
                    @endif
                </div>
            </div>

        </div>
    </div>

</body>
</html>
