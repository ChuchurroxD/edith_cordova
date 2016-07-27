<?php
session_start();
include_once '../../Model/controlUsuario/usuario_model.php';

$param = array();
$param['opcion'] = '';
$param['usuario']='';
$param['password']='';

if (isset($_POST['opcion'])) {
    $param['opcion'] = $_POST['opcion'];
}

if (isset($_POST['usuario']))
    $param['usuario'] = $_POST['usuario'];

if (isset($_POST['password']))
    $param['password'] = md5($_POST['password']);

$Usuario = new Usuario_Model();
echo $Usuario->gestionar($param);

//echo '"'.$param['opcion'].'"';
//echo '"'.$param['usuario'].'"';
//echo '"'.$param['password'].'"';
?>