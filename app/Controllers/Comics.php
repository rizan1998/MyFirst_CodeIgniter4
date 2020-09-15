<?php

namespace App\Controllers;

class Comics extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Comics List'
        ];
        return view('Comisc/index', $data);
    }

    //--------------------------------------------------------------------

}
