<?php
date_default_timezone_set('America/Lima');
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INTRANET - STUDIO</title>
    
    <link rel="stylesheet" href="../default/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap.css" />
    <link rel="stylesheet" href="../default/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../default/assets/css/chosen.min.css" />

    <link rel="stylesheet" href="../default/assets/fonts/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="../default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <script src="../default/assets/js/ace-extra.min.js"></script>
     
</head>
    <body class="no-skin" >
        <div id="navbar" class="navbar navbar-default">

            <div class="navbar-container" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="../principal.php" class="navbar-brand">
                        <small>
                            <i class="fa fa-scissors"></i>
                            Edith Córdova Studio
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <span class="user-info">
                                    <small>Bienvenido,</small>
                                    <p><?php echo $_SESSION["usuario"] ?></p>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">                              
                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Perfil
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="../../Controller/controlUsuario/cerrar_sesion.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <i class="ace-icon fa fa-bars blue" style="font-size: 25px"></i>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">  
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-briefcase"></i>
                            <span class="menu-text">Mantenedores</span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Servicios
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>         
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">Alumnos Inscritos</span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="../Alumnos/charlas.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Charlas Informativas
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="../Alumnos/alumnosProfesionales.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Cursos Profesionales
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="../Alumnos/alumnosEgresados.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Cursos para Egresados
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="../Alumnos/formacionInicial.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Formación Inicial
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="../Alumnos/alumnosLibres.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Cursos Libres
                                </a>

                                <b class="arrow"></b>
                            </li>                           
                        </ul>
                    </li> 
                    <li class="active open">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text">Matrícula</span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="active">
                                <a href="gestionarMatricula.php"><i class="menu-icon fa fa-plus"></i>Gestionar Matrícula</a>
                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="matriculas.php"><i class="menu-icon fa fa-list"></i><L>Listar Matrículas</L></a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>                  
                </ul><!-- /.nav-list -->


                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                </script>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="bienvenido.php">Home</a>
                            </li>
                            <li><a href="gestionarMatricula.php">Gestionar Matrícula</a></li>
                            <li>
                                <span class="invoice-info-label">Fecha:</span>
                                <span class="blue"><?php echo date('d-m-Y'); ?></span>
                            </li>                            
                            
                        </ul><!-- /.breadcrumb -->                  
                    </div>

                    <div class="page-content">                  
                                             
                        <div class="row">
                            <div class="col-xs-12">                         
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-10 col-xs-offset-1">                             
                                <div class="widget-box transparent">                                                                
                                    <div class="space-10"></div>
                                    <div class="">
                                        <form action="" method="POST">  
                                            <div class="modal-body">                                               
                                                <div class="page-header">
                                                    <h1>Datos de Generales</h1>
                                                </div>
                                                <div class="row"> 
                                                    <form action="" method="POST">
                                                        <div class="form-group">
                                                            <label for="param_linea" class="col-md-2 control-label col-md-offset-2">Tipo de Matrícula:</label>
                                                            <div class="col-md-4" id="linea">                               
                                                            </div>                                                     
                                                        </div>
                                                    </form><br><br>
                                                    <div class="form-group col-md-5 col-md-offset-1">
                                                        <label for="param_alumno">Alumno</label>
                                                        <div class="input-group col-md-12">
                                                            <input class="form-control col-md-12 input-mask-dni" type="text" name="param_alumno" id="param_alumno" placeholder="Busque al alumno" disabled/>
                                                            <span class="input-group-btn">
                                                                <a id="buscarAlumno" class="btn btn-sm btn-default">
                                                                    <i class="ace-icon fa fa-search bigger-110"></i>    
                                                                </a>                                     
                                                            </span>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <label for="param_inscripcion">Dni</label>
                                                        <div class="input-group">                                                            
                                                            <input class="col-md-12" type="text" id="param_dni" disabled placeholder="Dni"/>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group  col-md-4">
                                                        <label for="param_inscripcion">Fecha de Inscripción</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="ace-icon fa fa-calendar"></i>
                                                            </span>
                                                            <input class="col-md-8" type="text" id="param_inscripcion" disabled placeholder="Fecha de Inscripción"/>
                                                        </div>
                                                    </div> 
                                                    <div class="input-group">                                                            
                                                        <input class="col-md-12" type="hidden" id="param_idAlumno" disabled placeholder="idAlumno"/>
                                                    </div>
                                                </div>                                      
                                            </div>
                                            <div class="col-sm-12">
                                            <div class="widget-box widget-color-blue2">
                                                <div class="widget-header widget-header-flat">                                                
                                                    <h4 class="widget-title">Cursos Matriculados</h4>
                                                </div>
                                                
                                                <div class="panel-body">
                                                    <div class="form-group col-md-5">
                                                        <label for="param_curso">Curso</label>
                                                        <div class="input-group col-md-12">
                                                            <input class="form-control col-md-12" type="text" id="param_curso" name="param_curso" placeholder="Busque el curso" disabled/>
                                                            <span class="input-group-btn">
                                                                <a id="buscarCursos" class="btn btn-sm btn-default">
                                                                    <i class="ace-icon fa fa-search bigger-110"></i>    
                                                                </a>            
                                                            </span>
                                                        </div>
                                                    </div>                                                     
                                                    <div class="form-group col-md-2">
                                                        <label for="param_precio">Precio (x Mes)</label>
                                                        <div class="input-group col-md-12">                                 
                                                            <input class="col-md-10" type="text" disabled name="param_precio" id="param_precio" placeholder="S/."/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="param_duracion">Duración (Mes)</label>
                                                        <div class="input-group col-md-12">                                 
                                                            <input class="col-md-12" type="text" disabled name="param_duracion" id="param_duracion" placeholder="Dia/Mes"/>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="param_docdetDsctoPorcenajeMat">Dscto. %</label>
                                                        <div class="input-group col-md-12">                                 
                                                            <input class="col-md-12" type="text" name="param_docdetDsctoPorcenajeMat" id="param_docdetDsctoPorcenajeMat" placeholder="%"/>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group col-md-4">
                                                        <label for="param_codigoHorario">Horario</label>
                                                        <div class="input-group col-md-12">
                                                            <input class="form-control col-md-12" type="text" id="param_codigoHorario" name="param_codigoHorario" placeholder="Busque el Horario" disabled/>
                                                            <span class="input-group-btn">
                                                                <a id="buscarHorarios" class="btn btn-sm btn-default">
                                                                    <i class="ace-icon fa fa-search bigger-110"></i>    
                                                                </a>            
                                                            </span>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="param_diasHorario">Días</label>
                                                        <div class="input-group col-md-12">                                 
                                                            <input class="col-md-12" type="text" name="param_diasHorario" id="param_diasHorario" disabled placeholder="Días de Horario"/>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-3">
                                                        <label for="param_horasHorario">Horas</label>
                                                        <div class="input-group col-md-12">                                 
                                                            <input class="col-md-12" type="text" name="param_horasHorario" id="param_horasHorario" disabled placeholder="Horas de Horario"/>
                                                        </div>
                                                    </div>                                                      
                                                    <div class="form-group col-md-1">
                                                        <label for=""></label>
                                                        <button disabled type="button" class="btn btn-success btn-lg ace-icon fa fa-plus" id="addRow">
                                                        </button>
                                                    </div>
                                                    <div class="form-group col-md-2">                                                       
                                                        <div class="input-group col-md-12">                                 
                                                            <input disabled class="col-md-12" type="hidden" name="param_codigoCurso" id="param_codigoCurso" placeholder="%"/>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-2">                                                       
                                                        <div class="input-group col-md-12">                                 
                                                            <input disabled class="col-md-12" type="hidden" name="param_idHorario" id="param_idHorario" placeholder="%"/>
                                                        </div>
                                                    </div>                                                   
                                                    <!--div class="form-group col-md-1">
                                                        <label for="">Ejempo</label>
                                                        <button type="button" class="btn btn-success btn-lg ace-icon fa fa-plus" id="addRow" onclick="mostrar();">
                                                        </button><br>
                                                    </div-->                                                    
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover display" id="tablaDetaCursos">
                                                                <thead>
                                                                    <tr>            
                                                                      <th style='text-align: center; height: 5px; width: 3%;'>CODIGO</th>   
                                                                      <th style='text-align: center; height: 5px; width: 15%;'>CURSO</th>
                                                                      <th style='text-align: center; height: 5px; width: 15%;'>HORARIO</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'>P.U.</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'>DURACION</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'>SUBTOTAL</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'>DESCUENTO</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'>TOTAL</th>
                                                                      <th style='text-align: center; height: 5px; width: 4%;'></th>                                                                   
                                                                      
                                                                    </tr>
                                                                </thead>           
                                                            </table>
                                                        </div>          
                                                    </div>

                                                    <div class="form-group col-md-2 col-md-offset-10">
                                                        <label for="param_docdetMontoTotalMat">Monto Total</label>
                                                        <div class="input-group col-md-12">
                                                            <input class="col-md-12" type="text" name="param_docdetMontoTotalMat" id="param_docdetMontoTotalMat" disabled placeholder="S/."/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-footer text-right">
                                                <input disabled type="submit" class="btn btn-sm btn-danger" id="listar" value="Listar">                                               
                                                <input type="hidden" value="grabarMatricula" name="param_opcion" id="param_opcion">
                                                <input type="submit" id="registroMatricula" class="btn btn-sm btn-primary" value="Guardar"/>
                                            </div>                                
                                        </form>         
                                        
                                    </div><!-- /.col -->    
                                </div>

                                    </div>
                                </div>                              
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
                <div class="modal fade" id="modalAlumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title text-center letra1" id="cabeceraRegistro"><b>.:: Buscar Alumnos ::.</b></h4>
                        </div>
                        <div class="modal-body">
                       <form action="" method="POST" class="form-horizontal" id="form_eventoPago"> 
                            <fieldset>
                                <div class="row">                                                       
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="alumnos">
                                                <thead>
                                                    <tr>            
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 4%;">ID</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">Alumno</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">Dni</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">Fecha Inscripción</th>
                                                    </tr>
                                                </thead>           
                                                <tbody id="cuerpoTabla">
                                                  
                                                </tbody>                                                  
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="modal fade" id="modalCursos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title text-center letra1" id="cabeceraRegistro"><b>.:: Buscar Alumnos ::.</b></h4>
                        </div>
                        <div class="modal-body">
                       <form action="" method="POST" class="form-horizontal" id="form_eventoPago"> 
                            <fieldset>
                                <div class="row">                                                       
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="cursos">
                                                <thead>
                                                    <tr>            
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 4%;">ID</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">Curso</th>
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 4%;">Precio (S/)</th>
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 4%;">Duración (Mes)</th>
                                                                                                                

                                                    </tr>
                                                </thead>           
                                                <tbody id="cuerpoTablaCursos">
                                                  
                                                </tbody>                                                  
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="modal fade" id="modalHorarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title text-center letra1" id="cabeceraRegistro"><b>.:: Buscar Hhorarios ::.</b></h4>
                        </div>
                        <div class="modal-body">
                       <form action="" method="POST" class="form-horizontal" id="form_eventoPago"> 
                            <fieldset>
                                <div class="row">                                                       
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="horarios">
                                                <thead>
                                                    <tr>  
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 5%;">ID</th>
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 5%;">Codigo HORARIO</th>
                                                        <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">Días</th>
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 4%;">Horas</th>
                                                        <th style="text-align: center; font-size: 11px; height: 5px; width: 4%;">Capacidad</th>
                                                    </tr>
                                                </thead>           
                                                <tbody id="cuerpoTablaHorarios">
                                                  
                                                </tbody>                                                  
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">ZENTRUM CITY</span>
                            Application &copy; 2016
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="../default/assets/js/jquery.2.1.1.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='../default/assets/js/jquery.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='../default/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="../default/assets/js/bootstrap.min.js"></script>
        <script src="../js/gestionarMatricula.js"></script>  
        <!-- page specific plugin scripts -->

        <script src="../default/assets/js/jquery-ui.custom.min.js"></script>
        <script src="../default/assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="../default/assets/js/chosen.jquery.min.js"></script>
        <script src="../default/assets/js/fuelux.spinner.min.js"></script>
        <script src="../default/assets/js/bootstrap-datepicker.min.js"></script>
        <script src="../default/assets/js/bootstrap-timepicker.min.js"></script>
        <script src="../default/assets/js/moment.min.js"></script>
        <script src="../default/assets/js/daterangepicker.min.js"></script>
        <script src="../default/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../default/assets/js/bootstrap-colorpicker.min.js"></script>
        <script src="../default/assets/js/jquery.knob.min.js"></script>
        <script src="../default/assets/js/jquery.autosize.min.js"></script>
        <script src="../default/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="../default/assets/js/jquery.maskedinput.min.js"></script>
        <script src="../default/assets/js/bootstrap-tag.min.js"></script>

        <script src="../default/assets/js/jquery.dataTables.min.js"></script>
        <script src="../default/assets/js/jquery.dataTables.bootstrap.min.js"></script>

        <!-- ace scripts -->
        <script src="../default/assets/js/ace-elements.min.js"></script>
        <script src="../default/assets/js/ace.min.js"></script>
        
        
        <script type="text/javascript" src="../../js/bootbox.min.js"></script>
        
        <!-- inline scripts related to this page -->
      
    </body>
</html>
