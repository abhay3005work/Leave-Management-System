console.log("Hello");

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
        color: "#fff", // Revert to original color (white)
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
    gsap.to(icon, { duration: 0.3, color: "#FFFFFF" }); // Apply color change back to white with GSAP
  }
}

function logoanimate() {
  const logoH3 = document.querySelector(".logo h3");

  // Hover animation
  logoH3.addEventListener("mouseenter", () => {
    gsap.to(logoH3, {
      duration: 0.1,
      scale: 1.1, // Slightly increase the scale for a subtle zoom
      color: "#9dac94", // Change the text color (e.g., Tomato)
      ease: "power1.out", // Smooth ease-out effect
    });
  });

  // Revert animation on mouse leave
  logoH3.addEventListener("mouseleave", () => {
    gsap.to(logoH3, {
      duration: 0.2,
      scale: 1, // Revert to original scale
      color: "#fff", // Revert to the original color (adjust as needed)
      ease: "power1.out",
    });
  });
}
logoanimate();

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
