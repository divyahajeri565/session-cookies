
# 🌐 Personal Developer Dashboard — Session & Cookie Demo

A modern, interactive web application showcasing **PHP sessions** and **cookies** management through an elegant developer dashboard with real-time theme switching.

---

## 📋 Overview

This project demonstrates core web technologies for user state management:
- **Sessions**: Track user login status and visit counts
- **Cookies**: Persist user preferences and settings across browser sessions
- **Theme Switching**: Dynamic dark/light mode with one-click toggle

Built with a professional dark/gradient UI that responds to user preferences.

---

## ✨ Key Features

- 🌙 **Dark/Light Mode Toggle** — One-button theme switcher that saves your preference (persists for 1 year)
- 👤 **User Authentication** — Simple login/logout with session management
- 📊 **Visit Counter** — Tracks page visits per session
- 💾 **Persistent Preferences** — Remembers username and theme choice via cookies
- 📱 **Responsive Design** — Works seamlessly on desktop and mobile devices
- 🎨 **Modern UI** — Glassmorphism effects and gradient backgrounds for professional appearance

---

## 📁 Project Structure

| File | Purpose |
|------|---------|
| [**index.php**](index.php) | Frontend template and HTML markup. Includes `app.php` at the top and links `styles.css`. |
| [**app.php**](app.php) | Backend PHP logic: sessions, login/logout, visit counter, cookie handling for theme and user preferences. |
| [**styles.css**](styles.css) | Professional dark/light theme styling with glassmorphism effects and responsive layout. |
| [**script.js**](script.js) | JavaScript utilities (optional enhancements). |

---

## 🚀 How to Run

### Prerequisites
- XAMPP (or any Apache + PHP server)
- Modern web browser

### Steps

1. **Place the project** in XAMPP's `htdocs` folder:
   ```
   c:\xampp\htdocs\session-cookie-demo\
   ```

2. **Start Apache** using the XAMPP Control Panel

3. **Open in browser**:
   ```
   http://localhost/session-cookie-demo/
   ```

---

## 🔐 Session & Cookie Details

- **Theme Cookie** (`theme`) — Stores dark/light preference, expires in 1 year
- **Username Cookie** (`remembered_name`) — Remembers your name for 30 days (optional)
- **Session Data** — Login state and visit counter reset when session expires
- **Logout Behavior** — Clears session but preserves cookies (unless manually cleared)

### Theme Toggle
Click the **"Switch to Light/Dark theme"** button in the top-right corner to toggle between modes. Your preference is automatically saved and restored on your next visit.

---

## 💡 Technical Highlights

- PHP session management with `$_SESSION` superglobal
- HTTP cookie handling with `setcookie()` for persistent storage
- Secure input validation with `htmlspecialchars()`
- CSS custom properties (CSS variables) for dynamic theme switching
- Responsive grid layout for mobile-first design
- Smooth transitions for theme changes

---

## 📝 Notes

- The PHP backend logic is neatly separated in `app.php`, keeping `index.php` focused on presentation
- No external databases required — demonstrates in-memory session and client-side cookie storage
- Theme preference uses CSS variables for efficient, performant switching
- All cookies are HTTP-accessible and secure for this demo

---

## 👨‍💻 Created By

**Divya R Hajeri**  
BCA Student | Web Developer  
📧 **Email**: [divyahajeri565@gmail.com](mailto:divyahajeri565@gmail.com)

---

## 📄 License

This project is open-source and available for educational purposes.

---

*Last updated: 2026*
