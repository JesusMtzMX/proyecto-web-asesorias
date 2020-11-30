<?php

    require_once 'Conexion.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $conexion; /*Crea una variable conexion*/

    try{
        $conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
    }
    catch(Exception $e)
    {
        die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
    }

    try
    {
        $registro = null;

        /*Se arma la sentencia sql para seleccionar el registro que cumple con los datos de email y contraseña, de la base de datos*/
        $sentenciaSQL = $conexion->prepare("SELECT UsuarioID, Usuario, Email, ClaveAcceso, Telefono, Foto, Tipo FROM
        (SELECT IDAsesor UsuarioID, CONCAT(nombre, ' ', apellidos) Usuario, Email Email, ClaveAcceso ClaveAcceso, Telefono Telefono, Foto Foto, 'Asesor' Tipo
        FROM ASESORES A
        UNION
        SELECT IDAsesorado UsuarioID, CONCAT(nombre, ' ', apellidos) Usuario, Email Email, ClaveAcceso ClaveAcceso, Telefono Telefono, Foto Foto, 'Asesorado' Tipo
        FROM ASESORADOS B) U WHERE Email = ? and ClaveAcceso = ?;");
        
        $sentenciaSQL->execute([$email, $password]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
        
        $fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);

        if($fila != null)
        {            
            if($fila->Tipo == 'Asesor')
            {
                $id = 'Asesor';
                session_id($id);
            }
            else
            {
                $id = 'Asesorado';
                session_id($id);
            }

            session_start();
            $_SESSION['usuarioID'] = $fila->UsuarioID;
            $_SESSION['username'] = $fila->Usuario;
            header("location: ../app/index.php");
        }
        else
        {
            header("location: ../app/iniciar_sesion.php");
        }

    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        return null;
    }
    finally
    {
        Conexion::cerrarConexion();        
    }

?>