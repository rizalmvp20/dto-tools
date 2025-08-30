/*
 * Entry Vite. Bootstrap & Icons dimuat TANPA CDN.
 * Custom style ada di resources/css/*.css (dipanggil dari blade).
 */

try {
    import("./bootstrap");
} catch (e) {}

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "bootstrap-icons/font/bootstrap-icons.css";
