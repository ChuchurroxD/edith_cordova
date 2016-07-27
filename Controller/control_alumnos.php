<?php
session_start();
include_once '../Model/model_alumnos.php';

$param = array();
$param['opcion'] = '';
$param['nombre']='';
$param['apellido']='';
$param['dni']='';
$param['direccion']='';
$param['telefono']='';
$param['email']='';
$param['empresa']='';
$param['cargo']='';
$param['capilar']='';
$param['corte']='';
$param['acabadoPerfecto']='';
$param['maquillaje']='';
$param['automaquillaje']='';
$param['peinados']='';
$param['id']='';
$param['persona']='';



if (isset($_POST['param_opcion'])) {
    $param['opcion'] = $_POST['param_opcion'];
}

if (isset($_POST['param_nombres'])) {
    $param['nombre'] = $_POST['param_nombres'];
}
if (isset($_POST['param_apellidos'])) {
    $param['apellido'] = $_POST['param_apellidos'];
}
if (isset($_POST['param_dni'])) {
    $param['dni'] = $_POST['param_dni'];
}
if (isset($_POST['param_direccion'])) {
    $param['direccion'] = $_POST['param_direccion'];
}

if (isset($_POST['param_telefono'])) {
    $param['telefono'] = $_POST['param_telefono'];
}
if (isset($_POST['param_email'])) {
    $param['email'] = $_POST['param_email'];
}

if (isset($_POST['param_nombres2'])) {
    $param['nombre'] = $_POST['param_nombres2'];
}
if (isset($_POST['param_apellidos2'])) {
    $param['apellido'] = $_POST['param_apellidos2'];
}
if (isset($_POST['param_dni2'])) {
    $param['dni'] = $_POST['param_dni2'];
}
if (isset($_POST['param_direccion2'])) {
    $param['direccion'] = $_POST['param_direccion2'];
}

if (isset($_POST['param_telefono2'])) {
    $param['telefono'] = $_POST['param_telefono2'];
}
if (isset($_POST['param_email2'])) {
    $param['email'] = $_POST['param_email2'];
}

if (isset($_POST['param_empresa'])) {
    $param['empresa'] = $_POST['param_empresa'];
}

if (isset($_POST['param_cargo'])) {
    $param['cargo'] = $_POST['param_cargo'];
}

if (isset($_POST['param_capilar'])) {
    $param['capilar'] = $_POST['param_capilar'];
}
if (isset($_POST['param_corte'])) {
    $param['corte'] = $_POST['param_corte'];
}
if (isset($_POST['param_acabadoPerfecto'])) {
    $param['acabadoPerfecto'] = $_POST['param_acabadoPerfecto'];
}
if (isset($_POST['param_maquillaje'])) {
    $param['maquillaje'] = $_POST['param_maquillaje'];
}
if (isset($_POST['param_automaquillaje'])) {
    $param['automaquillaje'] = $_POST['param_automaquillaje'];
}
if (isset($_POST['param_peinados'])) {
    $param['peinados'] = $_POST['param_peinados'];
}
if (isset($_POST['id'])) {
    $param['id'] = $_POST['id'];
}

if (isset($_POST['persona'])) {
    $param['persona'] = $_POST['persona'];
}



$alumno = new Alumno_Model();
echo $alumno->gestionar($param);
?>