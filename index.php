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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/disco-musica.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                RetroSound
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <!-- En las URL se estable el par sec=home para secciones / ep=los-80 para epocas-->
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=inicio">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=nosotros">NOSOTROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo">CATALOGO</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=discos&ep=los-80">Los 80'</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=discos&ep=los-90">Los 90'</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=discos&ep=los-2000">Los 2000</a>
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
    <footer class="bg-secondary text-light text-center p-2">
        RetroSound 2023
    </footer>

    <!-- boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>