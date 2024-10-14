Shery.mouseFollower({});
Shery.makeMagnet(".magnet", {});

function lenisscroll() {
  const lenis = new Lenis();

  lenis.on("scroll", (e) => {
    console.log(e);
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);
}
lenisscroll();
function iconanimate() {
  const icon = document.querySelector(".icon i");
  let audio = document.querySelector("audio");

  icon.addEventListener("mouseenter", () => {
    // Only apply hover animation if the audio is not playing
    if (audio.paused) {
      gsap.to(icon, {
        duration: 0.3,
        scale: 1.1, // Slightly increase the scale for a subtle zoom
        color: "#9dac94", // Change the icon color on hover
        ease: "power1.out", // Smooth ease-out effect
      });
    }
  });

  icon.addEventListener("mouseleave", () => {
    // Revert to white if music is not playing
    if (audio.paused) {
      gsap.to(icon, {
        duration: 0.3,
        scale: 1, // Revert to original scale
        color: "#000", // Revert to original color (white)
        ease: "power1.out",
      });
    }
  });
}
iconanimate();
function songplay() {
  let audio = document.querySelector("audio");
  let icon = document.getElementById("playsong"); // Get the icon by ID

  if (audio.paused) {
    audio.muted = false; // Unmute the audio
    audio.play(); // Play the audio
    audio.volume = 0.4; // Set volume to 40%

    // Change icon color to indicate music is playing
    gsap.to(icon, { duration: 0.3, color: "#9dac94" }); // Apply color change with GSAP
  } else {
    audio.pause(); // Pause the audio
    audio.muted = true; // Mute the audio

    // Change icon color back to white when music is stopped
    gsap.to(icon, { duration: 0.3, color: "#000" }); // Apply color change back to white with GSAP
  }
}
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
if (document.getElementById("p1")) {
  let page2 = document.querySelector(".page2");
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
          images.push(img); // Push image to the array after it's loaded
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
        .to(
          ".animate1",
          {
            opacity: 0,
            ease: "linear",
          },
          "a"
        )

        .to(frames, updateFrame(80), "second")
        .to(".animate2", { opacity: 1, ease: "linear" }, "second")
        .to(frames, updateFrame(110), "third")
        .to(".animate2", { opacity: 0, ease: "linear" }, "third")

        .to(frames, updateFrame(140), "fourth")
        .to(".animate3", { opacity: 1, ease: "linear" }, "fourth")
        .to(frames, updateFrame(169), "fifth")
        .to(".animate3", { opacity: 0, ease: "linear" }, "fifth");
    }

    preloadImages(); // Moved this outside of startAnimation to ensure images load first
  }
  framescrollanimation();
  function page1animation() {
    const page1 = document.querySelector(".page1");
    const h1text = document.querySelector(".page1text h1");
    const nav = document.querySelector("nav");

    let tl = gsap.timeline();
    // tl.from(page1, {
    //   duration: 0.7,
    //   y: 500,
    // });
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
        // markers: true,
        start: "top 0",
        end: "top -150%",

        scrub: 3,
        pin: true,
      },
    });
  }
  page3animation();
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
  function loaderAnimation() {
    var loader = document.querySelector("#loader");
    setTimeout(function () {
      loader.style.top = "-100%";
    }, 4200);
  }
  loaderAnimation();
}

if (document.getElementById("p2")) {
  Shery.hoverWithMediaCircle(".hvr", {
    images: [
      "./assets/takealongs/images/hover2.jpg",
      "./assets/takealongs/images/hover3.jpg",
      "./assets/takealongs/images/hover4.jpg",
    ],
  });
}

if (document.getElementById("p3")) {
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
      // debug: true,
    });
  }
  sherryJsFunSeg();
}
