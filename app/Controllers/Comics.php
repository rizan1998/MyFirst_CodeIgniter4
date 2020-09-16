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
        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('the Comic title ' . $slug . ' is not found!');
        }
        return view('Comics/detail', $data);
    }


    //-----------------------------Add a new Comic---------------------------------------
    public function addaNewComic()
    {
        // session(); //tangkap session yang dikirimkan oleh addaNewComic
        //    session diatas telah dipindahkan ke basecontroller

        $data = [
            'title' => 'Form Add new Comic',
            'navActive' => 'Add a New Commic',
            'validation' => \Config\Services::validation() // ini untuk mengambil pesan validasi ysang dikirim
            // melalui session
        ];

        return view('Comics/addNewComic', $data);
    }

    //-----------------------------Management data Add a new Comic---------------------------------------
    public function save()
    {

        if (!$this->validate([ //jika tidak tervalidasi
            // target pada name
            //'title' => 'required|is_unique[comics.title]' //is_unique tidak boleh ada yang sama dengan ada yang ditable
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                // kalau ada error pake s karena banyak errors
                // kasih error untuk tiap2 rulesnya makanyya kasih array lagi
                // kasih {field} untuk mengambilnamenya jadi tidak usah menulis manual title
                'errors' => [
                    'required' => '{field} Comic field is required',
                    'is_unique' => '{field} Comic already on database'
                ]
            ]

        ])) {

            // ambil dulu pesan tidak tervalidasinya   
            $validation = \Config\Services::validation(); //ini adalah alamat library dari form validation
            // dd($validation);
            // sebenarnya bisa saja memakai return view 
            // untuk mengisi pesan kesalahannya 
            // $data['validation'] = $validation
            //retrun view('/Comics/addaNewComic',$data);
            // bisa saja seperti itu

            // redirect tidak bisa mengirim data
            // redirect()->to('/Comics/addaNewComic', $data); ini tidak bisa
            // maka caranya bisa chaining
            // tambahkan withInput() ini artinya menginput semua hal yang 
            // sudah diketikan dan nantinya 
            // nanti input tadi akan disimpen ke session  
            // lalu tambahkan juga untuk validationnya 
            // ->with('validation', $validation)
            return redirect()->to('/Comics/addaNewComic')->withInput()->with('validation', $validation); //dikirim ke addaNewComic
            //karena inputan diatas merupakan sebuah session jadi pada createnya kita harus siapkan sessionnya

        }
        // validation input



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
            'slug' => $slug, //slug adalah judul yang diolah sehingga
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
