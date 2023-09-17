<?PHP
class Disco {
    public $id;
    public $epoca;
    public $disco;
    public $artista;
    public $publicacion;
    public $genero;
    public $sello;
    public $portada;
    public $precio;

    /**
     * Devuelve el catalogo de discos completo
     * @return array Un array de objetos Disco
     */
    public function catalogoCompleto():array{
        $catalogo = [];

        $JSON = file_get_contents('datos/productos.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {
            
            $disco = new Self();

            $disco->id = $value->id;
            $disco->epoca = $value->epoca;
            $disco->disco = $value->disco;
            $disco->artista = $value->artista;
            $disco->publicacion = $value->publicacion;
            $disco->genero = $value->genero;
            $disco->sello = $value->sello;
            $disco->portada = $value->portada;
            $disco->precio = $value->precio;

            $catalogo[] = $disco;
        }

        return $catalogo;
    }

    /**
     * Devuelve el catalogo de los discos publicados en una epoca en particular
     * @param string $epoca Un string con el nombre de la epoca
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_epoca(string $epoca):array{
        $catalogoXepoca = [];
        $catalogo = $this->catalogoCompleto();

        foreach ($catalogo as $d) {
            if ($d->epoca == $epoca) {
                $catalogoXepoca[] = $d;
            }
        }
        return $catalogoXepoca;
    }

    /**
     * Devuelve los datos de un disco en particular 
     * @param int $idDisco El ID del disco
     * @return Disco Un objeto Disco o null
     */
    public function catalogo_por_id(int $idDisco):?Disco{
        $catalogo = $this->catalogoCompleto();

        foreach ($catalogo as $d) {
            if ($d->id == $idDisco) {
                return $d;
            }
        }
        return null;
    }

    /**
     * Devuelve el precio formateado 
     * @return string precio formateado
     */
    public function precio_formateado():string{
        return number_format($this->precio, 2, ",", ".");
    }

}