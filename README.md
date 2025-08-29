# DTO-TOOLS 🚀

DTO-TOOLS adalah aplikasi berbasis **Laravel + Blade** (dengan rencana integrasi React di dashboard) yang menyediakan berbagai fitur manajemen user dan editor.

---

## 1. Ringkasan

- **Landing Page**  
  - Login  
  - Register  
  - Forgot Password

- **Sistem Approval User**  
  - Admin perlu approve sebelum user bisa masuk dashboard.

- **Dashboard Awal**  
  - Sidebar  
  - Topbar  
  - Searchbar  
  - Notifikasi  
  - Contoh card (booking overview)

- **Planned:**  
  - JSON editor  
  - Config editor  
  - Fitur reset password/ganti password di dashboard

---

## 2. Autentikasi & User Flow

```mermaid
flowchart LR
    Register -->|Status: not approved| PendingApproval
    PendingApproval --> AdminApproval
    AdminApproval -->|is_approved: true| Dashboard
    Login -->|is_approved: true| Dashboard
    AdminLogin --> Dashboard
    ForgotPassword -->|Hubungi Admin| AdminReset
    Dashboard -->|Ganti Password (planned)| PasswordChange
```

- **Register:**  
  - Field: username, password, konfirmasi password, agreement checkbox  
  - Setelah register, status user = not approved  
  - User diarahkan ke `/pending-approval`

- **Login:**  
  - Hanya user dengan `is_approved = true` yang bisa masuk dashboard  
  - Admin bisa langsung login tanpa approval

- **Forgot Password:**  
  - Tidak pakai email  
  - User diarahkan ke page "Hubungi Admin"  
  - Fitur reset password oleh admin + ganti password user ada di dashboard (planned)

- **Approval User:**  
  - Admin punya page `/admin/users`  
  - Bisa approve user baru dan reset password

---

## 3. Middleware

- `auth` → default Laravel
- `approved` → custom, hanya allow user `is_approved = true`
- `admin` → custom, hanya allow `is_admin = true`
- Terdaftar di `app/Http/Kernel.php`

---

## 4. Routing

```
routes/web.php

// Auth
/                      -> Login page
/login                 -> Form login
/register              -> Register page
/forgot-password       -> Hubungi admin
/pending-approval      -> Page pending approval

// User (auth + approved)
GET  /dashboard        -> Dashboard utama
GET  /account/password -> Ganti password (user)
POST /account/password -> Update password

// Admin (auth + admin)
GET  /admin/users                  -> List user
POST /admin/users/{id}/approve     -> Approve user
POST /admin/users/{id}/reset-password -> Reset password
```

---

## 5. Struktur Views

```
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
```

---

## 6. Dashboard

- **Sidebar** (bisa di-collapse nanti):
    - Home
    - Admin → User Approvals (hanya admin)
    - Editors → Smart Card, Dashboard Menu, Embedded URL, Payment Method
    - Support, Logout

- **Topbar:**  
    - Searchbar  
    - Notification bell  
    - Profile menu

- **Content Sample:**
    - Chart placeholder
    - Arriving today (list item: Approved/Pending)
    - Card "Low Occupancy?"

---

## 7. Teknologi

- Laravel 12
- TailwindCSS (via Vite)
- Font Awesome (untuk icons)
- **Planned:** React untuk editor di dashboard

---

## 8. Next Steps

- Tambah collapse sidebar (JS)
- Buat page dummy untuk setiap editor
- Integrasi React (untuk JSON editor)
- Fitur reset/ganti password di dashboard

---
