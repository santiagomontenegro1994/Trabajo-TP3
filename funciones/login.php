<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT idUsuario, nombre, apellido, dni, activo, idNivel, imagen FROM usuarios 
     WHERE usuario='$vUsuario' AND clave='$vClave'  ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['ID'] = $data['idUsuario'];
        $Usuario['NOMBRE'] = $data['nombre'];
        $Usuario['APELLIDO'] = $data['apellido'];
        $Usuario['DNI'] = $data['dni'];
        $Usuario['ACTIVO'] = $data['activo'];
        $Usuario['IDNIVEL'] = $data['idNivel'];
        $Usuario['IMAGEN'] = $data['imagen'];
    }
    return $Usuario;
}

?>