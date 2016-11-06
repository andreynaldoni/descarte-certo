<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaObjetoTableSeeder::class);
        $this->call(ObjetoDescarteTableSeeder::class);
        $this->call(PontoDescarteTableSeeder::class);
        $this->call(ConteudoObjetoTableSeeder::class);
    }
}
