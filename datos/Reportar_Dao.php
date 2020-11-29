<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Reportar.php'; /*importa el modelo */

class Reportar_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT idReporte, motivo, descripcion, idAsesor, idAsesorado
			FROM reportes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Reportar_Dao();

					$obj->idReporte = $fila->idReporte;
					$obj->Motivo = 	$fila->motivo;
					$obj->Descripcion = $fila->descripcion;
					$obj->IdAsesor = $fila->idAsesor;
					$obj->IdAsesorado = $fila->idAsesorado;
					
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
	public function obtenerUno($idReporte)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idReporte, motivo, descripcion, idAsesor, idAsesorado
			from reportes WHERE idReporte=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$idReporte]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesorado_Dao();
			$registro ->idReporte = $fila->idReporte;
			$registro ->Motivo = 	$fila->motivo;
			$registro ->Descripcion = $fila->descripcion;
			$registro ->IdAsesor = $fila->idAsesor;
			$registro ->IdAsesorado = $fila->idAsesorado;
                
			
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
	public function eliminar($idReporte)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM reportes WHERE idReporte = ?");			          
            
			$sentenciaSQL->execute(array($idReporte));
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
	

	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Reportar_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO reportes (idReporte, motivo, descripcion, idAsesor, idAsesorado) values(?, ?, ?, ?,?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idReporte,
						$obj->Motivo,
						$obj->Descripcion,
						$obj->IdAsesor,
						$obj->IdAsesorado
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idReporte);
            return $idReporte;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idReporte;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}
}