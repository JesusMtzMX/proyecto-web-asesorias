<?php
class Asesorado {
    public $idAsesorado;
    public $nombre;
    public $apellidos;
    public $email;
    public $claveAcceso;
    public $telefono;
    public $fotoPerfil;

    function __construct(){}
    
    function __construct1($idAsesorado,$nombre,$apellidos,
                            $email,$claveAcceso,$telefono, $fotoPerfil)
    {
        $this->idAsesorado=$idAsesorado;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->claveAcceso=$claveAcceso;
        $this->telefono=$telefono;
        $this->fotoPerfil=$fotoPerfil;
    }

    function __construct2($idAsesorado,$nombre,$apellidos,
                            $email,$claveAcceso,$telefono)
    {
        $this->idAsesorado=$idAsesorado;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->claveAcceso=$claveAcceso;
        $this->telefono=$telefono;        
    }
}
?>