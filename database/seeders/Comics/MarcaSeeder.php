<?php

namespace Database\Seeders\Comics;

use App\Models\Comics\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Marca = new Marca();
        $Marca->name = 'MARVEL COMICS';
        $Marca->description = 'Conocida por sus icónicos superhéroes como Spider-Man, los X-Men y los Vengadores.';
        $Marca->color = '#c20000';
        // $Marca->path = 'images/Marvel.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'DC COMICS';
        $Marca->description = 'Famosa por personajes emblemáticos como Batman, Superman y Wonder Woman.';
        $Marca->color = '#0017c2';
        // $Marca->path = 'images/DC Comics.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'IMAGE COMICS';
        $Marca->description = 'Editorial independiente que ofrece cómics innovadores como "The Walking Dead" y "Spawn".';
        $Marca->color = '#0000';
        // $Marca->path = 'images/Image Comics.jpg';
        $Marca->save();
        
        $Marca = new Marca();
        $Marca->name = 'DARK HORSE COMICS';
        $Marca->description = 'Publica títulos de fantasía y ciencia ficción como "Hellboy" y "Sin City".';
        $Marca->color = '#6a6a6c';
        // $Marca->path = 'images/DARK HORSE COMIC.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'VIZ MEDIA';
        $Marca->description = 'Principal distribuidor de manga japonés en Estados Unidos, incluyendo "Naruto" y "One Piece".';
        $Marca->color = '#ff8000';
        // $Marca->path = 'images/VIZ MEDIA.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'KODANSHA';
        $Marca->description = 'Editorial japonesa que publica mangas populares como "Attack on Titan" y "Fairy Tail".';
        $Marca->color = '#16ff05';
        // $Marca->path= 'images/kodansha.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'SHUEISHA';
        $Marca->description = 'Conocida por su revista "Shonen Jump", que incluye series como "Dragon Ball" y "One Piece".';
        $Marca->color = '#ffea05';
        // $Marca->path= 'images/SHUEISHA.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'TOKIOPOP';
        $Marca->description = 'Publica manga traducido al inglés, incluyendo títulos como "Fruits Basket" y "Sailor Moon".';
        $Marca->color = '#d116d4';
        // $Marca->path= 'images/Tokyopop.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'YEN PRESS';
        $Marca->description = 'Especializada en manga y novelas ligeras, incluyendo series como "Sword Art Online" y "Black Butler".';
        $Marca->color = '#a3a3a3';
        // $Marca->path= 'images/yen press.jpg';
        $Marca->save();

        $Marca = new Marca();
        $Marca->name = 'PANINI MANGA';
        $Marca->description = 'Editorial que distribuye mangas y cómics en varios países de habla hispana.';
        $Marca->color = '#ff0000';
        // $Marca->path= 'images/panini Manga.jpg';
        $Marca->save();
    }
}
