<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include 'header/header.php'; ?>
</head>

<body id="funseg" class="bg-gradient-to-br from-black to-zinc-900 selection:bg-green-500 selection:text-white">
    <audio autoplay muted loop src="./assets/takealongs/audio/audio2.mp3"></audio>
    <div class="main">
        <div class="page1 relative min-h-screen" id="page1">
            <img class="absolute inset-0 w-full h-full object-cover opacity-20 z-[1]" src="https://t4.ftcdn.net/jpg/05/04/46/39/360_F_504463966_3PK2hdAKXebryGMgkpfZy5PrEpgub6VG.png" alt="Background">

            <nav class="relative z-20 flex justify-between items-center px-8 py-6">
                <div class="logo">
                    <a href="./index.php">
                        <h3 class="magnet text-white">NueroVista.</h3>
                    </a>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-music magnet text-2xl hover:text-amber-300 transition-colors cursor-pointer" style="color:white" id="playsong" onclick="songplay()"></i>
                </div>
            </nav>

            <div class="thumbnailPage absolute z-[11] w-full">
                <div class="titles z-[1] text-center mb-12">
                    <h1 class="text-amber-200 text-5xl font-bold mb-4 hover:text-amber-300 transition-colors">Try Playground</h1>
                    <h4 class="text-white text-2xl font-light">
                        Relax your Brain with Our Collection of Games
                    </h4>
                </div>

                <div class="thumbnails backdrop-blur-sm bg-black/50 rounded-xl p-8">
                    <div class="thumbnail transform hover:scale-105 transition-transform">
                        <a href="https://play.famobi.com/om-nom-run" class="block hover:shadow-xl">
                            <div class="thumbnailImage overflow-hidden rounded-t-lg">
                                <img src="./assets/takealongs/images/game1.jpg" alt="Om Nom Run" class="hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="thumbnailTitle bg-black/80 p-4 rounded-b-lg">
                                <h3 class="text-white hover:text-amber-300 transition-colors">Om Nom Run</h3>
                            </div>
                        </a>
                    </div>

                    <div class="thumbnail transform hover:scale-105 transition-transform">
                        <a href="https://play.famobi.com/archery-world-tour" class="block hover:shadow-xl">
                            <div class="thumbnailImage overflow-hidden rounded-t-lg">
                                <img src="./assets/takealongs/images/game2.jpg" alt="Archery World Tour" class="hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="thumbnailTitle bg-black/80 p-4 rounded-b-lg">
                                <h3 class="text-white hover:text-amber-300 transition-colors">Archery World Tour</h3>
                            </div>
                        </a>
                    </div>

                    <div class="thumbnail transform hover:scale-105 transition-transform">
                        <a href="https://play.famobi.com/8-ball-billiards-classic" class="block hover:shadow-xl">
                            <div class="thumbnailImage overflow-hidden rounded-t-lg">
                                <img src="./assets/takealongs/images/game3.jpg" alt="8 Ball Billiards" class="hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="thumbnailTitle bg-black/80 p-4 rounded-b-lg">
                                <h3 class="text-white hover:text-amber-300 transition-colors">8 Ball Billiards Classic</h3>
                            </div>
                        </a>
                    </div>

                    <div class="thumbnail transform hover:scale-105 transition-transform">
                        <a href="https://play.famobi.com/guess-their-answer" class="block hover:shadow-xl">
                            <div class="thumbnailImage overflow-hidden rounded-t-lg">
                                <img src="./assets/takealongs/images/game4.jpg" alt="Guess Their Answer" class="hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="thumbnailTitle bg-black/80 p-4 rounded-b-lg">
                                <h3 class="text-white hover:text-amber-300 transition-colors">Guess Their Answer</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-32"></div>

        <div class="page-2 w-full min-h-screen bg-black" id="page2">
            <div class="paintTitle py-8">
                <h1 class="text-4xl font-bold text-amber-200 hover:text-amber-300 transition-colors">Draw Your Thoughts Here</h1>
            </div>
            <div class="paint p-4">
                <iframe
                    src="https://sketch.io/sketchpad/"
                    width="100%"
                    height="800px"
                    class="rounded-xl shadow-2xl border-2 border-amber-200">
                </iframe>
            </div>
        </div>

        <div class="h-32"></div>

        <div class="page-3 w-full min-h-screen bg-black/90 p-8" id="page3">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-amber-200 hover:text-amber-300 transition-colors">Interactive Sound Board</h1>
                <p class="text-gray-300 mt-4">Click the keys to create your own melody!</p>
            </div>

            <div class="max-w-4xl mx-auto bg-black/60 p-8 rounded-xl shadow-2xl border border-amber-200/30">
                <div class="grid grid-cols-8 gap-2 mb-8">
                    <!-- Piano keys -->
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="C4">C</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="D4">D</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="E4">E</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="F4">F</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="G4">G</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="A4">A</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="B4">B</button>
                    <button class="piano-key bg-white hover:bg-amber-100 h-32 rounded-b-lg transition-colors shadow-lg" data-note="C5">C</button>
                </div>

                <div class="flex justify-center gap-4">
                    <button id="recordButton" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-full transition-colors">
                        Record
                    </button>
                    <button id="playButton" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full transition-colors">
                        Play Recording
                    </button>
                </div>

                <div class="mt-8 text-center">
                    <div id="visualizer" class="h-24 bg-black/40 rounded-lg overflow-hidden"></div>
                </div>
            </div>
        </div>
        <div class="h-32"></div>

    </div>

    <?php include 'header/footer.php'; ?>
</body>

</html>