<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'header/header.php'; ?>
</head>

<body id="home">
  <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>


  <div class="main">
    <div class="loader-wrapper fixed inset-0 z-50 flex flex-col items-center justify-center bg-black">
      <div class="text-loader">
        <h1 class="text-6xl font-light text-white">
          NueroVista.
        </h1>
      </div>
    </div>
    <div class="page1 h-screen w-full">
      <video
        autoplay
        muted
        loop
        src="./assets/takealongs/video/12417857_1280_720_30fps.mp4"></video>
      <div class="page1text">
        <nav>
          <div class="logo">
            <a href="./index.php">
              <h3 class="magnet text-white">NueroVista.</h3>
            </a>
          </div>
          <div class="navLinks magnet">
            <a href="./quiz.php">Quiz</a>
            <a href="./resources.php">Resources</a>
            <a href="./about_us.php">About Us</a>
          </div>

          <div class="icon">
            <i class="fa-solid fa-music magnet" id="playsong" onclick="songplay()" style="cursor: pointer"></i>

          </div>
        </nav>
        <h1 class="h1text"><span>Learn About </span> NueroVista.</h1>
      </div>
    </div>
    <div class="w-full page2">
      <div class="parent relative w-full h-[700vh] ">
        <div class="w-full sticky top-0 left-0 h-screen">
          <canvas class="w-full h-screen" id=" canvas"></canvas>
          <div
            class="textdiv absolute animate1 z-[99] text-white bottom-20 w-1/2 left-20">
            <h1 class=" maintext">Solutions that fit your needs.</h1>
          </div>
          <div
            class="absolute animate2 z-[99] text-white bottom-20 w-1/2 right-20 opacity-0">
            <h1 class=" maintext">
              Guided steps to a healthier mind.
            </h1>
          </div>
          <div
            class="absolute animate3 z-[99] text-white bottom-20 w-1/2 left-20 opacity-0">
            <h1 class=" maintext">
              Confidential mental health tracking.
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="page3">
      <div class="boxes">
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Mental Health Assessment</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/1.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>2.0</h5>
            <h4>Anxiety Management</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/2.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>3.0</h5>
            <h4>Depression Support</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/3.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>4.0</h5>
            <h4>Mindfulness Practices</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/5.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>5.0</h5>
            <h4>Sleep Improvement</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/6.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>6.0</h5>
            <h4>Mental Wellness Tips</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/7.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="page4 relative h-screen w-full flex flex-col items-center justify-center gap-8" style="background: linear-gradient(135deg, #a7f3d0, #6ee7b7, #34d399);">
      <div class="eye-container scale-75 mb-4">
        <div class="eye">
          <div class="eyelid" style="background: linear-gradient(135deg, #a7f3d0, #6ee7b7, #34d399);"></div>
          <div class="pupil"></div>
          <div class="reflection"></div>
        </div>
        <div class="eye" style="margin-left: 40px;">
          <div class="eyelid" style="background: linear-gradient(135deg, #a7f3d0, #6ee7b7, #34d399);"></div>
          <div class="pupil"></div>
          <div class="reflection"></div>
        </div>
      </div>
      <div class="text-center -mt-4">
        <h2 class="text-5xl font-bold text-black mb-2">Ready for Some Fun?</h2>
        <p class="text-xl text-black/80 mb-4">Join us for an exciting gaming experience!</p>
        <p class="text-xl text-black/80 mb-6">Click below to start your adventure!</p>
        <a href="funseg.php" class="inline-block px-12 py-6 bg-emerald-500 text-white rounded-full text-2xl font-bold shadow-lg transform hover:-translate-y-1 transition-all duration-200 hover:shadow-xl hover:bg-emerald-600 border-4 border-emerald-400">
          Let's Play!
          <span class="ml-2">→</span>
        </a>
      </div>
    </div>
    <div class="page5 relative z-50" style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe, #bae6fd);">
      <div class="relative overflow-hidden py-12">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="footer-col" data-aos="fade-up" data-aos-delay="100">
              <h3 class="text-2xl font-bold mb-4 text-slate-800">Newsletter</h3>
              <p class="text-slate-600 mb-4 text-sm leading-relaxed">
                Stay updated with our latest news and updates.
              </p>
              <form class="flex gap-2 mb-6">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 rounded-lg bg-white/70 border border-sky-200 focus:outline-none focus:ring-2 focus:ring-sky-400">
                <button type="submit" class="px-6 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors">
                  Subscribe
                </button>
              </form>
              <div class="flex gap-4">
                <a href="#" class="w-10 h-10 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                  </svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                  </svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                  </svg>
                </a>
              </div>
            </div>

            <div class="footer-col" data-aos="fade-up" data-aos-delay="200">
              <h3 class="text-2xl font-bold mb-4 text-slate-800">Quick Links</h3>
              <div class="space-y-2">
                <a href="quiz.php" class="flex items-center gap-2 w-full px-4 py-2 rounded-lg bg-white/50 border border-sky-200 hover:bg-white/70 transition-all duration-300 text-slate-700 text-sm font-medium hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                  </svg>
                  Take Mental Health Quiz
                </a>
                <a href="resource.php" class="flex items-center gap-2 w-full px-4 py-2 rounded-lg bg-white/50 border border-sky-200 hover:bg-white/70 transition-all duration-300 text-slate-700 text-sm font-medium hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                  </svg>
                  Resources
                </a>
                <a href="funseg.php" class="flex items-center gap-2 w-full px-4 py-2 rounded-lg bg-white/50 border border-sky-200 hover:bg-white/70 transition-all duration-300 text-slate-700 text-sm font-medium hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.92 3.845a19.361 19.361 0 01-6.85 1.74c-.266.043-.53.081-.796.117.621.396 1.225.82 1.82 1.27l.272.189c1.642 1.15 3.045 2.338 4.01 3.697a9.498 9.498 0 011.154 2.1c.094.256.174.516.238.78l.058.259c.032.143.058.287.078.432l.035.245c.056.479.079.962.079 1.45a7.998 7.998 0 01-8 8 7.964 7.964 0 01-3.468-.792l-.023-.012a8.15 8.15 0 01-.397-.214 7.926 7.926 0 01-.397-.249 8.018 8.018 0 01-2.825-3.137 7.964 7.964 0 01-.89-3.65l.001-.048a7.97 7.97 0 01.89-3.603 7.989 7.989 0 012.825-3.136c.135-.093.271-.18.397-.249.129-.075.26-.146.397-.214l.023-.012A7.964 7.964 0 018 4a7.977 7.977 0 015.92-.155zM9 6a1 1 0 11-2 0 1 1 0 012 0zm-3 2a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2zm-5 3a1 1 0 011-1h4a1 1 0 110 2H6a1 1 0 01-1-1z" />
                  </svg>
                  Fun Activities
                </a>
                <a href="about.php" class="flex items-center gap-2 w-full px-4 py-2 rounded-lg bg-white/50 border border-sky-200 hover:bg-white/70 transition-all duration-300 text-slate-700 text-sm font-medium hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                  </svg>
                  About Us
                </a>
                <a href="sol_n_track.php" class="flex items-center gap-2 w-full px-4 py-2 rounded-lg bg-white/50 border border-sky-200 hover:bg-white/70 transition-all duration-300 text-slate-700 text-sm font-medium hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                  </svg>
                  Solutions & Tracking
                </a>
              </div>
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-sky-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
              <p class="text-slate-600 text-sm">
                © 2024 NueroVista. All rights reserved.
              </p>
              <ul class="flex gap-6">
                <li><a href="#" class="text-slate-600 text-sm hover:text-slate-800 transition-colors duration-300">Privacy Policy</a></li>
                <li><a href="#" class="text-slate-600 text-sm hover:text-slate-800 transition-colors duration-300">Terms of Service</a></li>
              </ul>
            </div>
          </div>

          <!-- Inspirational Quote Section -->
          <div class="mt-12 text-center" data-aos="fade-up">
            <div class="max-w-2xl mx-auto p-8 bg-white/30 backdrop-blur-sm rounded-2xl shadow-xl">
              <h3 class="text-2xl font-bold text-slate-800 mb-4">Daily Inspiration</h3>
              <blockquote class="text-lg text-slate-700 italic mb-4">
                "Mental health is not a destination, but a process. It's about how you drive, not where you're going."
              </blockquote>
              <p class="text-slate-600">- Noam Shpancer</p>
            </div>
          </div>

          <!-- Interactive Wellness Tips -->
          <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">
            <div class="p-6 bg-white/30 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div class="text-sky-600 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h4 class="text-xl font-semibold text-slate-800 mb-2">Take a Mindful Moment</h4>
              <p class="text-slate-600">Pause, breathe, and center yourself. Even a minute of mindfulness can make a difference.</p>
            </div>

            <div class="p-6 bg-white/30 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div class="text-sky-600 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h4 class="text-xl font-semibold text-slate-800 mb-2">Express Gratitude</h4>
              <p class="text-slate-600">List three things you're grateful for today. Gratitude can shift your perspective.</p>
            </div>

            <div class="p-6 bg-white/30 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-shadow">
              <div class="text-sky-600 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
              </div>
              <h4 class="text-xl font-semibold text-slate-800 mb-2">Boost Your Energy</h4>
              <p class="text-slate-600">Stand up, stretch, or take a short walk. Movement energizes body and mind.</p>
            </div>
          </div>
        </div>

        <!-- Animated background elements -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
          <div class="floating-shapes">
            <div class="shape-1 absolute w-24 h-24 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
            <div class="shape-2 absolute w-32 h-32 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
            <div class="shape-3 absolute w-20 h-20 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header/footer.php'; ?>
</body>

</html>