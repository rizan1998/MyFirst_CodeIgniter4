<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    // configure ur model first
    // conect to database first
    // protected $DBGroup = 'my_codeigniter4';
    // configure Model
    protected $table      = 'orang';
    protected $primaryKey = 'id'; //jika id nya sama jika beda maka timpah disini menjadi bukan id
    // misal menjadi id_barang

    protected $returnType     = 'array'; //ini bisa ditimpah jadi object
    protected $useSoftDeletes = false; //apakah akan menggunakan fitur soft delete
    //soft delete adalahs sebuah fitur dimana data yang dihapus pada database
    //tidak benar-benar dihapus atau datanya tetap ada tapi nanti akan menambah
    // sebuah field delelted_at 

    protected $allowedFields = ['nama', 'alamat']; // memberi tahu field mana saja
    // yang boleh diisi oleh model secara otomatis jika field itu kosong
    // atau tidak input secara manual
    // bisa diisi manual oleh kita ketika nanti ada fitur insert data 

    protected $useTimestamps = true; //ini untuk fitur create_at atau update_at otomats
    // maka nyalakan atau true
    //protected $createdField  = 'created_at';//ini untuk costume create_at
    //protected $updatedField  = 'updated_at';//ini juga untuk costume update_at
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    public function search($keyword)
    { // cari menggunakan query builder
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;
        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}
