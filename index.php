<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minds Of Teens</title>
  <?php include 'header/header.php'; ?>

</head>

<body id="p1">
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
    <div class="page4 bg-zinc-100 relative h-screen flex flex-col items-center justify-center">
      <div class="eye-container flex gap-32" id="eyeContainer">
        <div class="eye w-48 h-48 bg-white rounded-full flex items-center justify-center relative">
          <div class="eyePupil w-24 h-24 bg-black rounded-full absolute"></div>
          <div class="eyelid w-48 h-48 bg-zinc-100 rounded-full absolute transform origin-top transition-transform duration-200"></div>
        </div>
        <div class="eye w-48 h-48 bg-white rounded-full flex items-center justify-center relative">
          <div class="eyePupil w-24 h-24 bg-black rounded-full absolute"></div>
          <div class="eyelid w-48 h-48 bg-zinc-100 rounded-full absolute transform origin-top transition-transform duration-200"></div>
        </div>
      </div>
      <a href="funseg.php" class="fun-btn mt-12 px-8 py-4 bg-blue-500 text-white rounded-lg"
        onmouseenter="
          gsap.to(this, {scale: 1.2, y: -10, boxShadow: '0 20px 30px rgba(0,0,0,0.2)', backgroundColor: '#9333ea', duration: 0.5, ease: 'elastic.out(1, 0.3)'});
        "
        onmouseleave="
          gsap.to(this, {scale: 1, y: 0, boxShadow: '0 0 0 rgba(0,0,0,0)', backgroundColor: '#3b82f6', duration: 0.3, ease: 'power3.out'});
        ">
        Visit Fun Segment
      </a>
    </div>

    <div class="page5 bg-zinc-200">

    </div>
  </div>
  <?php include 'header/footer.php'; ?>
</body>

</html>