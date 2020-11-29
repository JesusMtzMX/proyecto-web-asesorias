<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Comentario.php'; /*importa el modelo */

class Comentario_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT idComentario, alumno, titulo, mensaje, idCurso
			FROM comentarios"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Comentario_Dao(

					$obj->idComentario= $fila->idComentario;
					$obj->Alumno = 	$fila->alumno;
					$obj->Titulo = $fila->titulo;
					$obj->Mensaje = $fila->mensaje;
					$obj->IdCurso = $fila->idCurso;
					
					$lista[] = $obj;
				);

			
				
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
	public function obtenerUno($idComentario)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT idComentario, alumno, titulo, mensaje, idCurso
			from comentarios WHERE idComentario=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$idComentario]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesorado_Dao();
			$registro->idComentario = $fila->idComentario;
			$registro->Alumno = $fila->alumno;
			$registro->Titulo = $fila->titulo;
			$registro->Mensaje = $fila->mensaje;
			$registro->IdCurso = $fila->idCurso;
                
			
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
	public function eliminar($idComentario)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM comentarios WHERE idComentario = ?");			          
            
			$sentenciaSQL->execute(array($idComentario));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}finally{
            Conexion::cerrarConexion();
        }
        
	}

	
	//Función para editar al alumno de acuerdo al objeto recibido como parámetro
	

	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Comentario_Dao $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO comentarios (idComentario, alumno, titulo, mensaje, idCurso) values(?, ?, ?, ?,?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->idComentario,
						$obj->Alumno,
						$obj->Titulo,
						$obj->Mensaje,
						$obj->IdCurso
						
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($idComentario);
            return $idComentario;
		} catch (Exception $e){
			echo $e->getMessage();
			return $idComentario;
		}finally{
            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}
}