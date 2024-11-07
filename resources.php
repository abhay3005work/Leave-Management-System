<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header/header.php'; ?>
</head>

<body id="resources" class="selection:bg-green-500 selection:text-white">
    <div class="loader-wrapper fixed inset-0 z-50 flex flex-col items-center justify-center bg-black">
        <div class="text-loader">
            <h1 class="text-6xl font-light text-white">
                NueroVista.
            </h1>
        </div>
    </div>
    <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
    <div class="main">
        <div class="page1">
            <nav class="fixed z-20 flex justify-between items-center px-8 py-6">
                <div class="logo">
                    <a href="./index.php">
                        <h3 class="magnet text-white">NueroVista.</h3>
                    </a>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-music magnet text-2xl hover:text-amber-300 transition-colors cursor-pointer" style="color:white" id="playsong" onclick="songplay()"></i>
                </div>
            </nav>
            <video src="./assets/takealongs/video/resource3.mp4" autoplay muted loop class="absolute inset-0 w-full h-full object-cover opacity-100 z-[1]"></video>
            <div class="page1text bg-black/60">
                <h1 class="text-white text-5xl font-light text-center transform absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">Why was Childhood Happy?</h1>
            </div>
        </div>
        <div class="page2 relative z-10">
            <div class="swiper-container childhood-swiper w-full min-h-[80vh] bg-gradient-to-br from-emerald-50 to-emerald-100 overflow-hidden px-4 py-8 md:py-12">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide px-2 sm:px-4">
                        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl p-4 sm:p-8 h-[450px] sm:h-[500px] transform hover:scale-105 transition-all duration-300 border border-emerald-100">
                            <div class="w-full h-36 sm:h-48 overflow-hidden rounded-xl mb-4 sm:mb-6 shadow-lg">
                                <img src="./assets/takealongs/images/r1.jpg" alt="Playing" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-emerald-800 mb-3 sm:mb-4 hover:text-emerald-600 transition-colors">Endless Play Time</h3>
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed hover:text-gray-800 transition-colors">
                                Remember when our biggest worry was deciding what game to play next? No schedules, no deadlines - just pure, unfiltered joy in playing with friends and making up new adventures every day.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide px-2 sm:px-4">
                        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl p-4 sm:p-8 h-[450px] sm:h-[500px] transform hover:scale-105 transition-all duration-300 border border-emerald-100">
                            <div class="w-full h-36 sm:h-48 overflow-hidden rounded-xl mb-4 sm:mb-6 shadow-lg">
                                <img src="./assets/takealongs/images/r2.jpg" alt="Imagination" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-emerald-800 mb-3 sm:mb-4 hover:text-emerald-600 transition-colors">Boundless Imagination</h3>
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed hover:text-gray-800 transition-colors">
                                A cardboard box could be a spaceship, a castle, or a time machine. Our imagination knew no bounds, and every day brought new possibilities for magical adventures.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide px-2 sm:px-4">
                        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl p-4 sm:p-8 h-[450px] sm:h-[500px] transform hover:scale-105 transition-all duration-300 border border-emerald-100">
                            <div class="w-full h-36 sm:h-48 overflow-hidden rounded-xl mb-4 sm:mb-6 shadow-lg">
                                <img src="./assets/takealongs/images/r3.jpg" alt="Family" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-emerald-800 mb-3 sm:mb-4 hover:text-emerald-600 transition-colors">Family Time</h3>
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed hover:text-gray-800 transition-colors">
                                Those precious moments with family - bedtime stories, weekend outings, and holiday celebrations. Every day felt special when surrounded by loving family members.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide px-2 sm:px-4">
                        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl p-4 sm:p-8 h-[450px] sm:h-[500px] transform hover:scale-105 transition-all duration-300 border border-emerald-100">
                            <div class="w-full h-36 sm:h-48 overflow-hidden rounded-xl mb-4 sm:mb-6 shadow-lg">
                                <img src="./assets/takealongs/images/r4.jpg" alt="Friends" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-emerald-800 mb-3 sm:mb-4 hover:text-emerald-600 transition-colors">Simple Friendships</h3>
                            <p class="text-sm sm:text-base text-gray-600 leading-relaxed hover:text-gray-800 transition-colors">
                                Friendships were uncomplicated - sharing toys, playing games, and having fun. No drama, just pure connections based on joy and shared adventures.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation buttons - Hidden on mobile -->
                <div class="hidden md:block">
                    <div class="swiper-button-next text-emerald-800 hover:text-emerald-600 transition-colors"></div>
                    <div class="swiper-button-prev text-emerald-800 hover:text-emerald-600 transition-colors"></div>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-2"></div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        </div>
        <div class="bg-gradient-to-br from-emerald-100 to-emerald-50 h-screen flex items-center">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl p-12 transform hover:-translate-y-1 transition-all duration-300">
                    <div class="flex flex-col md:flex-row items-center gap-12">
                        <div class="w-full md:w-1/3">
                            <div class="relative group overflow-hidden rounded-lg">
                                <img src="./assets/takealongs/images/45.jpg" alt="Dr. Emma Thompson"
                                    class="rounded-lg shadow-lg w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500"
                                    style="max-height: 300px;">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="mt-6 text-center transform hover:scale-105 transition-transform duration-300">
                                <h3 class="text-2xl font-bold text-gray-800">Dr. Emma Thompson</h3>
                                <p class="text-emerald-600 font-medium">Mental Health Therapist</p>
                            </div>
                        </div>

                        <div class="w-full md:w-2/3">
                            <h2 class="text-4xl font-bold text-gray-800 mb-8 hover:text-emerald-800 transition-colors">Understanding Childhood Joy</h2>
                            <div class="space-y-6 text-gray-600">
                                <p class="leading-relaxed text-lg">
                                    "As a mental health therapist, I've observed that childhood happiness stems from emotional freedom and authenticity. Children experience life without the complex emotional barriers and social anxieties that often characterize adulthood.
                                </p>
                                <p class="leading-relaxed text-lg">
                                    Their minds aren't cluttered with past emotional baggage or future worries, allowing them to fully immerse in the present moment - a key to emotional well-being."
                                </p>
                            </div>
                            <div class="mt-8 bg-emerald-50 p-6 rounded-xl shadow-inner">
                                <h3 class="text-xl font-semibold text-emerald-800 mb-4">Keys to Childhood Happiness:</h3>
                                <div class="grid grid-cols-2 gap-4 text-gray-700">
                                    <div class="flex items-center gap-3 hover:text-emerald-700 transition-colors">
                                        <span class="text-emerald-500 text-xl">•</span>
                                        <span class="font-medium">Emotional Freedom</span>
                                    </div>
                                    <div class="flex items-center gap-3 hover:text-emerald-700 transition-colors">
                                        <span class="text-emerald-500 text-xl">•</span>
                                        <span class="font-medium">Present Awareness</span>
                                    </div>
                                    <div class="flex items-center gap-3 hover:text-emerald-700 transition-colors">
                                        <span class="text-emerald-500 text-xl">•</span>
                                        <span class="font-medium">Neural Plasticity</span>
                                    </div>
                                    <div class="flex items-center gap-3 hover:text-emerald-700 transition-colors">
                                        <span class="text-emerald-500 text-xl">•</span>
                                        <span class="font-medium">Family Bonds</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 flex gap-6">
                                <button class="px-8 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transform hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-emerald-300">
                                    Learn More
                                </button>
                                <button class="px-8 py-3 border-2 border-emerald-600 text-emerald-600 rounded-lg hover:bg-emerald-50 transform hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-emerald-200">
                                    Contact Us
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-sky-50 to-white py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Embrace the Light Within</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Let positivity guide your journey to mental wellness through our carefully curated resources and supportive community.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 text-center mb-4">Daily Inspiration</h3>
                        <p class="text-gray-600 text-center">Start each day with uplifting quotes and positive affirmations to brighten your perspective.</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 text-center mb-4">Mindful Moments</h3>
                        <p class="text-gray-600 text-center">Practice mindfulness exercises designed to bring peace and clarity to your daily routine.</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                            <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 text-center mb-4">Self-Care Rituals</h3>
                        <p class="text-gray-600 text-center">Discover gentle ways to nurture your well-being and create moments of joy in your life.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="knowsec">
            <div class="knowbody">
                <div class="kleft">
                    <div class="kelem">
                        <h3>Lorem.</h3>
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <h4>Lorem, ipsum dolor.</h4>
                    </div>
                    <div class="kelem">
                        <h3>Lorem.</h3>
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <h4>Lorem, ipsum dolor.</h4>
                    </div>
                    <div class="kelem">
                        <h3>Lorem.</h3>
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <h4>Lorem, ipsum dolor.</h4>
                    </div>
                    <div class="kelem last">
                        <h3>Lorem.</h3>
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                        <h4>Lorem, ipsum dolor.</h4>
                    </div>
                </div>
                <div class="kright">
                    <div class="kimg">
                        <img
                            src="https://images.unsplash.com/photo-1604341305856-4bb8d38297e4?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" />
                        <img
                            src="https://images.unsplash.com/photo-1593647971407-815193f83d1b?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" />
                        <img
                            src="https://images.unsplash.com/photo-1583639000530-fdc19a1ea647?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" />
                        <img
                            src="https://plus.unsplash.com/premium_photo-1680836316227-ef17dbbcfb27?q=80&w=1527&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" />
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-20">
                <button
                    type="button"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Dark
                </button>
            </div>
        </div>
    </div>
    <?php include 'header/footer.php'; ?>
</body>

</html>