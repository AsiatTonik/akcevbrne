<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>
<body>
    <div class="container">
        
        <header class="header">
            <h1>AKCE V BRNĚ</h1>
            <a href="http://localhost/pham/project-root/login">
            <button class="login-button">LOGIN</button>
            </a>

        </header>
        
        
        <main class="main-content">
            <div class="login-container">
                <h1>Přihlášení</h1>
                <form action="/pham/project-root/login-process" method="POST">
                    <label for="nickname">Jméno:</label>
                    <input type="text" id="nickname" name="nickname" required>
                    
                    <label for="password">Heslo:</label>
                    <input type="password" id="password" name="password" required>
                    
                    <button type="submit">Přihlásit se</button>
                </form>
                
            </div>
        </main>

        
        <footer class="footer">
            © 2024 Akce v Brně. Všechna práva vyhrazena.
        </footer>
    </div>
</body>
</html>
