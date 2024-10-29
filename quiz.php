<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minds Of Teens</title>
    <?php include 'header/header.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js"></script>
</head>
<audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>

<body id="p4" class="bg-gradient-to-br from-emerald-900 to-green-900">
    <nav class="fixed z-20 flex justify-between items-center px-8 py-6">
        <div class="logo">
            <h3 class="magnet text-white text-3xl font-bold hover:text-amber-300 transition-colors">NueroVista.</h3>
        </div>
        <div class="icon">
            <i class="fa-solid fa-music magnet text-2xl hover:text-amber-300 transition-colors cursor-pointer" style="color:white" id="playsong" onclick="songplay()"></i>
        </div>
    </nav>

    <div class="progress-bar"></div>
    <div class="particles"></div>
    <canvas id="quiz-canvas"></canvas>

    <div class="quiz-container">
        <div class="question-card" data-index="1">
            <h3 class="question-text">How often do you feel overwhelmed by your emotions?</h3>
            <div class="options">
                <div class="option">✨ Rarely or never</div>
                <div class="option">🌟 Sometimes</div>
                <div class="option">⭐ Often</div>
                <div class="option">💫 Almost always</div>
            </div>
        </div>

        <div class="question-card" data-index="2">
            <h3 class="question-text">How well do you handle stress in your daily life?</h3>
            <div class="options">
                <div class="option">🌈 Very well</div>
                <div class="option">✨ Moderately well</div>
                <div class="option">🌟 Not very well</div>
                <div class="option">⭐ Poorly</div>
            </div>
        </div>

        <div class="question-card" data-index="3">
            <h3 class="question-text">How often do you experience difficulty sleeping?</h3>
            <div class="options">
                <div class="option">🌙 Rarely or never</div>
                <div class="option">✨ A few times a month</div>
                <div class="option">🌟 Several times a week</div>
                <div class="option">⭐ Almost every night</div>
            </div>
        </div>

        <div class="question-card" data-index="4">
            <h3 class="question-text">How would you rate your ability to concentrate?</h3>
            <div class="options">
                <div class="option">🎯 Excellent</div>
                <div class="option">✨ Good</div>
                <div class="option">🌟 Fair</div>
                <div class="option">⭐ Poor</div>
            </div>
        </div>

        <div class="question-card" data-index="5">
            <h3 class="question-text">How often do you feel lonely or isolated?</h3>
            <div class="options">
                <div class="option">🌺 Rarely or never</div>
                <div class="option">✨ Sometimes</div>
                <div class="option">🌟 Often</div>
                <div class="option">⭐ Very often</div>
            </div>
        </div>

        <!-- Added new questions -->
        <div class="question-card" data-index="6">
            <h3 class="question-text">How do you typically deal with challenging situations?</h3>
            <div class="options">
                <div class="option">🦁 Face them head-on</div>
                <div class="option">🦊 Seek help from others</div>
                <div class="option">🐢 Take time to process</div>
                <div class="option">🦉 Avoid if possible</div>
            </div>
        </div>

        <div class="question-card" data-index="7">
            <h3 class="question-text">How often do you engage in activities you enjoy?</h3>
            <div class="options">
                <div class="option">🎨 Daily</div>
                <div class="option">🎭 Few times a week</div>
                <div class="option">🎪 Occasionally</div>
                <div class="option">🎯 Rarely</div>
            </div>
        </div>
        <div class="question-card" data-index="8">
            <h3 class="question-text">How would you describe your energy levels throughout the day?</h3>
            <div class="options">
                <div class="option">⚡ Consistently high</div>
                <div class="option">🌅 Varies but generally good</div>
                <div class="option">🌙 Often low</div>
                <div class="option">💫 Very inconsistent</div>
            </div>
        </div>

        <div class="question-card" data-index="9">
            <h3 class="question-text">How do you handle unexpected changes in your routine?</h3>
            <div class="options">
                <div class="option">🌈 Adapt easily</div>
                <div class="option">🌤️ Take some time but manage</div>
                <div class="option">🌥️ Find it challenging</div>
                <div class="option">⛈️ Get very stressed</div>
            </div>
        </div>

        <div class="question-card" data-index="10">
            <h3 class="question-text">How often do you feel overwhelmed by your responsibilities?</h3>
            <div class="options">
                <div class="option">🍃 Rarely</div>
                <div class="option">🌿 Sometimes</div>
                <div class="option">🌱 Frequently</div>
                <div class="option">🌳 Almost always</div>
            </div>
        </div>

        <div class="question-card" data-index="11">
            <h3 class="question-text">How would you rate your self-confidence?</h3>
            <div class="options">
                <div class="option">👑 Very high</div>
                <div class="option">💫 Generally good</div>
                <div class="option">✨ Could be better</div>
                <div class="option">⭐ Need improvement</div>
            </div>
        </div>

        <div class="question-card" data-index="12">
            <h3 class="question-text">How do you usually express your emotions?</h3>
            <div class="options">
                <div class="option">💝 Openly and easily</div>
                <div class="option">💖 Selectively share</div>
                <div class="option">💗 Keep to myself mostly</div>
                <div class="option">💓 Difficulty expressing</div>
            </div>
        </div>

        <div class="question-card" data-index="13">
            <h3 class="question-text">How often do you take breaks during work/study?</h3>
            <div class="options">
                <div class="option">🎯 Regular scheduled breaks</div>
                <div class="option">🎪 When feeling tired</div>
                <div class="option">🎭 Rarely take breaks</div>
                <div class="option">🎨 Work until finished</div>
            </div>
        </div>

        <div class="question-card" data-index="14">
            <h3 class="question-text">How do you handle criticism?</h3>
            <div class="options">
                <div class="option">🦋 Welcome it as growth</div>
                <div class="option">🐝 Consider it carefully</div>
                <div class="option">🐛 Sometimes take it personally</div>
                <div class="option">🕷️ Very sensitive to it</div>
            </div>
        </div>

        <div class="question-card" data-index="15">
            <h3 class="question-text">How often do you practice self-care?</h3>
            <div class="options">
                <div class="option">🌺 Daily routine</div>
                <div class="option">🌸 Few times a week</div>
                <div class="option">🌼 When stressed</div>
                <div class="option">🌻 Rarely</div>
            </div>
        </div>

        <div class="question-card" data-index="16">
            <h3 class="question-text">How do you feel about your future?</h3>
            <div class="options">
                <div class="option">🌠 Very optimistic</div>
                <div class="option">⭐ Generally positive</div>
                <div class="option">✨ Somewhat uncertain</div>
                <div class="option">💫 Worried</div>
            </div>
        </div>

        <div class="question-card" data-index="17">
            <h3 class="question-text">How well do you maintain boundaries in relationships?</h3>
            <div class="options">
                <div class="option">🛡️ Very well</div>
                <div class="option">🔮 Usually good</div>
                <div class="option">🎭 Sometimes struggle</div>
                <div class="option">🌫️ Often unclear</div>
            </div>
        </div>

        <div class="question-card" data-index="18">
            <h3 class="question-text">How do you handle stress?</h3>
            <div class="options">
                <div class="option">🧘 Use healthy coping strategies</div>
                <div class="option">🎵 Try to stay balanced</div>
                <div class="option">🌊 Get overwhelmed sometimes</div>
                <div class="option">🌪️ Often feel consumed by it</div>
            </div>
        </div>

        <div class="question-card" data-index="19">
            <h3 class="question-text">How satisfied are you with your social connections?</h3>
            <div class="options">
                <div class="option">🤝 Very satisfied</div>
                <div class="option">🫂 Generally good</div>
                <div class="option">👥 Could be better</div>
                <div class="option">🕊️ Feel disconnected</div>
            </div>
        </div>

        <div class="question-card" data-index="20">
            <h3 class="question-text">How often do you try new things?</h3>
            <div class="options">
                <div class="option">🎯 Frequently</div>
                <div class="option">🎪 Sometimes</div>
                <div class="option">🎭 Occasionally</div>
                <div class="option">🎨 Rarely</div>
            </div>
        </div>

        <div class="question-card" data-index="21">
            <h3 class="question-text">How do you handle disappointment?</h3>
            <div class="options">
                <div class="option">🌈 Learn and move forward</div>
                <div class="option">🌤️ Take time to process</div>
                <div class="option">🌥️ Struggle but cope</div>
                <div class="option">⛈️ Have difficulty moving on</div>
            </div>
        </div>

        <div class="question-card" data-index="22">
            <h3 class="question-text">How often do you feel proud of yourself?</h3>
            <div class="options">
                <div class="option">🌟 Very often</div>
                <div class="option">✨ Regularly</div>
                <div class="option">💫 Sometimes</div>
                <div class="option">⭐ Rarely</div>
            </div>
        </div>

        <div class="question-card" data-index="23">
            <h3 class="question-text">How do you approach personal growth?</h3>
            <div class="options">
                <div class="option">🚀 Actively seek opportunities</div>
                <div class="option">🌱 Open to learning</div>
                <div class="option">🍃 When necessary</div>
                <div class="option">🌿 Prefer comfort zone</div>
            </div>
        </div>

        <div class="question-card" data-index="24">
            <h3 class="question-text">How do you feel about asking for help?</h3>
            <div class="options">
                <div class="option">🤝 Comfortable asking</div>
                <div class="option">🫂 Sometimes hesitant</div>
                <div class="option">👥 Prefer handling alone</div>
                <div class="option">🕊️ Very difficult</div>
            </div>
        </div>

    </div>



    <script>
        // Three.js Background
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            canvas: document.querySelector("#quiz-canvas"),
            alpha: true,
            antialias: true
        });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);

        // Create a complex dodecahedron with custom geometry
        const radius = 12;
        const detail = 3;
        const geometry = new THREE.DodecahedronGeometry(radius, detail);

        // Create custom material with more visual effects
        const material = new THREE.MeshPhysicalMaterial({
            color: 0x71b280,
            metalness: 0.7,
            roughness: 0.2,
            wireframe: true,
            transparent: true,
            opacity: 0.6,
            side: THREE.DoubleSide,
            emissive: 0x2ecc71,
            emissiveIntensity: 0.3,
            clearcoat: 1.0,
            clearcoatRoughness: 0.1
        });

        const dodecahedron = new THREE.Mesh(geometry, material);
        scene.add(dodecahedron);

        // Add stronger ambient light
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        // Add more dynamic point lights
        const light1 = new THREE.PointLight(0x71b280, 3);
        light1.position.set(0, 0, 50);
        scene.add(light1);

        const light2 = new THREE.PointLight(0x134e5e, 3);
        light2.position.set(50, 0, 0);
        scene.add(light2);

        const light3 = new THREE.PointLight(0x2ecc71, 2.5);
        light3.position.set(-50, -50, 25);
        scene.add(light3);

        // Add spotlight for dramatic effect
        const spotlight = new THREE.SpotLight(0xffffff, 2);
        spotlight.position.set(0, 50, 50);
        spotlight.angle = Math.PI / 4;
        spotlight.penumbra = 0.1;
        spotlight.decay = 2;
        spotlight.distance = 200;
        scene.add(spotlight);

        camera.position.z = 40;

        // More complex animation
        function animate() {
            requestAnimationFrame(animate);

            // Complex rotation patterns
            dodecahedron.rotation.x += 0.003;
            dodecahedron.rotation.y += 0.004;
            dodecahedron.rotation.z += 0.002;

            // Dynamic morphing effect
            const time = Date.now() * 0.001;
            geometry.vertices?.forEach((vertex, i) => {
                const initialPosition = vertex.clone();
                vertex.x = initialPosition.x + Math.sin(time + i * 0.1) * 0.3;
                vertex.y = initialPosition.y + Math.cos(time + i * 0.1) * 0.3;
                vertex.z = initialPosition.z + Math.sin(time + i * 0.2) * 0.3;
            });
            geometry.verticesNeedUpdate = true;

            // Pulsating scale with more complex pattern
            const pulseScale = 1 + Math.sin(time) * 0.15 + Math.cos(time * 1.5) * 0.1;
            dodecahedron.scale.set(pulseScale, pulseScale, pulseScale);

            // Dynamic light movement
            light1.position.x = Math.sin(time) * 40;
            light1.position.y = Math.cos(time * 1.3) * 40;
            light2.position.y = Math.cos(time) * 40;
            light2.position.z = Math.sin(time * 1.2) * 40;
            light3.position.z = Math.sin(time * 1.5) * 30 + 25;
            light3.position.x = Math.cos(time * 1.1) * 30;

            // Spotlight movement
            spotlight.position.x = Math.sin(time * 0.7) * 30;
            spotlight.position.y = 50 + Math.cos(time * 0.5) * 20;

            renderer.render(scene, camera);
        }
        animate();

        // Rest of the JavaScript remains the same
        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        const cards = document.querySelectorAll(".question-card");
        cards.forEach((card, index) => {
            gsap.fromTo(
                card, {
                    opacity: 0,
                    y: 50,
                    scale: 0.95,
                    rotateX: -5,
                }, {
                    scrollTrigger: {
                        trigger: card,
                        start: "top bottom-=100",
                        toggleActions: "play none none reverse",
                    },
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    rotateX: 0,
                    duration: 0.8,
                    delay: index * 0.1,
                    ease: "power3.out",
                }
            );
        });

        document.querySelectorAll(".option").forEach((option) => {
            option.addEventListener("click", () => {
                const parent = option.parentElement;
                parent.querySelectorAll(".option").forEach((opt) => {
                    opt.classList.remove("selected");
                    gsap.to(opt, {
                        scale: 1,
                        rotation: 0,
                        duration: 0.3,
                        ease: "power2.out",
                    });
                });

                option.classList.add("selected");
                gsap.to(option, {
                    scale: 1.05,
                    rotation: 2,
                    duration: 0.4,
                    ease: "elastic.out(1, 0.5)",
                });

                createParticleBurst(option);
                createRippleEffect(option);
            });
        });

        function createParticleBurst(element) {
            const rect = element.getBoundingClientRect();
            const particles = 20;

            for (let i = 0; i < particles; i++) {
                const particle = document.createElement("div");
                particle.style.position = "fixed";
                particle.style.width = Math.random() * 8 + 4 + "px";
                particle.style.height = particle.style.width;
                particle.style.background = `hsl(${Math.random() * 60 + 120}, 70%, 60%)`;
                particle.style.borderRadius = "50%";
                particle.style.left = rect.left + rect.width / 2 + "px";
                particle.style.top = rect.top + rect.height / 2 + "px";
                particle.style.boxShadow = "0 0 10px rgba(113, 178, 128, 0.5)";
                document.querySelector(".particles").appendChild(particle);

                gsap.to(particle, {
                    x: (Math.random() - 0.5) * 300,
                    y: (Math.random() - 0.5) * 300,
                    opacity: 0,
                    duration: 1 + Math.random() * 0.5,
                    ease: "power2.out",
                    onComplete: () => particle.remove(),
                });
            }
        }

        function createRippleEffect(element) {
            const ripple = document.createElement("div");
            ripple.style.position = "absolute";
            ripple.style.width = "20px";
            ripple.style.height = "20px";
            ripple.style.border = "2px solid rgba(255, 255, 255, 0.5)";
            ripple.style.borderRadius = "50%";
            ripple.style.transform = "translate(-50%, -50%)";
            element.appendChild(ripple);

            gsap.to(ripple, {
                width: "200px",
                height: "200px",
                opacity: 0,
                duration: 1,
                ease: "power2.out",
                onComplete: () => ripple.remove(),
            });
        }

        window.addEventListener("scroll", () => {
            const scrolled = window.scrollY;
            const max = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrolled / max) * 100;
            gsap.to(".progress-bar", {
                width: progress + "%",
                duration: 0.3,
                ease: "power1.out",
            });
        });

        window.addEventListener("resize", () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
        // Reduce logo size on scroll
        window.addEventListener("scroll", () => {
            const logo = document.querySelector(".logo h3");
            const scrolled = window.scrollY;

            if (scrolled > 50) {
                gsap.to(logo, {
                    scale: 0.8,
                    duration: 0.3,
                    ease: "power2.out"
                });
            } else {
                gsap.to(logo, {
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            }
        });
    </script>

    <?php include 'header/footer.php'; ?>
</body>

</html>