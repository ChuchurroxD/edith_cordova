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
                            <li class="">
                                <a href="gestionarMatricula.php"><i class="menu-icon fa fa-plus"></i>Gestionar Matrícula</a>
                                <b class="arrow"></b>
                            </li>
                            <li class="active">
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
                            <li><a href="matriculas.php">Matrículas</a></li>
                            <li>
                                <span class="invoice-info-label">Fecha:</span>
                                <span class="blue"><?php echo date('d-m-Y'); ?></span>
                            </li>                            
                            
                        </ul><!-- /.breadcrumb -->					
					</div>

					<div class="page-content">					
						<div class="page-header">
							<h1>
								Matrículas
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Matrículas Realizadas
								</small>
							</h1>
						</div><!-- /.page-header -->
						<br>	
						<div class="row">
							<div class="col-md-12">
								<div class="clearfix">
									<div class="pull-right tableTools-container"></div>
								</div>
								<div class="table-header">
									Matrículas registradas hasta el momento.
								</div>
								<div>
									<table id="matriculas" class="table table-striped table-bordered">
										<thead>											
								            <tr>
								            	<th style="text-align: center; font-size: 11px; height: 10px; width: 3%;">#</th>
								            	<th style="text-align: center; font-size: 11px; height: 10px; width: 9%;">N° de Matricula</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">Alumno</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 15%;">Tipo Matricula</th>		
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">Fecha Matricula</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 8%;">Monto Total</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">Estado</th>
								                <th style="text-align: center; font-size: 11px; height: 10px; width: 10%;">Operaciones</th>					                
								            </tr>
								           
										</thead>

										<tbody id="cuerpoTabla">																	
										</tbody>
									</table>
								</div>
							</div>							
								<!-- FIN DE CONTENIDO DE PAGINA -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
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
		
		<script src="../../js/bootbox.min.js"></script>
		<script type="text/javascript" src="../../js/bootbox.min.js"></script>

		<script src="../js/gestionarMatricula.js"></script>	
		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});											
				}							
			});
		</script>
	</body>
</html>
