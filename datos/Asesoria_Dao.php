<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Asesoria.php'; /*importa el modelo */

class Asesoria_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT idAsesoria, idAsesor, idAsesorado, tema, tareaEstudio, fecha
			FROM asesorias"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Asesoria_Dao();

					$obj->idAsesoria = $fila->idAsesoria;
					$obj->IdAsesor = $fila->idAsesor;
					$obj->IdAsesorado = $fila->IdAsesorado;
					$obj->Tema = $fila->tema;
					$obj->AreaEstudio = $fila->areaEstudio;
					$obj->fecha = $fila->Fecha;
					
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
	public function obtenerUno($idAsesoria)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idAsesoria, idAsesor, idAsesorado, tema, tareaEstudio, fecha
			from asesorias WHERE idAsesoria=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesoria_Dao();
			$registro->idAsesoria= $fila->idAsesoria;
					$registro->IdAsesor = $fila->idAsesor;
					$registro->IdAsesorado = $fila->IdAsesorado;
					$registro->Tema = $fila->tema;
					$registro->AreaEstudio = $fila->areaEstudio;
					$registro->fecha = $fila->Fecha;
                
			
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
	public function eliminar($idAsesoria)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM asesorias WHERE idAsesoria = ?");			          
            
			$sentenciaSQL->execute(array($idAsesoria));
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
	public function editar(Asesoria_Dao $obj)
	{
		try 
		{
			$sql = "UPDATE asesorias SET 
                    tema = ?,
                    areaEstudio= ?,
                    fecha = ?
				    WHERE idAsesoria = ?";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(	$obj->Tema,
				$obj->AreaEstudio,
				$obj->Fecha,
				$obj->idAsesoria )
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
	public function agregar(Asesoria_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO asesorias (idAsesoria, idAsesor, idAsesorado, tema, tareaEstudio, fecha) values(?, ?, ?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idAsesoria,
					$obj->IdAsesor ,
					$obj->IdAsesorado,
					$obj->Tema ,
					$obj->AreaEstudio ,
					$obj->fecha 
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idAsesoria);
            return $idAsesoria;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idAsesoria;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}
}