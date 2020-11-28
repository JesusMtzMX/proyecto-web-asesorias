<?php
class Producto{
    public $clave;
    public $nombre;
    public $claveCategoria;
    public $categoria;
    public $precio;
    public $existencia;
    public $inactivo;

    function __construct(){}
    function __construct1($clave,$nombre,$claveCategoria,
                        $precio,$existencia,$inactivo){
        $this->clave=$clave;
        $this->nombre=$nombre;
        $this->claveCategoria=$claveCategoria;
        $this->precio=$precio;
        $this->existencia=$existencia;
        $this->inactivo=$inactivo;
    }
    function __construct2($clave,$nombre,$claveCategoria,$categoria,
                        $precio,$existencia,$inactivo){
        $this->clave=$clave;
        $this->nombre=$nombre;
        $this->claveCategoria=$claveCategoria;
        $this->categoria=$categoria;
        $this->precio=$precio;
        $this->existencia=$existencia;
        $this->inactivo=$inactivo;
    }
}
?>