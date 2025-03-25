<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2>Editace události</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/update-event/' . $event['id']) ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Název</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($event['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" name="text"><?= esc($event['text']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="tickets_info" class="form-label">Vstupné</label>
            <input type="text" class="form-control" id="tickets_info" name="tickets_info" value="<?= esc($event['tickets_info']) ?>">
        </div>

        <div class="mb-3">
            <label for="organizer_email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="organizer_email" name="organizer_email" value="<?= esc($event['organizer_email']) ?>">
        </div>

        <div class="mb-3">
            <label for="date_from" class="form-label">Datum od</label>
            <input type="date" class="form-control" id="date_from" name="date_from" value="<?= date('Y-m-d', strtotime($event['date_from'])) ?>">
        </div>

        <div class="mb-3">
            <label for="date_to" class="form-label">Datum do</label>
            <input type="date" class="form-control" id="date_to" name="date_to" value="<?= date('Y-m-d', strtotime($event['date_to'])) ?>">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Uložit změny</button>
            <a href="<?= base_url('udalost/' . $event['id']) ?>" class="btn btn-secondary">Zrušit</a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
