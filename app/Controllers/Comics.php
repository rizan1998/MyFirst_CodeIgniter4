<?php

namespace App\Controllers;

// instance model ComicsModel
use \App\Models\ComicsModel;

class Comics extends BaseController
{
    protected $ComicsModel; //karena construct memerlukan properti
    // maka buat dulu propertynya
    public function __construct()
    {
        $this->ComicsModel = new ComicsModel(); //method comicsmodel ini
        //dari folde model ComicsModel
    }

    public function index()
    {
        $Comics = $this->ComicsModel->findAll();
        $data = [
            'title' => 'Comics List',
            'navActive' => 'Comics',
            'Comics' => $Comics
        ];
        // cara konek db tanpa model
        // panggil saja method static connect
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM comics");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // untuk menghubungkan terelebih dahulu dengan model
        // maka harus membuat terlebih dahulu dari instace tersebut
        // tapi sebelum membuat instance harus dipanggil dulu alamat
        // dari file tersebut
        // $ComicsModel = new \App\Models\ComicsModel();

        // atau bisa juga use atau panggil dulu filenya diatas baru
        // instance 
        // $ComicsModel = new ComicsModel(); jika ini disimpan disini 
        // maka tidak akan efisien karena jika membuat method baru
        // harus dipanggil kembali maka letakan instace ini kedalam 
        // contruct

        // find All disini sebagai select * from
        // $Comics = $ComicModel->findAll();
        // karena dipanggil di construct maka harus memakai $this
        //$Comics = $this->ComicsModel->findAll(); //langsung menampilkannya kedalam
        // bentuk tabel
        //dd($Comics);

        // bisa juga disimpen di base controller
        // tulisnya seperti ini:
        // $this->ComicsModel = new \App\Models\ComicsModel();
        // maka akant terpanggil disemua controller tapi dipiki2 saja dulu
        // apakah bener diperlukan disemua controller seperti itu
        return view('Comics/index', $data);
    }

    //--------------------------------------------------------------------

}
