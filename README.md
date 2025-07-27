# 🏋️ Laravel Gym Subscription Management System

This Laravel application helps manage gym subscriptions with proper architecture design using **Service Layer**, **Single Responsibility Principle**, and **Laravel Eloquent**. It includes features like QR code generation for user check-ins, subscription management, and scheduled job execution to validate subscriptions.

---

## 📌 Features

- ✅ Clean architecture with Service classes
- 🧍‍♂️ Gym user subscription management
- 📅 Automatic daily validation of subscriptions
- 🎟️ QR code generation per user for gym entry
- 🔐 Eloquent pivot table access for active subscriptions
- 📤 Decoupled business logic with Services
- ⚙️ Laravel Scheduler integration

---

## 🗂 Folder Structure (With Service Layer Pattern)

app/
├── Console/
│ └── Commands/
│ └── CheckSubscriptions.php # Scheduled job command
├── Http/
│ ├── Controllers/
│ │ └── SubscriptionController.php # Route-level logic
    └── UserController.php # Route-level logic
│ └── Requests/ # Request validation (optional)
├── Models/
│ └── User.php
│ └── Subscription.php
├── Services/
│ ├── SubscriptionService.php # Handles subscription-related logic
│ └── QRCodeService.php # Handles QR code generation logic
│ └── UserService.php # Handles User
│ └── AuthService.php # Handles LOGIN AND REGISTER
├── Providers/
├── ...
resources/
└── views/
└── barcode-view.blade.php # QR view
routes/
└── web.php # Route definitions


📬 Contact
Author: Hazem Atef
Email: hazematef5042@email.com
