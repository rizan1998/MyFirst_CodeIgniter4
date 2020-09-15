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
        // kalo tidak dihapus maka akan error
        // echo view('Layout/header', $data);
        return view('Pages/home', $data);
        // echo view('Layout/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'Home | My CodeIgninter 4'
        ];

        // echo view('Layout/header', $data);
        // echo view('Pages/about');
        // echo view('Layout/footer');
        return view('Pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. abc No.23',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Kampus',
                    'alamat' => 'Jl. Pasir Hayanm No.45',
                    'kota' => 'Cianjur'
                ]
            ]
        ];
        return view('Pages/contact', $data);
    }
    //--------------------------------------------------------------------

}
