<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>

    <div class="container mt-4">
        <div class="text-center">
            <img src="<?= $event['first_image'] ?? 'obrazek.png' ?>" class="img-fluid rounded" alt="Event Image" style="max-width: 600px;">
        </div>

        <div class="mt-4">
            <h1 class="text-center"><?= esc($event['name']) ?></h1>
            <p class="text-muted text-center">
            <strong>Datum:</strong> <?= date('d.m.Y', strtotime($event['date_from'])) ?> - <?= date('d.m.Y', strtotime($event['date_to'])) ?>
        </p>
    </div>

    <div class="mt-4">
        <p class="lead"><?= esc($event['text']) ?></p>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h5>VSTUPNÉ:</h5>
            <p><?= !empty($event['tickets_info']) ? esc($event['tickets_info']) : 'Zdarma' ?></p>
            <?php if (!empty($event['tickets_url'])): ?>
                <a href="<?= esc($event['tickets_url']) ?>" target="_blank" class="btn btn-success">KOUPIT VSTUPENKY</a>
            <?php endif; ?>
    </div>
    
        <div class="col-md-6">
            <h5>Kontakt:</h5>
            <p><strong>Email:</strong> <?= esc($event['organizer_email']) ?></p>
        </div>
    </div>

    <div id="map" class="mt-4" style="height: 300px; width: 100%;"></div>
</div>

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

<?= $this->endSection(); ?>
