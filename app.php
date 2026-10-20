<?php
// app.php - backend logic for the Personal Developer Dashboard
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper: redirect to self
function redirect_self() {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Initialize session values
if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;

// Update last activity
$_SESSION['last_activity'] = time();

// Handle theme change via GET (toggle)
if (isset($_GET['settheme'])) {
    $theme = $_GET['settheme'] === 'light' ? 'light' : 'dark';
    setcookie('theme', $theme, time() + 60 * 60 * 24 * 365, '/');
    $_COOKIE['theme'] = $theme;
    redirect_self();
}

// Handle POST actions: login, logout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'logout') {
        session_unset();
        session_destroy();
        redirect_self();
    }

    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            session_regenerate_id(true);
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = htmlspecialchars($name, ENT_QUOTES);
            $_SESSION['login_time'] = time();

            if (isset($_POST['remember'])) {
                setcookie('remembered_name', $_SESSION['username'], time() + 60 * 60 * 24 * 30, '/');
            } else {
                setcookie('remembered_name', '', time() - 3600, '/');
            }

            redirect_self();
        }
    }
}

// Derive display values for templates
$cookieName = $_COOKIE['remembered_name'] ?? '';
$theme = $_COOKIE['theme'] ?? 'dark';
$displayUser = $_SESSION['username'] ?? $cookieName ?? 'Guest';
$loggedIn = $_SESSION['logged_in'] ?? false;
$visits = $_SESSION['visits'] ?? 0;
$loginTime = isset($_SESSION['login_time']) ? date('Y-m-d H:i:s', $_SESSION['login_time']) : '—';
$lastActivity = isset($_SESSION['last_activity']) ? date('Y-m-d H:i:s', $_SESSION['last_activity']) : '—';
