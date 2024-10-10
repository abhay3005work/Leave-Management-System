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
        <h1 class="h1text"><span>Learn About </span>NueroVista.</h1>
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
      <div class="boxes">
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/1.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/2.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/3.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/4.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/5.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/6.jpg" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="boxtitle">
            <h5>1.0</h5>
            <h4>Lorem ipsum dolor sit.</h4>
          </div>
          <div class="boximg">
            <img src="./assets/takealongs/images/7.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="page4"></div>

  </div>


  <?php include 'header/footer.php'; ?>

</body>

</html>