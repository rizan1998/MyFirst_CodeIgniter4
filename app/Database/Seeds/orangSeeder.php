<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

// require_once '/path/to/Faker/src/autoload.php';

class orangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run() //method ini dighunakan untuk mengisi data kedata base
    {
        // $data = [
        //     [
        //         'nama' => 'Muhamad Rijan Alpalah',
        //         'alamat'    => 'Kp Cinyawar Ciloto',
        //         //untuk mengisi created at maka menggunakan helper ci

        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Ahmad Hamdi',
        //         'alamat'    => 'Kp Padarincang',
        //         //untuk mengisi created at maka menggunakan helper ci

        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Tri aji Tunggal',
        //         'alamat'    => 'Kp Karang Tengah',
        //         //untuk mengisi created at maka menggunakan helper ci

        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ]
        // ];
        // ja_jp = orang jepang
        // id_ID = orang indonesia
        // $faker = \Faker\Factory::create('id_ID');
        // $data = [

        //     'nama' => $faker->name,
        //     'alamat' => $faker->address,
        //     'created_at' => Time::createFromTimestamp($faker->unixTime()),
        //     'update_at' => Time::now()

        // ];
        $faker = \Faker\Factory::create('ja_jp');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'update_at' => Time::now()

            ];
            $this->db->table('orang')->insert($data);
        }



        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO orang (nama, alamat, created_at, update_at) VALUES(:nama:, :alamat:, :created_at:, :update_at:)",
        //     // (nama,alamat) adalah field yang sama dengan database (:nama:, :alamat:) adalah
        //     // value diatas jadi samakan lalu running seedernya
        //     // pada command php spark db:seed orangSeeder
        //     $data
        // );

        // Using Query Builder
        //$this->db->table('orang')->insert($data);
        // jika insert batch:
        // $this->db->table('orang')->insertBatch($data);
    }
}
