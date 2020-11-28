<?php
class Cursos {
    public $idCurso;
    public $nombre;
    public $descripcion;
    public $areaEstudio;
    public $temario;
    public $Precio;
    public $idAsesor;

    function __construct($idCurso,$nombre,$descripcion,$areaEstudio,
                         $temario,$Precio,$idAsesor){
        $this->idCurso=$idCurso;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->areaEstudio=$areaEstudio;
        $this->temario=$temario;
        $this->Precio=$Precio;
        $this->idAsesor=$idAsesor;
    }

    function __construct1($idCurso,$nombre,$descripcion,$areaEstudio,
                          $Precio,$idAsesor){
        $this->idCurso=$idCurso;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->areaEstudio=$areaEstudio;        
        $this->Precio=$Precio;
        $this->idAsesor=$idAsesor;
    }
}
?>