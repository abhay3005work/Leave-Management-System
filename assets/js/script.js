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
      duration: 0.2,
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
  const logoH3 = document.querySelector(".logo h3");
  const icon = document.querySelector(".icon i");
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
