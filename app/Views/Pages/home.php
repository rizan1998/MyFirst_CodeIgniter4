<!--  memberi tahu pemakaian template-->
<?= $this->extend('Layout/template'); ?>

<!-- lalu beritahu lagi tentang sectionnya bahwa
ini adalah section dengan nama content -->
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world!</h1>
            <!-- cara cetak array sealin menggunakan vardump 
                cukup memakai d();
                dd() = vardump die
            -->

        </div>
    </div>
</div>

<!-- penutup section -->
<?= $this->endSection(); ?>