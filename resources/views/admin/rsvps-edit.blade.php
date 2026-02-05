<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RSVP - Admin Dashboard</title>
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
        
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Edit RSVP</h2>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">Update RSVP details</p>
                        </div>
                        <a href="{{ route('admin.rsvps') }}" class="text-[#b82a36] hover:text-[#8b1f2b] font-semibold flex items-center gap-2 text-sm sm:text-base">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to RSVPs
                        </a>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.rsvps.update', $rsvp) }}" class="p-4 sm:p-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $rsvp->name) }}" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b82a36] focus:border-transparent @error('name') border-red-500 @enderror"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email', $rsvp->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b82a36] focus:border-transparent @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone', $rsvp->phone) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b82a36] focus:border-transparent @error('phone') border-red-500 @enderror"
                        >
                        @error('phone')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Number of Guests -->
                    <div class="mb-6">
                        <label for="guests" class="block text-sm font-semibold text-gray-700 mb-2">Number of Guests *</label>
                        <input 
                            type="number" 
                            id="guests" 
                            name="guests" 
                            value="{{ old('guests', $rsvp->guests) }}" 
                            min="1" 
                            max="10"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b82a36] focus:border-transparent @error('guests') border-red-500 @enderror"
                        >
                        @error('guests')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Attendance Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Attendance Status *</label>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <label class="flex items-center cursor-pointer">
                                <input 
                                    type="radio" 
                                    name="attending" 
                                    value="1" 
                                    {{ old('attending', $rsvp->attending) == 1 ? 'checked' : '' }}
                                    class="w-5 h-5 text-[#b82a36] focus:ring-[#b82a36]"
                                    required
                                >
                                <span class="ml-2 text-gray-700">Attending</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input 
                                    type="radio" 
                                    name="attending" 
                                    value="0" 
                                    {{ old('attending', $rsvp->attending) == 0 ? 'checked' : '' }}
                                    class="w-5 h-5 text-[#b82a36] focus:ring-[#b82a36]"
                                    required
                                >
                                <span class="ml-2 text-gray-700">Not Attending</span>
                            </label>
                        </div>
                        @error('attending')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b82a36] focus:border-transparent @error('message') border-red-500 @enderror"
                        >{{ old('message', $rsvp->message) }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submission Info -->
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">Submission Details</h3>
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><span class="font-semibold">Submitted:</span> {{ $rsvp->created_at->format('F d, Y h:i A') }}</p>
                            @if($rsvp->updated_at != $rsvp->created_at)
                                <p><span class="font-semibold">Last Updated:</span> {{ $rsvp->updated_at->format('F d, Y h:i A') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button 
                            type="submit" 
                            class="flex-1 sm:flex-none bg-[#b82a36] text-white px-6 py-3 rounded-lg hover:bg-[#8b1f2b] transition font-semibold flex items-center justify-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update RSVP
                        </button>
                        <a 
                            href="{{ route('admin.rsvps') }}" 
                            class="flex-1 sm:flex-none bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-semibold text-center"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</body>
</html>
