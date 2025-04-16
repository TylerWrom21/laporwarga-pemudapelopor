function theme() {
    let theme = document.querySelector('#theme');
    theme.onclick = () => {
        theme.classList.toggle('fa-moon');
        document.querySelector('html').classList.toggle('dark');
    }
}
theme();
function sidebar() {
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("-translate-x-full");
        });
    });
}
sidebar();