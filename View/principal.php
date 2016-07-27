<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location:../intranet.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SISTEMA SEGUROS</title>
	<link rel="stylesheet" href="default/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="default/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="default/assets/fonts/fonts.googleapis.com.css" />
	<link rel="stylesheet" href="default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<script src="default/assets/js/ace-extra.min.js"></script>
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
					<a href="principal.php" class="navbar-brand">
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
									<?php echo $_SESSION["usuario"] ?>
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
									<a href="../Controller/controlUsuario/cerrar_sesion.php">
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
						<i class="ace-icon fa fa-bars" style="font-size: 25px"></i>
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
								<a href="Alumnos/charlas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Charlas Informativas
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="Alumnos/alumnosProfesionales.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Cursos Profesionales
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="Alumnos/alumnosEgresados.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Cursos para Egresados
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="Alumnos/formacionInicial.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Formación Inicial
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="Alumnos/alumnosLibres.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Cursos Libres
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Matricula</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="Matricula/gestionarMatricula.php"><i class="menu-icon fa fa-plus"></i>Gestionar Matricula</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#"><i class="menu-icon fa fa-list"></i><L>Listar Matriculas</L></a>
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
								<a href="#">Home</a>
							</li>

						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="jumbotron">
			                        <h1 class="text-center">BIENVENIDO</h1>
			                    </div>
			                    <div class="col-md-6"><br><br>
				                    <img src="../img/ggg1.png" class="img-responsive" style="width: 504px; padding-left: 10px; margin-left: 300px;">
				                </div>
								<!-- CONTENIDO DE LA PAGINA -->
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

		<script src="default/assets/js/jquery.2.1.1.min.js"></script>


		<script type="text/javascript">
			window.jQuery || document.write("<script src='default/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='default/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="default/assets/js/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="default/assets/js/ace-elements.min.js"></script>
		<script src="default/assets/js/ace.min.js"></script>
	</body>
</html>
