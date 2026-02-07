<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Admin Dashboard</title>
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
        <div class="container mx-auto px-4 py-4 sm:py-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold">Wedding Admin Dashboard</h1>
                    <p class="text-white/80 text-sm sm:text-base">Johnson & Dorothy - February 21st, 2026</p>
                </div>
                <div class="flex gap-2 sm:gap-3 w-full sm:w-auto">
                    <a href="/" class="flex-1 sm:flex-none bg-white text-[#b82a36] px-4 sm:px-6 py-2 rounded-lg hover:bg-gray-100 transition font-semibold text-center text-sm sm:text-base">
                        View Website
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="flex-1 sm:flex-none">
                        @csrf
                        <button type="submit" class="w-full bg-white/10 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-white/20 transition font-semibold border border-white/30 text-sm sm:text-base">
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
            <div class="flex space-x-4 sm:space-x-8 overflow-x-auto">
                <a href="/admin" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Dashboard</a>
                <a href="/admin/rsvps" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">RSVPs</a>
                <a href="/admin/messages" class="py-4 border-b-2 border-[#b82a36] text-[#b82a36] font-semibold whitespace-nowrap text-sm sm:text-base">Messages</a>
                <a href="/admin/payments" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Payments</a>
                <a href="/admin/profile" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Profile</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-4 sm:py-8">
        
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Guest Messages</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">All messages received from RSVP submissions</p>
                </div>
            </div>

            <!-- Messages List -->
            <div class="divide-y divide-gray-200">
                @forelse($rsvps as $rsvp)
                <div class="p-4 sm:p-6 hover:bg-gray-50 transition">
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start gap-3">
                                <!-- Avatar -->
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#b82a36] rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        {{ strtoupper(substr($rsvp->name, 0, 1)) }}
                                    </div>
                                </div>
                                
                                <!-- Message Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        <h3 class="font-bold text-gray-900 text-base sm:text-lg">{{ $rsvp->name }}</h3>
                                        @if($rsvp->attending)
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Attending</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">Not Attending</span>
                                        @endif
                                    </div>
                                    
                                    <div class="text-sm text-gray-600 mb-3">
                                        @if($rsvp->email)
                                            <span class="inline-flex items-center mr-3">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                                {{ $rsvp->email }}
                                            </span>
                                        @endif
                                        @if($rsvp->phone)
                                            <span class="inline-flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                </svg>
                                                {{ $rsvp->phone }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="bg-gray-50 rounded-lg p-3 sm:p-4 border border-gray-200">
                                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap text-sm sm:text-base">{{ $rsvp->message }}</p>
                                    </div>
                                    
                                    <div class="mt-2 flex items-center text-xs text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $rsvp->created_at->format('F d, Y \a\t g:i A') }}
                                        <span class="mx-2">•</span>
                                        <span>{{ $rsvp->guests }} {{ $rsvp->guests == 1 ? 'guest' : 'guests' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex gap-2 sm:flex-col sm:ml-4">
                            <a href="{{ route('admin.rsvps.show', $rsvp) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center px-4 py-2 bg-[#b82a36] text-white rounded-lg hover:bg-[#8b1f2b] transition text-sm font-semibold whitespace-nowrap">
                                <svg class="w-4 h-4 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span class="hidden sm:inline">View Details</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <p class="text-gray-500 text-lg font-semibold">No messages yet</p>
                    <p class="text-gray-400 text-sm mt-2">Messages from guests will appear here</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($rsvps->hasPages())
            <div class="p-4 sm:p-6 border-t border-gray-200">
                {{ $rsvps->links() }}
            </div>
            @endif
        </div>
        
    </div>

</body>
</html>
