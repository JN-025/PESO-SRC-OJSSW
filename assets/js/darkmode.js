// darkmode.js
document.addEventListener("DOMContentLoaded", function() {
    var switchInput = document.getElementById("switchInput");

    switchInput.addEventListener("change", function() {
        document.body.classList.toggle("dark-theme");
        var darkMode = document.body.classList.contains("dark-theme") ? "enabled" : "disabled";
        document.cookie = "dark_mode=" + darkMode + "; path=/";
    });

    // Set dark mode based on the cookie when the page loads
    if (document.cookie.split(';').some((item) => item.trim().startsWith('dark_mode='))) {
        var darkModeCookie = document.cookie.split(';').find((item) => item.trim().startsWith('dark_mode=')).split('=')[1];
        document.body.classList.toggle("dark-theme", darkModeCookie === "enabled");
    }
});

// Add the following code to set the initial class based on the cookie
if (document.cookie.split(';').some((item) => item.trim().startsWith('dark_mode='))) {
    var darkModeCookie = document.cookie.split(';').find((item) => item.trim().startsWith('dark_mode=')).split('=')[1];
    document.body.classList.add("dark-theme", darkModeCookie === "enabled");
}
