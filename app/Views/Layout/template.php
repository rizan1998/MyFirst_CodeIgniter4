<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

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
<script src="js/jquery-3.5.1.min.js"></script>
<script script src="js/bootstrap.bundle.min.js"></script>
<script src="js/popper.min.js"></script>
</body>

</html>