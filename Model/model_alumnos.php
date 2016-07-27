<?php 
	include 'conexion.php';

	
	class Alumno_Model {
		
		public $param = array();

		function __construct() {
			$this->conexion = Conexion::getConexion();
		}

		function cerrarAbrir() {
			mysqli_close($this->conexion);
			$this->conexion = Conexion::getConexion();
		}

		function gestionar($param) {
			$this->param = $param;

			switch ($this->param['opcion']) {
				case 'Profesionales':
					echo $this->registro_profesionales();
					break;
				case 'CursosLibres':
					echo $this->registro_libres();
					break;
				case 'formacionInicial':
					echo $this->registro_inicial();
					break;
				case 'egresados':
					echo $this->registro_egresados();
					break;
				case 'Charlas':
					echo $this->registro_charlas();
					break;
				case 'listaralumnosLibres':
					echo $this->listarAlumnosLibres();
					break;
				case 'listaralumnosProfesionales':
					echo $this->listaralumnosProfesionales();
					break;
				case 'listarFomacionInicial':
					echo $this->listarFomacionInicial();
					break;		
				case 'listarEgresados':
					echo $this->listarEgresados();;
					break;
				case 'listarCharlas':
					echo $this->listarCharlas();
					break;
				case 'gestionarCharlas':
					echo $this->gestionarCharlas();
					break;
				case 'gestionarProfesionales':
					echo $this->gestionarProfesionales();
					break;
				case 'gestionarEgresados':
					echo $this->gestionarEgresados();
					break;
				case 'gestionarInicial':
					echo $this->gestionarInicial();
					break;
				case 'gestionarLibres':
					echo $this->gestionarLibres();
					break;
				case 'eliminarAlumnoCharlas':
					echo $this->eliminarAlumnoCharlas();
					break;
				case 'eliminarAlumnoProfesionales':
					echo $this->eliminarAlumnoProfesionales();
					break;
				case 'eliminarAlumnoEgresado':
					echo $this->eliminarAlumnoEgresado();
					break;
				case 'eliminarAlumnoInicial':
					echo $this->eliminarAlumnoInicial();
					break;
				case 'eliminarAlumnoLibre':
					echo $this->eliminarAlumnoLibre();
					break;
				case "get":break;
			}
		} 

		function prepararRegistro($opcion = '') {
			$consultaSql = 'call sp_registro_alumnos(';
	        $consultaSql.='"'.$opcion . '",';
	        $consultaSql.='"'.$this->param['nombre'] . '",';
	        $consultaSql.='"'.$this->param['apellido'] . '",';
	        $consultaSql.='"'.$this->param['dni'] . '",';
	        $consultaSql.='"'.$this->param['direccion'] . '",';
	        $consultaSql.='"'.$this->param['telefono'] . '",';
	        $consultaSql.='"'.$this->param['email'] . '",';
	        $consultaSql.='"'.$this->param['empresa'] . '",';
	        $consultaSql.='"'.$this->param['cargo'] . '",';
	        $consultaSql.='"'.$this->param['capilar'] . '",';
	        $consultaSql.='"'.$this->param['corte'] . '",';
	        $consultaSql.='"'.$this->param['acabadoPerfecto'] . '",';        
	        $consultaSql.='"'.$this->param['maquillaje'] . '",'; 
	        $consultaSql.='"'.$this->param['automaquillaje'] . '",'; 
	        $consultaSql.='"'.$this->param['peinados'] . '")';        
	        //echo $consultaSql;
	        $this->result = mysqli_query($this->conexion,$consultaSql);
		}

		
		function prepararConsultaMostrarAlumnos($opcion='') {
	        $consultaSql = "call sp_gestion_alumnos(";
	        $consultaSql.="'".$opcion . "',";	  
	        $consultaSql.="'".$this->param['id'] . "',";  
	        $consultaSql.="'".$this->param['persona'] . "')";  
	        //echo $consultaSql;
	        $this->result = mysqli_query($this->conexion,$consultaSql);
	    }

	    function ejecutarConsultaRespuesta() {
        $respuesta = '';
        while ($fila = mysqli_fetch_array($this->result)) {
            $respuesta = $fila["respuesta"];
        }
        return $respuesta;
    }

		function registro_profesionales() {
	        $this->prepararRegistro('registro_profesional');	        
	        echo 1;
	    }	

	    function registro_libres() {
	        $this->prepararRegistro('registro_libre');       
	        echo 1;
	    }


	    function registro_inicial() {
	        $this->prepararRegistro('registro_inicial');       
	        echo 1;
	    }	       

	    function registro_egresados() {
	        $this->prepararRegistro('registro_egresados');       
	        echo 1;
	    }

	    function registro_charlas() {
	        $this->prepararRegistro('registro_charlas');       
	        echo 1;
	    }

	    function gestionarCharlas() {
	        $this->prepararConsultaMostrarAlumnos('opc_gestionar_charlas');       
	        echo 1;
	    } 

	    function gestionarProfesionales() {
	        $this->prepararConsultaMostrarAlumnos('opc_gestionar_profesionales');       
	        echo 1;
	    } 

	    function gestionarEgresados() {
	        $this->prepararConsultaMostrarAlumnos('opc_gestionar_egresados');       
	        echo 1;
	    } 

	    function gestionarInicial() {
	        $this->prepararConsultaMostrarAlumnos('opc_gestionar_inicial');       
	        echo 1;
	    } 

	    function gestionarLibres() {
	        $this->prepararConsultaMostrarAlumnos('opc_gestionar_libres');       
	        echo 1;
	    }

	    function eliminarAlumnoCharlas() {
	    	$this->prepararConsultaMostrarAlumnos('opc_consulta_respuesta'); 
	        $respuesta = $this->ejecutarConsultaRespuesta();
	        if ($respuesta == '1') {
	            //echo 'NO SE PUEDE ELIMINAR';
	            echo 0;
	            
	        } else {
	        	//echo 'SI SE PUEDE ELIMINAR';
	            $this->cerrarAbrir();
	            $this->prepararConsultaMostrarAlumnos('opc_eliminar_charlas');
	            echo 1;
	            
	        }
	    }

	    function eliminarAlumnoProfesionales() {
	    	$this->prepararConsultaMostrarAlumnos('opc_consulta_respuestaPRO'); 
	        $respuesta = $this->ejecutarConsultaRespuesta();
	        if ($respuesta == '1') {
	            //echo 'NO SE PUEDE ELIMINAR';
	            echo 0;
	            
	        } else {
	        	//echo 'SI SE PUEDE ELIMINAR';
	            $this->cerrarAbrir();
	            $this->prepararConsultaMostrarAlumnos('opc_eliminar_profesionales');
	            echo 1;
	            
	        }
	    }

	    function eliminarAlumnoEgresado() {
	    	$this->prepararConsultaMostrarAlumnos('opc_consulta_respuestaEGRE'); 
	        $respuesta = $this->ejecutarConsultaRespuesta();
	        if ($respuesta == '1') {
	            //echo 'NO SE PUEDE ELIMINAR';
	            echo 0;
	            
	        } else {
	        	//echo 'SI SE PUEDE ELIMINAR';
	            $this->cerrarAbrir();
	            $this->prepararConsultaMostrarAlumnos('opc_eliminar_egresado');
	            echo 1;
	            
	        }
	    }

	    function eliminarAlumnoInicial() {
	    	$this->prepararConsultaMostrarAlumnos('opc_consulta_respuestaINI'); 
	        $respuesta = $this->ejecutarConsultaRespuesta();
	        if ($respuesta == '1') {
	            //echo 'NO SE PUEDE ELIMINAR';
	            echo 0;
	            
	        } else {
	        	//echo 'SI SE PUEDE ELIMINAR';
	            $this->cerrarAbrir();
	            $this->prepararConsultaMostrarAlumnos('opc_eliminar_inicial');
	            echo 1;
	            
	        }
	    }

	    function eliminarAlumnoLibre() {
	    	$this->prepararConsultaMostrarAlumnos('opc_consulta_respuestaLIB'); 
	        $respuesta = $this->ejecutarConsultaRespuesta();
	        if ($respuesta == '1') {
	            //echo 'NO SE PUEDE ELIMINAR';
	            echo 0;
	            
	        } else {
	        	//echo 'SI SE PUEDE ELIMINAR';
	            $this->cerrarAbrir();
	            $this->prepararConsultaMostrarAlumnos('opc_eliminar_libre');
	            echo 1;
	            
	        }
	    }

	    function listarAlumnosLibres() {
	    	$item = 0;
	    	$this->prepararConsultaMostrarAlumnos('opc_listar_alumnosLibres');     	
	    	while($row = mysqli_fetch_row($this->result)){   
	    		$item ++; 		
				echo '<tr>
						<td style="font-size: 11px; height: 10px; width: 4%; text-align: center;">'.$item.'</td>
						<td style="font-size: 11px; height: 10px; width: 15%;">'.$row[0].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[1].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[2].'</td>
						<td style="font-size: 11px; height: 10px; width: 14%;">'.$row[3].'</td>
						<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">'.date('d-m-Y',strtotime($row[4])).'</td>';
						if($row[5]==1){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }

                        if($row[6]==1){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }                                      
						if($row[7]==0){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">NO GESTIONADO</span></td>';
                        } else {
                        	echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">GESTIONADO</span></td>';
						}
						echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
									<span class="blue">
										<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[8].');"></i>
									</span>
								</a>											
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[8].','.$row[9].');"></i>
									</span>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a class="tooltip-error" data-rel="tooltip" title="Gestionar" >
												<span class="blue">
													<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[8].');"></i>
												</span>
											</a>											
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[8].','.$row[9].');"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>';
			}
		}
		//date("Y-m-d",strtotime($this->param['vencimiento']))
		function listaralumnosProfesionales() {
	    	$item = 0;
	    	$this->prepararConsultaMostrarAlumnos('opc_listar_alumnosProfesionales');     	
	    	while($row = mysqli_fetch_row($this->result)){   
	    		$item ++; 		
				echo '<tr>
						<td style="font-size: 11px; height: 10px; width: 4%; text-align: center;">'.$item.'</td>
						<td style="font-size: 11px; height: 10px; width: 15%;">'.$row[0].'</td>						
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[1].'</td>
						<td style="font-size: 11px; height: 10px; width: 14%;">'.$row[2].'</td>
						<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">'.date('d-m-Y',strtotime($row[3])).'</td>';

						if($row[4]==1){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }

                        if($row[5]==1){
                            echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }

                        if($row[6]==1){
                            echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }

                        if($row[7]==1){
                            echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/check_.png"/>
                              </td>';
                        } else {
                        	 echo '<td style="font-size: 11px; height: 7px; width: 8%; text-align: center;">
                                <img src="../../img/delete.png"/>
                              </td>';
                        }							
						if($row[8]==0){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">NO GESTIONADO</span></td>';
                        } else {
                        	echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">GESTIONADO</span></td>';
						}
						echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
									<span class="blue">
										<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[9].');"></i>
									</span>
								</a>											
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[9].','.$row[10].');"></i>
									</span>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a class="tooltip-error" data-rel="tooltip" title="Gestionar" >
												<span class="blue">
													<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[9].');"></i>
												</span>
											</a>											
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[9].','.$row[10].');"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>';
			}
		}

		function listarFomacionInicial() {
	    	$item = 0;
	    	$this->prepararConsultaMostrarAlumnos('opc_listar_formacionInicial');     	
	    	while($row = mysqli_fetch_row($this->result)){   
	    		$item ++; 		
				echo '<tr>
						<td style="font-size: 11px; height: 10px; width: 4%; text-align: center;">'.$item.'</td>
						<td style="font-size: 11px; height: 10px; width: 15%;">'.$row[0].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[1].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[2].'</td>
						<td style="font-size: 11px; height: 10px; width: 14%;">'.$row[3].'</td>
						<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">'.date('d-m-Y',strtotime($row[4])).'</td>';
						if($row[5]==0){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">NO GESTIONADO</span></td>';
                        } else {
                        	echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">GESTIONADO</span></td>';
						}
						echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
									<span class="blue">
										<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[6].');"></i>
									</span>
								</a>											
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
									</span>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar" >
												<span class="blue">
													<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar();"></i>
												</span>
											</a>											
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>';
			}
		}


		function listarEgresados() {
	    	$item = 0;
	    	$this->prepararConsultaMostrarAlumnos('opc_listar_egresados');     	
	    	while($row = mysqli_fetch_row($this->result)){   
	    		$item ++; 		
				echo '<tr>
						<td style="font-size: 11px; height: 10px; width: 4%; text-align: center;">'.$item.'</td>
						<td style="font-size: 11px; height: 10px; width: 15%;">'.$row[0].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[1].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[2].'</td>
						<td style="font-size: 11px; height: 10px; width: 14%;">'.$row[3].'</td>
						<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">'.date('d-m-Y',strtotime($row[4])).'</td>';
						if($row[5]==0){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">NO GESTIONADO</span></td>';
                        } else {
                        	echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">GESTIONADO</span></td>';
						}
						echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
									<span class="blue">
										<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[6].');"></i>
									</span>
								</a>											
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
									</span>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar" >
												<span class="blue">
													<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar();"></i>
												</span>
											</a>											
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>';
			}
		}

		function listarCharlas() {
	    	$item = 0;
	    	$this->prepararConsultaMostrarAlumnos('opc_listar_charlas');     	
	    	while($row = mysqli_fetch_row($this->result)){   
	    		$item ++; 		
				echo '<tr>
						<td style="font-size: 11px; height: 10px; width: 4%; text-align: center;">'.$item.'</td>
						<td style="font-size: 11px; height: 10px; width: 15%;">'.$row[0].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[1].'</td>
						<td style="font-size: 11px; height: 10px; width: 8%; text-align: center;">'.$row[2].'</td>
						<td style="font-size: 11px; height: 10px; width: 14%;">'.$row[3].'</td>
						<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">'.date('d-m-Y',strtotime($row[4])).'</td>';
						if($row[5]==0){
                            echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">NO GESTIONADO</span></td>';
                        } else {
                        	echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">GESTIONADO</span></td>';
						}
						echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
									<span class="blue">
										<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[6].');"></i>
									</span>
								</a>											
								<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
									</span>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar" >
												<span class="blue">
													<i class="ace-icon fa fa-phone bigger-120" onclick="gestionar('.$row[6].');"></i>
												</span>
											</a>											
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120" onclick="eliminar('.$row[6].','.$row[7].');"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>';
			}
		}
	  
	}
?>

