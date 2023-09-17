<?PHP
//require_once 'includes/catalogo.php';

// Obtiene el valor del parámetro 'id' de la URL a través del método GET. Si 'id' no está presente en la URL, $id se establece en FALSE.
$id = $_GET['id'] ?? FALSE;

// Llama a la función producto_x_id() y pasa el valor de $id como argumento.
//$disco = producto_x_id($id);

$objetoDisco = new Disco();

$disco = $objetoDisco->catalogo_por_id($id);

?>

<div class="container">

    <div class="row">
        <?PHP if (!empty($disco)) { ?>
            <div class="col">
                <div class="card m-5">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="img/covers/<?= $disco->portada; ?>" class="img-fluid rounded-start border-end" alt="Portada de <?= $disco->disco;?>">
                        </div>
                        <div class="col-md-7 d-flex flex-column p-3">
                            <div class="card-body flex-grow-0">
                                <p class="fs-4 m-0 text-danger"><?= $disco->genero;?></p>
                                <h1 class="card-title fw-bold mb-4"><?= $disco->disco; ?></h1>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="fw-bold">Artista:</span> <?= $disco->artista; ?></li>
                                <li class="list-group-item"><span class="fw-bold">Sello:</span> <?= $disco->sello; ?></li>
                                <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $disco->publicacion; ?></li>
                            </ul>

                            <div class="card-body flex-grow-0 mt-auto">
                                <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $disco->precio_formateado();?></div>
                                <a href="#" class="btn btn-danger w-100 fw-bold">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        <?PHP } else { ?>
            <div class="col">
                <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
            </div>
        <?PHP } ?>
    </div>

</div>