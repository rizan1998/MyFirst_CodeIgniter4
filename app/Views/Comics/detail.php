<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-5 mb-3">Comic Detail</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/images/<?= $Comic['cover_manga']; ?>.jpg" class="card-img " alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $Comic['title']; ?></h5>
                            <p class="card-text"><b>Penulis</b><?= $Comic['author']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit</b><?= $Comic['publisher']; ?></small></p>
                            <div>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                            <div>
                                <a href="/Comics">Back to Comics list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>