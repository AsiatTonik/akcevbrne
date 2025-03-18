<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
     
    <aside class="col-md-3">
    <div class="list-group">
        <a href="<?= base_url() ?>" class="list-group-item list-group-item-action <?= empty($selectedCategory) ? 'active bg-dark text-light border-0' : '' ?>">Všechny</a>
        <?php foreach ($categories as $category): ?>
            <a href="<?= base_url('?category=' . urlencode($category['name'])) ?>" 
               class="list-group-item list-group-item-action border-0 <?= ($category['name'] == $selectedCategory) ? 'active bg-dark text-light' : '' ?>">
                <?= esc($category['name']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</aside>



        
        <main class="col-md-9">
            <div class="mb-4">
                <form method="get" class="d-flex gap-2">
                    <input type="date" id="from" name="from" value="<?= esc($from) ?>" class="form-control">
                    <button class="btn btn-dark" type="submit">HLEDAT</button>
                </form>
            </div>

            <div class="row g-3">
                <?php foreach ($events_page as $event): ?>
                    <div class="col-md-4">
                        <div class="card">
                        <img src="<?= $event['first_image'] ?? 'obrazek.png' ?>" class="card-img-top img-fluid object-fit-cover" alt="Obrázek akce" style="height: 270px; width: 100%;">

                            <div class="card-body">
                            <h5 class="card-title"><?= esc(html_entity_decode($event['name'])) ?? 'Název akce' ?></h5>
                            <p class="card-text">
                                <?= !empty($event['text']) ? html_entity_decode(substr($event['text'], 0, 80)) . '...' : 'Popis akce není k dispozici.' ?>
                            </p>

                                <p><strong>Datum:</strong> <?= date('d.m.Y', strtotime($event['date_from'])) ?> - <?= date('d.m.Y', strtotime($event['date_to'])) ?></p>
                                <a href="<?= base_url('udalost/' . $event['id']) ?>" class="btn btn-dark">Více</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            
            <nav class="mt-4">
    <ul class="pagination justify-content-center flex-wrap">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                <a href="?page=<?= $i ?><?= $selectedCategory ? '&category=' . urlencode($selectedCategory) : '' ?>" 
                   class="page-link text-dark border-dark <?= ($i == $current_page) ? 'bg-light' : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>





        </main>
    </div>
</div>

<?= $this->endSection(); ?>
