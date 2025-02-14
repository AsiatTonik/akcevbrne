<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="cs">
<body>
    
    <main class="udalost-content">
        <div class="udalost-image">
            <img src="<?= $event['first_image'] ?? 'obrazek.png' ?>" alt="Event Image">
        </div>
        <div class="event-header">
            <div class="event-date"><?= date('d.m.Y', strtotime($event['date_from'])) ?> - <?= date('d.m.Y', strtotime($event['date_to'])) ?></div>
            <h1 class="event-title"><?= esc($event['name']) ?></h1>
        </div>
        <div class="event-description">
            <p><?= esc($event['text']) ?? 'No description available.' ?></p>
        </div>
        <div class="event-footer">
            <div class="event-pricing">
                <div><strong>VSTUPNÉ:</strong> <?= esc($event['tickets_info']) ?? 'Zdarma' ?></div>
                <?php if (!empty($event['tickets_url'])): ?>
                    <a href="<?= esc($event['tickets_url']) ?>" target="_blank" class="buy-ticket-button">KOUPIT VSTUPENKY</a>
                <?php endif; ?>
            </div>
            <div class="event-contact">
                
                <div><strong>EMAIL:</strong> <?= esc($event['organizer_email']) ?? 'Not available' ?></div>
            </div>
        </div>
    </main>

    
    <div id="map" style="height: 300px; width: 100%;"></div>

    <script>
        
        var latitude = <?= json_encode($latitude) ?>;
        var longitude = <?= json_encode($longitude) ?>;
        var eventName = <?= json_encode($event['name']) ?>;

        
        var map = L.map('map').setView([latitude, longitude], 13);

        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(eventName)
            .openPopup();
    </script>
</body>
</html>
<?= $this->endSection(); ?>
