<div align="center">

# 📋 Master Tasks API

### An enterprise-grade, secure, and highly scalable RESTful API built on Laravel 11

[![Laravel 11](https://img.shields.io/badge/Framework-Laravel_11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/Language-PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Authentication Engine](https://img.shields.io/badge/Auth-Laravel_Sanctum-61DAFB?style=for-the-badge&logo=laravel&logoColor=black)](https://laravel.com/docs/11.x/sanctum)
[![Database System](https://img.shields.io/badge/Database-MySQL_8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![API Architecture](https://img.shields.io/badge/Architecture-REST_API-0052CC?style=for-the-badge&logo=postman&logoColor=white)](#)

---

A high-performance backend solution engineered for robust task management. Featuring stateless token authentication via **Laravel Sanctum**, granular validation layers, and streamlined relational storage designed to serve lightning-fast responses to modern single-page applications.

[🚀 Key Features](#-key-features) • [📦 Installation](#-installation) • [📚 API Documentation](#-api-documentation) • [🛡️ Security Architecture](#-security)

</div>
## 🚀 Project Overview

**Master Tasks API** is a secure, stateful RESTful backend architecture explicitly engineered to power modern, asynchronous task management interfaces. Built using the Laravel 11 framework and decoupled from the presentation layer, the system processes, sanitizes, and filters relational data records while maintaining isolated state lifecycles for multi-tenant interactions.

### 🧩 Problem Statement

Traditional monolithic or unoptimized task management systems often introduce unnecessary server-side rendering overhead, resulting in slower user interface performance. Additionally, simple data management tools frequently lack built-in security parameters—such as robust input validation, route-level authorization gates, and defense against brute-force request flooding. 

Master Tasks API resolves these issues by supplying:
* **Stateless Token Protocols:** Decoupled authentication handling via token signatures to allow lightweight, non-blocking client-side view refreshes.
* **Granular Query Scoping:** Server-side search evaluation algorithms that eliminate over-fetching and unnecessary frontend parsing.
* **Strict Security Enforcement:** Native mitigation strategies blocking injection anomalies, multi-user privilege escalation, and cross-origin resource access failures.

### 🎯 Target Audience

The codebase is structured to serve as an integration point for:
* **Frontend Developers:** Software engineers building single-page applications (SPAs) or mobile frontends who require structured, uniform, and predictable JSON response contracts.
* **System Administrators & Teams:** Organizations requiring a self-hosted, scalable microservice to track, filter, and audit operational task progression safely across isolated member roles.v## 🚀 Project Overview

**Master Tasks API** is a secure, stateful RESTful backend architecture explicitly engineered to power modern, asynchronous task management interfaces. Built using the Laravel 11 framework and decoupled from the presentation layer, the system processes, sanitizes, and filters relational data records while maintaining isolated state lifecycles for multi-tenant interactions.

### 🧩 Problem Statement

Traditional monolithic or unoptimized task management systems often introduce unnecessary server-side rendering overhead, resulting in slower user interface performance. Additionally, simple data management tools frequently lack built-in security parameters—such as robust input validation, route-level authorization gates, and defense against brute-force request flooding. 

Master Tasks API resolves these issues by supplying:
* **Stateless Token Protocols:** Decoupled authentication handling via token signatures to allow lightweight, non-blocking client-side view refreshes.
* **Granular Query Scoping:** Server-side search evaluation algorithms that eliminate over-fetching and unnecessary frontend parsing.
* **Strict Security Enforcement:** Native mitigation strategies blocking injection anomalies, multi-user privilege escalation, and cross-origin resource access failures.

### 🎯 Target Audience

The codebase is structured to serve as an integration point for:
* **Frontend Developers:** Software engineers building single-page applications (SPAs) or mobile frontends who require structured, uniform, and predictable JSON response contracts.
* **System Administrators & Teams:** Organizations requiring a self-hosted, scalable microservice to track, filter, and audit operational task progression safely across isolated member roles.

## ✨ Key Features

### 🔐 Authentication & Security
- [x] **Stateless Session Guard:** Secured via bearer token workflows using Laravel Sanctum.
- [x] **Secure Cryptography:** Industry-standard password hashing using bcrypt algorithms.
- [x] **Automatic Revocation:** Immediate programmatic invalidation of client tokens upon logging out.
- [x] **Rate Limiting:** Built-in middleware defenses to prevent route brute-forcing.

### 📝 Task Lifecycle Management (CRUD)
- [x] **Isolated Workspaces:** Users can only view, modify, or delete records they explicitly own.
- [x] **Data Integrity Verification:** Automated request filters ensuring presence, correct data types, and valid date intervals.
- [x] **Priority Mapping:** Distinct relational metadata allocation supporting `low`, `medium`, and `high` priority flags.
- [x] **Dynamic Toggling:** Fast status modifiers to flag items as completed without rebuilding payload schemas.

### 🔍 Advanced Contextual Search
- [x] **Partial Text Matching:** Real-time query evaluation targeting task title strings.
- [x] **Multi-Criteria Filtering:** Concurrent filtering using importance arrays, completion status, and textual constraints.
- [x] **Optimized Eloquent Scopes:** Index-friendly database querying designed to limit API transaction overhead.
<!-- 
## ⚙️ Installation & Setup Guide

Follow these steps to deploy and run the Master Tasks API in your local development environment.

### 📋 Prerequisites

Before starting, ensure your system has the following components installed:
* **PHP** `8.2` or higher
* **Composer** `2.x`
* **MySQL** `8.x` or higher
* **Git**

---

### 🚀 Step-by-Step Installation

#### 1. Clone the Repository
Clone the codebase to your local storage and navigate into the project root directory:
```bash
git clone [https://github.com/yourusername/master-tasks-api.git](https://github.com/yourusername/master-tasks-api.git)
cd master-tasks-api

## ⚙️ Installation & Setup Guide

Follow these steps to deploy and run the Master Tasks API in your local development environment.

### 📋 Prerequisites

Before starting, ensure your system has the following components installed:
* **PHP** `8.2` or higher
* **Composer** `2.x`
* **MySQL** `8.x` or higher
* **Git**

---

### 🚀 Step-by-Step Installation

#### 1. Clone the Repository
Clone the codebase to your local storage and navigate into the project root directory:
```bash
git clone [https://github.com/yourusername/master-tasks-api.git](https://github.com/yourusername/master-tasks-api.git)
cd master-tasks-api -->


## 🔐 Authentication Flow

This application secures its endpoints using **JWT (JSON Web Tokens)**. Below is the step-by-step lifecycle of how a user authenticates and accesses protected resources.

---

### 🗺️ Flow Overview

```mermaid
sequenceDiagram
    autonumber
    actor Client as 💻 Client (Frontend)
    actor Server as ⚙️ Server (API)
    
    Client->>Server: 1. Register (POST /api/register)
    Server-->>Client: Account Created Successfully
    
    Client->>Server: 2. Login (POST /api/login)
    Note over Server: Verify credentials & generate JWT
    Server-->>Client: 3. Return JWT Access Token
    
    Note over Client: Store token securely (LocalStorage/Cookies)
    
    Client->>Server: 4. Request Resource (Headers: Bearer <token>)
    Note over Server: 5. Validate Token
    Server-->>Client: Return Protected Data (200 OK)
```

---

### 🔄 Detailed Steps

#### 1️⃣ Register
The user creates an account by sending their registration details (e.g., username, email, password) to the server. The server hashes the password and saves the user record in the database.

* **Method/Endpoint:** `POST /api/auth/register`
* **Payload:**

```json
{
  "username": "coder_party",
  "email": "dev@example.com",
  "password": "SuperSecurePassword123"
}
```

---

#### 2️⃣ Login
The user submits their credentials to obtain access. The server validates the email and password against the database records.

* **Method/Endpoint:** `POST /api/auth/login`
* **Payload:**

```json
{
  "email": "dev@example.com",
  "password": "SuperSecurePassword123"
}
```

---

#### 3️⃣ Receive Token
Upon successful authentication, the server generates a signed JSON Web Token (JWT) and sends it back in the response.

* **Response (200 OK):**

```json
{
  "status": "success",
  "message": "Login successful",
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
}
```

> [!WARNING]
> **Security Tip:** The client should store this token securely (e.g., in `localStorage`, `sessionStorage`, or an `HttpOnly` cookie) to persist the session.

---

#### 4️⃣ Bearer Token Authentication
To request data from restricted endpoints, the client must include the token in the HTTP `Authorization` header using the Bearer schema.

* **Header Format:**

```http
Authorization: Bearer <your_jwt_token_here>
```

---

#### 5️⃣ Accessing Protected Routes
The server inspects incoming requests to protected routes. It intercepts the request, extracts the Bearer token, decodes/verifies it, and—if valid—processes the request.

* **Example Request:**

```http
GET /api/dashboard HTTP/1.1
Host: api.example.com
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
```

> [!CAUTION]
> **Failed Validation (401 Unauthorized):** If the token is missing, expired, or tampered with, the server rejects the request.

```json
{
  "error": "Unauthorized Access",
  "message": "Invalid or expired token."
}
```

