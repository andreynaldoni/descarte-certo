<?php

use Illuminate\Database\Seeder;

class PontoDescarteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pontos = [
            [
                'nm_ponto_descarte' => 'Ecoponto Praia Grande',
                'ds_ponto_descarte' => 'Próximo a FATEC Praia Grande',
                'cd_latitude' => '-24.0054046',
                'cd_longitude' => '-46.41278269999998'
            ]
        ];

        \DB::table('ponto_descarte')->insert($pontos);

        $pontos_categorias = [
            [
                'cd_categoria_objeto' => 1,
                'cd_ponto_descarte' => 1
            ],
            [
                'cd_categoria_objeto' => 2,
                'cd_ponto_descarte' => 1
            ],
            [
                'cd_categoria_objeto' => 3,
                'cd_ponto_descarte' => 1
            ],
        ];
        
        \DB::table('categoria_objeto_ponto_descarte')->insert($pontos_categorias);
    }
}
