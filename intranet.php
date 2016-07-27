
<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		header("Location:View/principal.php");
	} else {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>INICIAR SESION</title>
		<meta name="description" content="User login page" />
		<meta name="Viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="View/default/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="View/default/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="View/default/assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="View/default/assets/css/chosen.min.css" />
		<link rel="stylesheet" href="View/default/assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="View/default/assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="View/default/assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="View/default/assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="View/default/assets/css/colorpicker.min.css" />

		<link rel="stylesheet" href="View/default/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="View/default/assets/js/ace-extra.min.js"></script>
	</head>

<body class="login-layout light-login">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
				<br><br><br><br>
					<div class="center">
						<h1>
							<i class="ace-icon fa fa-scissors red"></i>
							<span class="red">EDITH CÓRDOVA</span>
							<span class="grey" id="id-text2">STUDIO</span>
						</h1>
						<h4 class="blue" id="id-company-text">Application  Zentrumcity &copy; 2016</h4>
					</div><br>						
					<div class="login-container">
						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-pencil blue"></i>
											Por favor introduzca sus datos
										</h4>

										<div class="space-6"></div>

										<form action="Controller/controlUsuario/usuario.php" method="post" role="form">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" placeholder="Usuario" name="usuario" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" placeholder="Contraseña" name="password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>
												<input type="hidden" name="opcion" value="login" >

												<div class="clearfix">
													<!--label class="inline">
														<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
													</label-->
													<button type="submit" class="width-45 pull-right btn btn-sm btn-primary" data-loading-text="Loading...">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Iniciar Sesión</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->

									<div class="toolbar clearfix">
										<div class="col-sm-offset-6">
											<a href="View/Cliente/registro_cliente.php" class="user-signup-link">
												
												
											</a>
										</div>
									</div>
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->
						</div><!-- /.position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->


		<!-- basic scripts -->

		<!--[if !IE]> -->
	<script src="View/default/assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
	<script type="text/javascript">
			window.jQuery || document.write("<script src='View/default/assets/js/jquery.min.js'>"+"<"+"/script>");
	</script>

	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='View/default/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="View/default/assets/js/bootstrap.min.js"></script>

	<script src="View/default/assets/js/chosen.jquery.min.js"></script>
	<script src="View/default/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="View/default/assets/js/bootstrap-timepicker.min.js"></script>
	<script src="View/default/assets/js/daterangepicker.min.js"></script>
	<script src="View/default/assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="View/default/assets/js/bootstrap-colorpicker.min.js"></script>


	<script src="View/default/assets/js/ace-elements.min.js"></script>
		<script src="View/default/assets/js/ace.min.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='View/default/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });

			$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

			$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});

			});
		</script>
	</body>
</html>

<?php
	}
?>
