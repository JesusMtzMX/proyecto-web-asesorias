<?php
class Asesor {
    public $idAsesor;
    public $nombre;
    public $apellidos;
    public $email;
    public $claveAcceso;
    public $telefono;
    public $fotoPerfil;

    function __construct(){}
    
    function __construct1($idAsesor,$nombre,$apellidos,
                            $email,$claveAcceso,$telefono, $fotoPerfil)
    {
        $this->idAsesor=$idAsesor;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->claveAcceso=$claveAcceso;
        $this->telefono=$telefono;
        $this->fotoPerfil=$fotoPerfil;
    }

    function __construct2($idAsesor,$nombre,$apellidos,
                            $email,$claveAcceso,$telefono)
    {
        $this->idAsesor=$idAsesor;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->claveAcceso=$claveAcceso;
        $this->telefono=$telefono;        
    }
}
?>