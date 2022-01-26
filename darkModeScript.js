(function() {
    let loadPage = localStorage.getItem("theme") || "";
    let element = document.body;
    element.classList.add(loadPage);
    document.getElementById("theme").textContent = localStorage.getItem("theme") || "light";
})();
function themeChange() {
    let element = document.body;
    element.classList.toggle("dark-mode");
    let theme = localStorage.getItem("theme");
    if (theme && theme === "dark-mode") {
        localStorage.setItem("theme", "");
    } else {
        localStorage.setItem("theme", "dark-mode");
    }
    document.getElementById("theme").textContent = localStorage.getItem("theme");
}
