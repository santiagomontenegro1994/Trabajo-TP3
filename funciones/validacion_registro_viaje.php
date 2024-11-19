<?php
function Validar_Mensaje() {
    $vMensaje='';
    
    if ($_POST['Chofer'] == 'Selecciona una opcion') {
        $vMensaje.='Debes seleccionar un chofer. <br />';
    }
    if ($_POST['Transporte'] == 'Selecciona una opcion') {
        $vMensaje.='Debes seleccionar un transporte. <br />';
    }
    if (strlen($_POST['Fecha']) < 4) {
        $vMensaje.='Debes seleccionar una fecha. <br />';
    }
    if ($_POST['Destino'] == 'Selecciona una opcion') {
        $vMensaje.='Debes seleccionar un destino. <br />';
    }
    if (strlen($_POST['Costo']) < 1) {
        $vMensaje.='Debes Ingresar un costo. <br />';
    }
    if (strlen($_POST['Porcentaje']) < 1) {
        $vMensaje.='Debes Ingresar un porcentaje. <br />';
    }

    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }


    return $vMensaje;
}

function Validar_Estilo(){
    $vResult='';
    if ($_POST['Chofer'] == 'Selecciona una opcion' || $_POST['Destino'] == 'Selecciona una opcion' || $_POST['Transporte'] == 'Selecciona una opcion'  || strlen($_POST['Fecha']) < 4 || strlen($_POST['Costo']) < 1 || strlen($_POST['Porcentaje']) < 1) {
        $vResult='warning';
    }
        return $vResult;
    
}

?>