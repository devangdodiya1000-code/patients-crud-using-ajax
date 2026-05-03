# 🏥 Laravel 12 AJAX CRUD - Patient Management System

This is a simple Patient Management System built with **Laravel 12**, using **AJAX for CRUD operations** and **Laravel Breeze for authentication**.

---

## 🚀 Features

- Authentication (Login/Register) using Laravel Breeze
- Patient CRUD operations using AJAX
- No page reload for Create, Update, Delete
- Clean UI with Bootstrap
- Status management (Active/Inactive)
- Form validation with AJAX
- Dynamic data rendering

---

## 🛠️ Tech Stack

- Laravel 12
- PHP >= 8.2
- MySQL
- jQuery AJAX
- Bootstrap 5
- Laravel Breeze

---

## 📦 Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
2. Install Dependencies
composer install
npm install && npm run build
3. Setup Environment File
cp .env.example .env
4. Configure Database

Edit .env file:

DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
5. Generate App Key
php artisan key:generate
6. Run Migrations
php artisan migrate
7. Install Laravel Breeze (Already Used)

If not installed, run:

composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run build
php artisan migrate
8. Run the Application
php artisan serve

Open in browser:

http://127.0.0.1:8000
🔐 Authentication
Register a new user
Login to access dashboard
Only authenticated users can manage patients
⚙️ AJAX CRUD Functionality
➤ Create Patient
Form submitted via AJAX
Data stored without page reload
➤ Read Patients
Data fetched dynamically
Displayed in table format
➤ Update Patient
Edit button opens form
Data updated via AJAX
➤ Delete Patient
Delete using AJAX request
Confirmation alert before delete
📁 Project Structure (Important Files)
app/
 └── Http/Controllers/
      └── PatientController.php

resources/views/
 └── patients/
      └── index.blade.php

routes/
 └── web.php

public/js/
 └── custom-ajax.js
🧪 AJAX Example (Sample)
$.ajax({
    url: "/patients",
    type: "POST",
    data: formData,
    success: function(response) {
        alert("Patient Added Successfully");
        location.reload();
    },
    error: function(error) {
        console.log(error);
    }
});
✅ Validation Handling
Laravel validation used in controller
Errors returned via AJAX
Displayed dynamically on form
📸 Screenshot

<img width="1901" height="565" alt="Screenshot from 2026-05-03 16-29-39" src="https://github.com/user-attachments/assets/d67ebbf6-ff7a-494d-aba8-9bfc37458fe6" />
<img width="1901" height="565" alt="Screenshot from 2026-05-03 16-29-32" src="https://github.com/user-attachments/assets/32d6a21f-0199-4506-8e6f-ecdb4e170137" />
<img width="1901" height="565" alt="Screenshot from 2026-05-03 16-29-25" src="https://github.com/user-attachments/assets/9539115f-2182-4d55-8886-85cb01409f02" />
