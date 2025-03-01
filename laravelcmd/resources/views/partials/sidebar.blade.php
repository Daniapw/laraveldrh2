<div class="col-12 col-md-4 order-0 order-sm-2 mb-3 mb-md-0">
    <div class="container-elementos-sidebar borde sombra py-4 px-3">
        <p class="font-weight-bold">Buscar libros</p>

        <form action="{{url('/libros/buscar')}}" method="GET">
            {{csrf_field()}}
            <input type="text" name="buscar-libro" placeholder="Título del libro" class="form-control">
        </form>
    </div>

    <div class="container-elementos-sidebar borde sombra py-4 px-3 mt-3">
        <p class="font-weight-bold">¡Síguenos en las redes sociales!</p>
        <div class="row text-center">
            <div class="col-3">
                <a href="http://www.facebook.com"><i class="fab fa-facebook-square fa-3x" id="facebook"></i></a>
            </div>
            <div class="col-3">
                <a href="http://www.twitter.com"><i class="fab fa-twitter-square fa-3x" id="twitter"></i></a>
            </div>
            <div class="col-3">
                <a href="http://www.pinterest.com"><i class="fab fa-pinterest-square fa-3x" id="pinterest"></i></a>
            </div>
            <div class="col-3">
                <a href="http://www.youtube.com"><i class="fab fa-youtube-square fa-3x" id="youtube"></i></a>
            </div>
        </div>
    </div>
</div>
