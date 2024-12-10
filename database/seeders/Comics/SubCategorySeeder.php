<?php

namespace Database\Seeders\Comics;

use App\Models\Comics\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Primero
        $subCategory = new SubCategory();
        $subCategory->name = 'Superhéroes';
        $subCategory->description = 'Historias centradas en personajes con habilidades extraordinarias que luchan por la justicia.';
        $subCategory->color = '#ff0000';
        $subCategory->category_id  = 1;
        $subCategory->save();

        //Segundo
        $subCategory = new SubCategory();
        $subCategory->name = 'Ciencia Ficción';
        $subCategory->description = 'Cómics que exploran futuros distópicos, tecnología avanzada y mundos alienígenas.';
        $subCategory->color = '#9e9e9e';
        $subCategory->category_id  = 1;
        $subCategory->save();

        //Tercero
        $subCategory = new SubCategory();
        $subCategory->name = 'Terror';
        $subCategory->description = 'Cómics que exploran lo macabro y lo sobrenatural, creando atmósferas de miedo y suspenso.';
        $subCategory->color = '#0000';
        $subCategory->category_id  = 1;
        $subCategory->save();

        //Cuarto
        $subCategory = new SubCategory();
        $subCategory->name = 'Fantástico';
        $subCategory->description = 'Historias que mezclan la realidad con elementos mágicos o mitológicos.';
        $subCategory->color = '#c800ff';
        $subCategory->category_id  = 1;
        $subCategory->save();

        //Quinto
        $subCategory = new SubCategory();
        $subCategory->name = 'Shonen';
        $subCategory->description = 'Manga dirigido a un público joven masculino, con énfasis en la acción y el crecimiento del personaje.  ';
        $subCategory->color = '#00bfff';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Sexto
        $subCategory = new SubCategory();
        $subCategory->name = 'Shojo';
        $subCategory->description = 'Manga dirigido a un público joven femenino, centrado en el romance y las relaciones interpersonales.';
        $subCategory->color = '#ff00c8';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Septimo
        $subCategory = new SubCategory();
        $subCategory->name = 'Seinen';
        $subCategory->description = 'Manga dirigido a un público adulto masculino, con tramas más maduras y complejas.';
        $subCategory->color = '#9e9e9e';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Octavo
        $subCategory = new SubCategory();
        $subCategory->name = 'Josei';
        $subCategory->description = 'Manga dirigido a un público adulto femenino, enfocado en relaciones y experiencias de vida más realistas.';
        $subCategory->color = '#f05cdc';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Noveno
        $subCategory = new SubCategory();
        $subCategory->name = 'Mecha';
        $subCategory->description = 'Manga que gira en torno a robots gigantes y batallas tecnológicas.';
        $subCategory->color = '#2e9900';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Decimo
        $subCategory = new SubCategory();
        $subCategory->name = 'Isekai';
        $subCategory->description = 'Manga que trata sobre personajes que son transportados a mundos paralelos o fantásticos.';
        $subCategory->color = '#ffea00';
        $subCategory->category_id  = 2;
        $subCategory->save();

        //Decimo Primero
        $subCategory = new SubCategory();
        $subCategory->name = 'Autobiográficas';
        $subCategory->description = 'Narraciones visuales que cuentan historias personales y experiencias de vida del autor.';
        $subCategory->color = '#de8c3f';
        $subCategory->category_id  = 3;
        $subCategory->save();

        //Decimo Segundo
        $subCategory = new SubCategory();
        $subCategory->name = 'Históricas';
        $subCategory->description = 'Novelas gráficas que relatan eventos históricos con fidelidad y detalle.';
        $subCategory->color = '#ffefe0';
        $subCategory->category_id  = 3;
        $subCategory->save();

        //Decimo Tercero
        $subCategory = new SubCategory();
        $subCategory->name = 'Ficción';
        $subCategory->description = 'Historias imaginarias con tramas complejas, a menudo explorando temas filosóficos y sociales.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 3;
        $subCategory->save();

        //Decimo Cuarto
        $subCategory = new SubCategory();
        $subCategory->name = 'Fantasía Urbana';
        $subCategory->description = 'Cómics que mezclan lo mágico con entornos urbanos y contemporáneos.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 4;
        $subCategory->save();

        //Decimo Quinto
        $subCategory = new SubCategory();
        $subCategory->name = 'Drama';
        $subCategory->description = 'Cómics que exploran las relaciones humanas y conflictos emocionales de manera profunda.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 4;
        $subCategory->save();

        //Decimo Sexto
        $subCategory = new SubCategory();
        $subCategory->name = 'Aventuras';
        $subCategory->description = 'Historias centradas en viajes y exploraciones, con un enfoque en la acción y el descubrimiento.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 4;
        $subCategory->save();

        //Decimo Septimo
        $subCategory = new SubCategory();
        $subCategory->name = 'Fantasía';
        $subCategory->description = 'Webcomics que mezclan elementos mágicos con mundos imaginarios, disponibles en línea.';
        $subCategory->color = '#29ff69';
        $subCategory->category_id  = 5;
        $subCategory->save();

        //Decimo Octavo
        $subCategory = new SubCategory();
        $subCategory->name = 'Ciencia Ficción';
        $subCategory->description = 'Webcomics digitales que exploran futuros alternativos y tecnología avanzada.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 5;
        $subCategory->save();

        //Decimo Noveno
        $subCategory = new SubCategory();
        $subCategory->name = 'Comedia';
        $subCategory->description = 'Webcomics ligeros y humorísticos que ofrecen entretenimiento rápido y accesible.';
        $subCategory->color = '#0b009e';
        $subCategory->category_id  = 5;
        $subCategory->save();

    }
}
