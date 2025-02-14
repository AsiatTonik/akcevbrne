<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="hlavni-container">
<aside class="sidebar">
<ul>
    <li><a href="<?= base_url('/') ?>">Všechny</a></li> 
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="<?= base_url('?category=' . urlencode($category)) ?>" 
               class="<?= ($category == $selectedCategory) ? 'selected' : '' ?>">
                <?= esc($category) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</aside>

    <main class="hlavni-content">
        <div class="search-bar">
            <form method="get">
                <input type="date" id="from" name="from" value="<?= esc($from) ?>"> 
                <button class="search-button" type="submit">HLEDAT</button>
            </form>
        </div>

        <div class="events-grid">
            <?php foreach ($events_page as $event): ?>
                <div class="event-card">
                    <img src="<?= $event['first_image'] ?? 'obrazek.png' ?>" alt="Obrázek akce" class="event-image">
                    <div class="event-info">
                        <h2><?= esc($event['name']) ?? 'Název akce' ?></h2>
                        <p><?= !empty($event['text']) ? substr($event['text'], 0, 80) . '...' : 'Popis akce není k dispozici.' ?></p>
                        <p><strong>Datum:</strong> <?= date('d.m.Y', strtotime($event['date_from'])) ?> - <?= date('d.m.Y', strtotime($event['date_to'])) ?></p>
                        <a href="<?= base_url('udalost/' . $event['id']) ?>" class="more-button">Více</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>&category=<?= $selectedCategory ?>" class="page-btn <?= ($i == $current_page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </main>
</div>

<?= $this->endSection(); ?>
