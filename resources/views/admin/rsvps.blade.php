<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVPs - Admin Dashboard</title>
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
                <a href="/admin/rsvps" class="py-4 border-b-2 border-[#b82a36] text-[#b82a36] font-semibold whitespace-nowrap text-sm sm:text-base">RSVPs</a>
                <a href="/admin/payments" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Payments</a>
                <a href="/admin/profile" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Profile</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-4 sm:py-8">
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 sm:p-6 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-800">All RSVPs</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Manage and view all wedding RSVPs</p>
                </div>
                <a href="{{ route('admin.rsvps.export') }}" class="w-full sm:w-auto bg-[#b82a36] text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-[#8b1f2b] transition font-semibold flex items-center justify-center gap-2 text-sm sm:text-base">\n                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export CSV
                </a>
            </div>

            <!-- RSVP Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="hidden md:table-cell px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="hidden lg:table-cell px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Guests</th>
                            <th class="hidden sm:table-cell px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($rsvps as $rsvp)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4">
                                <div class="font-semibold text-gray-800 text-sm sm:text-base">{{ $rsvp->name }}</div>
                                <div class="text-xs text-gray-500 md:hidden">{{ $rsvp->email }}</div>
                            </td>
                            <td class="hidden md:table-cell px-4 sm:px-6 py-4">
                                <div class="text-gray-600 text-sm">{{ $rsvp->email }}</div>
                            </td>
                            <td class="hidden lg:table-cell px-4 sm:px-6 py-4">
                                <div class="text-gray-600 text-sm">{{ $rsvp->phone }}</div>
                            </td>
                            <td class="px-4 sm:px-6 py-4">
                                @if($rsvp->attending)
                                    <span class="px-2 sm:px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Attending</span>
                                @else
                                    <span class="px-2 sm:px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">Not Attending</span>
                                @endif
                            </td>
                            <td class="px-4 sm:px-6 py-4">
                                <div class="text-gray-600 text-sm sm:text-base">{{ $rsvp->guests }}</div>
                            </td>
                            <td class="hidden sm:table-cell px-4 sm:px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $rsvp->created_at->format('M d, Y') }}</div>
                                <div class="text-xs text-gray-400">{{ $rsvp->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-4 sm:px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.rsvps.edit', $rsvp) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.rsvps.delete', $rsvp) }}" onsubmit="return confirm('Are you sure you want to delete this RSVP?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No RSVPs received yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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
