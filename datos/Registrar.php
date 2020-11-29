<?php

    require_once 'Conexion.php';
    include('datos/Asesor_Dao.php');

    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['claveAcceso'];
    $telefono=$_POST['telefono'];

    $conexion; /*Crea una variable conexion*/

    try{
        $conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
    }
    catch(Exception $e)
    {
        die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
    }

    public function agregar(Asesor_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO asesores (idAsesor, nombre, apellidos, email, claveAcceso, telefono, fotoPerfil) values(?, ?, ?, ?,?,?,?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idAsesor ,
				$obj->Nombre,
				$obj->Apellidos,
				$obj->Email,
				$obj->ClaveAcceso,
				$obj->Telefono,
				$obj->FotoPerfil
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idAsesor);
            return $idAsesor;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idAsesor;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }

?>