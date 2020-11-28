<?php
class Asesoria {
    public $idAsesoria;
    public $idAsesor;
    public $idAsesorado;
    public $tema;
    public $areaEstudio;
    public $fecha;

    function __construct(){}
    
    function __construct1($idAsesoria,$idAsesor,$idAsesorado,
                            $tema,$areaEstudio,$fecha)
    {
        $this->idAsesoria=$idAsesoria;
        $this->idAsesor=$idAsesor;
        $this->idAsesorado=$idAsesorado;
        $this->tema=$tema;
        $this->areaEstudio=$areaEstudio;
        $this->fecha=$fecha;
    }

}
?>