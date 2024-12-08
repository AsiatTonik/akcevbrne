<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="cs">

<body>
    <div class="log-container">
        
        
        
        
        <main class="login-content">
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
        



    </div>
</body>
</html>

<?= $this->endSection(); ?> 
