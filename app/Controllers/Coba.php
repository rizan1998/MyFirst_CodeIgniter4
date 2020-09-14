<?php namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
        echo "ini adalah controller coba <br>
        nama saya adalah= $this->nama.
        ";
    }
    
    public function myName($nama= "Masukan nama anda", $umur= "Masukan Umur Anda"){
        // jika argument kosong maka error jika tidak ingin kosong
        // maka set saja default parameter
        echo "my name is $nama and myold is $umur";
    }

	//--------------------------------------------------------------------

}
