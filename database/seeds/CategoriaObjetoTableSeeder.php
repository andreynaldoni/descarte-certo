<?php

use Illuminate\Database\Seeder;
use App\User;

class CategoriaObjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nm_categoria_objeto' => 'Plástico',
                'ds_categoria_objeto' => 'Materiais Pláticos (Garrafas, Copos)',
                'im_categoria_objeto' => '/img/category/1.png'
            ],
            [
                'nm_categoria_objeto' => 'Papel',
                'ds_categoria_objeto' => 'Materiais de Papel (Papel, Folha)',
                'im_categoria_objeto' => '/img/category/2.png'
            ],
            [
                'nm_categoria_objeto' => 'Eletrônico',
                'ds_categoria_objeto' => 'Celulares, Computador, Impressoras',
                'im_categoria_objeto' => '/img/category/3.png'
            ],
            [
                'nm_categoria_objeto' => 'Vidro',
                'ds_categoria_objeto' => 'Garrafas de Vidro, Janela, Lâpadas',
                'im_categoria_objeto' => '/img/category/4.png'
            ],
            [
                'nm_categoria_objeto' => 'Metal',
                'ds_categoria_objeto' => 'Bases de Metal',
                'im_categoria_objeto' => '/img/category/5.png'
            ],
            [
                'nm_categoria_objeto' => 'Orgânico',
                'ds_categoria_objeto' => 'Restos de Alimentos',
                'im_categoria_objeto' => '/img/category/6.png'
            ]
        ];

        \DB::table('categoria_objeto')->insert($categorias);
    }
}
