<?php

namespace Database\Seeders\Comics;

use App\Models\Comics\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Category = new Category();
        $Category->name = 'COMICS AMERICANOS';
        $Category->description = 'Cómics producidos principalmente en Estados Unidos, conocidos por sus superhéroes y tramas de acción.';
        $Category->color = '#002eb8';
        $Category->save();

        //Segundo
        $Category = new Category();
        $Category->name = 'MANGA JAPONESES';
        $Category->description = 'Historietas originarias de Japón que abarcan una amplia variedad de géneros, desde acción hasta romance.';
        $Category->color = '#f5f5f5';
        $Category->save();

        //Tercero
        $Category = new Category();
        $Category->name = 'NOVELAS GRAFICAS';
        $Category->description = 'Obras narrativas que utilizan la combinación de imágenes y texto para contar historias más largas y complejas.';
        $Category->color = '#bfbfbf';
        $Category->save();

        //Cuarto
        $Category = new Category();
        $Category->name = 'COMICS INDEPENDIENTES';
        $Category->description = 'Cómics producidos fuera de las grandes editoriales, a menudo con estilos únicos y temáticas variadas.';
        $Category->color = '	#ff6600';
        $Category->save();

        //Quinto
        $Category = new Category();
        $Category->name = 'WEB COMICS';
        $Category->description = 'Cómics publicados digitalmente, con una gran diversidad de estilos y géneros, accesibles a través de internet.';
        $Category->color = '#2bff00';
        $Category->save();
    }
}
