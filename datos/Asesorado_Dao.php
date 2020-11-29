<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Asesorado.php'; /*importa el modelo */

class Asesorado_Dao
{
    
	private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
    
   /*Metodo que obtiene todos los alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT idAsesorado, nombre, apellidos, email, claveAcceso, telefono, fotoPerfil
			FROM asesorados"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Asesorado_Dao();

					$obj->idAsesorado = $fila->idAsesorado;
					$obj->Nombre = 	$fila->nombre;
					$obj->Apellidos = $fila->apellidos;
					$obj->Email = $fila->email;
					$obj->ClaveAcceso = $fila->claveAcceso;
					$obj->Telefono = $fila->telefono;
					$obj->FotoPerfil = $fila->fotoPerfil;
					
					$lista[] = $obj;
				

			
				
			}
            
			return $lista;
		}
		catch(Exception $e){
			echo $e->getMessage();
			return null;
		}finally{
            Conexion::cerrarConexion();
        }
	}
    
    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerUno($idAsesorado)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idAsesorado, nombre, apellidos, email, claveAcceso, telefono, fotoPerfil
			from asesorados WHERE idAsesorado=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$idAsesorado]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesorado_Dao();
           			$registro->idAsesorado = $fila->idAsesorado;
					$registro->Nombre = $fila->nombre;
					$registro->Apellidos = $fila->apellidos;
					$registro->Email = $fila->email;
					$registro->ClaveAcceso = $fila->claveAcceso;
					$registro->Telefono = $fila->telefono;
					$registro->FotoPerfil = $fila->fotoPerfil;
				
                
			
			return $registro; //Registro es un Empleado (objeto Empleado)
		}
		catch(Exception $e){
            echo $e->getMessage();
            return null;
		}finally{
            Conexion::cerrarConexion();
        }
	}
    
    //Elimina el alumno con el id indicado como parámetro
	public function eliminar($idAsesorado)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM asesorados WHERE idAsesorado = ?");			          
            
			$sentenciaSQL->execute(array($idAsesorado));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}finally{
            Conexion::cerrarConexion();
        }
        
	}

	//FALTAAA
	//Función para editar al alumno de acuerdo al objeto recibido como parámetro
	public function editar(Asesorado_Dao $obj)
	{
		try 
		{
			$sql = "UPDATE asesorados SET 
                    nombre = ?,
                    email= ?,
                    claveAcceso = ?,
					claveAcceso= ?
				    WHERE idAsesorado = ?";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(	$obj->Nombre,
						$obj->Email,
						$obj->ClaveAcceso,
						$obj->ClaveAcceso,
						$obj->idAsesorado )
					);
            return true;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}finally{
            Conexion::cerrarConexion();
        }
	}

	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Asesorado_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO asesorados (idAsesorado, nombre, apellidos, email, claveAcceso, telefono, fotoPerfil) values(?, ?, ?, ?,?,?,?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idAsesorado,
						$obj->Nombre,
						$obj->Apellidos,
						$obj->Email,
						$obj->ClaveAcceso,
						$obj->Telefono,
						$obj->FotoPerfil
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idAsesorado);
            return $idAsesorado;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idAsesorado;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}
}