<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >

    <!--Fuente navbar y Banner-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/675ea53539.js" crossorigin="anonymous"></script>


    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.js"
            integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
            crossorigin="anonymous"></script>

    <!--Archivos js-->
    <script src="{{url(asset('assets/js/editar_review.js'))}}"></script>

    <title>DRHBooks</title>
</head>
<body>

    <div class="contenedorGlobal">
        <div class="contenedorContenido">
            @include('partials.navbar')

            <div class="container contenido">
                @yield('contenido')
            </div>
        </div>
        <!--Footer-->
        <footer class="bg-dark text-white mt-5 p-3 text-center footer">
            <p class="mb-0">Proyecto creado por Daniel Ruiz Hidalgo con propósitos meramente académicos</p>
        </footer>
    </div>

    <!--JQuery y Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>