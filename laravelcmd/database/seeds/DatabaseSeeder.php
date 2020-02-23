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
                "synopsis"=>"En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor, perseguido siempre por las huestes de Sauron, el Señor Oscuro, dispuesto a recuperar su creación para establecer el dominio definitivo del Mal.",
                "expanded_info"=>"«La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas… una coherente mitología de una autenticidad universal creada en pleno siglo XX», Le Monde",
                "publication_date"=>"1954-07-29",
                "cover_img_file"=>"esdla1.jpg"
            ],
            [
                "id"=>2,
                "title"=>"ESDLA: Las Dos Torres",
                "author"=>"JRR Tolkien",
                "genre_id"=>1,
                "synopsis"=>"La Compañía se ha disuelto y sus integrantes emprenden caminos separados. Frodo y Sam continúan solos su viaje a lo largo del río Anduin, perseguidos por la sombra misteriosa de un ser extraño que también ambiciona la posesión del Anillo. Mientras, hombres, elfos y enanos se preparan para la batalla final contra las fuerzas del Señor del Mal.",
                "expanded_info"=>"La segunda parte de la trilogía de Tolkien",
                "publication_date"=>"1954-11-29",
                "cover_img_file"=>"esdla2.jpg"
            ],
            [
                "id"=>3,
                "title"=>"ESDLA: El Retorno del Rey",
                "author"=>"JRR Tolkien",
                "genre_id"=>1,
                "synopsis"=>"Los ejércitos del Señor Oscuro van extendiendo cada vez más su maléfica sombra por la Tierra Media. Hombres, elfos y enanos unen sus fuerzas para presentar batalla a Sauron y sus huestes. Ajenos a estos preparativos, Frodo y Sam siguen adentrándose en el país de Mordor en su heroico viaje para destruir el Anillo de Poder en las Grietas del Destino.",
                "expanded_info"=>"El épico final de la trilogía fantástica por excelencia.",
                "publication_date"=>"1955-10-20",
                "cover_img_file"=>"esdla3.jpg"
            ],
            [
                "id"=>4,
                "title"=>"Dune",
                "author"=>"Frank Herbert",
                "genre_id"=>2,
                "synopsis"=>"Arrakis: un planeta desértico donde el agua es el bien más preciado, donde llorar a los muertos es el símbolo de máxima prodigalidad. Paul Atreides: un adolescente marcado por un destino singular, dotado de extraños poderes, abocado a convertirse en dictador, mesías y mártir. Los Harkonnen: personificación de las intrigas que rodean el Imperio Galáctico, buscan obtener el control sobre Arrakis para disponer de la melange, preciosa especia y uno de los bienes más codiciados del universo.",
                "expanded_info"=>"Los Fremen: seres libres que han convertido el inhóspito paraje de Dune en su hogar, y que se sienten orgullosos de su pasado y temerosos de su futuro. Dune: una obra maestra unánimemente reconocida como la mejor saga de ciencia ficción de todos los tiempos..",
                "publication_date"=>"1965-08-01",
                "cover_img_file"=>"dune.jpg"
            ],
            [
                "id"=>5,
                "title"=>"Asesinato en el Orient Express",
                "author"=>"Agatha Christie",
                "genre_id"=>3,
                "synopsis"=>"En un lugar aislado de la antigua Yugoslavia, en plena madrugada, una fuerte tormenta de nieve obstaculiza la línea férrea por donde circula el Orient Express. Procedente de la exótica Estambul, en él viaja el detective Hércules Poirot, que repentinamente se topa con uno de los casos más desconcertantes de su carrera: en el compartimiento vecino ha sido asesinado Samuel E. Ratchett mientras dormía, pese a que ningún indicio trasluce un móvil concreto. Poirot aprovechará la situación para indagar entre los ocupantes del vagón, que a todas luces deberían ser los únicos posibles autores del crimen.",
                "expanded_info"=>"Una víctima, doce sospechosos y una mente privilegiada en busca de la verdad: Agatha Christie construye con esta Novela una intrigante historia de suspense que desencadena en una resolución magistral.",
                "publication_date"=>"1934-01-01",
                "cover_img_file"=>"orient-express.jpg"
            ],
            [
                "id"=>6,
                "title"=>"Confesiones de un incrédulo y otros ensayos escogidos",
                "author"=>"H.P. Lovecraft",
                "genre_id"=>10,
                "synopsis"=>"Se ofrece aquí una selección de artículos y ensayos de H. P. Lovecraft sobre filosofía, ciencia, política y literatura. Aparecidos en periódicos, revistas amateury cartas, e inéditos en nuestro idioma, nos presentan una faceta totalmente desconocida ―y acaso silenciada― de este influyente genio del imaginario literario del terror y la fantasía.",
                "expanded_info"=>"Un Lovecraft polémico, provocador, y a veces desmesurado, defensor de los principios de una clase media norteamericana en franca zozobra durante los años treinta; pero, sobre todo, hondamente preocupado por la crisis civilizatoria del mundo moderno y el papel de la ciencia y la cultura en el futuro. Titula este volumen el ensayo autobiográfico «Confesiones de un incrédulo», que describe su apartamiento de la religión.",
                "publication_date"=>"2018-03-14",
                "cover_img_file"=>"confesiones.jpg"
            ],
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
            ],
            [
                "id"=>2,
                "user_id"=>1,
                "book_id"=>2,
                "content"=>"Increíble la parte del Abismo de Helm, mi momento favorito de la trilogía.",
            ],
            [
                "id"=>3,
                "user_id"=>1,
                "book_id"=>3,
                "content"=> "Un final perfecto para una trilogía perfecta",
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
        $user1->postal_code="14900";
        $user1->phone_number="123123123";
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
        $user2->postal_code="14900";
        $user2->phone_number="321321321";
        $user2->password=bcrypt("rafi");
        $user2->save();

        $user3=new User();
        $user3->id=3;
        $user3->username="Rafael";
        $user3->email="rafaruiz@gmail.com";
        $user3->country="España";
        $user3->sex="Mujer";
        $user3->date_of_birth="1960-11-23";
        $user3->role="user";
        $user3->postal_code="14900";
        $user3->phone_number="222222222";
        $user3->password=bcrypt("rafa");
        $user3->save();
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
        //Borrar contenidos de la tabla
        DB::table('books')->delete();


        foreach($this->arrayLibros as $libro){
            $b=new Book();
            $b->id=$libro['id'];
            $b->title=$libro['title'];
            $b->author=$libro['author'];
            $b->genre_id=$libro['genre_id'];
            $b->synopsis=$libro['synopsis'];
            $b->expanded_info=$libro['expanded_info'];
            $b->publication_date=$libro['publication_date'];
            $b->cover_img_file=$libro['cover_img_file'];
            $b->save();
        }
    }

    /**
     * Seedear favoritos
     */
    private function seedUsersFavorites(){
        //Borrar contenidos de la tabla
        DB::table('users_favorites')->delete();

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
        //Borrar contenidos de la tabla
        DB::table('reviews')->delete();

        foreach($this->arrayReviews as $review){
            $r=new Review();
            $r->id=$review['id'];
            $r->user_id=$review['user_id'];
            $r->book_id=$review['book_id'];
            $r->content=$review['content'];
            $r->save();
        }
    }

}
