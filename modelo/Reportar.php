<?php
class Reportar {
    public $idReporte;
    public $motivo;
    public $descripcion;
    public $idAsesor;
    public $idAsesorado;

    function __construct($idReporte,$motivo,$descripcion,
                         $idAsesor,$idAsesorado)
    {
        $this->idReporte=$idReporte;
        $this->motivo=$motivo;
        $this->descripcion=$descripcion;
        $this->idAsesor=$idAsesor;
        $this->idAsesorado=$idAsesorado;
    }

    function __construct1($idReporte,$motivo,$descripcion,
                         $idAsesor)
    {
        $this->idReporte=$idReporte;
        $this->motivo=$motivo;
        $this->descripcion=$descripcion;
        $this->idAsesor=$idAsesor;        
    }

}
?>