DTO-TOOLS 🚀
1. Ringkasan

DTO-TOOLS adalah aplikasi berbasis Laravel + Blade (rencana integrasi dengan React di dashboard) yang menyediakan:

Landing page dengan login, register, dan forgot password.

Sistem approval user (admin perlu approve sebelum user bisa masuk dashboard).

Dashboard awal dengan sidebar, topbar, searchbar, notifikasi, dan contoh card (booking overview).

Planned: JSON editor, config editor, fitur reset password/ganti password di dashboard.

2. Autentikasi & User Flow

Register

Field: username, password, konfirmasi password, agreement checkbox.

Setelah register, status user = not approved. User akan diarahkan ke /pending-approval.

Login

Hanya user dengan is_approved = true yang bisa masuk dashboard.

Admin bisa langsung login tanpa approval.

Forgot Password

Tidak pakai email.

User diarahkan ke page "Hubungi Admin".

Fitur reset password oleh admin + ganti password user ada di dashboard (planned).

Approval User

Admin punya page /admin/users.

Bisa approve user baru dan reset password.

3. Middleware

auth → default Laravel.

approved → custom, hanya allow user is_approved = true.

admin → custom, hanya allow is_admin = true.

Terdaftar di app/Http/Kernel.php.

4. Routing (routes/web.php)
// Auth
/             -> Login page
/login        -> Form login
/register     -> Register page
/forgot-password -> Hubungi admin
/pending-approval -> Page pending approval

// User (auth + approved)
GET  /dashboard        -> Dashboard utama
GET  /account/password -> Ganti password (user)
POST /account/password -> Update password

// Admin (auth + admin)
GET  /admin/users                  -> List user
POST /admin/users/{id}/approve     -> Approve user
POST /admin/users/{id}/reset-password -> Reset password

5. Struktur Views
resources/views
├── layouts/
│   └── app.blade.php         # Layout utama (Vite, Tailwind, FontAwesome)
│
├── partials/
│   ├── brand.blade.php       # Header brand (auth pages)
│   └── dash/
│       ├── sidebar.blade.php # Sidebar dashboard
│       └── topbar.blade.php  # Topbar dashboard
│
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   ├── forgot.blade.php
│   └── pending.blade.php
│
└── dashboard/
    └── index.blade.php       # Dashboard utama

6. Dashboard

Sidebar (bisa di-collapse nanti):

Home

Admin → User Approvals (hanya admin)

Editors → Smart Card, Dashboard Menu, Embedded URL, Payment Method

Support, Logout

Topbar: searchbar, notification bell, profile menu.

Content sample:

Chart placeholder

Arriving today (list item: Approved/Pending)

Card "Low Occupancy?"

7. Teknologi

Laravel 12

TailwindCSS (via Vite)

Font Awesome (untuk icons)

Planned: React untuk editor di dashboard

8. Next Steps

Tambah collapse sidebar (JS).

Buat page dummy untuk setiap editor.

Integrasi React (untuk JSON editor).

Fitur reset/ganti password di dashboard.
