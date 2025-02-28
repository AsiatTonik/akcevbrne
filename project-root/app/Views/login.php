<?= $this->extend('layout/layout'); ?> 
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Přihlášení</h2>
        <form action="/pham/project-root/login-process" method="POST">
            <div class="mb-3">
                <label for="nickname" class="form-label">Jméno:</label>
                <input type="text" id="nickname" name="nickname" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Heslo:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-dark w-100">Přihlásit se</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
