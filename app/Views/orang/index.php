<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-5 mb-3">Daftar Orang</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian" aria-label="Recipient's username" name="keyword" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + ($number * ($currentPage - 1)); ?>
                    <?php foreach ($Orang as $c) : ?>
                        <tr>

                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $c['nama']; ?></td>
                            <td><?= $c['alamat']; ?></td>
                            <td><a href="/Comics/<?= $c['id']; ?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- untuk pagination -->
            <?= $pager->links('orang', 'orang_pagination') ?>
            <!-- parameter pertama adalah nama tabel, kedua adalah file pagenation yang ditambahkah -->
        </div>
    </div>
</div> <?= $this->endSection(); ?>