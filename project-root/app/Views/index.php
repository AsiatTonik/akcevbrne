<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="hlavni-container">
       
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

        
        


    </div>
</body>
</html>

<?= $this->endSection(); ?> 
