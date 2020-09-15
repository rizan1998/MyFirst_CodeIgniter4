<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-5 mb-3">Daftar Comics</h1>
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
                            <td><img src="/images/<?= $c['cover book']; ?>.jpg" class="images-cover" alt=""></td>
                            <td><?= $c['title']; ?></td>
                            <td><a href="" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <?= $this->endSection(); ?>