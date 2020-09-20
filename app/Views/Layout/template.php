<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/css/style.css">

    <title> <?= $title; ?></title>
</head>

<body>
    <!-- =====================Call Navbar===================== -->
    <?= $this->include('Layout/navbar'); ?>



    <!-- =====================CONTENT===================== -->
    <!-- cetak sebuah section dari halaman yang memanggil template ini -->
    <!-- namanya boleh bebas tapi untuk saat ini namanya dinamain content -->
    <?= $this->renderSection('content'); ?>



    <!-- =====================END CONTENT===================== -->

</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/js/jquery-3.5.1.min.js"></script>
<script script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/popper.min.js"></script>
<script>
    //semuanya harus dimasukan dulu kedalam funciton
    function preViewImg() {
        //ambil id file terlebih dahulu
        const cover_manga = document.querySelector('#cover_manga');
        const label = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        // untuk tulisan label
        // bisa pake innterhtml atau textcontent
        label.textContent = cover_manga.files[0].name; //ambil nama file
        const filesampul = new FileReader();
        filesampul.readAsDataURL(cover_manga.files[0]); //ambil alamat penyimpanannya

        //simpan file tadi ke tag img pada htmlnya
        filesampul.onload = function(e) {
            imgPreview.src = e.target.result; //ganti alamat srcnya 
        }
    }
</script>
</body>

</html>