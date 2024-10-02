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

function songplay() {
  let audio = document.querySelector("audio");
  let button = document.getElementById("#playsong");

  if (audio.muted === true) {
    audio.muted = false;
    audio.play();
    audio.volume = 0.4;
  } else if (audio.muted === false) {
    audio.muted = true;
    audio.pause();
  }
}

function logoanimate() {
  const logoH3 = document.querySelector(".logo h3");

  gsap.from(".logo h3", {
    duration: 1,
    x: -100, // Slide in from the left
    opacity: 0, // Start hidden
    ease: "power1.out",
  });

  logoH3.addEventListener("mouseenter", () => {
    gsap.to(logoH3, {
      color: "#ffcc00", // Change color
      textShadow: "0 0 20px rgba(255, 204, 0, 0.7)", // Add shadow
      duration: 0.3,
      ease: "power1.out",
    });
  });

  logoH3.addEventListener("mouseleave", () => {
    gsap.to(logoH3, {
      color: "#fff", // Reset color
      textShadow: "none", // Remove shadow
      duration: 0.3,
      ease: "power1.out",
    });
  });
}
logoanimate();

// Select the icon
function iconanimate() {
  const icon = document.querySelector(".icon i");

  gsap.from(".icon i", {
    duration: 1,
    x: 100, // Slide in from the left
    opacity: 0, // Start hidden
    ease: "power1.out",
  });
  // Add hover effect for mouse enter
  icon.addEventListener("mouseenter", () => {
    gsap.to(icon, {
      color: "#ffcc00", // Change color on hover
      textShadow: "0 0 20px rgba(255, 204, 0, 0.7)", // Add glowing shadow
      duration: 0.3, // Duration of the effect
      ease: "power1.out", // Easing function
    });
  });

  // Add hover effect for mouse leave
  icon.addEventListener("mouseleave", () => {
    gsap.to(icon, {
      color: "#fff", // Reset color
      textShadow: "none", // Remove shadow
      duration: 0.3, // Duration of the effect
      ease: "power1.out", // Easing function
    });
  });
}
iconanimate();
