<?php

use Illuminate\Database\Seeder;

class ObjetoDescarteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objetos = [
            [
                'nm_objeto_descarte' => 'Computadores',
                'ds_objeto_descarte' => 'Placa Mãe, Gabinete, Memória',
                'cd_categoria_objeto' => 3
            ],
            [
                'nm_objeto_descarte' => 'Monitores',
                'ds_objeto_descarte' => 'Tela de LED, LCD, Plasma',
                'cd_categoria_objeto' => 3
            ],
            [
                'nm_objeto_descarte' => 'Câmeras Fotográicas',
                'ds_objeto_descarte' => 'Câmeras de Profissionais, Câmeras Digitais e Lentes',
                'cd_categoria_objeto' => 3
            ]
        ];

        \DB::table('objeto_descarte')->insert($objetos);
    }
}
