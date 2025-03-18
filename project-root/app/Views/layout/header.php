<nav class="navbar navbar-dark bg-black px-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="<?= base_url() ?>" class="navbar-brand text-white fs-3">AKCE V BRNĚ</a>

        <?php if (session()->get('isLoggedIn')): ?>
            
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">ODHLÁSIT SE</a>
        <?php else: ?>
            
            <a href="<?= base_url('login') ?>" class="btn btn-light">PŘIHLÁŠENÍ</a>
        <?php endif; ?>
    </div>
</nav>
