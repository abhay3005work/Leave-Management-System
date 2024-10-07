<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minds Of Teens</title>
  <?php include 'header/header.php'; ?>

</head>

<body>
  <audio autoplay muted loop src="./assets/takealongs/audio/in-y2mate.com - AUR  TU HAI KAHAN  Raffey  Usama  Ahad Official Music Video.mp3"></audio>
  <div class="main">
    <div class="page1">
      <video
        autoplay
        muted
        loop
        src="./assets/takealongs/video/12417857_1280_720_30fps.mp4"></video>
      <div class="page1text">
        <nav>
          <div class="logo">
            <h3>NueroVista.</h3>
          </div>
          <div class="icon">
            <i class="fa-solid fa-music" id="playsong" onclick="songplay()"></i>
          </div>
        </nav>
        <h1 class="h1text">What is Nuerovista ?</h1>
      </div>
    </div>

    <div class="w-full page2  bg-zinc-900">
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
            <h1 class="maintext">
              Confidential mental health tracking.
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="page3">
      <div class="box">
        <div class="boxtext">
          <h5>1.0</h5>
          <h4>Identify your mental state.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>2.0</h5>
          <h4>Solutions for stress</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>3.0</h5>
          <h4>Check, track, and heal.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>4.0</h5>
          <h4>No hospital vibes, just care.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>5.0</h5>
          <h4>Your mental health matters.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>6.0</h5>
          <h4>Connect, track, and improve.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
      <div class="box">
        <div class="boxtext">
          <h5>7.0</h5>
          <h4>Support for students, by students.</h4>
        </div>
        <div class="boximg">
          <img src="" alt="">
        </div>
      </div>
    </div>

  </div>


  <?php include 'header/footer.php'; ?>

</body>

</html>