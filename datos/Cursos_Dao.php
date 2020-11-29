<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Cursos.php'; /*importa el modelo */

class Cursos_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT idACurso, nombre, descripcion, areaEstudio, temario, Precio, idAsesor
			FROM cursos"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Cursos_Dao();

					$obj->idCurso= $fila->idCurso;
					$obj->Nombre = 	$fila->nombre;
					$obj->Descripcion = $fila->descripcion;
					$obj->AreaEstudio = $fila->areaEstudio;
					$obj->Temario = $fila->temario;
					$obj->Precio = $fila->precio;
					$obj->IdAsesor = $fila->idAsesor;
					
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
	public function obtenerUno($idCurso)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idACurso, nombre, descripcion, areaEstudio, temario, Precio, idAsesor
			from cursos WHERE idCurso=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$idCurso]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesorado_Dao();
			$registro->idCurso = $fila->idCurso;
			$registro->Nombre = 	$fila->nombre;
			$registro->Descripcion = $fila->descripcion;
			$registro->AreaEstudio = $fila->areaEstudio;
			$registro->Temario = $fila->temario;
			$registro->Precio = $fila->precio;
			$registro->IdAsesor = $fila->idAsesor;
			
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
	public function eliminar($idCurso)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM cursos WHERE idCurso = ?");			          
            
			$sentenciaSQL->execute(array($idCurso));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}finally{
            Conexion::cerrarConexion();
        }
        
	}


	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Cursos_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO cursos (idACurso, nombre, descripcion, areaEstudio, temario, Precio, idAsesor) values(?, ?, ?, ?,?,?,?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idAsesorado,
				$obj->idCurso ,
				$obj->Nombre ,
				$obj->Descripcion ,
				$obj->AreaEstudio,
				$obj->Temario,
				$obj->Precio ,
				$obj->IdAsesor
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idCurso);
            return $idCurso;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idCurso;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}
}