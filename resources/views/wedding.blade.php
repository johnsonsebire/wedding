<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Johnson & Partner - Wedding</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            background: linear-gradient(to right, #b82a36, #d4af37);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.3);
        }
        .nav-link:hover::after {
            width: 100%;
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
    <section id="home" class="hero-gradient min-h-screen flex items-center justify-center text-white pt-16 fade-in">
        <div class="text-center px-4">
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
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div>
                    <h3 class="love-story-subtitle font-bold mb-4 text-gray-800">How We Met</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Our story began in the most unexpected way. What started as a chance encounter on Facebook blossomed into a beautiful friendship, and eventually, the love of our lives. From that first conversation, we knew there was something special between us. The laughter came easily, the conversations flowed naturally, and before we knew it, we couldn't imagine our lives without each other.
                    </p>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-full h-64 bg-gradient-to-br from-[#b82a36] to-amber-500 rounded-lg flex items-center justify-center text-white text-xl">
                        [Your Photo Here]
                    </div>
                </div>
            </div>

            <!-- Traditional Marriage -->
            <div class="max-w-3xl mx-auto text-center">
                <h3 class="love-story-subtitle font-bold mb-6 text-gray-800">Our Traditional Marriage</h3>
                <p class="text-gray-600 leading-relaxed text-lg">
                    In a beautiful ceremony that honored our heritage and traditions, our families came together to bless our union. Surrounded by loved ones, elders, and the rich customs that have been passed down through generations, we were joined in traditional marriage. It was a day filled with joy, cultural pride, and the deep recognition of two families becoming one. The ceremony marked not just the union of two hearts, but the coming together of two families in love, respect, and celebration of our shared future.
                </p>
            </div>
        </div>
    </section>

    <!-- Wedding Details Section -->
    <section id="details" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-12 text-gray-800">Wedding Details</h2>
            <p class="text-center text-xl text-gray-600 mb-12">Join us for a day of love, laughter, and celebration</p>

            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 md:p-12">
                <!-- Venue Details -->
                <div class="mb-12">
                    <h3 class="text-3xl font-bold mb-6 text-gray-800">Ceremony & Venue</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-[#b82a36] text-2xl">📅</div>
                            <div>
                                <div class="font-semibold text-gray-800">Date</div>
                                <div class="text-gray-600">Saturday, June 15, 2026</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-[#b82a36] text-2xl">🕐</div>
                            <div>
                                <div class="font-semibold text-gray-800">Time</div>
                                <div class="text-gray-600">2:00 PM</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 md:col-span-2">
                            <div class="text-[#b82a36] text-2xl">📍</div>
                            <div>
                                <div class="font-semibold text-gray-800">Location</div>
                                <div class="text-gray-600">Your Church/Venue Name<br>Street Address<br>City, Country</div>
                                <a href="#" class="text-purple-600 hover:underline mt-2 inline-block">View on Google Maps</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg">
                        <p class="text-gray-700"><strong>Parking:</strong> Free parking available on-site.</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div>
                    <h3 class="text-3xl font-bold mb-6 text-gray-800">Wedding Day Timeline</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">2:00 PM</div>
                            <div class="text-gray-700">Ceremony Begins</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">3:30 PM</div>
                            <div class="text-gray-700">Reception & Celebration</div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="text-[#b82a36] font-bold text-xl">5:00 PM</div>
                            <div class="text-gray-700">Dinner & Dancing</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RSVP Section -->
    <section id="rsvp" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-6 text-gray-800">We would love to see you!</h2>
            <p class="text-center text-xl text-gray-600 mb-12">Your presence would make our day complete</p>

            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <div class="text-gray-600 mb-2">RSVP Deadline</div>
                    <div class="text-4xl font-bold text-[#b82a36]">May 15, 2026</div>
                </div>

                <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">Confirm Your Attendance</h3>
                
                <form id="rsvp-form" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b82a36]" placeholder="Your Name">
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
            <h2 class="text-5xl font-bold text-center mb-6 text-white">Gifts & Contributions ♡</h2>
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
                        If you'd prefer to send your gift digitally, you can do so securely through bank transfer or mobile money.
                    </p>
                    <div class="text-center">
                        <button class="bg-white text-[#b82a36] px-6 py-3 rounded-lg font-semibold hover:bg-amber-100 transition">
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

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mb-6 text-gray-800">Have any questions?</h2>
            <p class="text-center text-gray-600 mb-12">Don't hesitate to reach out with any questions about the wedding!</p>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-amber-50 p-8 rounded-lg text-center">
                    <div class="text-4xl mb-4">📞</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Aku Caesar</h3>
                    <div class="text-gray-600">
                        <p class="mb-2">📞 +233 54 392 9758</p>
                    </div>
                </div>

                <div class="bg-amber-50 p-8 rounded-lg text-center">
                    <div class="text-4xl mb-4">📞</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Emmanuel Yamga</h3>
                    <div class="text-gray-600">
                        <p class="mb-2">📞 +233 24 611 5286</p>
                    </div>
                </div>

                <div class="bg-amber-50 p-8 rounded-lg text-center">
                    <div class="text-4xl mb-4">📞</div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Stella Apusiga</h3>
                    <div class="text-gray-600">
                        <p class="mb-2">📞 +233 54 544 4472</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#b82a36] text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-4">Thank you for celebrating with us</h3>
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

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
