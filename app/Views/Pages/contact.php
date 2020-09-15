<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row text-center">
        <div class="col-6">
            <h1 class="">contact us</h1>
            <div class="">
                <?php foreach ($alamat as $a) : ?>
                    <ul>
                        <li><?= $a['tipe']; ?></li>
                        <li><?= $a['alamat']; ?></li>
                        <li><?= $a['kota']; ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>