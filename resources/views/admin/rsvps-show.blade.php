<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Details - Admin Dashboard</title>
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
                <a href="/admin/messages" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Messages</a>
                <a href="/admin/payments" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Payments</a>
                <a href="/admin/profile" class="py-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 whitespace-nowrap text-sm sm:text-base">Profile</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-4 sm:py-8">
        
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.rsvps') }}" class="inline-flex items-center text-[#b82a36] hover:text-[#8b1f2b] font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to RSVPs
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">RSVP Details</h2>
                        <p class="text-gray-600 mt-1 text-sm sm:text-base">Complete information for this RSVP</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.rsvps.edit', $rsvp) }}" class="bg-blue-600 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold text-sm sm:text-base">
                            Edit RSVP
                        </a>
                    </div>
                </div>
            </div>

            <!-- RSVP Information -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2">Personal Information</h3>
                        
                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Full Name</label>
                            <p class="mt-1 text-gray-900 text-lg">{{ $rsvp->name }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Email Address</label>
                            <p class="mt-1 text-gray-900">{{ $rsvp->email ?? 'Not provided' }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Phone Number</label>
                            <p class="mt-1 text-gray-900">{{ $rsvp->phone ?? 'Not provided' }}</p>
                        </div>
                    </div>

                    <!-- RSVP Details -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2">RSVP Details</h3>
                        
                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Attendance Status</label>
                            <div class="mt-1">
                                @if($rsvp->attending)
                                    <span class="inline-block px-4 py-2 bg-green-100 text-green-800 text-sm font-semibold rounded-lg">
                                        ✓ Attending
                                    </span>
                                @else
                                    <span class="inline-block px-4 py-2 bg-red-100 text-red-800 text-sm font-semibold rounded-lg">
                                        ✗ Not Attending
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Number of Guests</label>
                            <p class="mt-1 text-gray-900 text-2xl font-bold text-[#b82a36]">{{ $rsvp->guests }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Submitted On</label>
                            <p class="mt-1 text-gray-900">{{ $rsvp->created_at->format('l, F d, Y') }}</p>
                            <p class="text-sm text-gray-500">{{ $rsvp->created_at->format('g:i A') }}</p>
                        </div>
                    </div>

                </div>

                <!-- Message -->
                @if($rsvp->message)
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Message from Guest</h3>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $rsvp->message }}</p>
                    </div>
                </div>
                @else
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Message from Guest</h3>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-gray-500 italic">No message provided</p>
                    </div>
                </div>
                @endif

                <!-- Additional Metadata -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Additional Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="text-gray-600 font-semibold">RSVP ID</label>
                            <p class="text-gray-900">#{{ $rsvp->id }}</p>
                        </div>
                        <div>
                            <label class="text-gray-600 font-semibold">Last Updated</label>
                            <p class="text-gray-900">{{ $rsvp->updated_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('admin.rsvps.edit', $rsvp) }}" class="flex-1 sm:flex-none bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold text-center">
                        Edit RSVP
                    </a>
                    <form method="POST" action="{{ route('admin.rsvps.delete', $rsvp) }}" onsubmit="return confirm('Are you sure you want to delete this RSVP? This action cannot be undone.')" class="flex-1 sm:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition font-semibold">
                            Delete RSVP
                        </button>
                    </form>
                </div>

            </div>
        </div>
        
    </div>

</body>
</html>
