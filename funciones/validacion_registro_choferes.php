<?php
function Validar_Mensaje() {
    $vResult='';
        if (strlen($_POST['Apellido']) < 3) {
            $vResult.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
        }
        if (strlen($_POST['Nombre']) < 3) {
            $vResult.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
        }
        if (strlen($_POST['DNI']) < 7 || strlen($_POST['DNI']) > 10) {
            $vResult.='Debes ingresar un DNI entre 7 y 10 caracteres. <br />';
        }
        if (strlen($_POST['Clave']) < 5) {
            $vResult.='Debes una clave de al menos 5 caracteres. <br />';
        }   
    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vResult;

}

function Validar_Estilo(){
    $vResult='';
    if (strlen($_POST['Apellido'] ) < 3 || strlen($_POST['Nombre']) < 3  || strlen($_POST['DNI']) < 7 || strlen($_POST['DNI']) > 10 || strlen($_POST['Clave']) < 5) {
        $vResult='warning';
    }
        return $vResult;
    
}

?>