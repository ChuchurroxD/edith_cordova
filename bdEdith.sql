
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_combos`(IN `opcion` VARCHAR(200))
    NO SQL
BEGIN
  IF opcion = 'opc_combo_linea' THEN
      SELECT LIN_id, LIN_descripcion FROM linea where LIN_estado = 1 order by LIN_descripcion asc;
    END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_control_usuario`(IN `opcion` VARCHAR(200), IN `usuario` VARCHAR(100), IN `clave` VARCHAR(100))
    NO SQL
BEGIN   
  IF opcion='opc_login_respuesta' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  usuario usu 
      WHERE 
        usu.USU_usuario = usuario AND
        usu.USU_password = clave);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT 'Usuario o clave incorrectos' AS 'respuesta';
      END IF;
  END IF;
  IF opcion='opc_login_listar' THEN
    SELECT U.USU_usuario, U.USU_password, U.USU_id FROM usuario U WHERE U.USU_usuario=usuario AND U.usu_password=clave;
  END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_gestion_alumnos`(IN `opcion` VARCHAR(100), IN `alumno` INT, IN `persona` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_listar_alumnosLibres' THEN
      SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) as Nombres, P.PER_dni, P.PER_email, P.PER_telefono, AL.LIB_fechaInscripcion, AL.LIB_automaquillaje, AL.LIB_peinados, AL.LIB_estado, AL.LIB_id, P.PER_id FROM persona P INNER JOIN tipo_alumno TP ON TP.TIPAL_id = P.TIPAL_id INNER JOIN alumno_libre AL ON AL.PER_id = P.PER_id WHERE TP.TIPAL_id = 2;
    END IF;
    IF opcion = 'opc_listar_alumnosProfesionales' THEN
      SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) as Nombres, P.PER_email, P.PER_telefono, AP.PRO_fechaInscripcion, AP.PRO_acabadoPerfecto, AP.PRO_capilar, AP.PRO_corte, AP.PRO_maquillaje, AP.PRO_estado, AP.PRO_id, P.PER_id FROM persona P INNER JOIN tipo_alumno TP ON TP.TIPAL_id = P.TIPAL_id INNER JOIN alumno_profesional AP ON AP.PER_id = P.PER_id WHERE TP.TIPAL_id = 1;
    END IF;
    IF opcion = 'opc_listar_formacionInicial' THEN
      SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) as Nombres, P.PER_dni, P.PER_email, P.PER_telefono, I.INI_inscripcion, I.INI_estado, I.INI_id, P.PER_id FROM persona P INNER JOIN tipo_alumno TP ON TP.TIPAL_id = P.TIPAL_id INNER JOIN alumno_inicial I ON I.PER_id = P.PER_id WHERE TP.TIPAL_id = 4;
    END IF;
    IF opcion = 'opc_listar_egresados' THEN
      SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) as Nombres, P.PER_dni, P.PER_email, P.PER_telefono, E.EGR_fechaInscripcion, E.EGR_estado, E.EGR_id, P.PER_id FROM persona P INNER JOIN tipo_alumno TP ON TP.TIPAL_id = P.TIPAL_id INNER JOIN alumno_egresados E ON E.PER_id = P.PER_id WHERE TP.TIPAL_id = 3;
    END IF;
    IF opcion = 'opc_listar_charlas' THEN
      SELECT CONCAT(P.PER_nombres,' ',P.PER_apellidos) as Nombres, P.PER_dni, P.PER_email, P.PER_telefono, c.CHA_fechaInscripcion, C.CHA_estado, C.CHA_id, P.PER_id FROM persona P INNER JOIN tipo_alumno TP ON TP.TIPAL_id = P.TIPAL_id INNER JOIN alumno_charlas C ON C.PER_id = P.PER_id   WHERE TP.TIPAL_id = 5;
      END IF;
       IF opcion = 'opc_gestionar_charlas' THEN
      UPDATE alumno_charlas SET CHA_estado = 1 WHERE CHA_id = alumno;
    END IF;
    IF opcion = 'opc_gestionar_profesionales' THEN
      UPDATE alumno_profesional SET PRO_estado = 1 WHERE PRO_id = alumno;
    END IF;
    IF opcion = 'opc_gestionar_egresados' THEN
      UPDATE alumno_egresados SET EGR_estado = 1 WHERE EGR_id = alumno;
    END IF;
    IF opcion = 'opc_gestionar_inicial' THEN
      UPDATE alumno_inicial SET INI_estado = 1 WHERE INI_id = alumno;
    END IF;
    IF opcion = 'opc_gestionar_libres' THEN
      UPDATE alumno_libre SET LIB_estado = 1 WHERE LIB_id = alumno;
    END IF;
    IF opcion='opc_consulta_respuesta' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  alumno_charlas WHERE CHA_estado = 1 AND CHA_id = alumno);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT '0' AS 'respuesta';
      END IF;
  END IF;
    IF opcion = 'opc_eliminar_charlas' THEN
        DELETE FROM alumno_charlas WHERE CHA_id = alumno;
      DELETE FROM persona WHERE PER_id = persona;      
    END IF;
    IF opcion='opc_consulta_respuestaPRO' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  alumno_profesional WHERE PRO_estado = 1 AND PRO_id = alumno);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT '0' AS 'respuesta';
      END IF;
  END IF;
    IF opcion = 'opc_eliminar_profesionales' THEN
        DELETE FROM alumno_profesional WHERE PRO_id = alumno;
      DELETE FROM persona WHERE PER_id = persona;      
    END IF;
    IF opcion='opc_consulta_respuestaEGRE' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  alumno_egresados WHERE EGR_estado = 1 AND EGR_id = alumno);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT '0' AS 'respuesta';
      END IF;
  END IF;
    IF opcion = 'opc_eliminar_egresado' THEN
        DELETE FROM alumno_egresados WHERE EGR_id = alumno;
      DELETE FROM persona WHERE PER_id = persona;      
    END IF;
    IF opcion='opc_consulta_respuestaINI' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  alumno_inicial WHERE INI_estado = 1 AND INI_id = alumno);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT '0' AS 'respuesta';
      END IF;
  END IF;
    IF opcion = 'opc_eliminar_inicial' THEN
        DELETE FROM alumno_inicial WHERE INI_id = alumno;
      DELETE FROM persona WHERE PER_id = persona;      
    END IF;
    IF opcion='opc_consulta_respuestaLIB' THEN
      SET @CORRECTO = (SELECT COUNT(*) 
      FROM  alumno_libre WHERE LIB_estado = 1 AND LIB_id = alumno);
      IF @CORRECTO>0 THEN
        SELECT '1' AS 'respuesta';
      ELSE
        SELECT '0' AS 'respuesta';
      END IF;
  END IF;
    IF opcion = 'opc_eliminar_libre' THEN
        DELETE FROM alumno_libre WHERE LIB_id = alumno;
      DELETE FROM persona WHERE PER_id = persona;      
    END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_gestion_detalle_matricula`(IN `opcion` VARCHAR(200), IN `curso` INT, IN `duracion` INT, IN `descuento` INT, IN `montoCurso` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_grabar_detalle_matricula' THEN
      SET @MATRICULA = (SELECT MAX(MAT_id) AS id FROM matricula);
      INSERT INTO detalle_matricula(SER_id, MAT_id, DETMAT_descuentoPorc, DETMAT_duracion, DETMAT_montoTotal) VALUES (curso, @MATRICULA, descuento, duracion, montoCurso);
    END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_gestion_matricula`(IN `opcion` VARCHAR(200), IN `linea` INT, IN `alumno` INT, IN `usuario` INT, IN `monto` DOUBLE)
    NO SQL
BEGIN 
  IF opcion = 'opc_grabar_matricula' THEN
      INSERT INTO matricula(LIN_id, PER_id, USU_id, MAT_fechaHoraEmision, MAT_monto, MAT_estado) VALUES (linea, alumno, usuario, now(), monto,0);
    END IF;

  IF opcion = 'opc_matricula_listar' THEN
      SELECT M.MAT_id AS 'N° de Matricula', CONCAT(P.PER_nombres,'',P.PER_apellidos) AS Alumno, L.LIN_descripcion AS 'Tipo de Matricula', DATE(M.MAT_fechaHoraEmision) AS 'Fecha', M.MAT_monto AS Monto, M.MAT_estado AS Estado FROM matricula M INNER JOIN persona P ON P.PER_id = M.PER_id INNER JOIN linea L ON L.LIN_id = M.LIN_id;
    END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_listado`(IN `opcion` VARCHAR(200), IN `linea` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_listar_alumnos' THEN
      SELECT P.PER_id, CONCAT(P.PER_nombres,' ',P.PER_apellidos)AS Alumno, P.PER_dni, P.PER_fechaInscripcion FROM persona P WHERE P.TIPAL_id = linea;
    END IF;
    IF opcion = 'opc_listar_cursos' THEN
      SELECT S.SER_id, S.SER_descripcion, S.SER_precio, S.SER_duracion FROM servicios S WHERE S.LIN_id = linea;
    END IF;
END$$

CREATE DEFINER=`ecs`@`localhost` PROCEDURE `sp_registro_alumnos`(IN `opcion` VARCHAR(200), IN `nombres` VARCHAR(200), IN `apellidos` VARCHAR(200), IN `dni` VARCHAR(08), IN `direccion` VARCHAR(200), IN `email` VARCHAR(200), IN `telefono` VARCHAR(100), IN `empresa` VARCHAR(200), IN `cargo` VARCHAR(100), IN `capilar` INT, IN `corte` INT, IN `acabadoPerfecto` INT, IN `maquillaje` INT, IN `automaquillaje` INT, IN `peinados` INT)
    NO SQL
BEGIN
  IF opcion = 'registro_profesional' THEN
      INSERT INTO persona (PER_nombres, PER_apellidos, PER_dni, PER_direccion, PER_email, PER_telefono, PER_fechaInscripcion, TIPAL_id) VALUES (nombres, apellidos, dni, direccion, email, telefono, now(), 1);
        SET @PERSONA = (SELECT MAX(PER_id) AS id FROM persona);
        INSERT INTO alumno_profesional(PER_id, PRO_empresa, PRO_cargo, PRO_capilar, PRO_acabadoPErfecto, PRO_corte, PRO_maquillaje, PRO_fechaInscripcion,PRO_estado) VALUES (@PERSONA, empresa, cargo, capilar, acabadoPerfecto, corte, maquillaje,now(),0);
    END IF;
    IF opcion = 'registro_libre' THEN
      INSERT INTO persona (PER_nombres, PER_apellidos, PER_dni, PER_direccion, PER_email, PER_telefono,PER_fechaInscripcion,TIPAL_id) VALUES (nombres, apellidos, dni, direccion, email, telefono,now(), 2);
        SET @PERSONA = (SELECT MAX(PER_id) AS id FROM persona);
        INSERT INTO alumno_libre(PER_id, LIB_automaquillaje, LIB_peinados,LIB_fechaInscripcion, LIB_estado) VALUES (@PERSONA, automaquillaje, peinados,now(),0);
    END IF;
    IF opcion = 'registro_inicial' THEN
      INSERT INTO persona (PER_nombres, PER_apellidos, PER_dni, PER_direccion, PER_email, PER_telefono, PER_fechaInscripcion, TIPAL_id) VALUES (nombres, apellidos, dni, direccion, email, telefono,now(), 4);
      SET @PERSONA = (SELECT MAX(PER_id) AS id FROM persona);
        INSERT INTO alumno_inicial(PER_id, INI_inscripcion, INI_estado) VALUES (@PERSONA, now(),0);
    END IF;
    IF opcion = 'registro_egresados' THEN
      INSERT INTO persona (PER_nombres, PER_apellidos, PER_dni, PER_direccion, PER_email, PER_telefono, PER_fechaInscripcion,TIPAL_id) VALUES (nombres, apellidos, dni, direccion, email, telefono,now(), 3);
      SET @PERSONA = (SELECT MAX(PER_id) AS id FROM persona);
        INSERT INTO alumno_egresados(PER_id, EGR_fechaInscripcion, EGR_estado) VALUES (@PERSONA, now(),0);
    END IF;
    IF opcion = 'registro_charlas' THEN
      INSERT INTO persona (PER_nombres, PER_apellidos, PER_dni, PER_direccion, PER_email, PER_telefono,PER_fechaInscripcion, TIPAL_id) VALUES (nombres, apellidos, dni, direccion, email, telefono,now(), 5);
      SET @PERSONA = (SELECT MAX(PER_id) AS id FROM persona);
        INSERT INTO alumno_charlas(PER_id, CHA_empresa,  CHA_cargo, CHA_fechaInscripcion,CHA_estado) VALUES (@PERSONA, empresa, cargo,now(), 0);
    END IF;
END$$

DELIMITER ;



CREATE TABLE IF NOT EXISTS tipo_alumno (
  TIPAL_id int(11) NOT NULL AUTO_INCREMENT,
  TIPAL_descripcion varchar(100) NOT NULL,
  PRIMARY KEY (TIPAL_id)
);

--
-- Volcado de datos para la tabla tipo_alumno
--

INSERT INTO tipo_alumno (TIPAL_id, TIPAL_descripcion) VALUES
(1, 'Alumnos Profesionales'),
(2, 'Alumnos Libres'),
(3, 'Alumnos recién egresados'),
(4, 'Alumnos Formación Inicial'),
(5, 'Charlas');


CREATE TABLE IF NOT EXISTS persona (
  PER_id                  int(11) NOT NULL AUTO_INCREMENT,
  PER_nombres             varchar(200) NOT NULL,
  PER_apellidos           varchar(200) NOT NULL,
  PER_dni                 varchar(8) NOT NULL,
  PER_direccion           varchar(200) NOT NULL,
  PER_email               varchar(200) NOT NULL,
  PER_fechaInscripcion    date NOT NULL,
  PER_telefono            varchar(200) NOT NULL,
  TIPAL_id                int(11) NOT NULL,
  PRIMARY KEY (PER_id),
  FOREIGN KEY (TIPAL_id) REFERENCES tipo_alumno(TIPAL_id)
);


CREATE TABLE IF NOT EXISTS alumno_libre (
  LIB_id                    int(11) NOT NULL AUTO_INCREMENT,
  PER_id                    int(11) NOT NULL,
  LIB_automaquillaje        int(11) NOT NULL,
  LIB_peinados              int(11) NOT NULL,
  LIB_fechaInscripcion      date,
  LIB_estado                int(11) NOT NULL,
  PRIMARY KEY (LIB_id),
  FOREIGN KEY (PER_id) REFERENCES persona(PER_id)

);


CREATE TABLE IF NOT EXISTS alumno_profesional (
  PRO_id                  int(11) NOT NULL AUTO_INCREMENT,
  PER_id                  int(11) NOT NULL,
  PRO_empresa             varchar(200) NOT NULL,
  PRO_cargo               varchar(50) NOT NULL,
  PRO_capilar             int(11) NOT NULL,
  PRO_corte               int(11) NOT NULL,
  PRO_acabadoPerfecto     int(11) NOT NULL,
  PRO_maquillaje          int(11) NOT NULL,
  PRO_fechaInscripcion    date,
  PRO_estado              int(11) NOT NULL,
  PRIMARY KEY (PRO_id),
  FOREIGN KEY (PER_id) REFERENCES persona(PER_id)
);

CREATE TABLE IF NOT EXISTS alumno_charlas (
  CHA_id                  int(11) NOT NULL AUTO_INCREMENT,
  PER_id                  int(11) NOT NULL,
  CHA_empresa             varchar(200) NOT NULL,
  CHA_cargo              varchar(50) NOT NULL,  
  CHA_fechaInscripcion    date DEFAULT NULL,
  CHA_estado              int(11) NOT NULL,
  PRIMARY KEY (CHA_id),
  FOREIGN KEY (PER_id) REFERENCES persona(PER_id)
);

CREATE TABLE IF NOT EXISTS alumno_inicial (
  INI_id                  int(11) NOT NULL AUTO_INCREMENT,
  PER_id                  int(11) NOT NULL, 
  INI_inscripcion         date DEFAULT NULL,
  INI_estado              int(11) NOT NULL,
  PRIMARY KEY (INI_id),
  FOREIGN KEY (PER_id) REFERENCES persona(PER_id)
);

CREATE TABLE IF NOT EXISTS alumno_egresados (
  EGR_id                  int(11) NOT NULL AUTO_INCREMENT,
  PER_id                  int(11) NOT NULL, 
  EGR_estado              int(11) NOT NULL,
  EGR_fechaInscripcion    date DEFAULT NULL,
  PRIMARY KEY (EGR_id),
  FOREIGN KEY (PER_id) REFERENCES persona(PER_id)
);

CREATE TABLE IF NOT EXISTS usuario (
  USU_id                  int(11) NOT NULL AUTO_INCREMENT,
  USU_usuario             varchar(100) NOT NULL,
  USU_password            varchar(100) NOT NULL,
  PRIMARY KEY (USU_id)
);

CREATE TABLE linea (
  LIN_id                  int not null auto_increment,
  LIN_descripcion         varchar(200) not null,    
  LIN_estado              int not null,    
  primary key (LIN_id)
);

INSERT INTO `linea` (`LIN_id`, `LIN_descripcion`, `LIN_estado`) VALUES
(1, 'Capacitación Profesional', 1),
(2, 'Cursos Libres', 1),
(3, 'Entrenamiento recién egresados', 1),
(4, 'Formación Inicial', 1),
(5, 'Charlas Informativas', 1);


CREATE TABLE servicios (
  SER_id                  int not null auto_increment,
  SER_descripcion         varchar(200) not null,
  SER_duracion            varchar(200) default null,
  SER_unidad              varchar(200) default null,
  SER_duracionHoras       int default null,
  SER_precio              double not null,
  SER_estado              int not null,
  LIN_id                  int not null,
  primary key (SER_id),
  foreign key (LIN_id) references linea(LIN_id)
);

INSERT INTO `servicios` (`SER_id`, `SER_descripcion`, `SER_duracion`, `SER_duracionHoras`, `SER_precio`, `SER_unidad`, `SER_estado`, `LIN_id`) VALUES
(1, 'Tratamiento Capilar', '1', 3, 190, 'día', 1, 1),
(2, 'Cortes de Estilista ', '1', 3, 250, 'día', 1, 1),
(3, 'Logrando el Acabado Perfecto', '1', 3, 190, 'día', 1, 1),
(4, 'Técnicas de Maquillaje Tradicional', '1', 3, 130, 'día', 1, 1),
(5, 'Maquillaje con Aerógrafo', '4', 12, 800, 'día', 1, 1),
(6, 'Automaquillaje', '1', NULL, 150, 'día', 1, 2),
(7, 'Tips de Peinados', '1', NULL, 150, 'día', 1, 2),
(8, 'Entrenamiento recien egresados', '7', NULL, 180, 'mes', 1, 3),
(9, 'Formación Básica e Intermedia', '12', NULL, 200, 'mes', 1, 4),
(10, 'Charlas Informativas', NULL, NULL, 0, NULL, 1, 5);


CREATE TABLE matricula (
  MAT_id                  int not null auto_increment,
  LIN_id                  int not null,
  PER_id                  int not null,
  USU_id                  int not null,
  MAT_monto               double,
  MAT_fechaHoraEmision    datetime,
  MAT_estado              int,
  primary key (MAT_id),
  foreign key (LIN_id) references linea(LIN_id),
  foreign key (PER_id) references persona(PER_id),
  foreign key (USU_id) references usuario(USU_id)
);

CREATE TABLE detalle_matricula (
  DETMAT_id               int not null auto_increment,
  MAT_id                  int not null,
  SER_id                  int not null,
  DETMAT_duracion         int default null,
  DETMAT_descuentoPorc    double,    
  DETMAT_montoTotal       double,
    primary key (DETMAT_id),
    foreign key (MAT_id) references matricula(MAT_id),
    foreign key (SER_id) references servicios(SER_id)
);

INSERT INTO usuario (USU_usuario, USU_password) VALUES ('administrador','202cb962ac59075b964b07152d234b70')