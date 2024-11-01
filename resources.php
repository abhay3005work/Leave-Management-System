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
        <div class="page2" style="position: relative; z-index: 10;">
            <div class="swiper-container childhood-swiper w-full h-screen bg-gradient-to-br from-emerald-50 to-emerald-100 overflow-hidden">
                <div class="swiper-wrapper p-12">
                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-xl p-8 h-[500px] transform hover:scale-105 transition-all duration-300">
                            <div class="w-full h-48 overflow-hidden rounded-xl mb-6">
                                <img src="./assets/takealongs/images/r1.jpg" alt="Playing" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Endless Play Time</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Remember when our biggest worry was deciding what game to play next? No schedules, no deadlines - just pure, unfiltered joy in playing with friends and making up new adventures every day.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-xl p-8 h-[500px] transform hover:scale-105 transition-all duration-300">
                            <div class="w-full h-48 overflow-hidden rounded-xl mb-6">
                                <img src="./assets/takealongs/images/r2.jpg" alt="Imagination" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Boundless Imagination</h3>
                            <p class="text-gray-600 leading-relaxed">
                                A cardboard box could be a spaceship, a castle, or a time machine. Our imagination knew no bounds, and every day brought new possibilities for magical adventures.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-xl p-8 h-[500px] transform hover:scale-105 transition-all duration-300">
                            <div class="w-full h-48 overflow-hidden rounded-xl mb-6">
                                <img src="./assets/takealongs/images/r3.jpg" alt="Family" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Family Time</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Those precious moments with family - bedtime stories, weekend outings, and holiday celebrations. Every day felt special when surrounded by loving family members.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl shadow-xl p-8 h-[500px] transform hover:scale-105 transition-all duration-300">
                            <div class="w-full h-48 overflow-hidden rounded-xl mb-6">
                                <img src="./assets/takealongs/images/r4.jpg" alt="Friends" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Simple Friendships</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Friendships were uncomplicated - sharing toys, playing games, and having fun. No drama, just pure connections based on joy and shared adventures.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next text-emerald-800"></div>
                <div class="swiper-button-prev text-emerald-800"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <script>
                const swiper = new Swiper('.childhood-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    centeredSlides: true,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });

                // Ensure swiper container and its elements stay on page2
                document.querySelector('.page2').addEventListener('mouseover', function() {
                    const swiperContainer = document.querySelector('.childhood-swiper');
                    const navButtons = document.querySelectorAll('.swiper-button-next, .swiper-button-prev');

                    swiperContainer.style.zIndex = '10';
                    navButtons.forEach(button => {
                        button.style.zIndex = '11';
                    });
                });
            </script>
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
        <div class="min-h-screen bg-gradient-to-br from-black to-zinc-900">

        </div>



    </div>
    <?php include 'header/footer.php'; ?>
</body>

</html>