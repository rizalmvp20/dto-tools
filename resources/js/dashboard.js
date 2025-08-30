document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("btnSidebar");
    if (btn) {
        btn.addEventListener("click", () => {
            document.body.classList.toggle("sidebar-collapsed");
        });
    }
});
