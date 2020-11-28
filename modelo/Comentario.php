<?php
class Comentario {
    public $idComentario;
    public $alumno;
    public $titulo;
    public $mensaje;
    public $idCurso;

    function __construct($idComentario,$alumno,
                         $titulo, $mensaje, $idCurso)
    {
        $this->idComentario=$idComentario;
        $this->alumno=$alumno;
        $this->titulo=$titulo;
        $this->mensaje=$mensaje;
        $this->idCurso=$idCurso;       
    }

}
?>