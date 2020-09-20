<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-5 mb-3">Daftar Comics</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <h2><a href="/Comics/addaNewComic" class="btn btn-primary mt-3 mb-4">Add New Comic</a></h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">image Cover</th>
                        <th scope="col">Comic title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Comics as $c) : ?>
                        <tr>

                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/images/<?= $c['cover_manga']; ?>" class="images-cover" alt=""></td>
                            <td><?= $c['title']; ?></td>
                            <td><a href="/Comics/<?= $c['slug']; ?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <?= $this->endSection(); ?>