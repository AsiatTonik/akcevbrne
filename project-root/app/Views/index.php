
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akce v Brně</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styling.css') ?>">
</head>
<body>
    <div class="hlavni-container">
        <header class="hlavni-header">
            <h1>AKCE V BRNĚ</h1>
            <a href="http://localhost/pham/project-root/login">
            <button class="login-button">LOGIN</button>
            </a>

        </header>
        <aside class="sidebar">
            <ul>
                <li>NÁZEV KATEGORIE</li>
                <li>NÁZEV KATEGORIE</li>
                <li>NÁZEV KATEGORIE</li>
                <li>NÁZEV KATEGORIE</li>
                <li>NÁZEV KATEGORIE</li>
            </ul>
        </aside>
        <main class="hlavni-content">
            <div class="search-bar">
                <label for="from">OD</label>
                <input type="date" id="from" name="from">
                <label for="to">DO</label>
                <input type="date" id="to" name="to">
                <button class="search-button">HLEDAT</button>
            </div>
            <div class="events-grid">
                <?php for ($i = 0; $i < 9; $i++): ?>
                <div class="event-card">
                    <div class="event-image"></div>
                    <div class="event-info">
                        <h2>NÁZEV AKCE</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas orci non magna.</p>
                        <a href="http://localhost/pham/project-root/udalost" class="more-button">VÍCE</a>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </main>

        
        <footer class="hlavni-footer">
    <div class="footer-content">
        
        <div class="social-links">
            <a href="https://www.facebook.com" target="_blank">Facebook</a> |
            <a href="https://www.twitter.com" target="_blank">Twitter</a> |
            <a href="https://www.instagram.com" target="_blank">Instagram</a>
        </div>
    </div>
</footer>


    </div>
</body>
</html>
