<?php
include_once '../../Model/conexion.php';
class Usuario_Model {

    private $param = array();
    

    function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    function cerrarAbrir()
    {
        mysqli_close($this->conexion);
        $this->conexion = Conexion::getConexion();
    }

    
    function gestionar($param) {
        $this->param = $param;
        switch ($this->param['opcion']) {
            case "login":
                echo $this->login();
                break;                
            case "get":break;
        }

    }

    function prepararConsultaUsuario($opcion = '') {
        $consultaSql = "call sp_control_usuario(";
        $consultaSql.="'".$opcion . "',";
        $consultaSql.="'".$this->param['usuario'] . "',";
        $consultaSql.="'" . $this->param['password'] . "')";
        
        echo $consultaSql;
        $this->result = mysqli_query($this->conexion,$consultaSql);
    }
    
    function ejecutarConsultaTotal() {
        $total = 0;
        while ($fila = mysqli_fetch_array($this->result)) {
            $total = $fila["total"];
        }
        return $total;
    }

    function ejecutarConsultaRespuesta() {
        $respuesta = '';
        while ($fila = mysqli_fetch_array($this->result)) {
            $respuesta = $fila["respuesta"];
        }
        return $respuesta;
    }

    function login() {
        $this->prepararConsultaUsuario('opc_login_respuesta');
        $respuesta = $this->ejecutarConsultaRespuesta();
        if ($respuesta == '1') {
            //echo '"'.$respuesta.'"';
            $this->cerrarAbrir();
            $this->prepararConsultaUsuario('opc_login_listar');
            while ($fila = mysqli_fetch_array($this->result)) {
                $_SESSION['usuario'] = $fila[0];
                $_SESSION['idusuario'] = $fila[2];            
                //$_SESSION['cokie'] = $fila["usuUsuario"].time();
            }
            //echo '{"resultado":true,"mensaje": "Bienvenido!!"}';
            header("Location:../../View/principal.php");
        } else {
            //echo '{"resultado":false,"mensaje":"' . $respuesta . '"}';
            header("Location:../../intranet.php");
        }
    }
}

?>