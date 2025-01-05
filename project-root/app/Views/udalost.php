<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="cs">

<body>
    
    <main class="udalost-content">
            <img src="<?= $event['first_image'] ?? 'obrazek.png' ?>" alt="Event Image">
            <div class="event-header">
            <div class="event-date"><?= date('d.m.Y', $event['date_from'] / 1000) ?> - <?= date('d.m.Y', $event['date_to'] / 1000) ?></div>
            <h1 class="event-title"><?= $event['name'] ?></h1>
            </div>
            <div class="event-description">
            <p><?= $event['text'] ?? 'No description available.' ?></p>
            </div>
            <div class="event-footer">
            <div class="event-pricing">
            <div><strong>VSTUPNÉ:</strong> <?= $event['tickets_info'] ?? 'Free' ?></div>
            <button class="buy-ticket-button">KOUPIT VSTUPENKY</button>
            </div>
            <div class="event-contact">
            <div><strong>ADRESA:</strong> <?= $event['parent_festivals'] ?? 'Not available' ?></div>
            <div><strong>EMAIL:</strong> <?= $event['organizer_email'] ?? 'Not available' ?></div>
            </div>
            </div>
        </main>

        
        <div id="map" style="height: 300px; width: 100%;"></div>

        
      

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
<?= $this->endSection(); ?> 
