const toggleButton = document.getElementById("toggle-button");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("main-content");
const navItems = document.querySelectorAll(".nav-item");

// Function to set sidebar state based on localStorage
function setSidebarState() {
  sidebar.style.transition = 'none';
  mainContent.style.transition = 'none';
  navItems.forEach(item => {
    item.style.transition = 'none';
  });
  const isCollapsed = localStorage.getItem("sidebar-collapsed") === "true";
  if (isCollapsed) {
    sidebar.classList.add("collapsed");
    mainContent.classList.add("collapsed");
    navItems.forEach(item => {
      item.classList.add("collapsed");
    });
    toggleButton.classList.remove("bx-chevron-left");
    toggleButton.classList.add("bx-chevron-right");
  } else {
    sidebar.classList.remove("collapsed");
    mainContent.classList.remove("collapsed");
    navItems.forEach(item => {
      item.classList.remove("collapsed");
    });
    toggleButton.classList.remove("bx-chevron-right");
    toggleButton.classList.add("bx-chevron-left");
  }
  // Re-enable transitions after a short delay
  setTimeout(() => {
    sidebar.style.transition = '';
    mainContent.style.transition = '';
    navItems.forEach(item => {
      item.style.transition = '';
    });
  }, 10);  // Add a small delay to ensure state has been applied
}

// Apply sidebar state on page load
document.addEventListener("DOMContentLoaded", function () {
  setSidebarState();
});

// Toggle button event listener
toggleButton.addEventListener("click", () => {
  const isCollapsed = sidebar.classList.contains("collapsed");

  // Toggle collapsed state
  sidebar.classList.toggle("collapsed");
  mainContent.classList.toggle("collapsed");
  navItems.forEach(item => {
    item.classList.toggle("collapsed");
  });

  // Save the collapsed state to localStorage
  localStorage.setItem("sidebar-collapsed", !isCollapsed);

  // Rotate the icon
  toggleButton.classList.toggle("bx-chevron-left");
  toggleButton.classList.toggle("bx-chevron-right");
});
