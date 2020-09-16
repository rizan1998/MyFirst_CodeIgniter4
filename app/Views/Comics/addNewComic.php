<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Add New Comic</h2>
            <form action="/Comics/save" method="post">
                <!-- <?= csrf_field() ?>  ini berfungsi untuk mencegah
        orang lain mengisi form dihalaman berbeda, jadi untuk pengisian
        form hanya bisa dilakukan pada halaman ini saja dan tidak bisa di
        bajak oleh orang lain -->
                <div class="form-group row">
                    <label for="title-comic" class="col-sm-2 col-form-label">Comic Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title-comic" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" name="author" class="form-control" id="author">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" name="publisher" class="form-control" id="publisher">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover_manga" class="col-sm-2 col-form-label">Manga Cover</label>
                    <div class="col-sm-10">
                        <input type="text" name="cover_manga" class="form-control" id="cover_manga">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Comic</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</div> <?= $this->endSection(); ?>