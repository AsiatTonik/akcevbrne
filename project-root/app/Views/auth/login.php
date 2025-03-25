<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center">Přihlášení do administrace</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('loginProcess') ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Uživatelské jméno</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Heslo</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Přihlásit se</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
