<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="hlavni-container">
    <aside class="sidebar">
        <ul>
            <li><a href="<?= base_url('/') ?>">Všechny</a></li> 
            <?php foreach ($categories as $category): ?>
                <li><a href="<?= base_url('?category=' . urlencode($category)) ?>" 
                    class="<?= ($category == $selectedCategory) ? 'selected' : '' ?>">
                    <?= esc($category) ?></a>
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
                    <img src="<?= $event['image_url'] ?? 'obrazek.png' ?>" alt="Obrázek akce" class="event-image">
                    <div class="event-info">
                        <h2><?= esc($event['name']) ?? 'Název akce' ?></h2>
                        <p><?= !empty($event['text']) ? substr($event['text'], 0, 80) . '...' : 'Popis akce není k dispozici.' ?></p>
                        


                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?= $current_page - 1 ?>&category=<?= $selectedCategory ?>" class="prev-next-btn">PREV</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>&category=<?= $selectedCategory ?>" class="page-btn <?= ($i == $current_page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
                <a href="?page=<?= $current_page + 1 ?>&category=<?= $selectedCategory ?>" class="prev-next-btn">NEXT</a>
            <?php endif; ?>
        </div>
    </main>
</div>

<?= $this->endSection(); ?>
