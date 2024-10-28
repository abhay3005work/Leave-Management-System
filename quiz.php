<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Quiz</title>
    <?php include 'header/header.php'; ?>

    <style>
        .quiz-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .question-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
            transform: translateY(100px);
            opacity: 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease;
        }

        .question-text {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 1.5rem;
            font-family: "matter";
        }

        .options {
            display: grid;
            gap: 1rem;
        }

        .option {
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
        }

        .selected {
            background: rgba(0, 255, 255, 0.2) !important;
            border-color: cyan;
        }

        #quiz-canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, cyan, purple);
            z-index: 1000;
        }

        .question-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
    </style>

    <div class="progress-bar"></div>
    <canvas id="quiz-canvas"></canvas>

    <div class="quiz-container">
        <div class="question-card" data-index="1">
            <img src="./assets/takealongs/images/mental1.jpg" class="question-image">
            <h3 class="question-text">How often do you feel overwhelmed by your emotions?</h3>
            <div class="options">
                <div class="option">Rarely or never</div>
                <div class="option">Sometimes</div>
                <div class="option">Often</div>
                <div class="option">Almost always</div>
            </div>
        </div>

        <!-- Repeat similar structure for 29 more questions -->
        <div class="question-card" data-index="2">
            <img src="./assets/takealongs/images/mental2.jpg" class="question-image">
            <h3 class="question-text">How well do you handle stress in your daily life?</h3>
            <div class="options">
                <div class="option">Very well</div>
                <div class="option">Moderately well</div>
                <div class="option">Not very well</div>
                <div class="option">Poorly</div>
            </div>
        </div>

        <!-- Add more questions following the same pattern -->

    </div>

    <script>
        // Three.js Background
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            canvas: document.querySelector('#quiz-canvas'),
            alpha: true
        });
        renderer.setSize(window.innerWidth, window.innerHeight);

        // Create animated background
        const geometry = new THREE.TorusKnotGeometry(10, 3, 100, 16);
        const material = new THREE.MeshBasicMaterial({
            color: 0x00ffff,
            wireframe: true,
            transparent: true,
            opacity: 0.1
        });
        const torusKnot = new THREE.Mesh(geometry, material);
        scene.add(torusKnot);

        camera.position.z = 30;

        // Animation
        function animate() {
            requestAnimationFrame(animate);
            torusKnot.rotation.x += 0.01;
            torusKnot.rotation.y += 0.01;
            renderer.render(scene, camera);
        }
        animate();

        // GSAP Animations
        const cards = document.querySelectorAll('.question-card');
        cards.forEach(card => {
            gsap.to(card, {
                scrollTrigger: {
                    trigger: card,
                    start: "top center+=100",
                    toggleActions: "play none none reverse"
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        });

        // Handle option selection
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', () => {
                const parent = option.parentElement;
                parent.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
            });
        });

        // Update progress bar
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            const max = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrolled / max) * 100;
            document.querySelector('.progress-bar').style.width = progress + '%';
        });
    </script>

    <?php include 'header/footer.php'; ?>
    </body>

</html>