// Initialize Shery.js effects
Shery.mouseFollower({
  skew: true,
  ease: "cubic-bezier(0.23, 1, 0.320, 1)",
  duration: 0.8,
  size: 25,
  color: "white",
  backgroundColor: "rgba(255,255,255,0.2)",
  borderWidth: 2,
  borderColor: "white",
  blend: true,
});
Shery.makeMagnet(".magnet", {
  ease: "cubic-bezier(0.23, 1, 0.320, 1)",
  duration: 0.5,
});
function initAudioPlayer() {
  const audio = document.querySelector("audio");
  const icon = document.getElementById("playsong");

  // Early return if required elements don't exist
  if (!audio || !icon) return;

  // Audio configuration constants
  const VOLUME_LEVEL = 0.4;
  const ANIMATION_DURATION = 0.3;
  const ACTIVE_COLOR = "#9dac94";
  const INACTIVE_COLOR = "#000";
  const STATE_UPDATE_INTERVAL = 1000;

  // Initialize audio state
  const initializeAudio = () => {
    audio.muted = true;
    audio.volume = VOLUME_LEVEL;
    audio.pause();
  };

  // Handle first-time visitors
  const handleFirstVisit = () => {
    const isFirstVisit = !localStorage.getItem("hasVisitedBefore");
    if (isFirstVisit) {
      localStorage.setItem("hasVisitedBefore", "true");
      localStorage.setItem("audioPlaying", "false");
      updateIconColor(INACTIVE_COLOR);
    }
    return isFirstVisit;
  };

  // Update icon color with animation
  const updateIconColor = (color) => {
    gsap.to(icon, { duration: ANIMATION_DURATION, color });
  };

  // Manage audio state in localStorage
  const updateAudioState = (isPlaying) => {
    try {
      localStorage.setItem("audioPlaying", isPlaying);
      localStorage.setItem("audioTime", audio.currentTime);
      localStorage.setItem("currentSong", audio.src);
      localStorage.setItem("lastPlayedTime", Date.now().toString());
    } catch (error) {
      console.error("Error updating audio state:", error);
    }
  };

  // Watch for audio source changes and page visibility
  const setupSourceObserver = (isFirstVisit) => {
    const originalSrc = audio.src;
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (
          mutation.type === "attributes" &&
          mutation.attributeName === "src" &&
          audio.src !== originalSrc &&
          !isFirstVisit
        ) {
          const lastPlayedTime = localStorage.getItem("lastPlayedTime");
          const currentTime = Date.now();
          const timeDiff = currentTime - parseInt(lastPlayedTime);

          // Only restore time if within last 30 minutes
          if (timeDiff < 30 * 60 * 1000) {
            const savedTime =
              parseFloat(localStorage.getItem("audioTime")) || 0;
            audio.currentTime = savedTime;
          }

          const wasPlaying = localStorage.getItem("audioPlaying") === "true";
          if (wasPlaying) {
            audio.muted = false;
            audio
              .play()
              .then(() => {
                updateIconColor(ACTIVE_COLOR);
                updateAudioState(true);
              })
              .catch((error) => console.error("Playback failed:", error));
          }
        }
      });
    });
    observer.observe(audio, { attributes: true });
    return observer;
  };

  // Restore previous audio state
  const restoreAudioState = (isFirstVisit) => {
    if (isFirstVisit) return;

    try {
      const wasPlaying = localStorage.getItem("audioPlaying") === "true";
      const previousTime = parseFloat(localStorage.getItem("audioTime")) || 0;
      const previousSong = localStorage.getItem("currentSong");
      const lastPlayedTime = localStorage.getItem("lastPlayedTime");
      const currentTime = Date.now();

      if (previousSong && audio.src !== previousSong) {
        audio.src = previousSong;
      }

      // Only restore time if within last 30 minutes
      if (
        lastPlayedTime &&
        currentTime - parseInt(lastPlayedTime) < 30 * 60 * 1000
      ) {
        audio.currentTime = previousTime;
      }

      if (wasPlaying) {
        audio.muted = false;
        audio
          .play()
          .then(() => {
            updateIconColor(ACTIVE_COLOR);
          })
          .catch((error) => console.error("Restore playback failed:", error));
      } else {
        audio.muted = true;
        audio.pause();
        updateIconColor(INACTIVE_COLOR);
      }
    } catch (error) {
      console.error("Error restoring audio state:", error);
      initializeAudio();
    }
  };

  // Handle play/pause toggle
  window.songplay = () => {
    try {
      if (audio.paused) {
        audio.muted = false;
        audio
          .play()
          .then(() => {
            updateIconColor(ACTIVE_COLOR);
            updateAudioState(true);
          })
          .catch((error) => console.error("Play failed:", error));
      } else {
        audio.pause();
        audio.muted = true;
        updateIconColor(INACTIVE_COLOR);
        updateAudioState(false);
      }
    } catch (error) {
      console.error("Error toggling playback:", error);
    }
  };

  // Setup event listeners
  const setupEventListeners = () => {
    // Periodic state updates
    const stateUpdateInterval = setInterval(() => {
      if (!audio.paused) updateAudioState(true);
    }, STATE_UPDATE_INTERVAL);

    // Handle audio end
    audio.addEventListener("ended", () => {
      updateAudioState(false);
      updateIconColor(INACTIVE_COLOR);
    });

    // Save state before unload
    window.addEventListener("beforeunload", () => {
      if (!audio.paused) updateAudioState(true);
    });

    // Handle page visibility changes
    document.addEventListener("visibilitychange", () => {
      if (document.hidden) {
        clearInterval(stateUpdateInterval);
        if (!audio.paused) {
          updateAudioState(true);
        }
      } else {
        // When page becomes visible again, restore audio if it was playing
        const wasPlaying = localStorage.getItem("audioPlaying") === "true";
        if (wasPlaying && audio.paused) {
          audio.muted = false;
          audio
            .play()
            .catch((error) => console.error("Resume playback failed:", error));
        }
      }
    });

    // Handle page transitions
    window.addEventListener("pageshow", (event) => {
      if (event.persisted) {
        const wasPlaying = localStorage.getItem("audioPlaying") === "true";
        if (wasPlaying) {
          audio.muted = false;
          audio
            .play()
            .catch((error) => console.error("Resume playback failed:", error));
        }
      }
    });
  };

  // Initialize everything
  const initialize = () => {
    initializeAudio();
    const isFirstVisit = handleFirstVisit();
    const observer = setupSourceObserver(isFirstVisit);
    setupEventListeners();
    restoreAudioState(isFirstVisit);

    // Return cleanup function
    return () => {
      observer.disconnect();
    };
  };

  // Start initialization
  initialize();
}
// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", initAudioPlayer);
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
  let audio = document.querySelector("audio");

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
      onEnter: () => {
        if (audio.paused) {
          gsap.to(".icon i", { color: "black" });
        }
      },
      onLeaveBack: () => {
        if (audio.paused) {
          gsap.to(".icon i", { color: "white" });
        }
      },
    },
  });
}
navAnimation();
// Handle loader animation and removal
function handleLoader() {
  window.addEventListener("load", function () {
    setTimeout(function () {
      document.querySelector(".loader-wrapper").classList.add("slide-up");
    }, 2000); // Hide loader after 2 seconds
  });
}
handleLoader();
/*
 * Home page specific code
 * Contains initialization and setup for different pages
 * Each page has its own specific animations and functionality
 * Includes home page, about us page, fun segment page, etc.
 */
if (document.getElementById("home")) {
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
      // Create a loading queue to load images sequentially
      let loadQueue = [];
      for (var i = 1; i <= frames.maxIndex; i++) {
        loadQueue.push(i);
      }

      function loadNext() {
        if (loadQueue.length === 0) return;

        const i = loadQueue.shift();
        const imageUrl = `./frames/frame_${i.toString().padStart(4, "0")}.jpeg`;
        const img = new Image();
        img.src = imageUrl;

        img.onload = function () {
          images[i - 1] = img; // Store in correct index
          imagesLoaded++;
          if (imagesLoaded === frames.maxIndex) {
            loadImage(frames.currentIndex);
            startAnimation();
            console.log("All images loaded");
          } else {
            loadNext(); // Load next image
          }
        };

        img.onerror = function () {
          console.error(`Failed to load image: ${imageUrl}`);
          loadNext(); // Continue loading even if one fails
        };
      }

      // Start loading first few images
      for (let i = 0; i < 5; i++) {
        loadNext();
      }
    }

    function loadImage(index) {
      if (index >= 0 && index < frames.maxIndex) {
        const img = images[index];
        if (!img) return; // Skip if image not loaded yet

        // Cache canvas dimensions to avoid recalculating
        const canvasWidth = canvas.width;
        const canvasHeight = canvas.height;

        const scaleX = canvasWidth / img.width;
        const scaleY = canvasHeight / img.height;
        const scale = Math.max(scaleX, scaleY);

        const newWidth = img.width * scale;
        const newHeight = img.height * scale;

        const offsetX = (canvasWidth - newWidth) / 2;
        const offsetY = (canvasHeight - newHeight) / 2;

        // Use requestAnimationFrame for smoother rendering
        requestAnimationFrame(() => {
          context.clearRect(0, 0, canvasWidth, canvasHeight);
          context.imageSmoothingEnabled = true;
          context.imageSmoothingQuality = "high";
          context.drawImage(img, offsetX, offsetY, newWidth, newHeight);
        });

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

    // Set canvas size once at start
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Handle resize efficiently with debounce
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        loadImage(frames.currentIndex);
      }, 250);
    });

    preloadImages();
  }
  framescrollanimation();

  // Page animations

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
  // Eye tracking and blinking animations
  function eyeAnimations() {
    // Track mouse movement for pupil following with parallax effect
    const handleMouseMove = (e) => {
      const pupils = document.querySelectorAll(".pupil");
      const eyes = document.querySelectorAll(".eye");
      const mouseX = e.clientX;
      const mouseY = e.clientY;

      pupils.forEach((pupil) => {
        const eyeRect = pupil.parentElement.getBoundingClientRect();
        const eyeCenterX = eyeRect.left + eyeRect.width / 2;
        const eyeCenterY = eyeRect.top + eyeRect.height / 2;

        // Calculate angle and constrained distance with enhanced movement
        const angle = Math.atan2(mouseY - eyeCenterY, mouseX - eyeCenterX);
        const maxDistance = Math.min(eyeRect.width, eyeRect.height) * 0.35;
        const distance = Math.min(
          Math.hypot(mouseX - eyeCenterX, mouseY - eyeCenterY) * 0.18,
          maxDistance
        );

        const moveX = Math.cos(angle) * distance;
        const moveY = Math.sin(angle) * distance;

        // Enhanced rotation based on movement
        const rotation = ((angle * 180) / Math.PI) * 0.15;

        // Smoother pupil movement with enhanced bounce
        gsap.to(pupil, {
          duration: 0.35,
          x: moveX,
          y: moveY,
          rotation: rotation,
          ease: "elastic.out(1.2, 0.7)",
        });
      });

      // Enhanced parallax effect for eyes
      eyes.forEach((eye) => {
        const moveX = (mouseX - window.innerWidth / 2) * 0.015;
        const moveY = (mouseY - window.innerHeight / 2) * 0.015;

        gsap.to(eye, {
          duration: 0.7,
          x: moveX,
          y: moveY,
          ease: "power3.out",
        });
      });
    };

    document.addEventListener("mousemove", handleMouseMove);

    // Enhanced natural blinking with smooth eyelid movement
    function blink() {
      const eyelids = document.querySelectorAll(".eyelid");
      const blinkDuration = 0.2;

      // Natural blink patterns
      const blinkType = Math.random();
      const isDoubleBlink = blinkType > 0.85;
      const isTripleBlink = blinkType > 0.95;

      eyelids.forEach((eyelid) => {
        const tl = gsap.timeline();

        // Create smooth eyelid motion
        const blinkAnimation = {
          duration: blinkDuration,
          top: 0,
          scaleY: 0.15,
          transformOrigin: "top center",
          background: "#000000",
          borderRadius: "0 0 40% 40%",
          yoyo: true,
          ease: "power2.inOut",
        };

        if (isTripleBlink) {
          tl.to(eyelid, { ...blinkAnimation, repeat: 5 });
        } else if (isDoubleBlink) {
          tl.to(eyelid, { ...blinkAnimation, repeat: 3 });
        } else {
          tl.to(eyelid, { ...blinkAnimation, repeat: 1 });
        }
      });

      scheduleNextBlink();
    }

    function scheduleNextBlink() {
      const nextBlinkDelay = 2500 + Math.random() * 3500;
      setTimeout(blink, nextBlinkDelay);
    }

    scheduleNextBlink();

    // Improved hover interactions for eyelids
    const hoverBtn = document.querySelector("a[href='funseg.php']"); // Updated selector to target the specific button
    const eyelids = document.querySelectorAll(".eyelid");
    const pupils = document.querySelectorAll(".pupil");
    const eyes = document.querySelectorAll(".eye");

    const closeEyes = () => {
      const tl = gsap.timeline();

      tl.to(eyes, {
        duration: 0.4,
        scale: 1.05,
        ease: "power2.out",
      })
        .to(
          eyelids,
          {
            duration: 0.4,
            top: 0,
            scaleY: 0.15,
            transformOrigin: "top center",
            background: "#000000",
            borderRadius: "0 0 40% 40%",
            ease: "power2.inOut",
            stagger: 0.05,
          },
          "-=0.3"
        )
        .to(
          pupils,
          {
            duration: 0.3,
            opacity: 0,
            scale: 0.9,
            ease: "power2.inOut",
          },
          "-=0.2"
        );
    };

    const openEyes = () => {
      const tl = gsap.timeline();

      tl.to(eyelids, {
        duration: 0.4,
        top: "-100%",
        scaleY: 1,
        background: "#000000",
        ease: "power2.out",
        stagger: 0.05,
      })
        .to(
          pupils,
          {
            duration: 0.4,
            opacity: 1,
            scale: 1,
            ease: "power2.out",
          },
          "-=0.3"
        )
        .to(
          eyes,
          {
            duration: 0.4,
            scale: 1,
            ease: "power2.out",
          },
          "-=0.3"
        );
    };

    // Subtle natural eye movement
    gsap.to(pupils, {
      duration: "random(4, 6)",
      x: "random(-2, 2)",
      y: "random(-2, 2)",
      rotation: "random(-3, 3)",
      repeat: -1,
      yoyo: true,
      ease: "sine.inOut",
      stagger: {
        each: 0.5,
        from: "random",
      },
    });

    if (hoverBtn) {
      hoverBtn.addEventListener("mouseenter", closeEyes);
      hoverBtn.addEventListener("mouseleave", openEyes);
    }

    // Cleanup function
    return () => {
      document.removeEventListener("mousemove", handleMouseMove);
      if (hoverBtn) {
        hoverBtn.removeEventListener("mouseenter", closeEyes);
        hoverBtn.removeEventListener("mouseleave", openEyes);
      }
    };
  }
  eyeAnimations();
  function sendEmail() {
    const form = document.getElementById("contactForm");
    const successMessage = document.getElementById("successMessage");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      try {
        const formData = new FormData(form);
        const response = await fetch("https://api.web3forms.com/submit", {
          method: "POST",
          body: formData,
        });

        if (response.ok) {
          form.reset();
          successMessage.classList.remove("hidden");
          // Add entrance animation classes
          successMessage.classList.add("animate-fadeIn");
        }
      } catch (error) {
        console.error("Error:", error);
      }
    });

    function closeSuccessMessage() {
      successMessage.classList.add("hidden");
    }
  }
  sendEmail();
}

/*
 * About Us specific code
 * Handles hover effects with Shery.js media circles
 * Sets up review slider with Swiper.js
 */
if (document.getElementById("abtus")) {
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

/*
 * Fun Segment specific code
 * Handles fun segment page animations and effects
 * Sets up event listeners and Shery.js image effects
 */
if (document.getElementById("funseg")) {
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

/*
 * Quiz page specific code
 * Handles initialization and animations for the quiz page background
 * Sets up Three.js scene with custom geometry and materials
 */
if (document.getElementById("quiz")) {
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
/*
 * Solution & Track page specific code
 * Handles initialization and animations for the Solution & Track page
 * Also manages ripple effects and window resize events
 */
if (document.getElementById("sol-n-track")) {
  // Solution & Track page animations
  function initSolTrackAnimations() {
    // Initialize DataTable
    $("#quizResultsTable").DataTable({
      responsive: true,
      pageLength: 10,
      order: [[0, "desc"]],
      dom: "Bfrtip",
      buttons: [
        {
          extend: "copy",
          className:
            "bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-2 mr-2",
        },
        {
          extend: "excel",
          className:
            "bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-2 mr-2",
        },
        {
          extend: "pdf",
          className:
            "bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-2",
        },
      ],
      language: {
        search: "Search results:",
        lengthMenu: "Show _MENU_ entries per page",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        paginate: {
          first: "First",
          last: "Last",
          next: "Next",
          previous: "Previous",
        },
      },
    });

    // GSAP Animations
    gsap.registerPlugin(ScrollTrigger);

    // Heading animation
    gsap.to(".fade-in", {
      opacity: 1,
      y: 0,
      duration: 1,
      scrollTrigger: {
        trigger: ".fade-in",
        start: "top 80%",
      },
    });

    // Stats cards animation
    gsap.to(".stats-card", {
      opacity: 1,
      scale: 1,
      duration: 0.8,
      stagger: 0.2,
      scrollTrigger: {
        trigger: ".stats-card",
        start: "top 80%",
      },
    });

    // Table animation
    gsap.to(".table-container", {
      opacity: 1,
      y: 0,
      duration: 1,
      scrollTrigger: {
        trigger: ".table-container",
        start: "top 80%",
      },
    });

    // Buttons animation
    gsap.to(".button-container", {
      opacity: 1,
      duration: 1,
      scrollTrigger: {
        trigger: ".button-container",
        start: "top 90%",
      },
    });
  }

  initSolTrackAnimations();
}

/*
 * Login/Signup Form Animations
 * Handles animations for the login and signup forms including:
 * - Initial fade in animation on page load
 * - Smooth transitions between login and signup forms
 * - Uses GSAP for fluid animations with opacity and y-position transforms
 * - Manages form visibility through CSS classes
 * - Exposes toggleForms() function globally for form switching
 */
if (document.getElementById("login")) {
  // Login/Signup form animations
  let loginForm = document.getElementById("loginForm");
  let signupForm = document.getElementById("signupForm");

  // Initial animation on page load
  gsap.from(loginForm, {
    opacity: 0,
    y: 30,
    duration: 0.8,
    ease: "power2.out",
  });

  // Function to animate form transitions
  window.toggleForms = () => {
    if (!loginForm.classList.contains("hidden")) {
      // Animate login form out
      gsap.to(loginForm, {
        opacity: 0,
        y: 20,
        duration: 0.4,
        onComplete: () => {
          loginForm.classList.add("hidden");
          signupForm.classList.remove("hidden");
          // Animate signup form in
          gsap.fromTo(
            signupForm,
            {
              opacity: 0,
              y: 20,
            },
            {
              opacity: 1,
              y: 0,
              duration: 0.4,
            }
          );
        },
      });
    } else {
      // Animate signup form out
      gsap.to(signupForm, {
        opacity: 0,
        y: 20,
        duration: 0.4,
        onComplete: () => {
          signupForm.classList.add("hidden");
          loginForm.classList.remove("hidden");
          // Animate login form in
          gsap.fromTo(
            loginForm,
            {
              opacity: 0,
              y: 20,
            },
            {
              opacity: 1,
              y: 0,
              duration: 0.4,
            }
          );
        },
      });
    }

    // Function to validate signup form
    window.validateSignupForm = () => {
      const password = document.getElementById("signup-password").value;
      const confirmPassword = document.querySelector(
        'input[name="confirm_password"]'
      ).value;

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }
      return true;
    };
  };
}
/*
 * Login Form Block
 * - Handles all login/signup form animations and validations
 * - Uses GSAP for smooth animations between form transitions
 * - Initial fade in animation when page loads
 * - Toggle function switches between login and signup forms with animations
 * - Form validation ensures matching passwords during signup
 * - Makes toggleForms and validateSignupForm available globally
 */

if (document.getElementById("resources")) {
  // Resources page animations
  const swiper = new Swiper(".childhood-swiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      1280: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
    on: {
      init: function () {
        checkArrowsVisibility();
      },
      resize: function () {
        checkArrowsVisibility();
      },
    },
  });

  // Function to check window width and toggle arrow visibility
  function checkArrowsVisibility() {
    const arrows = document.querySelectorAll(
      ".swiper-button-next, .swiper-button-prev"
    );
    arrows.forEach((arrow) => {
      arrow.style.display = window.innerWidth < 768 ? "none" : "flex";
    });
  }

  // Handle touch events better on mobile
  const swiperEl = document.querySelector(".childhood-swiper");
  let touchStartX = 0;
  let touchEndX = 0;

  swiperEl.addEventListener(
    "touchstart",
    (e) => {
      touchStartX = e.changedTouches[0].screenX;
    },
    false
  );

  swiperEl.addEventListener(
    "touchend",
    (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    },
    false
  );

  function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
      if (diff > 0) {
        swiper.slideNext();
      } else {
        swiper.slidePrev();
      }
    }
  }

  // Ensure proper z-index handling
  document.querySelector(".page2").addEventListener("mouseover", function () {
    const swiperContainer = document.querySelector(".childhood-swiper");
    const navButtons = document.querySelectorAll(
      ".swiper-button-next, .swiper-button-prev"
    );

    swiperContainer.style.zIndex = "10";
    navButtons.forEach((button) => {
      button.style.zIndex = "11";
    });
  });
  gsap.registerPlugin(ScrollTrigger);

  // Text scrolling animation
  gsap.to(".kelem", {
    scrollTrigger: {
      trigger: ".knowbody",
      pin: true,
      start: "top top",
      end: "bottom bottom",
      endTrigger: ".last",
      scrub: 1,
    },
    y: "-300%",
    ease: "power1.inOut",
  });

  // Image effect with proper scroll tracking
  let sections = document.querySelectorAll(".kelem");
  Shery.imageEffect(".kimg", {
    style: 5,
    config: {
      onMouse: {
        value: 1,
      },
    },
    slideStyle: (setScroll) => {
      sections.forEach(function (section, index) {
        ScrollTrigger.create({
          trigger: section,
          start: "top top",
          scrub: 1,
          onUpdate: function (prog) {
            setScroll(prog.progress + index);
          },
        });
      });
    },
  });
}
/*
 * Resources Page Block
 * - Initializes and configures Swiper.js carousel
 * - Responsive design with different slides per view based on breakpoints
 * - Auto-playing carousel with 3 second delay
 * - Navigation arrows and pagination dots
 * - Mobile-optimized with touch event handling
 * - Automatic arrow visibility toggle based on screen size
 * - Custom swipe threshold for better mobile interaction
 * - Z-index management for proper layering of elements
 * - Handles window resize events for responsive behavior
 */
