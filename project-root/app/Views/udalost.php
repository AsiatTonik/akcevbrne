<!DOCTYPE html>
<html lang="cs">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akce v Brně</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleudalost.css') ?>">
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
            <div class="event-image"></div>
            <div class="event-header">
                <div class="event-date">DATUM OD - DATUM DO</div>
                <h1 class="event-title">NÁZEV AKCE</h1>
            </div>
            <div class="event-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="event-footer">
                <div class="event-pricing">
                    <div><strong>VSTUPNÉ:</strong> Zdarma</div>
                    <button class="buy-ticket-button">KOUPIT VSTUPENKY</button>
                </div>
                <div class="event-contact">
                    <div><strong>ADRESA:</strong> Náměstí Svobody 1, Brno</div>
                    <div><strong>EMAIL:</strong> info@akcevbrne.cz</div>
                </div>
            </div>
        </main>

        
        <div id="map" style="height: 300px; width: 100%;"></div>

        
        <footer class="footer">
            © 2024 Akce v Brně. Všechna práva vyhrazena.
        </footer>
    </div>

    <script>
        
        var map = L.map('map').setView([49.1951, 16.6068], 13); 

        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        L.marker([49.1951, 16.6068]).addTo(map)
            .bindPopup('Náměstí Svobody, Brno')
            .openPopup();
    </script>
</body>
</html>
