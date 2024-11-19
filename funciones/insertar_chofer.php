<?php 

function InsertarChoferes($vConexion){
    
    $SQL_Insert="INSERT INTO usuarios (apellido, nombre, dni, usuario, clave, activo, idNivel, fechaCreacion, imagen)
    VALUES ('".$_POST['Apellido']."' ,'".$_POST['Nombre']."' , '".$_POST['DNI']."','".$_POST['Nombre'].$_POST['Apellido']."@gmail.com',
    '".$_POST['Clave']."', '1', '3', '".$_POST['FechaActual']."','bellota.jpg')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>