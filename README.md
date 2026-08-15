# 🔐 PHP & MongoDB Auth App (Dockerized)

A containerized full-stack login authentication system built with **PHP**, **MongoDB**, and **Docker Compose**. Features input validation, secure password hashing (`bcrypt`), and visual feedback for database writes.

---

## 🚀 Features

* **Containerized Environment:** Fully isolated PHP and MongoDB services using Docker Compose.
* **Database Integration:** Direct document storage using the official `mongodb/mongodb` PHP driver.
* **Security First:** Passwords are hashed using `password_hash()` with standard `BCRYPT`.
* **Clean UI:** Responsive login form with password toggle support and dynamic status messages.

---

## 🛠️ Tech Stack

* **Language:** PHP 8.x
* **Database:** MongoDB 8.x
* **Infrastructure:** Docker & Docker Compose
* **Dependency Manager:** Composer

---

## 📁 Project Structure

```text
.
├── docker-compose.yml   # Multi-container configuration
├── dockerfile           # Custom PHP-Apache image definition
├── db.php              # MongoDB client setup & connection script
├── index.php           # Main login view and form processing
├── composer.json        # PHP dependencies (mongodb/mongodb)
├── style.css           # UI styling
└── .gitignore          # Excluded files (vendor/, .env, logs)
```

---

## ⚙️ Quickstart Setup

### Prerequisites

Ensure you have the following installed on your machine:
* [Docker Desktop](https://www.docker.com/products/docker-desktop/)
* [Git](https://git-scm.com/)
* [MongoDB Compass](https://www.mongodb.com/products/tools/compass) *(optional, for visual data inspection)*

### Installation & Execution

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/devdhruvsingh/login-page.git](https://github.com/devdhruvsingh/login-page.git)
   cd login-page
   ```

2. **Spin up the containers:**
   ```bash
   docker-compose up -d --build
   ```

3. **Access the application:**
   Open your browser and navigate to `http://localhost:8000`.

---

## 🗄️ Database Verification

To verify that records are persisting into MongoDB:

1. Open **MongoDB Compass**.
2. Connect to `mongodb://localhost:27017` (or `mongodb://localhost:27018` if port-mapped).
3. Navigate to **`user_db`** $\rightarrow$ **`users`** collection to inspect saved document records.
