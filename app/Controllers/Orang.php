<?php

namespace App\Controllers;

// instance model ComicsModel
use \App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel; //karena construct memerlukan properti
    // maka buat dulu propertynya
    public function __construct()
    {
        $this->orangModel = new OrangModel(); //method comicsmodel ini
        //dari folde model ComicsModel
    }

    //-----------------------------List Comic---------------------------------------
    public function index()
    {
        // tangkap seacrching
        $keyword  = $this->request->getVar('keyword');
        //dd($keyword);
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
            $number = 100;
        } else {
            $orang = $this->orangModel;
            $number = 6;
        }
        // ternari atau if 1 baris antara true atau false
        $currenPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $data = [
            'title' => 'Comics Orang',
            'navActive' => 'Comics',
            //'Orang' => $this->orangModel->findAll()

            'Orang' => $orang->paginate($number, 'orang'),
            //angka enam adalah jumlah data yang akan ditampilkan
            // orang adalah nama tabel yang harus dikirmkan
            'pager' => $this->orangModel->pager,
            //paginate dan pager suah ada di modelnya bawaan cinya jadi tinggal di panggil
            'currentPage' => $currenPage,
            'number' => $number
        ];

        return view('orang/index', $data);
    }
}
