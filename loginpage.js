// Get the login form element
var loginForm = document.getElementById("loginForm");
// Get the menu icon and menu
var menuIcon = document.getElementById("menuIcon");
var menu = document.getElementById("menu");

// Add event listener to toggle the menu
menuIcon.addEventListener("click", function() {
    menu.classList.toggle("active");
});



// Toggle password visibility
var togglePassword = document.getElementById("togglePassword");
var passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    }
});

// Mobile menu functionality
var toggleMenu = document.getElementById("toggleMenu");
var menuItems = document.querySelector(".menu-items");

toggleMenu.addEventListener("change", function() {
    if (toggleMenu.checked) {
        menuItems.classList.add("show-menu");
    } else {
        menuItems.classList.remove("show-menu");
    }
});