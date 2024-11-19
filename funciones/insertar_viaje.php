<?php 

function InsertarViajes($vConexion){
    
    $SQL_Insert="INSERT INTO viajes (idUsuarioChofer, idTransporte, fechaViaje, idDestino, fechaCreacion, idUsuario, costo, porcentajeChofer)
    VALUES ('".$_POST['Chofer']."' ,'".$_POST['Transporte']."' , '".$_POST['Fecha']."','".$_POST['Destino']."','".$_POST['FechaActual']."',
    '".$_POST['IdUsuario']."', '".$_POST['Costo']."','".$_POST['Porcentaje']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>