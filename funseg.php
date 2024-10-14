<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minds Of Teens</title>
    <?php include 'header/header.php'; ?>
</head>

<body id="p3">
    <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
    <div class="main">

        <div class="page1 bg-zinc-900" id="page1">
            <img class="absolute z-[1]" src="https://t4.ftcdn.net/jpg/05/04/46/39/360_F_504463966_3PK2hdAKXebryGMgkpfZy5PrEpgub6VG.png" alt="">
            <nav>
                <div class="logo">
                    <h3 class="magnet text-white">NueroVista.</h3>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-music magnet" style="color:white" id="playsong" onclick="songplay()"></i>
                </div>
            </nav>
            <div class="thumbnailPage absolute z-[11]">
                <div class="titles z-[1]">
                    <h1>try Playground</h1>
                    <h4>
                        Relax your Brain
                    </h4>
                </div>
                <div class="thumbnails">
                    <div class="thumbnail">
                        <a href="https://play.famobi.com/om-nom-run">
                            <div class="thumbnailImage">
                                <img src="./assets/takealongs/images/game1.jpg" alt="">
                            </div>
                            <div class="thumbnailTitle ">
                                <h3>Om Nom Run</h3>
                            </div>
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a href="https://play.famobi.com/archery-world-tour">
                            <div class="thumbnailImage">
                                <img src="./assets/takealongs/images/game2.jpg" alt="">
                            </div>
                            <div class="thumbnailTitle">
                                <h3>Archery World Tour</h3>
                            </div>
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a href="https://play.famobi.com/8-ball-billiards-classic">
                            <div class="thumbnailImage">
                                <img src="./assets/takealongs/images/game3.jpg" alt="">
                            </div>
                            <div class="thumbnailTitle">
                                <h3>8 Ball Billiards Classic</h3>
                            </div>
                        </a>
                    </div>
                    <div class="thumbnail">
                        <a href="https://play.famobi.com/guess-their-answer">
                            <div class="thumbnailImage">
                                <img src="./assets/takealongs/images/game4.jpg" alt="">
                            </div>
                            <div class="thumbnailTitle">
                                <h3>Guess Their Answer</h3>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
        <div class="page-2 w-full h-screen" id="page2">
            <div class="paintTitle">
                <h1>Draw Your Thoughts Here</h1>
            </div>
            <div class="paint">
                <iframe
                    src="https://sketch.io/sketchpad/"
                    width="100%"
                    height="100%"
                    style="border:1px solid black;">
                </iframe>


            </div>

        </div>
    </div>
    <?php include 'header/footer.php'; ?>
</body>

</html>