<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minds Of Teens</title>
    <?php include 'header/header.php'; ?>
</head>

<body id="p2">

    <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
    <div class="main">

        <div class="page1 bg-zinc-900" id="page1">
            <img class="absolute z-[1]" src="https://t4.ftcdn.net/jpg/05/04/46/39/360_F_504463966_3PK2hdAKXebryGMgkpfZy5PrEpgub6VG.png" alt="">
            <nav>
                <div class="logo">
                    <a href="./index.php">
                        <h3 class="magnet text-white text-2xl font-bold hover:text-amber-300 transition-colors">NueroVista.</h3>
                    </a>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-music magnet" style="color:white" id="playsong" onclick="songplay()"></i>
                </div>
            </nav>
            <div class="page1Main z-[11]">
                <h1>We make it happen.</h1>
                <div class="headings">
                    <h1 class="hvr">Empower.</h1>
                    <h1 class="hvr">Connect.</h1>
                    <h1 class="hvr">Heal.</h1>
                </div>
            </div>
        </div>
        <div class="page-2 bg-white-600 w-full h-screen" id="page2">
            <div class="grid grid-cols-10 h-full w-full">
                <div class="col-span-3 h-full flex items-center justify-center">
                    <img src="./assets/takealongs/images/hover3.jpg" alt="About Us" class="object-cover h-4/5 w-4/5 rounded-lg shadow-lg">
                </div>
                <div class="col-span-7 h-full flex flex-col justify-center px-16">
                    <h2 class="text-4xl font-bold mb-8">About NueroVista</h2>
                    <p class="text-lg leading-relaxed text-gray-700">
                        At NueroVista, we're dedicated to transforming mental health care through innovative digital solutions. Our platform combines cutting-edge technology with compassionate care to provide accessible, personalized mental health support for teens and young adults.
                    </p>
                    <p class="text-lg leading-relaxed text-gray-700 mt-4">
                        We believe in creating a safe, understanding space where young minds can explore, heal, and grow. Through our comprehensive resources, interactive tools, and supportive community, we're helping shape a future where mental health care is accessible to everyone.
                    </p>
                </div>
            </div>
        </div>
        <div class="page-3 bg-gray-100 w-full min-h-screen py-16" id="page3">
            <div class="container mx-auto px-4 flex flex-col justify-center items-center" style="max-width: 1000px;">
                <h2 class="text-5xl font-bold text-center mb-12 text-gray-800">What Our Users Say</h2>

                <!-- Slider main container -->
                <div class="swiper reviewSwiper w-full" role="region" aria-label="User Reviews Slider" style="height: 400px;">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide cursor-pointer" role="group" aria-label="Review 1">
                            <div class="bg-white p-12 rounded-xl shadow-2xl transform hover:scale-105 transition duration-300">
                                <div class="flex items-center mb-6">
                                    <div class="relative w-20 h-20">
                                        <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="User" class="rounded-full mr-4 absolute top-0 left-0 border-4 border-blue-100">
                                    </div>
                                    <div class="ml-24">
                                        <h4 class="font-bold text-xl text-gray-800">Anannya Powar</h4>
                                        <p class="text-blue-600">Student</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-lg leading-relaxed">"NueroVista has been a game-changer for me. The resources and support available here have helped me understand and manage my anxiety better than ever before."</p>
                            </div>
                        </div>

                        <div class="swiper-slide cursor-pointer">
                            <div class="bg-white p-12 rounded-xl shadow-2xl transform hover:scale-105 transition duration-300">
                                <div class="flex items-center mb-6">
                                    <div class="relative w-20 h-20">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-full mr-4 absolute top-0 left-0 border-4 border-blue-100">
                                    </div>
                                    <div class="ml-24">
                                        <h4 class="font-bold text-xl text-gray-800">Vedant Salunkhe</h4>
                                        <p class="text-blue-600">High School Student</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-lg leading-relaxed">"The interactive tools and supportive community here have made such a difference in my mental health journey. I feel understood and supported."</p>
                            </div>
                        </div>

                        <div class="swiper-slide cursor-pointer">
                            <div class="bg-white p-12 rounded-xl shadow-2xl transform hover:scale-105 transition duration-300">
                                <div class="flex items-center mb-6">
                                    <div class="relative w-20 h-20">
                                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="User" class="rounded-full mr-4 absolute top-0 left-0 border-4 border-blue-100">
                                    </div>
                                    <div class="ml-24">
                                        <h4 class="font-bold text-xl text-gray-800">Janhavi Sathee</h4>
                                        <p class="text-blue-600">College Student</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-lg leading-relaxed">"Finding NueroVista was like finding a safe haven. The resources here have helped me develop better coping mechanisms and self-awareness."</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination cursor-pointer mt-4" aria-label="Reviews pagination"></div>

                    <!-- Navigation buttons -->
                    <div class="swiper-button-next cursor-pointer" aria-label="Next review"></div>
                    <div class="swiper-button-prev cursor-pointer" aria-label="Previous review"></div>
                </div>

                <div class="mt-24 text-center">
                    <h2 class="text-5xl font-bold mb-8 text-gray-800">Join Our Community</h2>
                    <p class="text-gray-600 text-xl max-w-3xl mx-auto mb-12">
                        Be part of a supportive community dedicated to mental wellness. Together, we can create a more understanding and empathetic world.
                    </p>
                    <div class="flex justify-center gap-8">
                        <div class="bg-white p-10 rounded-xl shadow-2xl max-w-sm transform hover:scale-105 transition duration-300">
                            <i class="fas fa-users text-5xl text-blue-500 mb-6"></i>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Support Groups</h3>
                            <p class="text-gray-600 text-lg">Connect with peers who understand your journey and share experiences in a safe space.</p>
                        </div>
                        <div class="bg-white p-10 rounded-xl shadow-2xl max-w-sm transform hover:scale-105 transition duration-300">
                            <i class="fas fa-brain text-5xl text-purple-500 mb-6"></i>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800">Mental Health Resources</h3>
                            <p class="text-gray-600 text-lg">Access our comprehensive library of tools, articles, and exercises for mental wellness.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page5 bg-gray-100 py-20">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
                    <p class="text-gray-600">Get in touch with us for any questions or support</p>
                </div>

                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-300">Send Message</button>
                    </form>
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="text-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <i class="fas fa-envelope text-3xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Email</h3>
                            <p class="text-gray-600">your.email@example.com</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <i class="fas fa-phone text-3xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Phone</h3>
                            <p class="text-gray-600">9999999999</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <i class="fas fa-map-marker-alt text-3xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Location</h3>
                            <p class="text-gray-600">MUMBAI</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php include 'header/footer.php'; ?>
</body>

</html>