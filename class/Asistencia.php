<?php
    require_once 'Conexion.php';

    class Asistencia{
        
        private $asistencia_id;
        private $employee_id;
        private $entrada;
        private $salida;

        /*Atrbutos de validacion en procedimientos almacenados
            Estos atributos guardan el valor devuelto por el procedimiento almacenado SQL (no todos los procedimientos almacenados manejan variables de salida)
        */
        private $validacion_error;
        private $tipo_error;
        private $mensaje;

        CONST TABLA = 'ASISTENCIAS';


        //********************************* Getters
        public function getAsistenciaId(){
            return $this->asistencia_id;
        }

        public function getEmployeeId(){
            return $this->employee_id;
        }

        public function getEntrada(){
            return $this->entrada;
        }

        public function getSalida(){
            return $this->salida;
        }

        

        
        public function getValidacionError(){
            return $this->validacion_error;
        }

        public function getTipoError(){
            return $this->tipo_error;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        //********************************* Setters

        public function setAsistenciaId ($asistencia_id){
            $this->asistencia_id = $asistencia_id;
        }

        public function setEmployeeId ($employee_id){
            $this->employee_id = $employee_id;
        }

        public function setEntrada ($entrada){
            $this->entrada = $entrada;
        }

        public function setSalida ($salida){
            $this->salida = $salida;
        }

        

        public function setValidacionError ($validacion_error){
            $this->validacion_error = $validacion_error;
        }

        public function setTipoError ($tipo_error){
            $this->tipo_error = $tipo_error;
        }

        public function setMensaje ($mensaje){
            $this->mensaje = $mensaje;
        }
        //*********************** */
        

        //CONSULTAR historial de asistencias de empleado
        public function consultarHistorialAsistencias(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL HISTORIAL_ASISTENCIA_EMP(?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i",$this->employee_id);
            //Ejecucion de la sentencia SQL
            $sentencia->execute();
            //Almacenamiento de datos recuperados de la consulta
            //Obtiene todas las filas de resultados como una matriz asociativa, numérica o ambas
            $resultado = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
            
            //Se libera el espacio en memoria utilizado
            $sentencia->close();
            //Se cierra la conexión con la BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex=null;
            return $resultado;
        }

        //***** Funcion para registrar Asietcnia de empleado a traves de un procedimiento almacenado
        public function registrarAsistencia(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_ASISTENCIA(?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i", $this->employee_id);
            //Ejecucion de sentencia preparada SQL (resultado se almacena en una variable)
            //Almacena un booleano dependiendo de si es exitoso o fallido la ejecución
            $resultado = $sentencia->execute();

            //Recuperar valor devuelto por el procedimiento almacenado
            $query_validacion = "SELECT @VALIDACION_ERROR AS VALIDACION_ERROR, @TIPO_ERROR AS TIPO_ERROR, @MENSAJE AS MENSAJE;";
            $cursor = $conexion->query($query_validacion); //Se realiza la consulta de la variable de salida del procedimineto almacenado
            $resultadoValidacion = $cursor->fetch_all(MYSQLI_ASSOC);  //El resultado de la consulta de la variable de salida del procedimineto almacenado se almacena como un arreglo asosciatovo
            //$this->validacion_unicidad_correo = $resultadoValidacion['VALIDACION_UNICIDAD_CORREO'];
            //$this->setValidacionCorreo($resultadoValidacion[0]['VALIDACION_UNICIDAD_CORREO']);
            $this->setValidacionError($resultadoValidacion[0]['VALIDACION_ERROR']);
            $this->setTipoError($resultadoValidacion[0]['TIPO_ERROR']);
            $this->setMensaje($resultadoValidacion[0]['MENSAJE']);

            //Se libera el espacio en memoria utilizado
            $cursor->free_result();
            //Cierre de consulta preparada
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;
            return $resultado; //True si la eejcucion de la sentencia es exitosa, false caso contrario
        }


        //***** Funcion para registrar Asietcnia de empleado a traves de un procedimiento almacenado
        public function registrarSalida(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_SALIDA(?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i", $this->employee_id);
            //Ejecucion de sentencia preparada SQL (resultado se almacena en una variable)
            //Almacena un booleano dependiendo de si es exitoso o fallido la ejecución
            $resultado = $sentencia->execute();

            //Recuperar valor devuelto por el procedimiento almacenado
            $query_validacion = "SELECT @VALIDACION_ERROR AS VALIDACION_ERROR, @TIPO_ERROR AS TIPO_ERROR, @MENSAJE AS MENSAJE;";
            $cursor = $conexion->query($query_validacion); //Se realiza la consulta de la variable de salida del procedimineto almacenado
            $resultadoValidacion = $cursor->fetch_all(MYSQLI_ASSOC);  //El resultado de la consulta de la variable de salida del procedimineto almacenado se almacena como un arreglo asosciatovo
            //$this->validacion_unicidad_correo = $resultadoValidacion['VALIDACION_UNICIDAD_CORREO'];
            //$this->setValidacionCorreo($resultadoValidacion[0]['VALIDACION_UNICIDAD_CORREO']);
            $this->setValidacionError($resultadoValidacion[0]['VALIDACION_ERROR']);
            $this->setTipoError($resultadoValidacion[0]['TIPO_ERROR']);
            $this->setMensaje($resultadoValidacion[0]['MENSAJE']);

            //Se libera el espacio en memoria utilizado
            $cursor->free_result();
            //Cierre de consulta preparada
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;
            return $resultado; //True si la eejcucion de la sentencia es exitosa, false caso contrario
        }




        
    }


?>