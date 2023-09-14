<?PHP
// Incluye catalogo de productos
require_once 'includes/catalogo.php';

// Verifica si el parámetro 'ep' está presente en la URL. Si está asigna su valor a la variable $epocaSeleccionada, de lo contrario, establece $epocaSeleccionada en FALSE.
$epocaSeleccionada = isset($_GET['ep']) ? $_GET['ep'] : FALSE;

// Formatea los titulos con mayusculas y espacios.
$titulo = ucwords(str_replace("-", " ", $epocaSeleccionada), " \t\r\n\f\v-");

// Llama a la función catalogo_x_epoca() y pasa la variable $epocaSeleccionada como argumento.
$catalogo = catalogo_x_epoca($epocaSeleccionada);

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Nuestro catálogo de <span class="text-danger"><?= $titulo ?></span>

        </h1>
        <div class="container">

            <!-- Si el catálogo no esta vacío...-->
            <?PHP if (!empty($catalogo)) { ?>
                <div class="row">
                    <!-- Recorro catálogo y alojo en variable $disco -->
                    <?PHP foreach ($catalogo as $disco) { ?>

                        <div class="col-12 col-md-4">
                            <div class="card mb-3">
                                <img src="img/covers/<?= $disco['portada'] ?>" class="card-img-top" alt="Portada de <?= $disco['disco'] ?>">
                                <div class="card-body">
                                    <p class="fs-6 m-0 fw-bold text-danger"><?= $disco['genero'] ?></p>
                                    <h2 class="card-title fs-4"><?= $disco['disco'] ?></h2>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Artista:</span> <?= $disco['artista'] ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Sello:</span> <?= $disco['sello'] ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $disco['publicacion'] ?></li>
                                </ul>
                                <div class="card-body">
                                    <!-- formatear precios -->
                                    <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= number_format($disco['precio'], 2, ",", ".") ?></div>
                                    <!-- link a pagina de producto -->
                                    <a href="index.php?sec=producto&id=<?= $disco['id']?>" class="btn btn-danger w-100 fw-bold">VER MÁS</a>
                                </div>

                            </div>
                        </div>

                    <?PHP } ?>

                </div>
            <!-- Si el catalogo está vacio -->
            <?PHP } else { ?>
                <div class="row">
                    <div class="col-12 text-danger text-center h1"> NO SE ENCONTRARON PRODUCTOS DE ESA EPOCA</div>
                </div>
            <?PHP }  ?>
        </div>

    </div>
</div>