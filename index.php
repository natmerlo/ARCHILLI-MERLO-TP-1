<?PHP
require_once 'classes/Disco.php';

// Array asociativo de secciones validas
$secciones_validas = [
    "inicio" => [
        "titulo" => "Bienvenidos"
    ], 
    "envios" => [
        "titulo" => "Políticas de envío"
    ],
    "nosotros" => [
        "titulo" => "Sobre nosotros"
    ],
    "discos" => [
        "titulo" => "Nuestro catálogo"
    ],
    "producto" => [
        "titulo" => "Detalle de producto"
    ],
    "catalogo" => [
        "titulo" => "Catalogo Completo"
    ]
];

// Verifica si el parámetro 'sec' está presente en la URL. Si está asigna su valor a la variable $seccion, de lo contrario, establece $seccion con el valor 'inicio'.
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'inicio';

// Verifica si la variable $seccion existe como una key en el array $secciones_validas.
if (!array_key_exists($seccion, $secciones_validas)) {
    // Si no existe
    $vista = "404";
    $titulo = "404: Página no encontrada";
} else {
    // Si existe
    $vista = $seccion;
    // Asigna a $titulo el valor de "titulo" dentro del array
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSound</title>

    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- estilos -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light px-5 py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/disco-musica.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> RetroSound
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?sec=inicio">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo">CATALOGO</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=nosotros">NOSOTROS</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        EPOCAS
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-80">Los 80'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-90">Los 90'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-2000">Los 2000</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=envios">ENVIOS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main -->
        <main class="container">
        <?PHP

        // Incluye el archivo de vista correspondiente al valor de la variable $vista.
        require_once "views/$vista.php";

        ?>
        </main>

    <!-- footer -->
    <!-- <footer class="bg-secondary text-light text-center p-2">
        
        

    </footer> -->

    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Archilli Matias</h5>

                <ul>
                    <li>
                        DNI: 42.536.278
                    </li>
                    <li>
                        Correo: matias.archilli@davinci.edu.ar
                    </li>
                    <li>
                        Edad: 23 años
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Natalia Merlo</h5>

                <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                aliquam voluptatem veniam, est atque cumque eum delectus sint!
                </p>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 footerDatos">
            <p>© 2023 - Programacion II - DWN3CV</p>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>