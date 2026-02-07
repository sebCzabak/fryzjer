# ✂️ System Rezerwacji Wizyt - Fryzjer (Custom MVC)

Kompletna aplikacja webowa do rezerwacji wizyt fryzjerskich, zbudowana od podstaw w oparciu o autorski wzorzec **MVC (Model-View-Controller)** w czystym PHP, bez użycia gotowych frameworków.

System umożliwia klientom przeglądanie usług i rezerwację terminów, a administratorowi zarządzanie harmonogramem i zatwierdzanie wizyt. Projekt implementuje pełną obsługę powiadomień e-mail oraz bezpieczny system logowania.

---

## 🚀 Kluczowe Funkcjonalności

### Dla Klienta:
* **Rejestracja i Logowanie:** Bezpieczne uwierzytelnianie z hashowaniem haseł (`bcrypt`).
* **Przegląd Usług:** Dynamiczna lista usług pobierana z bazy danych.
* **Rezerwacja Wizyt:** Formularz z walidacją daty (blokada dat przeszłych) i zapobieganiem double-booking (JS).
* **Panel Klienta:** Podgląd historii wizyt i ich statusów (Oczekująca, Zatwierdzona, Anulowana).
* **Powiadomienia E-mail:** Automatyczne potwierdzenia rezerwacji HTML (SMTP).

### Dla Administratora:
* **Dashboard:** Podgląd wszystkich rezerwacji w systemie.
* **Zarządzanie Statusami:** Zatwierdzanie lub odrzucanie wizyt jednym kliknięciem.
* **Automatyzacja:** Zmiana statusu automatycznie wysyła e-mail do klienta.

---

## 🛠️ Technologie

* **Backend:** PHP 8.2 (OOP, PDO, MVC Pattern).
* **Baza Danych:** MySQL (Relacyjna, 3NF).
* **Frontend:** HTML5, CSS3, Bootstrap 5 (RWD).
* **Biblioteki:** PHPMailer (obsługa SMTP), Composer.
* **Inne:**
    * Własny **Routing** (Friendly URLs via `.htaccess`).
    * Autorski **EnvLoader** (parsowanie plików `.env`).
    * Ochrona przed **SQL Injection** (Prepared Statements).
    * Ochrona przed **XSS** (htmlspecialchars).

---

## ⚙️ Instalacja i Konfiguracja

### 1. Klonowanie repozytorium
```bash
git clone https://github.com/sebCzabak/fryzjer-mvc.git
cd fryzjer-mvc
