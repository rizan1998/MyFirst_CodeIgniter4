<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // jika satu file data menggunakan return saja
        // contoh return view('Pages/home');
        $data = [
            'title' => 'Home | My CodeIgninter 4',
            'tes' => array('1', '2', '3', '4', '5')
        ];
        echo view('Layout/header', $data);
        echo view('Pages/home', $data);
        echo view('Layout/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'Home | My CodeIgninter 4'
        ];

        echo view('Layout/header', $data);
        echo view('Pages/about');
        echo view('Layout/footer');
    }
    //--------------------------------------------------------------------

}
