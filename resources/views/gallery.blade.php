<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery - Johnson & Dorothy Wedding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&family=Great+Vibes&display=swap" rel="stylesheet">
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
    <header class="bg-[#b82a36] text-white py-8 sm:py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4" style="font-family: 'Great Vibes', cursive;">Our Wedding Gallery</h1>
            <p class="text-lg sm:text-xl mb-2">Johnson & Dorothy</p>
            <p class="text-white/80 text-sm sm:text-base">February 21st, 2026</p>
            <a href="/" class="mt-4 sm:mt-6 inline-block text-[#d4af37] hover:underline text-sm sm:text-base">← Back to Home</a>
        </div>
    </header>

    <!-- Gallery Section -->
    <section class="py-12 sm:py-16">
        <div class="container mx-auto px-4">
            
            <!-- Coming Soon Message (Before Event) -->
            <div class="max-w-2xl mx-auto text-center mb-12">
                <div class="bg-white rounded-lg shadow-lg p-8 sm:p-12">
                    <div class="text-5xl sm:text-6xl mb-6">📸</div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">Photos Coming Soon!</h2>
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                        Our wedding photos will be available here after the ceremony. 
                        We're excited to share these special moments with you!
                    </p>
                    <p class="mt-6 text-xs sm:text-sm text-gray-500">
                        Check back after February 21st, 2026
                    </p>
                </div>
            </div>

            <!-- Photo Grid (Will be populated after event) -->
            <div id="photo-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                <!-- Photos will be added here after the event -->
                <!-- Example structure for when photos are added:
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="/images/wedding/photo-1.jpg" alt="Wedding Photo" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                -->
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 sm:py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-white/80 text-sm sm:text-base">© 2026 Johnson & Dorothy. All rights reserved.</p>
            <p class="mt-2 text-xs sm:text-sm text-white/60">Please respect our privacy and do not share these photos on social media.</p>
        </div>
    </footer>

</body>
</html>
