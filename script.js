// Dark/Light Theme Toggle Functionality
const themeToggleButton = document.getElementById('theme-toggle');
const body = document.body;

// Check for saved theme preference in localStorage
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-theme');
    themeToggleButton.innerHTML = '🌞'; // Switch to light mode icon
} else {
    body.classList.remove('dark-theme');
    themeToggleButton.innerHTML = '🌙'; // Switch to dark mode icon
}

// Toggle theme on button click
themeToggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-theme');
    
    if (body.classList.contains('dark-theme')) {
        localStorage.setItem('theme', 'dark');
        themeToggleButton.innerHTML = '🌞'; // Switch to light mode icon
    } else {
        localStorage.setItem('theme', 'light');
        themeToggleButton.innerHTML = '🌙'; // Switch to dark mode icon
    }
});
document.addEventListener("DOMContentLoaded", () => {
  const tiles = document.querySelectorAll(".skill-tile");

  tiles.forEach(tile => {
    tile.addEventListener("click", () => {
      // Collapse others
      tiles.forEach(t => {
        if (t !== tile) t.classList.remove("active");
      });

      // Toggle current tile
      tile.classList.toggle("active");
    });
  });
});

