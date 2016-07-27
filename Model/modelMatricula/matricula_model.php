<?php 
    include_once '../../Model/conexion.php';
    class Matricula_Model {
        public $param = array();
        function __construct() {
            $this->conexion = Conexion::getConexion();
        }

        function cerrarAbrir(){
            mysqli_close($this->conexion);
            $this->conexion = Conexion::getConexion();
        }

        function gestionar($param) {
            $this->param = $param;
            switch ($this->param['param_opcion']) {               
                case 'comboLinea':
                    echo $this->comboLinea();
                    break;
                case 'mostrarMatriculas':
                    echo $this->mostrarMatriculas();
                    break;
                case 'listarAlumno':
                    echo $this->listarAlumno();
                    break;
                case 'listarCursos':
                    echo $this->listarCursos();
                    break;
                case 'listarHorarios':
                    echo $this->listarHorarios();
                    break;
                case 'grabarMatricula':
                    echo $this->registrarMatricula();
                    break;
                case "get":break;
            }
        }

        function prepararConsultaCombos($opcion) {
            $consultaSql = "call sp_combos(";
            $consultaSql.="'".$opcion . "')";
            //echo $consultaSql;
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }

        function prepararConsultaLista($opcion) {
            $consultaSql = "call sp_listado(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.="'".$this->param['param_linea']. "',";
            $consultaSql.="'".$this->param['param_codigoCurso']. "')";
            //echo $consultaSql;
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }

        function prepararConsultaMatricula($opcion) {
            $consultaSql = "call sp_gestion_matricula(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.="'".$this->param['param_linea']. "',";
            $consultaSql.="'".$this->param['param_idAlumno']. "',"; 
            $consultaSql.="". $this->param['param_usuario']. ",";
            $consultaSql.="'".$this->param['param_docdetMontoTotalMat']. "')";
            //echo $consultaSql;
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }

        function prepararConsultaDetalleMatricula($opcion, $curso, $duracion, $descuento, $montocurso, $horario) {
            $consultaSql = "call sp_gestion_detalle_matricula(";
            $consultaSql.="'".$opcion . "',";
            $consultaSql.= "'".$curso."',";
            $consultaSql.= "'".$duracion."',";
            $consultaSql.= "'".$descuento."',";
            $consultaSql.= "'".$montocurso."',";
            $consultaSql.= "'".$horario."')";
            //echo $consultaSql;
            $this->result = mysqli_query($this->conexion,$consultaSql);    
        }


       
        function comboLinea() {
            $this->prepararConsultaCombos('opc_combo_linea');
            $this->cerrarAbrir();
            echo '
                
                <select class="form-control" id="param_linea" name="param_linea">
                    <option value="" disabled selected style="display: none;">Seleccione su Tipo de Matrícula</option>';
             while ($fila = mysqli_fetch_row($this->result)) {
                echo'<option value="'.$fila[0].'">'.utf8_encode($fila[1]).'</option>';
            }
            echo '</select>';
        }

        function mostrarMatriculas() {
            $this->prepararConsultaMatricula('opc_matricula_listar');
            $this->cerrarAbrir();
            $item = 0;
            while($row = mysqli_fetch_row($this->result)){      
                $item ++;             
                echo '<tr>
                    <td style="font-size: 12px; height: 10px; width: 3%; text-align: center;">'.$item.'</td>
                    <td style="font-size: 12px; height: 10px; width: 9%; text-align: center;">'.$row[0].'</td>
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.$row[1].'</td> 
                    <td style="font-size: 12px; height: 10px; width: 15%; text-align: center;">'.utf8_encode($row[2]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">'.$row[3].'</td>   
                    <td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">'.$row[4].'</td>';   
                    if($row[5]==0){
                        echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-danger">PENDIENTE</span></td>';
                    } else {
                         echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;""><span class="label label-sm label-success">CANCELADO</span></td>';
                    }
                    echo '<td style="font-size: 11px; height: 10px; width: 10%; text-align: center;">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
                                    <span class="brown">
                                        <i class="ace-icon fa fa-eye bigger-150" onclick="gestionar();"></i>
                                    </span>
                                </a>  
                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Gestionar">
                                    <span class="blue">
                                        <i class="ace-icon fa fa-pencil bigger-150" onclick="gestionar();"></i>
                                    </span>
                                </a>                                            
                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                        <i class="ace-icon fa fa-money bigger-150" onclick="eliminar();"></i>
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
                                                <span class="brown">
                                                    <i class="ace-icon fa fa-eye bigger-120" onclick="gestionar();"></i>
                                                </span>
                                            </a>
                                            <a class="tooltip-error" data-rel="tooltip" title="Gestionar" >
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-pencil bigger-120" onclick="gestionar();"></i>
                                                </span>
                                            </a>                                            
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-money bigger-120" onclick="eliminar();"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>';                     
            }
        }

        function listarAlumno() {
            $this->prepararConsultaLista('opc_listar_alumnos');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){                  
                echo '<tr>
                    <td style="font-size: 12px; height: 10px; width: 4%; text-align: center;">'.$row[0].'</td>
                    <td style="font-size: 12px; height: 10px; width: 15%;">'.$row[1].'</td> 
                    <td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">'.$row[2].'</td>
                    <td style="font-size: 12px; height: 10px; width: 8%; text-align: center;">'.$row[3].'</td>';                     
            }
        }


        function listarCursos() {
            $this->prepararConsultaLista('opc_listar_cursos');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){                  
                echo '<tr>
                    <td style="font-size: 12px; height: 10px; width: 5%; text-align: center;">'.$row[0].'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%;">'.utf8_encode($row[1]).'</td>
                    <td style="font-size: 12px; height: 10px; width: 5%; text-align: center;"">'.$row[2].'</td>
                    <td style="font-size: 12px; height: 10px; width: 5%; text-align: center;"">'.$row[3].'</td>';                   
            }
        }


        function listarHorarios() {
            $this->prepararConsultaLista('opc_listar_horarios');
            $this->cerrarAbrir();
            while($row = mysqli_fetch_row($this->result)){                  
                echo '<tr>
                    <td style="font-size: 12px; height: 10px; width: 5%; text-align: center;">'.$row[4].'</td>
                    <td style="font-size: 12px; height: 10px; width: 5%; text-align: center;">'.$row[0].'</td>
                    <td style="font-size: 12px; height: 10px; width: 10%; text-align: center;"">'.$row[1].'</td>
                    <td style="font-size: 12px; height: 10px; width: 4%; text-align: center;">'.$row[2].'</td>
                    <td style="font-size: 12px; height: 10px; width: 4%; text-align: center;">'.$row[3].'</td>';                   
            }
        }


        function registrarMatricula() {
            $this->prepararConsultaMatricula('opc_grabar_matricula');
            //echo(count($this->param['param_numeroDetalleMatricula']));
            for($i=0; $i<count($this->param['param_numeroDetalleMatricula']); $i++) {                        
                $curso                  = $this->param['param_codigoCurso'][$i];
                $horario                = $this->param['param_idHorario'][$i];
                $duracion               = $this->param['param_duracion'][$i];
                $descuento              = $this->param['param_matriculaDescuentoPorc'][$i];
                $montocurso             = $this->param['param_matriculaMontoTotal'][$i];
                $this->prepararConsultaDetalleMatricula('opc_grabar_detalle_matricula', $curso, $duracion, $descuento, $montocurso, $horario);
            }
        }





    }

?>