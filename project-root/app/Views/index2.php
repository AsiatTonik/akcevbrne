<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akce v Brně</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/css/styling.css') ?>">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>AKCE V BRNĚ</h1>
            <button class="login-button">LOGIN</button>
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
        <main class="main-content">
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
                        <button class="more-button">VÍCE</button>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </main>

        
        <footer class="footer">
            <div class="footer-content">
                <p>&copy; 2024 Akce v Brně. Všechna práva vyhrazena.</p>
                <div class="social-links">
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                    <a href="https://twitter.com" target="_blank">Twitter</a>
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
