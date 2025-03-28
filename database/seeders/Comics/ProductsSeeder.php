<?php

namespace Database\Seeders\Comics;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('products')->insert([
            [ //Spider-Man: Into the Spider-Verse
                'name' => 'Spider-Man: Into the Spider-Verse',
                'description' => 'Una emocionante aventura de Spider-Man en diferentes dimensiones.',
                'price' => 20,
                'category_id' => 1, // Reemplaza con el ID real de la categoría correspondiente
                'subcategory_id' => 1, // Reemplaza con el ID real de la subcategoría correspondiente
                'marca_id' => 1, // ID de MARVEL COMICS
                'path' => 'img/comic/products/Spider-Man Into the Spider-Verse.jpg', // Ruta de la imagen
                'stock' => 10,
            ],
            [
                'name' => 'Batman: Year One',
                'description' => 'La historia de los primeros días de Bruce Wayne como Batman y su lucha contra el crimen.',
                'price' => 25,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 2,
                'path' => 'img/comic/products/Batman Year One.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Saga, Vol. 1',
                'description' => 'Una épica historia que mezcla fantasía y ciencia ficción, centrada en una pareja de razas opuestas.',
                'price' => 10,
                'category_id' => 4,
                'subcategory_id' => 2,
                'marca_id' => 3, 
                'path' => 'img/comic/products/Saga, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Hellboy: Seed of Destruction',
                'description' => 'La primera aparición de Hellboy, un demonio que lucha contra las fuerzas oscuras.',
                'price' => 19,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 3, 
                'path' => 'img/comic/products/Hellboy Seed of Destruction.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'My Hero Academia, Vol. 1',
                'description' => 'Un joven sin superpoderes sueña con convertirse en un gran héroe.',
                'price' => 10,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 5,
                'path' => 'img/comic/products/My Hero Academia, Vol. 1.jpg', 
                'stock' => 10,
            ],
            [
                'name' => 'Attack on Titan, Vol. 1',
                'description' => 'En un mundo donde la humanidad lucha contra gigantes devoradores de hombres.',
                'price' => 11.99,
                'category_id' => 2,
                'subcategory_id' => 7,
                'marca_id' => 6,
                'path' => 'img/comic/products/Attack on Titan, Vol. 1.jpg', 
                'stock' => 10,
            ],
            [
                'name' => 'One Piece, Vol. 1',
                'description' => 'Las aventuras del joven pirata Monkey D. Luffy en su búsqueda del tesoro legendario.',
                'price' => 7.99,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 7, 
                'path' => 'img/comic/products/One Piece, Vol. 1.jpg', 
                'stock' => 10,
            ],
            [
                'name' => 'Dragon Ball Z, Vol. 1',
                'description' => 'Las aventuras de Goku y sus amigos mientras luchan contra poderosos enemigos.',
                'price' => 15,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 10, 
                'path' => 'img/comic/products/Dragon Ball Z, Vol. 1.jpg',
                'stock' => 10, 
            ],
            [
                'name' => 'The Wicked + The Divine, Vol. 1',
                'description' => 'Doce dioses reencarnan como humanos y viven solo dos años en un mundo moderno.',
                'price' => 14.99,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 3,
                'path' => 'img/comic/products/The Wicked + The Divine, Vol. 1.jpg',
                'stock' => 10,  
            ],
            [
                'name' => 'X-Men: Days of Future Past',
                'description' => 'Un viaje en el tiempo para evitar un futuro distópico donde los mutantes son perseguidos.',
                'price' => 18.50,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 1, 
                'path' => 'img/comic/products/X-Men Days of Future Past.jpg',  
                'stock' => 10,
            ],
            [
                'name' => 'Wonder Woman: The Hiketeia',
                'description' => 'Una historia que une a Wonder Woman y Batman en un dilema moral.',
                'price' => 22.00,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 2, 
                'path' => 'img/comic/products/Wonder Woman The Hiketeia.jpg', 
                'stock' => 10, 
            ],
            [
                'name' => 'The Walking Dead, Vol. 1',
                'description' => 'Un grupo de sobrevivientes lucha por vivir en un mundo post-apocalíptico lleno de zombis.',
                'price' => 10.99,
                'category_id' => 4,
                'subcategory_id' => 3,
                'marca_id' => 3, 
                'path' => 'img/comic/products/The Walking Dead, Vol. 1.jpg',  
                'stock' => 10,
            ],
            [
                'name' => 'Buffy the Vampire Slayer: Omnibus, Vol. 1',
                'description' => 'La historia de Buffy Summers, una cazadora de vampiros en un mundo lleno de criaturas sobrenaturales.',
                'price' => 29.99,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 4, 
                'path' => 'img/comic/products/Buffy the Vampire Slayer Omnibus, Vol. 1.jpg',  
                'stock' => 10,
            ],
            [
                'name' => 'Fruits Basket, Vol. 1',
                'description' => 'La vida de Tohru Honda se entrelaza con la familia Sohma, quienes tienen un secreto mágico.',
                'price' => 11.99,
                'category_id' => 2,
                'subcategory_id' => 6,
                'marca_id' => 5, 
                'path' => 'img/comic/products/Fruits Basket, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Life in Another World, Vol. 1',
                'description' => 'Un joven es transportado a un mundo de fantasía donde puede retroceder en el tiempo al morir.',
                'price' => 14.99,
                'category_id' => 4,
                'subcategory_id' => 10,
                'marca_id' => 6, 
                'path' => 'img/comic/products/Life in Another World, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Naruto, Vol. 1',
                'description' => 'La historia del joven ninja Naruto Uzumaki en su búsqueda por convertirse en Hokage.',
                'price' => 9.99,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 7, 
                'path' => 'img/comic/products/Naruto, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Nana, Vol. 1',
                'description' => 'La historia de dos chicas llamadas Nana que se convierten en amigas en Tokio, enfrentando sus desafíos.',
                'price' => 15.50,
                'category_id' => 2,
                'subcategory_id' => 8,
                'marca_id' => 9, 
                'path' => 'img/comic/products/Nana, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Descender, Vol. 1',
                'description' => 'Un joven robot en un universo donde los androides son cazados, en su búsqueda de aceptación.',
                'price' => 12.99,
                'category_id' => 4,
                'subcategory_id' => 14,
                'marca_id' => 3, 
                'path' => 'img/comic/products/Descender, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Iron Man: Extremis',
                'description' => 'Tony Stark enfrenta una nueva amenaza mientras redefine lo que significa ser Iron Man.',
                'price' => 19.95,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 1, 
                'path' => 'img/comic/products/Iron Man Extremis.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Flashpoint',
                'description' => 'Barry Allen debe correr contra el tiempo para corregir una alteración en la línea temporal que ha cambiado todo.',
                'price' => 24.99,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 2, 
                'path' => 'img/comic/products/Flashpoint.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Hellboy: The Bones of Giants',
                'description' => 'Una nueva aventura de Hellboy enfrentándose a antiguos mitos y leyendas.',
                'price' => 28.00,
                'category_id' => 4,
                'subcategory_id' => 3,
                'marca_id' => 4, 
                'path' => 'img/comic/products/Hellboy The Bones of Giants.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Demon Slayer: Kimetsu no Yaiba, Vol. 1',
                'description' => 'La historia de Tanjiro, un joven cazador de demonios en busca de venganza.',
                'price' => 11.99,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 5,
                'path' => 'img/comic/products/Demon Slayer Kimetsu no Yaiba, Vol. 1.jpg', 
                'stock' => 10,
            ],
            [
                'name' => 'Guardians of the Galaxy, Vol. 1',
                'description' => 'Un grupo de inadaptados galácticos se une para proteger el universo de amenazas.',
                'price' => 19.95,
                'category_id' => 1,
                'subcategory_id' => 2,
                'marca_id' => 1, 
                'path' => 'img/comic/products/Guardians of the Galaxy, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Green Lantern: Rebirth',
                'description' => 'Hal Jordan regresa como Green Lantern, enfrentando su oscuro pasado y nuevas amenazas.',
                'price' => 23.99,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 2, 
                'path' => 'img/comic/products/Green Lantern Rebirth.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Monstress, Vol. 1',
                'description' => 'En un mundo de fantasía oscura, una joven busca venganza mientras lidia con un poder antiguo.',
                'price' => 14.99,
                'category_id' => 4,
                'subcategory_id' => 14,
                'marca_id' => 3, 
                'path' => 'img/comic/products/Monstress, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Death Note, Vol. 1',
                'description' => 'Un estudiante de secundaria encuentra un cuaderno que le permite matar a cualquier persona cuyo nombre escriba en él.',
                'price' => 12.99,
                'category_id' => 2,
                'subcategory_id' => 7,
                'marca_id' => 5, 
                'path' => 'img/comic/products/Death Note, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Ouran High School Host Club, Vol. 1',
                'description' => 'Una chica se disfraza de chico en un club de anfitriones de élite y crea divertidas situaciones.',
                'price' => 10.99,
                'category_id' => 2,
                'subcategory_id' => 6,
                'marca_id' => 6, 
                'path' => 'img/comic/products/Ouran High School Host Club, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'No Game No Life, Vol. 1',
                'description' => 'Dos hermanos son transportados a un mundo de juegos donde deben vencer a dioses y jugadores.',
                'price' => 13.50,
                'category_id' => 2,
                'subcategory_id' => 10,
                'marca_id' => 7, 
                'path' => 'img/comic/products/No Game No Life, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'My Lesbian Experience with Loneliness',
                'description' => 'Una autobiografía gráfica que explora la vida y la lucha de una mujer joven con su identidad sexual.',
                'price' => 17.99,
                'category_id' => 2,
                'subcategory_id' => 11,
                'marca_id' => 9, 
                'path' => 'img/comic/products/My Lesbian Experience with Loneliness.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Nana to Kaoru, Vol. 1',
                'description' => 'La historia de una amistad que se convierte en algo más a través de un mundo de BDSM.',
                'price' => 14.00,
                'category_id' => 2,
                'subcategory_id' => 8,
                'marca_id' => 10, 
                'path' => 'img/comic/products/Nana to Kaoru, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'The Umbrella Academy, Vol. 1',
                'description' => 'Un grupo de hermanos superhéroes se reúne tras la muerte de su padre adoptivo.',
                'price' => 24.99,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 4, 
                'path' => 'img/comic/products/The Umbrella Academy, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Fantastic Four: The Complete Collection, Vol. 1',
                'description' => 'Las aventuras iniciales del primer equipo de superhéroes de Marvel.',
                'price' => 34.99,
                'category_id' => 1,
                'subcategory_id' => 2,
                'marca_id' => 1, 
                'path' => 'img/comic/products/Fantastic Four The Complete Collection, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Sandman: Preludes & Nocturnes',
                'description' => 'La historia de Morfeo, el dios de los sueños, y su captura por un grupo ocultista.',
                'price' => 19.99,
                'category_id' => 1,
                'subcategory_id' => 2,
                'marca_id' => 2, 
                'path' => 'img/comic/products/Sandman Preludes & Nocturnes.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Descender, Vol. 2',
                'description' => 'La continuación de la historia de un joven robot en un mundo donde los androides son perseguidos.',
                'price' => 12.99,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 3, 
                'path' => 'img/comic/products/Descender, Vol. 2.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Tokyo Ghoul, Vol. 1',
                'description' => 'La secuela de Tokyo Ghoul, centrada en un nuevo grupo de cazadores de ghouls.',
                'price' => 14.99,
                'category_id' => 2,
                'subcategory_id' => 7,
                'marca_id' => 5, 
                'path' => 'img/comic/products/Tokyo Ghoul, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Fairy Tail, Vol. 1',
                'description' => 'La historia de un joven mago que se une a un gremio de magos y vive grandes aventuras.',
                'price' => 10.99,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 6, 
                'path' => 'img/comic/products/Fairy Tail, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => "Konosuba: God's Blessing on This Wonderful World!, Vol. 1",
                'description' => 'Un joven es transportado a un mundo de fantasía y forma un grupo de héroes peculiares.',
                'price' => 12.50,
                'category_id' => 2,
                'subcategory_id' => 5,
                'marca_id' => 7, 
                'path' => "img/comic/products/Konosuba God's Blessing on This Wonderful World!, Vol. 1.jpg",
                'stock' => 10,
            ],
            [
                'name' => 'Your Lie in April, Vol. 1',
                'description' => 'Un pianista talentoso se encuentra con una violinista que cambiará su vida para siempre.',
                'price' => 13.99,
                'category_id' => 2,
                'subcategory_id' => 15,
                'marca_id' => 9, 
                'path' => 'img/comic/products/Your Lie in April, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Skip Beat!, Vol. 1',
                'description' => 'Una chica busca venganza en el mundo del entretenimiento tras ser traicionada por su amigo.',
                'price' => 8.99,
                'category_id' => 2,
                'subcategory_id' => 6,
                'marca_id' => 10, 
                'path' => 'img/comic/products/Skip Beat!, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Thor: God of Thunder, Vol. 1',
                'description' => 'Thor enfrenta a un antiguo enemigo que ha amenazado a los dioses a lo largo de la historia.',
                'price' => 19.99,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 1, 
                'path' => 'img/comic/products/Thor God of Thunder, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Superman: Red Son',
                'description' => 'Un relato alternativo donde Superman aterriza en la Unión Soviética en lugar de Estados Unidos.',
                'price' => 22.99,
                'category_id' => 1,
                'subcategory_id' => 1,
                'marca_id' => 2, 
                'path' => 'img/comic/products/Superman Red Son.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'The Fade Out, Vol. 1',
                'description' => 'Un misterio de asesinato en el trasfondo de la industria cinematográfica de Hollywood en los años 40.',
                'price' => 16.99,
                'category_id' => 4,
                'subcategory_id' => 14,
                'marca_id' => 3, 
                'path' => 'img/comic/products/The Fade Out, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'The Goon, Vol. 1',
                'description' => 'Las aventuras de un matón que combate criaturas sobrenaturales en una ciudad llena de caos.',
                'price' => 19.95,
                'category_id' => 4,
                'subcategory_id' => 4,
                'marca_id' => 4, 
                'path' => 'img/comic/products/The Goon, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Boys Over Flowers, Vol. 1',
                'description' => 'Una chica común enfrenta a un grupo de chicos ricos en una prestigiosa escuela secundaria.',
                'price' => 9.99,
                'category_id' => 2,
                'subcategory_id' => 6,
                'marca_id' => 5, 
                'path' => 'img/comic/products/Boys Over Flowers, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'The Attack on Titan: Before the Fall, Vol. 1',
                'description' => ' La historia de la creación de la tecnología que combate a los titanes.',
                'price' => 14.99,
                'category_id' => 2,
                'subcategory_id' => 7,
                'marca_id' => 6, 
                'path' => 'img/comic/products/The Attack on Titan Before the Fall, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'That Time I Got Reincarnated as a Slime, Vol. 1',
                'description' => 'Un hombre es reencarnado como un slime en un mundo de fantasía lleno de aventuras.',
                'price' => 12.99,
                'category_id' => 2,
                'subcategory_id' => 10,
                'marca_id' => 7, 
                'path' => 'img/comic/products/That Time I Got Reincarnated as a Slime, Vol. 1.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Fun Home: A Family Tragicomic',
                'description' => 'Una novela gráfica autobiográfica sobre la vida de Alison Bechdel y su relación con su padre.',
                'price' => 17.99,
                'category_id' => 2,
                'subcategory_id' => 11,
                'marca_id' => 9, 
                'path' => 'img/comic/products/Fun Home A Family Tragicomic.jpg',
                'stock' => 10,
            ],
        ]);
    }
}
