const toggleButton = document.getElementById("toggle-button");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("main-content");
const navItems = document.querySelectorAll(".nav-item");

toggleButton.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
  mainContent.classList.toggle("collapsed");

  navItems.forEach((item) => {
    item.classList.toggle("collapsed");
  });

  // Rotate the icon
  toggleButton.classList.toggle("bx-chevron-left");
  toggleButton.classList.toggle("bx-chevron-right");
});

// Optional: Additional JavaScript for sidebar state handling
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const toggleButton = document.getElementById("toggle-button");

  toggleButton.addEventListener("click", function () {
    sidebar.classList.toggle("sidebar-closed");
  });
});
