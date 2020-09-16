<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    // configure ur model first
    // conect to database first
    // protected $DBGroup = 'my_codeigniter4';
    // configure Model
    protected $table      = 'comics';
    protected $primaryKey = 'id'; //jika id nya sama jika beda maka timpah disini menjadi bukan id
    // misal menjadi id_barang

    protected $returnType     = 'array'; //ini bisa ditimpah jadi object
    protected $useSoftDeletes = false; //apakah akan menggunakan fitur soft delete
    //soft delete adalahs sebuah fitur dimana data yang dihapus pada database
    //tidak benar-benar dihapus atau datanya tetap ada tapi nanti akan menambah
    // sebuah field delelted_at 

    //protected $allowedFields = ['name', 'email'];// memberi tahufield mana yang ada ditable yang
    // bisa diisi manual oleh kita ketika nanti ada fitur insert data 

    protected $useTimestamps = true; //ini untuk fitur create_at atau update_at otomats
    // maka nyalakan atau true
    //protected $createdField  = 'created_at';//ini untuk costume create_at
    //protected $updatedField  = 'updated_at';//ini juga untuk costume update_at
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    public function getComic($slug = false)
    { //$slug = false adalah nilai default slug

        //saring
        if ($slug == false) {
            //jika tidak ada slugnya maka tampilkan semua data
            return $this->findAll();
        } else {
            return $this->where(['slug' => $slug])->first();
        }
    }
}
