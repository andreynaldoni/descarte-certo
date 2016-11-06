<?php

use Illuminate\Database\Seeder;

class ConteudoObjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conteudos = [
            [
                'nm_conteudo_objeto' => 'Lixo Eletrônico',
                'ds_conteudo_objeto' => 'Este descarte é feito quando o equipamento apresenta defeito ou se torna obsoleto (ultrapassado). O problema ocorre quando este material é descartado no meio ambiente. Como estes equipamentos possuem substâncias químicas (chumbo, cádmio, mercúrio, berílio, etc.) em suas composições, podem provocar contaminação de solo e água.

Além do contaminar o meio ambiente, estas substâncias químicas podem provocar doenças graves em pessoas que coletam produtos em lixões, terrenos baldios ou na rua.

Estes equipamentos são compostos também por grande quantidade de plástico, metais e vidro. Estes materiais demoram muito tempo para se decompor no solo.',
                'ds_caminho_imagem' => 'http://reciclanordeste.com.br/wp-content/uploads/2014/04/Lixo-Eletronico-Brasil.jpg',
                'ds_caminho_video' => 'https://www.youtube.com/embed/VB9OgYxDm7M',
                'ic_tipo' => 'Reciclagem',
                'cd_objeto_descarte' => 1
            ],
            [
                'nm_conteudo_objeto' => 'Descarte de Computadores',
                'ds_conteudo_objeto' => 'Como descartar celulares, tablets, notebooks, baterias e outros gadgets?

Segundo um relatório do Programa das Nações Unidas para o Meio Ambiente (Pnuma) divulgado em 2010, o Brasil é o país emergente que mais produz lixo eletrônico per capita a cada ano (cerca de meio quilo). 

Infelizmente, uma parte desse lixo é descartada incorretamente ou mantida praticamente como peça de museu de eletrônicos nas casas dos amantes de tecnologia. O que muita gente não sabe, no entanto, é que existem lugares para encaminhar seus antigos aparelhos ao descartá-los. 

A criação desses locais de descarte foi uma das determinações incluídas na Política Nacional de Resíduos Sólidos, em vigor desde o fim de 2010 e que tenta corrigir diversos problemas relacionados ao lixo. A nova lei institui que os fabricantes, comerciantes, importadoras e distribuidoras de produtos eletroeletrônicos devem criar sistemas de logística reversa para garantir o despejo correto do lixo. 

Portanto, você pode devolver seus antigos gadgets às lojas onde comprou ou as suas respectivas fabricantes.

Se tratado incorretamente, o aparelho eletrônico pode trazer diversos danos à natureza. Esse tipo de produto tem em sua composição substâncias tóxicas como mercúrio, chumbo, cádmio, berílio e arsênio. 

Também são utilizados compostos químicos retardantes de chamas e PVC, cuja decomposição pode levar séculos para ocorrer naturalmente. A exposição direta ou indireta a esses elementos pode causar distúrbios no sistema nervoso, problemas renais e pulmonares, além de câncer e outras doenças.

Para combater esse perigo à saúde e ao meio ambiente, consulte a lista abaixo e saiba como entrar em contato com algumas marcas, órgãos públicos ou ONGs e entregar seus antigos gadgets para reciclagem. 

Motorola
O projeto ECOMOTO coleta telefones celulares, rádios de comunicação, baterias e acessórios. Os recipientes podem ser encontrados nesses endereços.

LG
Através da ação Coleta Inteligente, a empresa encaminha computadores, mini-systems, geladeiras, baterias e outros tipos de eletrodomésticos descartados de qualquer marca para empresas especializadas em reciclagem. Consulte os postos de coleta nesse link.

Apple
A fabricante do iPhone e do iPad recicla seus produtos no Brasil. Para se informar melhor sobre isso, ligue para 0800 772 3126 ou envie um e-mail para applecs@oxil.com.br .

Nokia
O programa de reciclagem da companhia recolhe aparelhos antigos da Nokia e seus acessórios em pontos de coleta, de assistência técnica autorizada ou pelos Correios. Os produtos também podem ser entregues em lojas do Grupo Pão de Açúcar através do programa Alô, Recicle.

Sony
A empresa recolhe pilhas e baterias descartadas em postos de serviço autorizado ou nas lojas Sony Store. Mais informações nos telefones 4003 7669 (capitais e regiões metropolitanas) ou 0800 880 7669 (demais localidades).',
                'ds_caminho_imagem' => 'http://www.usp.br/agen/wp-content/uploads/cedir2.jpg',
                'ds_caminho_video' => 'https://www.youtube.com/embed/Z8NbpqRraao',
                'ic_tipo' => 'Reciclagem',
                'cd_objeto_descarte' => 1
            ],
        ];

        \DB::table('conteudo_objeto')->insert($conteudos);
    }
}
