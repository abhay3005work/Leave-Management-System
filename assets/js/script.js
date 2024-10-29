// Initialize Shery.js effects
Shery.mouseFollower({});
Shery.makeMagnet(".magnet", {});

function songplay() {
  let audio = document.querySelector("audio");
  let icon = document.getElementById("playsong");

  if (audio.paused) {
    audio.muted = false;
    audio.play();
    audio.volume = 0.4;
    gsap.to(icon, { duration: 0.3, color: "#9dac94" });
  } else {
    audio.pause();
    audio.muted = true;
    gsap.to(icon, { duration: 0.3, color: "#000" });
  }
}

// Smooth scrolling with Lenis
function lenisscroll() {
  const lenis = new Lenis();
  lenis.on("scroll", (e) => console.log(e));

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
}
lenisscroll();
// Handle loader animation and removal

// Audio and icon animations
function iconanimate() {
  const icon = document.querySelector(".icon i");
  let audio = document.querySelector("audio");

  icon.addEventListener("mouseenter", () => {
    if (audio.paused) {
      gsap.to(icon, {
        duration: 0.3,
        scale: 1.1,
        color: "#9dac94",
        ease: "power1.out",
      });
    }
  });

  icon.addEventListener("mouseleave", () => {
    if (audio.paused) {
      gsap.to(icon, {
        duration: 0.3,
        scale: 1,
        color: "#000",
        ease: "power1.out",
      });
    }
  });
}
iconanimate();

// Navigation animations
function navAnimation() {
  let page2 = document.querySelector("#page2");

  gsap.to("nav h3", {
    color: "black",
    scrollTrigger: {
      trigger: "page2",
      scroller: "body",
      start: "top top",
      onEnter: () => gsap.to("nav h3", { color: "black" }),
      onLeaveBack: () => gsap.to("nav h3", { color: "white" }),
    },
  });

  gsap.to(".icon i", {
    color: "black",
    scrollTrigger: {
      trigger: "page2",
      scroller: "body",
      start: "top top",
      onEnter: () => gsap.to(".icon i", { color: "black" }),
      onLeaveBack: () => gsap.to(".icon i", { color: "white" }),
    },
  });
}
navAnimation();
function handleLoader() {
  window.addEventListener("load", function () {
    setTimeout(function () {
      document.querySelector(".loader-wrapper").classList.add("slide-up");
    }, 2000); // Hide loader after 2 seconds
  });
}
handleLoader();

// Page-specific code
if (document.getElementById("p1")) {
  let page2 = document.querySelector(".page2");

  // Nav links color change on scroll
  gsap.to(".navLinks a", {
    color: "black",
    scrollTrigger: {
      trigger: "page2",
      scroller: "body",
      start: "top top",
      onEnter: () => gsap.to(".navLinks a", { color: "black" }),
      onLeaveBack: () => gsap.to(".navLinks a", { color: "white" }),
    },
  });

  // Frame scroll animation
  function framescrollanimation() {
    const canvas = document.querySelector("canvas");
    const context = canvas.getContext("2d");
    const frames = {
      currentIndex: 0,
      maxIndex: 170,
    };
    const images = [];
    let imagesLoaded = 0;

    function preloadImages() {
      for (var i = 1; i <= frames.maxIndex; i++) {
        const imageUrl = `./frames/frame_${i.toString().padStart(4, "0")}.jpeg`;
        const img = new Image();
        img.src = imageUrl;

        img.onload = function () {
          images.push(img);
          imagesLoaded++;
          if (imagesLoaded === frames.maxIndex) {
            loadImage(frames.currentIndex);
            startAnimation();
            console.log("All images loaded");
          }
        };

        img.onerror = function () {
          console.error(`Failed to load image: ${imageUrl}`);
        };
      }
    }

    function loadImage(index) {
      if (index >= 0 && index < frames.maxIndex) {
        const img = images[index];
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const scaleX = canvas.width / img.width;
        const scaleY = canvas.height / img.height;
        const scale = Math.max(scaleX, scaleY);

        const newWidth = img.width * scale;
        const newHeight = img.height * scale;

        const offsetX = (canvas.width - newWidth) / 2;
        const offsetY = (canvas.height - newHeight) / 2;

        context.clearRect(0, 0, canvas.width, canvas.height);
        context.imageSmoothingEnabled = true;
        context.imageSmoothingQuality = "high";
        context.drawImage(img, offsetX, offsetY, newWidth, newHeight);

        frames.currentIndex = index;
      }
    }

    function startAnimation() {
      var tl = gsap.timeline({
        scrollTrigger: {
          trigger: ".parent",
          start: "top top",
          scrub: 2,
          end: "bottom bottom",
        },
      });

      function updateFrame(index) {
        return {
          currentIndex: index,
          ease: "linear",
          onUpdate: function () {
            loadImage(Math.floor(frames.currentIndex));
          },
        };
      }

      tl.to(frames, updateFrame(50), "a")
        .to(".animate1", { opacity: 0, ease: "linear" }, "a")
        .to(frames, updateFrame(80), "second")
        .to(".animate2", { opacity: 1, ease: "linear" }, "second")
        .to(frames, updateFrame(110), "third")
        .to(".animate2", { opacity: 0, ease: "linear" }, "third")
        .to(frames, updateFrame(140), "fourth")
        .to(".animate3", { opacity: 1, ease: "linear" }, "fourth")
        .to(frames, updateFrame(169), "fifth")
        .to(".animate3", { opacity: 0, ease: "linear" }, "fifth");
    }

    preloadImages();
  }
  framescrollanimation();

  // Page animations
  function page1animation() {
    const page1 = document.querySelector(".page1");
    const h1text = document.querySelector(".page1text h1");
    const nav = document.querySelector("nav");

    let tl = gsap.timeline();
    tl.from(nav, {
      y: -50,
      opacity: 0,
      duration: 0.7,
      stagger: 0.5,
    });
    tl.from(h1text, {
      x: -50,
      opacity: 0,
      duration: 0.7,
    });
  }
  page1animation();

  function page3animation() {
    gsap.to(".page3 .box", {
      transform: "translateX(-700%)",
      scrollTrigger: {
        trigger: ".page3",
        scroller: "body",
        start: "top 0",
        end: "top -150%",
        scrub: 3,
        pin: true,
      },
    });
  }
  page3animation();

  // Shery.js image effects
  function Sheryimg() {
    Shery.imageEffect(".img", {
      style: 4,
      config: {
        uColor: { value: false },
        uSpeed: { value: 0.22, range: [0.1, 1], rangep: [1, 10] },
        uAmplitude: { value: 2.06, range: [0, 5] },
        uFrequency: { value: 2.52, range: [0, 10] },
        geoVertex: { range: [1, 64], value: 45.73 },
        zindex: { value: 1, range: [-9999999, 9999999] },
        aspect: { value: 1.1486583085890245 },
        ignoreShapeAspect: { value: true },
        shapePosition: { value: { x: 0, y: 0 } },
        shapeScale: { value: { x: 0.5, y: 0.5 } },
        shapeEdgeSoftness: { value: 0, range: [0, 0.5] },
        shapeRadius: { value: 0, range: [0, 2] },
        currentScroll: { value: 0 },
        scrollLerp: { value: 0.07 },
        gooey: { value: false },
        infiniteGooey: { value: false },
        growSize: { value: 4, range: [1, 15] },
        durationOut: { value: 1, range: [0.1, 5] },
        durationIn: { value: 1.5, range: [0.1, 5] },
        displaceAmount: { value: 0.5 },
        masker: { value: true },
        maskVal: { value: 1.21, range: [1, 5] },
        scrollType: { value: 0 },
        noEffectGooey: { value: true },
        onMouse: { value: 1 },
        noise_speed: { value: 0.2, range: [0, 10] },
        metaball: { value: 0.2, range: [0, 2] },
        discard_threshold: { value: 0.5, range: [0, 1] },
        antialias_threshold: { value: 0.002, range: [0, 0.1] },
        noise_height: { value: 0.5, range: [0, 2] },
        noise_scale: { value: 10, range: [0, 100] },
      },
    });
  }
  Sheryimg();

  // Loader animation
  // function loaderAnimation() {
  //   var loader = document.querySelector("#loader");
  //   setTimeout(function () {
  //     loader.style.top = "-100%";
  //   }, 4200);
  // }
  // loaderAnimation();

  // Eye tracking and blinking animations
  function eyeAnimations() {
    document.addEventListener("mousemove", (e) => {
      const pupils = document.querySelectorAll(".pupil");
      const mouseX = e.clientX;
      const mouseY = e.clientY;

      pupils.forEach((pupil) => {
        const eyeRect = pupil.parentElement.getBoundingClientRect();
        const eyeCenterX = eyeRect.left + eyeRect.width / 2;
        const eyeCenterY = eyeRect.top + eyeRect.height / 2;

        const angle = Math.atan2(mouseY - eyeCenterY, mouseX - eyeCenterX);
        const distance = Math.min(
          Math.hypot(mouseX - eyeCenterX, mouseY - eyeCenterY) * 0.15,
          40
        );

        const moveX = Math.cos(angle) * distance;
        const moveY = Math.sin(angle) * distance;

        pupil.style.transform = `translate(${moveX}px, ${moveY}px)`;
      });
    });

    // Random blinking
    setInterval(() => {
      const eyelids = document.querySelectorAll(".eyelid");
      eyelids.forEach((eyelid) => {
        gsap.to(eyelid, {
          duration: 0.15,
          top: 0,
          yoyo: true,
          repeat: 1,
          ease: "power2.inOut",
        });
      });
    }, 5000);

    // Eyes close and hide pupils on button hover
    const hoverBtn = document.querySelector(".hover-btn");
    const eyelids = document.querySelectorAll(".eyelid");
    const pupils = document.querySelectorAll(".pupil");

    hoverBtn.addEventListener("mouseenter", () => {
      eyelids.forEach((eyelid) => {
        gsap.to(eyelid, {
          duration: 0.3,
          top: 0,
          ease: "power2.out",
        });
      });
      pupils.forEach((pupil) => {
        gsap.to(pupil, {
          duration: 0.3,
          opacity: 0,
          ease: "power2.out",
        });
      });
    });

    hoverBtn.addEventListener("mouseleave", () => {
      eyelids.forEach((eyelid) => {
        gsap.to(eyelid, {
          duration: 0.3,
          top: "-100%",
          ease: "power2.out",
        });
      });
      pupils.forEach((pupil) => {
        gsap.to(pupil, {
          duration: 0.3,
          opacity: 1,
          ease: "power2.out",
        });
      });
    });
  }
  eyeAnimations();
}

// Page 2 specific code
if (document.getElementById("p2")) {
  // Hover effects
  Shery.hoverWithMediaCircle(".hvr", {
    images: [
      "./assets/takealongs/images/hover2.jpg",
      "./assets/takealongs/images/hover3.jpg",
      "./assets/takealongs/images/hover4.jpg",
    ],
  });

  // Review slider
  const swiper = new Swiper(".reviewSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 1,
        spaceBetween: 40,
      },
    },
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    speed: 1000,
    on: {
      init: function () {
        console.log("Review slider initialized");
      },
      error: function (error) {
        console.error("Review slider error:", error);
      },
    },
  });
}

// Page 3 specific code
if (document.getElementById("p3")) {
  // Fun segment page animations
  function funsegmentpage() {
    let thumbnails = document.querySelectorAll(".thumbnail");

    thumbnails.forEach((thumbnail) => {
      thumbnail.addEventListener("mouseenter", function () {
        const title = thumbnail.querySelector(".thumbnailTitle h3");
        gsap.to(title, {
          duration: 0.4,
          color: "wheat",
        });
      });

      thumbnail.addEventListener("mouseleave", function () {
        const title = thumbnail.querySelector(".thumbnailTitle h3");
        gsap.to(title, {
          duration: 0.4,
          color: "white",
        });
      });
    });
  }
  funsegmentpage();

  // Shery.js effects for fun segment
  function sherryJsFunSeg() {
    Shery.imageEffect(".thumbnailImage img", {
      style: 4,
      config: {
        uColor: { value: true },
        uSpeed: { value: 0.35, range: [0.1, 1], rangep: [1, 10] },
        uAmplitude: { value: 1.91, range: [0, 5] },
        uFrequency: { value: 3.5, range: [0, 10] },
        geoVertex: { range: [1, 64], value: 5.81 },
        zindex: { value: "11", range: [-9999999, 9999999] },
        aspect: { value: 1.180190422054853 },
        ignoreShapeAspect: { value: true },
        shapePosition: { value: { x: 0, y: 0 } },
        shapeScale: { value: { x: 0.5, y: 0.5 } },
        shapeEdgeSoftness: { value: 0, range: [0, 0.5] },
        shapeRadius: { value: 0, range: [0, 2] },
        currentScroll: { value: 0 },
        scrollLerp: { value: 0.07 },
        gooey: { value: false },
        infiniteGooey: { value: false },
        growSize: { value: 4, range: [1, 15] },
        durationOut: { value: 1, range: [0.1, 5] },
        durationIn: { value: 1.5, range: [0.1, 5] },
        displaceAmount: { value: 0.5 },
        masker: { value: true },
        maskVal: { value: 1.03, range: [1, 5] },
        scrollType: { value: 0 },
        noEffectGooey: { value: true },
        onMouse: { value: 1 },
        noise_speed: { value: 0.2, range: [0, 10] },
        metaball: { value: 0.2, range: [0, 2] },
        discard_threshold: { value: 0.5, range: [0, 1] },
        antialias_threshold: { value: 0.002, range: [0, 0.1] },
        noise_height: { value: 0.5, range: [0, 2] },
        noise_scale: { value: 10, range: [0, 100] },
      },
    });
  }
  sherryJsFunSeg();

  document.addEventListener("DOMContentLoaded", function () {
    const audioContext = new (window.AudioContext ||
      window.webkitAudioContext)();
    const keys = document.querySelectorAll(".piano-key");
    let recording = false;
    let recordedNotes = [];
    let startTime;

    const frequencies = {
      C4: 261.63,
      D4: 293.66,
      E4: 329.63,
      F4: 349.23,
      G4: 392.0,
      A4: 440.0,
      B4: 493.88,
      C5: 523.25,
    };

    function playNote(frequency) {
      const oscillator = audioContext.createOscillator();
      const gainNode = audioContext.createGain();

      oscillator.type = "sine";
      oscillator.frequency.setValueAtTime(frequency, audioContext.currentTime);

      gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
      gainNode.gain.exponentialRampToValueAtTime(
        0.01,
        audioContext.currentTime + 1
      );

      oscillator.connect(gainNode);
      gainNode.connect(audioContext.destination);

      oscillator.start();
      oscillator.stop(audioContext.currentTime + 1);
    }

    keys.forEach((key) => {
      key.addEventListener("click", () => {
        const note = key.dataset.note;
        playNote(frequencies[note]);

        if (recording) {
          recordedNotes.push({
            note: note,
            time: Date.now() - startTime,
          });
        }

        // Visual feedback
        key.classList.add("bg-amber-200");
        setTimeout(() => key.classList.remove("bg-amber-200"), 200);
      });
    });

    document
      .getElementById("recordButton")
      .addEventListener("click", function () {
        if (!recording) {
          recording = true;
          recordedNotes = [];
          startTime = Date.now();
          this.textContent = "Stop Recording";
          this.classList.add("bg-gray-500");
        } else {
          recording = false;
          this.textContent = "Record";
          this.classList.remove("bg-gray-500");
        }
      });

    document
      .getElementById("playButton")
      .addEventListener("click", function () {
        if (recordedNotes.length === 0) return;

        recordedNotes.forEach((note) => {
          setTimeout(() => {
            playNote(frequencies[note.note]);
            const key = document.querySelector(`[data-note="${note.note}"]`);
            key.classList.add("bg-amber-200");
            setTimeout(() => key.classList.remove("bg-amber-200"), 200);
          }, note.time);
        });
      });
  });
}

// Quiz page specific code
if (document.getElementById("p4")) {
  // Initialize Three.js background and animations
  function initQuizBackground() {
    // Three.js Background
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(
      75,
      window.innerWidth / window.innerHeight,
      0.1,
      1000
    );
    const renderer = new THREE.WebGLRenderer({
      canvas: document.querySelector("#quiz-canvas"),
      alpha: true,
      antialias: true,
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
      clearcoatRoughness: 0.1,
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

    // Handle window resize
    window.addEventListener("resize", () => {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });
  }

  // Call the initialization function
  initQuizBackground();

  // GSAP Animations
  gsap.registerPlugin(ScrollTrigger);

  const cards = document.querySelectorAll(".question-card");
  cards.forEach((card, index) => {
    gsap.fromTo(
      card,
      {
        opacity: 0,
        y: 20, // Reduced from 50
        scale: 0.98, // Increased from 0.95
        rotateX: -2, // Reduced from -5
      },
      {
        scrollTrigger: {
          trigger: card,
          start: "top bottom-=50", // Adjusted from bottom-=100
          toggleActions: "play none none reverse",
        },
        opacity: 1,
        y: 0,
        scale: 1,
        rotateX: 0,
        duration: 0.3, // Reduced from 0.5
        delay: index * 0.02, // Reduced from 0.05
        ease: "power2.out", // Changed from power3.out for faster easing
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
          duration: 0.2,
          ease: "power2.out",
        });
      });

      option.classList.add("selected");
      gsap.to(option, {
        scale: 1.05,
        rotation: 2,
        duration: 0.3,
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
        duration: 0.7 + Math.random() * 0.3,
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
      duration: 0.7,
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
      duration: 0.2,
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
        duration: 0.2,
        ease: "power2.out",
      });
    } else {
      gsap.to(logo, {
        scale: 1,
        duration: 0.2,
        ease: "power2.out",
      });
    }
  });
}
