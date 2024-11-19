<?php
function Listar_Transportes($vConexion) {

    $Listado=array();

      //1) genero la consulta que deseo
        $SQL = "SELECT T.patente, Ti.denominación as tipo, M.denominación as marca, T.idTransporte
        FROM transportes T, tipo Ti, marcas M
        WHERE T.idTipo=Ti.idTipo AND T.idMarca=M.idMarca AND disponible=1
        ORDER BY Ti.denominación";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
        $rs = mysqli_query($vConexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['idTransporte'];
            $Listado[$i]['MARCA'] = $data['marca'];
            $Listado[$i]['TIPO'] = $data['tipo'];
            $Listado[$i]['PATENTE'] = $data['patente'];
            $i++;
        }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}


?>