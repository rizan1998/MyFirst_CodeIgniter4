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
        if (empty($data['Comic'])) { //comic disini ngambil dari atas
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
            ],
            'cover_manga' => [
                //uploaded[cover_manga]|
                'rules' => 'max_size[cover_manga,5024]|is_image[cover_manga]|mime_in[cover_manga,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    //'uploaded' => 'pilih gambar sampul terlebih dahulu',
                    'max_size' => 'ukuran g,ambar terlalu bersar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            // ambil dulu pesan tidak tervalidasinya   

            //$validation = \Config\Services::validation(); //ini adalah alamat library dari form validation
            // tapi validation diatas sebenarnya tidak usah dipanggil karena sudah di panggil oleh sesseion
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
            //return redirect()->to('/Comics/addaNewComic')->withInput()->with('validation', $validation); //dikirim ke addaNewComic
            // karena validationnya sudah ada disession berarti sintak diatas diganti
            // sintak diatas tidak memakai with() karena semuanya sudah tangkap oleh withInput()
            // sintak yang baru ada di bawan
            return redirect()->to('/Comics/addaNewComic')->withInput();
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

        //ambil file uploadbelum
        // sebenernya filnya sudah di upload ke file sementaran hanya saja 
        // hanya saja belum diupload ke file CI4nya
        $fileCove_image = $this->request->getFile('cover_manga');

        // sekarang pindahkan filenya
        //$fileCove_image->move('images');

        if ($fileCove_image->getError() == 4) {
            $filename = 'default.png';
        } else {

            // jika file tersebut ingin berubah namanya menjadi random
            $filename = $fileCove_image->getRandomName();
            $fileCove_image->move('images', $filename);
        }

        // ambil nama file
        //$cover_manga = $fileCove_image->getName(); //nama ini akana sama dengan file yang di insert
        // jika menginput nama yang sama maka akan langsung di tambahkan _1 oleh CI1 pada filenya



        $this->ComicsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug, //slug adalah judul yang diolah sehingga
            // stringnya sesuai dengan keiigninan kita
            // jadi semuanya menjadi hurup kecil dan kalo ada spasi diganti menjadi tanda minus

            'author' => $this->request->getVar(('author')),
            'publisher' => $this->request->getVar(('publisher')),
            'cover_manga' => $filename
        ]);

        // dengan fitur save juda crated_at dan update_at juga otomatis ditambahkan atau diinput
        // flash data adalah data yang muncul dalam session sebanyak 1x jika di refresh maka
        // data tersebut akan hilang

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/Comics');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $comic = $this->ComicsModel->find($id); //ini akan langsung menemukan nama filenya
        // berdasarkan id nya

        //cek dulu apakah gambar tersebut adalh default
        if ($comic['cover_manga'] != 'default.png') {
            //hapus file
            unlink('images/' . $comic['cover_manga']); // gabung dengan nama covernya
        }


        // dimana cara ini adalah cara konvensional dimana url atau idnya dapat
        // dilihat di sudut kiri web
        //$this->ComicsModel->delete($id); // maka ini kurang akman
        // jadi ganti dengan http method stufffing
        // jadi data akan di delete hanya ketika request methodnya adalah delete
        $this->ComicsModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/Comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Add new Comic',
            'navActive' => 'Add a New Commic',
            'validation' => \Config\Services::validation(),
            'Comic' => $this->ComicsModel->getComic($slug)
        ];

        return view('Comics/edit', $data);
    }

    public function update($id)
    {


        // cek data komik lama
        $oldComic = $this->ComicsModel->getComic($this->request->getVar('slug'));
        if ($oldComic['title'] == $this->request->getVar('title')) {
            $title_rule = 'required';
        } else {
            $title_rule = 'required|is_unique[comics.title]';
        }
        if (!$this->validate([
            'title' => [
                'rules' => $title_rule,
                'errors' => [
                    'required' => '{field} Comic field is required',
                    'is_unique' => '{field} Comic already on database'
                ]
            ], 'cover_manga' => [
                //uploaded[cover_manga]|
                'rules' => 'max_size[cover_manga,5024]|is_image[cover_manga]|mime_in[cover_manga,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    //'uploaded' => 'pilih gambar sampul terlebih dahulu',
                    'max_size' => 'ukuran g,ambar terlalu bersar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]

        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/Comics/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('cover_manga');
        // cek gambar apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('old_cover');
        } else {
            // genereate nama file random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan gambar 
            $fileSampul->move('images', $namaSampul);

            // hapus file yang lama


            unlink('images/' . $this->request->getVar('old_cover'));
        }
        // validation input

        // sebenarnya untuk untuk update data bisa melalui method save saja
        // karena CI4 sudah cerdas mengenali jika di insertnya ada sebuah data
        // id jadi jika ada id maka CI4 tau bahwa itu adalah sebuah update
        // berarti jika di savenya tidak ada id maka itu insert

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->ComicsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar(('author')),
            'publisher' => $this->request->getVar(('publisher')),
            'cover_manga' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/Comics');
        dd($this->request->getVar());
    }
}
