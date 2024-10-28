// Initialize Shery.js effects
Shery.mouseFollower({});
Shery.makeMagnet(".magnet", {});

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
function handleLoader() {
  window.addEventListener("load", function () {
    setTimeout(function () {
      document.querySelector(".loader-wrapper").classList.add("slide-up");
    }, 2000); // Hide loader after 2 seconds
  });
}
handleLoader();

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
}
