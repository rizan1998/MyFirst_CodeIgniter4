<?php

// karena ini ada pada satu folder maka tambah lagi alamatnya
namespace App\Controllers\Admin;
// tapi basecontrollernya akan error karena tidak mengenalilagi
// basecontroller itu apa, untuk mengatasinya menggunakan user
use App\Controllers\BaseController;
// setelah menggunakan user akan tetap error karena url
// pada alamat segmen yang pertamanya itu mengarah ke controller
// dan bukan ke sebuah file jadi salah satu jalannya dapat di
// ubah saat pengaksessan routes atau membuat routes baru untuk
// class user ini
class Users extends BaseController
{
    public function index()
    {
        echo "ini adalah controller Users yang ada dinamespace atau file admin<br>
        nama saya adalah= $this->nama.
        ";
    }

    public function myName($nama = "Masukan nama anda", $umur = "Masukan Umur Anda")
    {
        // jika argument kosong maka error jika tidak ingin kosong
        // maka set saja default parameter
        echo "my name is $nama and myold is $umur";
    }

    //--------------------------------------------------------------------

}
