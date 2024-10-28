<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minds Of Teens</title>
  <?php include 'header/header.php'; ?>

</head>

<body id="p1">
  <!-- <div class="loader-wrapper">
    <div class="loader">
      <div class="loader-text">
        <span class="fade-up">NueroVista</span>
        <span class="fade-up">.</span>
      </div>
    </div>
  </div> -->




  <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
  <div class="main">
    <div class="page1 h-screen w-full">
      <video
        autoplay
        muted
        loop
        src="./assets/takealongs/video/12417857_1280_720_30fps.mp4"></video>
      <div class="page1text">
        <nav>
          <div class="logo">
            <h3 class="magnet">NueroVista.</h3>
          </div>
          <div class="navLinks magnet">
            <a href="#">Quiz</a>
            <a href="./funseg.php">Resources</a>
            <a href="./about_us.php">About Us</a>
          </div>

          <div class="icon">
            <i class="fa-solid fa-music magnet" id="playsong " onclick="songplay()"></i>
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
            class="textdiv absolute animate1 z-[99] text-black bottom-20 w-1/2 left-20">
            <h1 class=" maintext">Solutions that fit your needs.</h1>
          </div>
          <div
            class="absolute animate2 z-[99] text-white bottom-20 w-1/2 right-20 opacity-0">
            <h1 class=" maintext">
              Guided steps to a healthier mind.
            </h1>
          </div>
          <div
            class="absolute animate3 z-[99] text-black bottom-20 w-1/2 left-20 opacity-0">
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
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/1.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/2.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/3.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/4.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/5.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/6.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img class="img" src="./assets/takealongs/images/7.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="page4 relative h-screen w-full flex flex-col items-center justify-center gap-12" style="background: linear-gradient(135deg, #0891b2, #0d9488, #06b6d4);">
      <div class="text-center max-w-2xl px-4">
        <h2 class="text-4xl font-bold text-white mb-4">Take a Break & Play Games</h2>
        <p class="text-white/90 text-lg">Need a moment to recharge? Explore our collection of fun and engaging games. A little entertainment can boost your creativity and productivity!</p>
      </div>
      <div class="eye-container">
        <div class="eye">
          <div class="eyelid"></div>
          <div class="pupil"></div>
          <div class="reflection"></div>
        </div>
        <div class="eye" style="margin-left: 40px;">
          <div class="eyelid"></div>
          <div class="pupil"></div>
          <div class="reflection"></div>
        </div>
      </div>
      <a href="funseg.php" class="hover-btn px-12 py-6 bg-white/20 backdrop-blur-sm rounded-2xl text-xl font-medium text-white border-2 border-white/30 hover:bg-white/30 transition-all duration-300 hover:shadow-xl hover:shadow-cyan-500/20 relative overflow-hidden group">
        <span class="relative z-10">Let's Play!</span>
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-teal-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
      </a>

    </div>


    <div class="page5 relative z-50" style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe, #bae6fd);">
      <div class="relative overflow-hidden py-20">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="footer-col" data-aos="fade-up" data-aos-delay="100">
              <h3 class="text-4xl font-bold mb-8 text-slate-800">Let's Connect</h3>
              <p class="text-slate-600 mb-8 text-lg leading-relaxed">
                Join our community and stay updated with the latest news, updates and special offers.
              </p>
              <div class="flex gap-6">
                <a href="#" class="w-14 h-14 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                  </svg>
                </a>
                <a href="#" class="w-14 h-14 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                  </svg>
                </a>
                <a href="#" class="w-14 h-14 rounded-full bg-white/50 text-slate-700 flex items-center justify-center hover:bg-white/70 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg hover:shadow-sky-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                  </svg>
                </a>
              </div>
            </div>

            <div class="footer-col" data-aos="fade-up" data-aos-delay="200">
              <h3 class="text-4xl font-bold mb-8 text-slate-800">Newsletter</h3>
              <p class="text-slate-600 mb-6 text-lg leading-relaxed">
                Subscribe to our newsletter for exclusive content and updates.
              </p>
              <div class="space-y-4">
                <input type="email" placeholder="Enter your email" class="w-full px-6 py-4 rounded-xl bg-white/50 border-2 border-sky-200 focus:outline-none focus:border-sky-300 transition-colors duration-300 text-slate-700 placeholder-slate-500 text-lg">
                <button class="w-full px-8 py-4 bg-white/50 text-slate-700 rounded-xl hover:bg-white/70 transition-all duration-300 hover:shadow-lg hover:shadow-sky-200 text-lg font-medium border-2 border-sky-200 hover:border-sky-300">
                  Subscribe
                </button>
              </div>
            </div>
          </div>

          <div class="mt-20 pt-10 border-t border-sky-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
              <p class="text-slate-600 text-lg">
                © 2024 Your Company. All rights reserved.
              </p>
              <ul class="flex gap-8">
                <li><a href="#" class="text-slate-600 hover:text-slate-800 transition-colors duration-300">Privacy Policy</a></li>
                <li><a href="#" class="text-slate-600 hover:text-slate-800 transition-colors duration-300">Terms of Service</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Animated background elements -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
          <div class="floating-shapes">
            <div class="shape-1 absolute w-32 h-32 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
            <div class="shape-2 absolute w-40 h-40 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
            <div class="shape-3 absolute w-28 h-28 rounded-full bg-gradient-to-r from-sky-100 to-sky-200 opacity-50 blur-sm"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header/footer.php'; ?>
</body>

</html>