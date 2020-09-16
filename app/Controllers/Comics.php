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

    //-----------------------------List Comic---------------------------------------
    public function index()
    {
        // $Comics = $this->ComicsModel->findAll(); // ini sudah tidak dipakai lagi
        //karena sekarang memakai method dari model
        $data = [
            'title' => 'Comics List',
            'navActive' => 'Comics',
            'Comics' => $this->ComicsModel->getComic()
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
    //-----------------------------See Detail Comic---------------------------------------
    // detail comics dengan slug
    public function detail($slug)
    {
        // untuk logic yang akan terjadi maka dilakukan select * from comics where slug
        // implementasi bisa menggunakan fitur model
        // $Comics = $this->ComicsModel->where(['slug' => $slug])->first();
        // method where seperti query database ketika 'slug' => $slug ambil slug yg pertama
        // dengan method first();
        // tapi agar lebih rapih maka lebih baik dibuatkan sebuah method pada modelnya

        //$Comic = $this->ComicsModel->getComic($slug);
        //dd($Comics);
        $data = [
            'title' => 'Detail Comic',
            'Comic' =>  $this->ComicsModel->getComic($slug),
            'navActive' => 'Comic Detail'
        ];

        // jika slugnya kosong
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('the Comic title ' . $slug . ' is not found!');
        }
        return view('Comics/detail', $data);
    }


    //-----------------------------Add a new Comic---------------------------------------
    public function addaNewComic()
    {
        $data = [
            'title' => 'Form Add new Comic',
            'navActive' => 'Add a New Commic'
        ];

        return view('Comics/addNewComic', $data);
    }

    //-----------------------------Management data Add a new Comic---------------------------------------
    public function save()
    {
        // getVar()method yang bisa menerima 2 tipe input post dan get
        //dd($this->request->getVar()); 
        // kalau ingin yang ditangkapnya cuman satu $this->requrest->getVar('judul');
        // methodnya hanya akan berjalan post saja karena tadi method
        // yang dikirimnya dalah post jadi pas dienter akan error
        // karena methodnya sudah bukan post lagi tapi menjadi get

        //jika sudah terhubung dengan model maka hanya perlu memanggil method save()

        // membuat slug
        // untuk membuat string menjadi ramah url memakai url_title() pada CI4
        // defaultnya minus untuk spasi
        $slug = url_title($this->request->getVar('title'), '-', true);
        // '-' untuk separator atau spasi menjadi minus
        // true supaya menjadi hurup kecil semua

        $this->ComicsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $this->request->getVar('title'), //slug adalah judul yang diolah sehingga
            // stringnya sesuai dengan keiigninan kita
            // jadi semuanya menjadi hurup kecil dan kalo ada spasi diganti menjadi tanda minus

            'author' => $this->request->getVar(('author')),
            'publisher' => $this->request->getVar(('publisher')),
            'cover_manga' => $this->request->getVar(('cover_manga'))
        ]);

        // dengan fitur save juda crated_at dan update_at juga otomatis ditambahkan atau diinput
        // flash data adalah data yang muncul dalam session sebanyak 1x jika di refresh maka
        // data tersebut akan hilang

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/Comics');
    }
}
