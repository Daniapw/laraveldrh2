<?php

use App\Book;
use App\Genre;
use App\Review;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    //Array para la tabla genres
    private $arrayGeneros=
        [
            [
                "id"=>1,
                "name"=>'Fantasía',
                "icon"=>"fab fa-d-and-d"
            ],
            [
                "id"=>2,
                "name"=>'Ciencia Ficción',
                "icon"=>"fas fa-user-astronaut"
            ],
            [
                "id"=>3,
                "name"=>'Misterio',
                "icon"=>'fas fa-user-secret'
            ],
            [
                "id"=>4,
                "name"=>'Romance',
                "icon"=>'fas fa-heart'
            ],
            [
                "id"=>5,
                "name"=>'Auto-ayuda',
                "icon"=>'fas fa-seedling'
            ],
            [
                "id"=>6,
                "name"=>'Terror',
                "icon"=>'fas fa-ghost'
            ],
            [
                "id"=>7,
                "name"=>'Humor',
                "icon"=>'fas fa-laugh-squint'
            ],
            [
                "id"=>8,
                "name"=>'Infantil',
                "icon"=>'fas fa-shapes'
            ],
            [
                "id"=>9,
                "name"=>'Filosofía',
                "icon"=>'fas fa-feather-alt'
            ],
            [
                "id"=>10,
                "name"=>'Biografía',
                "icon"=>'fas fa-address-book'
            ],
        ];

    //Array para la tabla books
    private $arrayLibros=
        [
            [
                "id"=>1,
                "title"=>"ESDLA: La Comunidad del Anillo",
                "author"=>"JRR Tolkien",
                "genre_id"=>1,
                "synopsis"=>"Cuando el señor Bilbo Bolsón de Bolsón Cerrado anunció que muy pronto celebraría su cumpleaños centesimodecimoprimero con una fiesta de especial magnificencia, hubo muchos comentarios y excitación en Hobbiton. Bilbo era muy rico y muy peculiar, y había sido el asombro de la Comarca durante sesenta años, desde su memorables desaparición e inesperado regreso. Las riquezas que había traído de aquellos viajes se habían convertido en leyenda local, y era creeencia común, contra todo lo que pudieran decir los viejos, que en la Colina de Bolsón Cerrado había muchos túneles atiborrados de tesoros. Primera parte de la inmortal obra de J. R. R. Tolkien, El señor de los anillos.",
                "expanded_info"=>"AAAAAAAAAAAAAAAA",
                "publication_date"=>"1954-07-29",
                "cover_img_file"=>"esdla1.jpg"
            ],
            [
                "id"=>2,
                "title"=>"ESDLA: Las Dos Torres",
                "author"=>"JRR Tolkien",
                "genre_id"=>1,
                "synopsis"=>"La Compañía se ha disuelto y sus integrantes emprenden caminos separados. Frodo y Sam continúan solos su viaje a lo largo del río Anduin, perseguidos por la sombra misteriosa de un ser extraño que también ambiciona la posesión del Anillo. Mientras, hombres, elfos y enanos se preparan para la batalla final contra las fuerzas del Señor del Mal.",
                "expanded_info"=>"BBBBBBBBBB",
                "publication_date"=>"1954-11-29",
                "cover_img_file"=>"esdla2.jpg"
            ],
            [
                "id"=>3,
                "title"=>"ESDLA: El Retorno del Rey",
                "author"=>"JRR Tolkien",
                "genre_id"=>1,
                "synopsis"=>"Los ejércitos del Señor Oscuro van extendiendo cada vez más su maléfica sombra por la Tierra Media. Hombres, elfos y enanos unen sus fuerzas para presentar batalla a Sauron y sus huestes. Ajenos a estos preparativos, Frodo y Sam siguen adentrándose en el país de Mordor en su heroico viaje para destruir el Anillo de Poder en las Grietas del Destino.",
                "expanded_info"=>"CCCCCCCCCCC",
                "publication_date"=>"1955-10-20",
                "cover_img_file"=>"esdla3.jpg"
            ]
        ];

    //Array para la tabla users_favorites
    private $arrayFavorites=
        [
            [
                "id"=>1,
                "user_id"=>1,
                "book_id"=>1
            ],
            [
                "id"=>2,
                "user_id"=>1,
                "book_id"=>2
            ],
            [
                "id"=>3,
                "user_id"=>1,
                "book_id"=>3
            ],
            [
                "id"=>4,
                "user_id"=>2,
                "book_id"=>3
            ]
        ];

    //Array para la tabla reviews
    private $arrayReviews=
        [
            [
                "id"=>1,
                "user_id"=>1,
                "book_id"=>1,
                "content"=>"Uno de mis libros favoritos, me encanta la parte en la que van a las Minas de Moria",
                "score"=>5
            ],
            [
                "id"=>2,
                "user_id"=>1,
                "book_id"=>2,
                "content"=>"Espera mi llegada con la primera luz del quinto dia, al alba, mira al este.",
                "score"=>5
            ],
            [
                "id"=>3,
                "user_id"=>1,
                "book_id"=>3,
                "content"=> "¡Hijos de Gondor y de Rohan! ¡Mis hermanos! Veo en vuestros ojos el mismo miedo que encogería mi propio corazón. Pudiera llegar el día en que el valor de los hombres decayera, en que olvidáramos a nuestros compañeros y se rompieran los lazos de nuestra comunidad; ¡pero hoy no es ese día! En que una horda de lobos y escudos rotos rubricaran la consumación de la edad de los hombres; ¡pero hoy no es ese día! ¡¡En este día lucharemos!!, por todo aquello que vuestro corazón ama de esta buena tierra. ¡Os llamo a luchar, Hombres del Oeste!",
                "score"=>5
            ]
        ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->seedUsers();
        $this->seedGenres();
        $this->seedBooks();
        $this->seedUsersFavorites();
        $this->seedReviews();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    //Metodo para meter usuarios en BD
    private function seedUsers(){
        //Borrar contenidos de la BD
        DB::table('users')->delete();

        $user1=new User();
        $user1->id=1;
        $user1->username="Daniel";
        $user1->email="daniruiz51@gmail.com";
        $user1->country="España";
        $user1->sex="Hombre";
        $user1->date_of_birth="1996-08-29";
        $user1->role="admin";
        $user1->password=bcrypt("dani");
        $user1->save();

        $user2=new User();
        $user2->id=2;
        $user2->username="Rafaela";
        $user2->email="rafihidalgo@gmail.com";
        $user2->country="España";
        $user2->sex="Mujer";
        $user2->date_of_birth="1960-11-10";
        $user2->role="user";
        $user2->password=bcrypt("rafi");
        $user2->save();

        $user2=new User();
        $user2->id=3;
        $user2->username="Rafael";
        $user2->email="rafaruiz@gmail.com";
        $user2->country="España";
        $user2->sex="Mujer";
        $user2->date_of_birth="1960-11-23";
        $user2->role="user";
        $user2->password=bcrypt("rafa");
        $user2->save();
    }

    /**
     * Seedear generos
     */
    private function seedGenres(){
        DB::table('genres')->delete();

        foreach($this->arrayGeneros as $genero){
            $g=new Genre();
            $g->id=$genero['id'];
            $g->name=$genero['name'];
            $g->icon=$genero['icon'];
            $g->save();
        }
    }

    /**
     * Seedear libros
     */
    private function seedBooks(){

        foreach($this->arrayLibros as $libro){
            $b=new Book();
            $b->id=$libro['id'];
            $b->title=$libro['title'];
            $b->author=$libro['author'];
            $b->genre_id=$libro['genre_id'];
            $b->synopsis=$libro['synopsis'];
            $b->expanded_info=$libro['expanded_info'];
            $b->publication_date=$libro['publication_date'];
            $b->save();
        }
    }

    /**
     * Seedear favoritos
     */
    private function seedUsersFavorites(){
        foreach($this->arrayFavorites as $favorito){
            DB::table('users_favorites')->insert(
                ['id' => $favorito['id'], 'user_id' => $favorito['user_id'], 'book_id'=>$favorito['book_id']]
            );
        }
    }

    /**
     * Seedear reviews
     */
    private function seedReviews(){
        foreach($this->arrayReviews as $review){
            $r=new Review();
            $r->id=$review['id'];
            $r->user_id=$review['user_id'];
            $r->book_id=$review['book_id'];
            $r->content=$review['content'];
            $r->score=$review['score'];
            $r->save();
        }
    }

}
