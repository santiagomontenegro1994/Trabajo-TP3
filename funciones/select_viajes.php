<?php

date_default_timezone_set("America/Argentina/Cordoba");

function Listar_Viajes($vConexion) {

    $Listado=array();

      //1) genero la consulta que deseo
        //$SQL = "SELECT * FROM viajes";
        $SQL = "SELECT V.idViaje, V.fechaViaje, D.denominación as destino, u.nombre, U.apellido, 
         M.denominación as marca, Ti.denominación as tipo, T.patente, V.costo, V.porcentajeChofer, U.idUsuario
        FROM viajes V, Transportes T, destinos D, usuarios U, tipo Ti, marcas M
        WHERE V.idDestino=D.idDestino AND V.idUsuarioChofer=U.idUsuario
        AND V.idTransporte=T.idTransporte AND T.idTipo=Ti.idTipo AND T.idMarca=M.idMarca 
        ORDER BY V.fechaViaje, D.denominación";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
        $rs = mysqli_query($vConexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['idViaje'];
            $Listado[$i]['FECHA_VIAJE'] = $data['fechaViaje'];
            $Listado[$i]['DESTINO'] = $data['destino'];
            $Listado[$i]['NOMBRE'] = $data['nombre'];
            $Listado[$i]['APELLIDO'] = $data['apellido'];
            $Listado[$i]['MARCA'] = $data['marca'];
            $Listado[$i]['TIPO'] = $data['tipo'];
            $Listado[$i]['PATENTE'] = $data['patente'];
            $Listado[$i]['COSTO_VIAJE'] = $data['costo'];
            $Listado[$i]['MONTO_CHOFER'] = $data['porcentajeChofer'];
            $Listado[$i]['ID_CHOFER'] = $data['idUsuario'];
            $i++;
        }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}

function ColorDeFila($vFecha) {

    $Title='';
    $Color='';
    $vFecha; 
    $FechaActual = $Fecha_actual = date("Y-m-d");
    $FechaManiana = date("Y-m-d",strtotime($FechaActual."+ 1 day"));

    if ($vFecha == $FechaManiana){
        //la fecha del viaje es Mañana?
        $Title='Viaje de mañana';
        $Color='table-warning'; 
    
    } else if ($vFecha ==$FechaActual){
        //la fecha del viaje es para hoy?
        $Title='Viaje de hoy';
        $Color='table-danger'; 
    
    }else if ($vFecha < $FechaActual){
        //la fecha del viaje es menor a hoy?
        $Title='Viaje realizado';
        $Color='table-success';  
    
    }else if ($vFecha > $FechaManiana){
        //la fecha del viaje es mayor a mañana?
        $Title='';
        $Color=''; 
    }

    return [$Title, $Color];

}


?>