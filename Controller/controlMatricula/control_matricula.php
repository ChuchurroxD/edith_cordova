<?php
session_start();
include_once '../../Model/modelMatricula/matricula_model.php';

$param = array();
$param['param_opcion'] = '';
$param['param_linea'] = '';
$param['param_idAlumno'] = '';
$param['param_docdetMontoTotalMat'] = '';
$param['param_usuario'] = '';
$param['param_codigoCurso']="";
$param['param_idHorario']="";
$param['param_duracion']="";
$param['param_matriculaDescuentoPorc']="";
$param['param_matriculaMontoTotal']="";
$param['param_montoTotal']="";
$param['param_numeroDetalleMatricula']="";

if (isset($_POST['param_opcion'])) {
    $param['param_opcion'] = $_POST['param_opcion'];
}

if (isset($_POST['param_linea'])) {
    $param['param_linea'] = $_POST['param_linea'];
}

if (isset($_POST['param_idAlumno'])) {
    $param['param_idAlumno'] = $_POST['param_idAlumno'];
}

if (isset($_POST['param_docdetMontoTotalMat'])) {
    $param['param_docdetMontoTotalMat'] = $_POST['param_docdetMontoTotalMat'];
}

if (isset($_SESSION["idusuario"])) {
    $param['param_usuario'] = $_SESSION["idusuario"];
}

if (isset($_POST["param_codigoCurso"])) {
    $param['param_codigoCurso'] = explode(",",$_POST['param_codigoCurso']);
}

if (isset($_POST["param_idHorario"])) {
    $param['param_idHorario'] = explode(",",$_POST['param_idHorario']);
}

if (isset($_POST["param_duracion"])) {
    $param['param_duracion'] = explode(",",$_POST['param_duracion']);
}

if (isset($_POST["param_matriculaDescuentoPorc"])) {
    $param['param_matriculaDescuentoPorc'] = explode(",",$_POST['param_matriculaDescuentoPorc']);
}

if (isset($_POST["param_matriculaMontoTotal"])) {
    $param['param_matriculaMontoTotal'] = explode(",",$_POST['param_matriculaMontoTotal']);
}

if (isset($_POST["param_docdetMontoTotalMat"])) {
    $param['param_montoTotal'] = explode(",",$_POST['param_docdetMontoTotalMat']);
}

if (isset($_POST["param_numeroDetalleMatricula"])) {
    $param['param_numeroDetalleMatricula'] = explode(",",$_POST['param_numeroDetalleMatricula']);
}

if (isset($_POST["param_curso"])) {
    $param['param_codigoCurso'] = $_POST['param_curso'];
}


$Matricula = new Matricula_Model();
echo $Matricula->gestionar($param);



//echo(count('param_numeroDetalleMatricula'));
//echo '"'.$param['usuario'].'"';
//echo '"'.$param['password'].'"';
?>
