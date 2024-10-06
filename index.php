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

    <div class="w-full  bg-zinc-900">
      <div class="parent relative w-full h-[900vh] ">
        <div class="w-full sticky top-0 left-0 h-screen">
          <canvas class="w-full h-screen" id=" canvas"></canvas>
        </div>
      </div>
    </div>
    <div class="page3 w-full h-screen bg-zinc-900"></div>
  </div>


  <?php include 'header/footer.php'; ?>

</body>

</html>