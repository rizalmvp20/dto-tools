function animateOpen(el, dur = 200) {
    el.style.display = "block";
    // start at 0
    el.style.height = "0px";
    el.style.overflow = "hidden";
    el.style.transition = `height ${dur}ms ease`;

    const target = el.scrollHeight; // full height
    requestAnimationFrame(() => {
        el.style.height = target + "px";
    });

    function done() {
        el.style.removeProperty("height");
        el.style.removeProperty("overflow");
        el.style.removeProperty("transition");
        el.classList.add("show");
        el.removeEventListener("transitionend", done);
    }
    el.addEventListener("transitionend", done);
}

function animateClose(el, dur = 200) {
    // set current height explicitly so we can animate to 0
    el.style.height = el.scrollHeight + "px";
    el.style.overflow = "hidden";
    el.style.transition = `height ${dur}ms ease`;

    requestAnimationFrame(() => {
        el.style.height = "0px";
    });

    function done() {
        el.style.display = "none";
        el.classList.remove("show");
        el.style.removeProperty("height");
        el.style.removeProperty("overflow");
        el.style.removeProperty("transition");
        el.removeEventListener("transitionend", done);
    }
    el.addEventListener("transitionend", done);
}

function setupNavToggles() {
    document
        .querySelectorAll("[data-nav-toggle][data-target]")
        .forEach((trigger) => {
            const sel = trigger.getAttribute("data-target");
            const panel = document.querySelector(sel);
            if (!panel) return;

            const key = "sidebar:" + (panel.id || sel);

            // initial state (respect server-side "show" or localStorage)
            const shouldOpen =
                panel.classList.contains("show") ||
                localStorage.getItem(key) === "1";
            if (shouldOpen) {
                panel.style.display = "block"; // visible initially
                trigger.setAttribute("aria-expanded", "true");
            } else {
                panel.style.display = "none";
                trigger.setAttribute("aria-expanded", "false");
            }

            trigger.addEventListener("click", (e) => {
                e.preventDefault();
                const isOpen =
                    panel.classList.contains("show") ||
                    panel.style.display === "block";
                if (isOpen) {
                    animateClose(panel);
                    trigger.setAttribute("aria-expanded", "false");
                    localStorage.setItem(key, "0");
                } else {
                    animateOpen(panel);
                    trigger.setAttribute("aria-expanded", "true");
                    localStorage.setItem(key, "1");
                }
            });
        });
}

document.addEventListener("DOMContentLoaded", setupNavToggles);
