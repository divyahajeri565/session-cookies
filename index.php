<?php require __DIR__ . '/app.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Divya R Hajeri — Developer Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body data-theme="<?php echo htmlspecialchars($theme); ?>">
    <div class="app">
        <header class="topbar">
            <div class="brand">
                <div class="avatar">DR</div>
                <div>
                    <div class="name">Divya R Hajeri</div>
                    <div class="title">BCA Student | Web Developer</div>
                </div>
            </div>

            <div class="actions">
                <a class="theme-toggle" href="?settheme=<?php echo $theme === 'dark' ? 'light' : 'dark'; ?>">Switch to <?php echo $theme === 'dark' ? 'Light' : 'Dark'; ?> theme</a>
            </div>
        </header>

        <main class="dashboard">
            <section class="panel welcome">
                <?php if ($loggedIn): ?>
                    <h2>Welcome back, <?php echo htmlspecialchars($displayUser); ?>.</h2>
                    <p class="muted">Logged in at <strong><?php echo $loginTime; ?></strong></p>
                    <div class="grid">
                        <div class="stat">
                            <div class="num" data-value="<?php echo $visits; ?>"><?php echo $visits; ?></div>
                            <div class="label">Session visits</div>
                        </div>
                        <div class="stat">
                            <div class="num"><?php echo htmlspecialchars(session_id()); ?></div>
                            <div class="label">Session ID</div>
                        </div>
                        <div class="stat">
                            <div class="num"><?php echo $lastActivity; ?></div>
                            <div class="label">Last activity</div>
                        </div>
                    </div>

                    <form method="post" class="inline-form">
                        <button class="btn btn-ghost" name="action" value="logout">Logout (clear session)</button>
                    </form>

                <?php else: ?>
                    <h2>Hello, Guest.</h2>
                    <p class="muted">Sign in to create a session-based dashboard experience.</p>

                    <form method="post" class="login-form">
                        <input name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($cookieName); ?>">
                        <label class="remember"><input type="checkbox" name="remember"> Remember my name (cookies)</label>
                        <div class="row">
                            <button class="btn" name="action" value="login">Sign in</button>
                        </div>
                    </form>
                <?php endif; ?>
            </section>

            <section class="panel explain">
                <h3>How Sessions & Cookies Are Used</h3>
                <ul>
                    <li><strong>Session:</strong> Stores login state, visit counter, session id and timestamps until browser session ends or you logout.</li>
                    <li><strong>Cookies:</strong> Persist theme preference and optionally remember your name for 30 days.</li>
                </ul>
            </section>
        </main>

        <footer class="footer">Open this folder in XAMPP's htdocs and visit <a href="/session-cookie-demo/">http://localhost/session-cookie-demo/</a></footer>
    </div>
    </body>
    <script src="php.script.js" defer></script>
    </html>
</html>
