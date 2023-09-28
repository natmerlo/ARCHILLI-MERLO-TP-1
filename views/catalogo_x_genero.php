<?PHP

// Verifica si el parámetro 'ep' está presente en la URL. Si está asigna su valor a la variable $epocaSeleccionada, de lo contrario, establece $epocaSeleccionada en FALSE.
// $generoSeleccionado = isset($_GET['gen']) ? $_GET['gen'] : FALSE;
$generoSeleccionado = $_GET['gen'] ?? FALSE;


// Formatea los titulos con mayusculas y espacios.
$titulo = ucwords(str_replace("-", " ", $generoSeleccionado), " \t\r\n\f\v-");

$objetoDisco = new Disco();

$catalogo = $objetoDisco->catalogo_por_genero($generoSeleccionado);

// echo "<pre>";
// print_r($generoSeleccionado);
// echo "</pre>";
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
                                <img src="img/covers/<?= $disco->getPortada() ?>" class="card-img-top" alt="Portada de <?= $disco->getDisco() ?>">
                                <div class="card-body">
                                    <h2 class="card-title fs-4"><?= $disco->getDisco() ?></h2>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Artista:</span> <?= $disco->getArtista() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Sello:</span> <?= $disco->getSello() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $disco->getPublicacion() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Generos</span></li>
                                    <li class="list-group-item">
                                        <ul class="list-group list-group-flush">
                                        <?PHP foreach ($disco->getGenero() as $genero) { ?>
                                            <li class="list-group-item"><?= $genero ?></li>
                                            <?PHP } ?>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <!-- formatear precios -->
                                    <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $disco->precio_formateado() ?></div>
                                    <!-- link a pagina de producto -->
                                    <a href="index.php?sec=producto&id=<?= $disco->getId()?>" class="btn btn-danger w-100 fw-bold">VER MÁS</a>
                                </div>

                            </div>
                        </div>

                    <?PHP } ?>

                </div>
            <!-- Si el catalogo está vacio -->
            <?PHP } else { ?>
                <div class="row">
                    <div class="col-12 text-danger text-center h1"> NO SE ENCONTRARON PRODUCTOS DE ES GENERO</div>
                </div>
            <?PHP }  ?>
        </div>

    </div>
</div>