// Theme Toggle
const themeToggle = document.getElementById("theme-toggle");

themeToggle.addEventListener("click", () => {
    if (document.documentElement.getAttribute("data-theme") === "dark") {
        document.documentElement.setAttribute("data-theme", "light");
        themeToggle.textContent = "🌙";
    } else {
        document.documentElement.setAttribute("data-theme", "dark");
        themeToggle.textContent = "☀️";
    }
});

// Carousel
const track = document.querySelector(".carousel-track");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
let index = 0;

nextBtn.addEventListener("click", () => {
    if (index < track.children.length - 1) {
        index++;
    } else {
        index = 0;
    }
    track.style.transform = `translateX(-${index * 100}%)`;
});

prevBtn.addEventListener("click", () => {
    if (index > 0) {
        index--;
    } else {
        index = track.children.length - 1;
    }
    track.style.transform = `translateX(-${index * 100}%)`;
});
