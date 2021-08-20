<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::insert([
            "category_id" => 1,
            "title" => "Hackers: Spywares e trojans | Nerdologia Tech",
            "description" => "No sexto episódio da série sobre Hackers do Nerdologia Tech de hoje, vamos falar sobre os programas maliciosos que vazam nossas informações, os spywares e trojans.",
            "url" => "https://www.youtube.com/watch?v=tCSxGaorGpU",
        ]);
        Video::insert([
            "category_id" => 2,
            "title" => "O que é GraphQL? com Juliana Amoasei | #HipstersPontoTube",
            "description" => "O que é GraphQL? Como ele funciona? Com alguns exemplos incríveis a Juliana Amoasei explicou como trabalhar com essa linguagem.",
            "url" => "https://www.youtube.com/watch?v=trf3ZR_K1nk",
        ]);
        Video::insert([
            "category_id" => 3,
            "title" => "5 dicas para ser um(a) dev melhor | Dias de Dev",
            "description" => "Ser dev não é fácil, mas neste vídeo eu trago 5 dicas para que nós possamos ser melhores na área de programação.",
            "url" => "https://www.youtube.com/watch?v=Ud-gDYdNb48",
        ]);
        Video::insert([
            "category_id" => 4,
            "title" => "Como personalizar o seu perfil no Github (Readme)",
            "description" => "No video de hoje eu mostro pra como eu personalizei o meu perfil no Github! Para isso, criamos um repositório com Readme.md e adicionamos todo o código.",
            "url" => "https://www.youtube.com/watch?v=TsaLQAetPLU&t=79s",
        ]);
    }
}
