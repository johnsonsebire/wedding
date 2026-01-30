<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Johnson & Dorothy - Wedding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        .love-story-title {
            font-family: 'Great Vibes', cursive;
            font-size: 4rem;
        }
        .love-story-subtitle {
            font-family: 'Great Vibes', cursive;
            font-size: 2.5rem;
        }
        .hero-gradient {
            background: #b82a36;
        }
        .fade-in {
            animation: fadeIn 1s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .smooth-scroll {
            scroll-behavior: smooth;
        }
        nav {
            background: transparent;
        }
        nav.scrolled {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.98) 0%, rgba(248, 245, 240, 0.98) 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(184, 42, 54, 0.08);
            border-bottom: 2px solid;
            border-image: linear-gradient(to right, transparent, #d4af37, transparent) 1;
        }
        .nav-title, .nav-link {
            color: white;
            font-weight: 600;
        }
        .nav-link {
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }
        nav.scrolled .nav-title {
            background: linear-gradient(135deg, #b82a36 0%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }
        nav.scrolled .nav-title::after {
            content: '♡';
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            -webkit-text-fill-color: #d4af37;
            font-size: 0.8em;
            opacity: 0.7;
        }
        nav.scrolled .nav-link {
            color: #4a4a4a;
        }
        .nav-link {
            position: relative;
            padding-bottom: 4px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: #d4af37;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active {
            font-weight: 600;
        }
        nav.scrolled .nav-link.active {
            color: #b82a36;
        }
        nav.scrolled .nav-link::after {
            background: linear-gradient(to right, #b82a36, #d4af37);
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.3);
        }
        nav.scrolled .nav-link:hover {
            color: #b82a36;
            transform: translateY(-1px);
        }
        nav.scrolled .nav-link {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="smooth-scroll bg-gray-50">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold nav-title">Johnson & Dorothy</h1>
                <div class="hidden md:flex space-x-6">
                    <a href="#home" class="nav-link transition">Home</a>
                    <a href="#story" class="nav-link transition">Our Story</a>
                    <a href="#details" class="nav-link transition">Details</a>
                    <a href="#rsvp" class="nav-link transition">RSVP</a>
                    <a href="#gifts" class="nav-link transition">Gifts</a>
                    <a href="#contact" class="nav-link transition">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center text-white pt-16 fade-in overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="/images/couple-photo-2.jpg" alt="Johnson and Dorothy" class="w-full h-full object-cover" style="object-position: center -300px;">
            <div class="absolute inset-0 bg-gradient-to-b from-[#b82a36]/90 via-[#b82a36]/80 to-[#8b1f2b]/90"></div>
        </div>
        
        <div class="text-center px-4 relative z-10">
            <h1 class="text-6xl md:text-8xl font-bold mb-4">Johnson & Dorothy</h1>
            <p class="text-xl md:text-2xl mb-6">warmly invite you to their Marriage Blessing</p>
            <div class="text-lg md:text-xl mb-8">
                <p id="wedding-date">Saturday, February 21st, 2026 • Ayiwa Lodge • 10:00 AM</p>
            </div>
            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="#rsvp" class="bg-white text-[#b82a36] px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">RSVP Now</a>
                <a href="#details" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-[#b82a36] transition">View Details</a>
            </div>
            <!-- Countdown Timer -->
            <div class="mt-12">
                <div id="countdown" class="flex justify-center space-x-6 text-center">
                    <div>
                        <div class="text-4xl font-bold" id="days">0</div>
                        <div class="text-sm">Days</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold" id="hours">0</div>
                        <div class="text-sm">Hours</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold" id="minutes">0</div>
                        <div class="text-sm">Minutes</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold" id="seconds">0</div>
                        <div class="text-sm">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Love Story Section -->
    <section id="story" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="love-story-title font-bold text-center mb-12 text-gray-800">Our Love Story</h2>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-amber-50 rounded-lg">
                    <div class="text-4xl font-bold text-[#b82a36] mb-2">1</div>
                    <div class="text-gray-600">Perfect Match</div>
                </div>
                <div class="text-center p-6 bg-amber-50 rounded-lg">
                    <div class="text-4xl font-bold text-[#b82a36] mb-2">2</div>
                    <div class="text-gray-600">Years Together</div>
                </div>
                <div class="text-center p-6 bg-amber-50 rounded-lg">
                    <div class="text-4xl font-bold text-[#b82a36] mb-2">1000+</div>
                    <div class="text-gray-600">Memories Made</div>
                </div>
                <div class="text-center p-6 bg-amber-50 rounded-lg">
                    <div class="text-4xl font-bold text-[#b82a36] mb-2">∞</div>
                    <div class="text-gray-600">Adventures Ahead</div>
                </div>
            </div>

            <!-- How We Met -->
            <div class="grid md:grid-cols-2 gap-12">
                <div class="space-y-8">
                    <div>
                        <h3 class="love-story-subtitle font-bold mb-4 text-gray-800">How We Met</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Our story began in the most unexpected way. What started as a chance encounter on Facebook blossomed into a beautiful friendship, and eventually, the love of our lives. From that first conversation, we knew there was something special between us. The laughter came easily, the conversations flowed naturally, and before we knew it, we couldn't imagine our lives without each other.
                        </p>
                    </div>
                    
                    <!-- Traditional Marriage -->
                    <div>
                        <h3 class="love-story-subtitle font-bold mb-4 text-gray-800">Our Traditional Marriage</h3>
                        <p class="text-gray-600 leading-relaxed">
                            In a beautiful ceremony that honored our heritage and traditions, our families came together to bless our union. Surrounded by loved ones, elders, and the rich customs that have been passed down through generations, we were joined in traditional marriage. It was a day filled with joy, cultural pride, and the deep recognition of two families becoming one. The ceremony marked not just the union of two hearts, but the coming together of two families in love, respect, and celebration of our shared future.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-full h-[500px] rounded-lg overflow-hidden shadow-xl">
                        <img src="/images/couple-photo-2.jpg" alt="Johnson and Dorothy" class="w-full h-full object-cover" style="object-position: center -100px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wedding Details Section -->
    <section id="details" class="py-20 bg-[#b82a36]">
        <div class="container mx-auto px-4">
            <h2 class="love-story-title font-bold text-center mb-4 text-white">Schedule & Details</h2>
            <p class="text-center text-xl text-white/90 mb-8">Join us for a day of love, laughter, and celebration</p>

            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 md:p-12">
                <!-- Venue Details -->
                <div class="mb-12">
                    <h3 class="text-3xl font-bold mb-6 text-[#b82a36]">Date & Venue</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-[#b82a36] text-2xl">📅</div>
                            <div>
                                <div class="font-semibold text-gray-800">Date</div>
                                <div class="text-gray-600">Saturday, February 21st, 2026</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-[#b82a36] text-2xl">🕐</div>
                            <div>
                                <div class="font-semibold text-gray-800">Time</div>
                                <div class="text-gray-600">10:00 AM</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 md:col-span-2">
                            <div class="text-[#b82a36] text-2xl">📍</div>
                            <div>
                                <div class="font-semibold text-gray-800">Location</div>
                                <div class="text-gray-600">Kharis Christian Centre (Ayiwa Lodge) - Achimota</div>
                                <a href="https://maps.app.goo.gl/5UjUzUAFJczvz19U6" target="_blank" class="text-[#b82a36] hover:underline mt-2 inline-block">View on Google Maps</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg">
                        <p class="text-gray-700"><strong>Parking:</strong> Free parking available on-site.</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div>
                    <h3 class="text-3xl font-bold mb-6 text-[#b82a36]">Schedule</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">10:00 AM</div>
                            <div class="text-gray-700">Service Starts</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">•</div>
                            <div class="text-gray-700">Marriage Blessing</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">•</div>
                            <div class="text-gray-700">Baby Dedication</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">•</div>
                            <div class="text-gray-700">Photography</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">•</div>
                            <div class="text-gray-700">Lunch and Departure</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RSVP Section -->
    <section id="rsvp" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-6 text-gray-800" style="font-family: 'Great Vibes', cursive;">We would love to see you!</h2>
            <p class="text-center text-xl text-gray-600 mb-12">Your presence would make our day complete</p>

            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <div class="text-gray-600 mb-2">RSVP Deadline</div>
                    <div class="text-4xl font-bold text-[#b82a36]">February 8, 2026</div>
                </div>

                <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">Confirm Your Attendance</h3>
                
                <form id="rsvp-form" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">First Name *</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="First Name">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Last Name *</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="Last Name">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Mobile Number *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="+233 XX XXX XXXX">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Will you be attending? *</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="attending" value="1" required class="text-[#b82a36] focus:ring-[#b82a36]">
                                <span>Yes, I'll be there! 🎉</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="attending" value="0" class="text-[#b82a36] focus:ring-[#b82a36]">
                                <span>Sorry, can't make it 😢</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Number of Guests *</label>
                        <input type="number" name="guests" value="1" min="1" max="10" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Message (Optional)</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="Share your wishes or any special requirements..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#b82a36] text-white py-4 rounded-lg font-semibold hover:bg-[#a02430] transition">
                        Send Your Response
                    </button>
                </form>

                <div id="rsvp-message" class="mt-6 hidden"></div>
            </div>
        </div>
    </section>

    <!-- Gifts Section -->
    <section id="gifts" class="py-20 bg-[#b82a36]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-6">
                <div class="text-6xl mb-4 text-white">♡</div>
                <h2 class="text-5xl font-bold text-white" style="font-family: 'Great Vibes', cursive;">Gifts & Contributions</h2>
            </div>
            <p class="text-center text-white/90 mb-12 max-w-3xl mx-auto">
                We're so thankful for your love and thoughtfulness as we celebrate our special day. If you'd like to give us a gift, we humbly request a cash contribution — but please know we'll treasure any gift given with love.
            </p>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-lg shadow-lg">
                    <div class="text-4xl mb-4 text-center">✨</div>
                    <h3 class="text-2xl font-bold mb-4 text-white text-center">At the Wedding</h3>
                    <p class="text-white/90 text-center">
                        A beautifully arranged Gift Table will be set up at the venue to receive your gifts in person. You'll find a safe, secure spot to drop your gifts and share in our joy.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-lg shadow-lg">
                    <div class="text-4xl mb-4 text-center">💳</div>
                    <h3 class="text-2xl font-bold mb-4 text-white text-center">Online Option</h3>
                    <p class="text-white/90 text-center mb-4">
                        If you'd prefer to send your gift digitally, you can do so securely through our online payment system.
                    </p>
                    <div class="text-center">
                        <button onclick="openPaymentModal()" class="bg-white text-[#b82a36] px-6 py-3 rounded-lg font-semibold hover:bg-amber-100 transition shadow-lg">
                            Send a Cash Gift
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 italic text-white/90 max-w-2xl mx-auto">
                <p>"Gifts are not measured by their worth, but by the love and thought that accompany them"</p>
                <p class="mt-4">Thank you for celebrating us and for every prayer, gift, and gesture of kindness. We are truly grateful.</p>
            </div>
        </div>
    </section>

    <!-- Payment Modal -->
    <div id="payment-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50" onclick="closePaymentModal(event)">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 overflow-hidden" onclick="event.stopPropagation()">
            <div class="bg-gradient-to-r from-[#b82a36] to-[#d4af37] px-6 py-4">
                <h3 class="text-2xl font-bold text-white">Send a Wedding Gift</h3>
                <p class="text-white/90 text-sm">Your love and support mean the world to us</p>
            </div>
            
            <form id="payment-form" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Your Name</label>
                    <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="Enter your name">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="your.email@example.com">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Gift Amount (GH₵) *</label>
                    <input type="number" name="amount" required min="1" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="Enter amount">
                    <p class="text-sm text-gray-500 mt-1">Minimum: GH₵ 1.00</p>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closePaymentModal()" class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 px-4 py-3 bg-[#b82a36] hover:bg-[#d4af37] text-white rounded-lg font-semibold transition shadow-md hover:shadow-lg">
                        Continue to Payment
                    </button>
                </div>
            </form>

            <div id="payment-status" class="hidden px-6 pb-6"></div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-6 text-gray-800" style="font-family: 'Great Vibes', cursive;">Have any questions?</h2>
            <p class="text-center text-gray-600 mb-12 text-lg">Don't hesitate to reach out with any questions about the wedding!</p>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Aku Caesar -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#b82a36] to-[#d4af37]"></div>
                    <div class="p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-[#b82a36] to-[#d4af37] rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Aku Caesar</h3>
                        <p class="text-sm text-gray-500 mb-4">Wedding Coordinator</p>
                        <p class="text-gray-700 font-semibold mb-4">+233 54 392 9758</p>
                        <div class="flex gap-3 justify-center">
                            <a href="tel:+233543929758" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#b82a36] hover:bg-[#d4af37] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                Call
                            </a>
                            <a href="https://wa.me/233543929758" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#25D366] hover:bg-[#20ba5a] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Emmanuel Yamga -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#b82a36] to-[#d4af37]"></div>
                    <div class="p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-[#b82a36] to-[#d4af37] rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Emmanuel Yamga</h3>
                        <p class="text-sm text-gray-500 mb-4">Wedding Coordinator</p>
                        <p class="text-gray-700 font-semibold mb-4">+233 24 611 5286</p>
                        <div class="flex gap-3 justify-center">
                            <a href="tel:+233246115286" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#b82a36] hover:bg-[#d4af37] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                Call
                            </a>
                            <a href="https://wa.me/233246115286" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#25D366] hover:bg-[#20ba5a] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Stella Apusiga -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#b82a36] to-[#d4af37]"></div>
                    <div class="p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-[#b82a36] to-[#d4af37] rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-800">Stella Apusiga</h3>
                        <p class="text-sm text-gray-500 mb-4">Wedding Coordinator</p>
                        <p class="text-gray-700 font-semibold mb-4">+233 54 544 4472</p>
                        <div class="flex gap-3 justify-center">
                            <a href="tel:+233545444472" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#b82a36] hover:bg-[#d4af37] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                Call
                            </a>
                            <a href="https://wa.me/233545444472" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-[#25D366] hover:bg-[#20ba5a] text-white rounded-lg transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative text-white py-12 overflow-hidden" style="background: linear-gradient(135deg, #b82a36 0%, #8b1f2b 100%);">
        <!-- Decorative Hearts -->
        <div class="absolute inset-0 opacity-5">
            <div id="footer-hearts" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 100 100&quot;><text y=&quot;.9em&quot; font-size=&quot;60&quot; fill=&quot;white&quot;>♡</text></svg>');
                background-size: 120px 120px;
                background-repeat: repeat;
                width: 100%;
                height: 200%;">
            </div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <h3 class="text-4xl font-bold mb-4" style="font-family: 'Great Vibes', cursive;">Thank you for celebrating with us</h3>
            <p class="text-xl mb-2">Johnson & Dorothy</p>
            <p class="text-white/80">February 21st, 2026</p>
            <p class="mt-6 text-white/80">With love and gratitude ♡</p>
        </div>
    </footer>

    <script>
        // Countdown Timer
        const weddingDate = new Date('2026-02-21T10:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;

            if (distance < 0) {
                document.getElementById('countdown').innerHTML = '<p class="text-2xl">The big day is here! 🎉</p>';
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // RSVP Form Submission
        document.getElementById('rsvp-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            // Combine first name and last name into a single name field
            const firstName = formData.get('first_name');
            const lastName = formData.get('last_name');
            formData.append('name', `${firstName} ${lastName}`);
            formData.delete('first_name');
            formData.delete('last_name');
            
            const messageDiv = document.getElementById('rsvp-message');
            
            try {
                const response = await fetch('{{ route("rsvp.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    messageDiv.className = 'mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg';
                    messageDiv.textContent = data.message;
                    messageDiv.classList.remove('hidden');
                    this.reset();
                } else {
                    messageDiv.className = 'mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                    messageDiv.textContent = 'Something went wrong. Please try again.';
                    messageDiv.classList.remove('hidden');
                }
            } catch (error) {
                messageDiv.className = 'mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg';
                messageDiv.textContent = 'Network error. Please try again.';
                messageDiv.classList.remove('hidden');
            }

            setTimeout(() => {
                messageDiv.classList.add('hidden');
            }, 5000);
        });

        // Navbar background on scroll and active section detection
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            // Active section detection
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop - 200) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('active');
                }
            });
        });

        // Payment Modal Functions
        function openPaymentModal() {
            document.getElementById('payment-modal').classList.remove('hidden');
            document.getElementById('payment-modal').classList.add('flex');
        }

        function closePaymentModal(event) {
            if (!event || event.target.id === 'payment-modal') {
                document.getElementById('payment-modal').classList.add('hidden');
                document.getElementById('payment-modal').classList.remove('flex');
                document.getElementById('payment-form').reset();
                document.getElementById('payment-status').classList.add('hidden');
            }
        }

        // Payment Form Submission with Paystack
        document.getElementById('payment-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            submitButton.disabled = true;
            submitButton.textContent = 'Processing...';

            try {
                const response = await fetch('{{ route("payment.initialize") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: formData.get('name'),
                        email: formData.get('email'),
                        amount: formData.get('amount')
                    })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Initialize Paystack Popup
                    const popup = new PaystackPop();
                    popup.resumeTransaction(data.data.access_code, {
                        onSuccess: (transaction) => {
                            showPaymentSuccess(transaction.reference);
                        },
                        onCancel: () => {
                            submitButton.disabled = false;
                            submitButton.textContent = originalText;
                            alert('Payment cancelled');
                        }
                    });
                } else {
                    alert(data.message || 'Failed to initialize payment. Please try again.');
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            } catch (error) {
                console.error('Payment error:', error);
                alert('An error occurred. Please try again.');
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });

        function showPaymentSuccess(reference) {
            const form = document.getElementById('payment-form');
            const statusDiv = document.getElementById('payment-status');
            
            form.classList.add('hidden');
            statusDiv.classList.remove('hidden');
            statusDiv.innerHTML = `
                <div class="text-center py-6">
                    <div class="text-6xl mb-4">✅</div>
                    <h4 class="text-2xl font-bold text-green-600 mb-2">Payment Successful!</h4>
                    <p class="text-gray-600 mb-4">Thank you for your generous gift!</p>
                    <p class="text-sm text-gray-500 mb-4">Reference: ${reference}</p>
                    <button onclick="closePaymentModal()" class="px-6 py-3 bg-[#b82a36] hover:bg-[#d4af37] text-white rounded-lg font-semibold transition">
                        Close
                    </button>
                </div>
            `;

            setTimeout(() => {
                closePaymentModal();
                statusDiv.classList.add('hidden');
                document.getElementById('payment-form').classList.remove('hidden');
                document.getElementById('payment-form').reset();
            }, 8000);
        }

        // Check for payment callback on page load
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const paymentReference = urlParams.get('payment_reference');
            
            if (paymentReference) {
                // Verify the payment
                fetch(`{{ route("payment.verify") }}?reference=${paymentReference}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.data.status === 'success') {
                            openPaymentModal();
                            showPaymentSuccess(paymentReference);
                        }
                        // Clean up URL
                        window.history.replaceState({}, document.title, window.location.pathname);
                    })
                    .catch(error => console.error('Verification error:', error));
            }
        });

        // Footer Hearts Animation with JavaScript
        (function() {
            const footerHearts = document.getElementById('footer-hearts');
            
            if (footerHearts) {
                let heartsPosition = 0;
                const patternSize = 120; // Match the background-size

                // Animate the hearts floating upward with seamless loop
                function animateHearts() {
                    heartsPosition -= 0.3;
                    // Reset when one full pattern height has scrolled
                    if (heartsPosition <= -patternSize) {
                        heartsPosition = 0;
                    }
                    footerHearts.style.transform = `translateY(${heartsPosition}px)`;
                    requestAnimationFrame(animateHearts);
                }

                // Start animation
                animateHearts();
            }
        })();
    </script>
</body>
</html>
