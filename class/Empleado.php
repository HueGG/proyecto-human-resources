<?php
    require_once 'Conexion.php';

    class Empleado{
        
        private $employee_id;
        private $first_name;
        private $last_name;
        private $email;
        private $phone_number;
        private $hire_date;
        private $job_id;
        private $salary;
        private $commission_pct;
        private $manager_id;
        private $department_id;
        /*Atrbutos de validacion en procedimientos almacenados
            Estos atributos guardan el valor devuelto por el procedimiento almacenado SQL (no todos los procedimientos almacenados manejan variables de salida)
        */
        private $validacion_unicidad_correo;
        private $validacion_error;
        private $tipo_error;
        private $mensaje;

        CONST TABLA = 'EMPLOYEES';
        CONST VISTA_EMP_RESUMEN = 'EMPLEADOS_RESUMEN';
        CONST VISTA_EMP_RESUMEN_MINIMA = 'EMPLEADOS_RESUMEN_MINIMA';
        CONST VISTA_LISTA_GERENTES = 'LISTA_GERENTES';

        //********************************* Getters
        public function getEmployeeId(){
            return $this->employee_id;
        }

        public function getFirstName(){
            return $this->first_name;
        }

        public function getLastName(){
            return $this->last_name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPhoneNumber(){
            return $this->phone_number;
        }

        public function getHireDate(){
            return $this->hire_date;
        }

        public function getJobId(){
            return $this->job_id;
        }

        public function getSalary(){
            return $this->salary;
        }

        public function getCommissionPct(){
            return $this->commission_pct;
        }

        public function getManagerId(){
            return $this->manager_id;
        }

        public function getDepartmentId(){
            return $this->department_id;
        }
        
        
        public function getValidacionUnicidadCorreo(){
            return $this->validacion_unicidad_correo;
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

        public function setEmployeeId ($employee_id){
            $this->employee_id = $employee_id;
        }

        public function setFirstName ($first_name){
            $this->first_name = $first_name;
        }

        public function setLastName ($last_name){
            $this->last_name = $last_name;
        }

        public function setEmail ($email){
            $this->email = $email;
        }

        public function setPhoneNumber ($phone_number){
            $this->phone_number = $phone_number;
        }

        public function setHireDate ($hire_date){
            $this->hire_date = $hire_date;
        }

        public function setJobId ($job_id){
            $this->job_id = $job_id;
        }

        public function setSalary ($salary){
            $this->salary = $salary;
        }

        public function setCommissionPct ($commission_pct){
            $this->commission_pct = $commission_pct;
        }

        public function setManagerId ($manager_id){
            $this->manager_id = $manager_id;
        }

        public function setDepartmentId ($department_id){
            $this->department_id = $department_id;
        }

        public function setValidacionCorreo ($validacion_unicidad_correo){
            $this->validacion_unicidad_correo = $validacion_unicidad_correo;
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
        //Consultar list de empleados que son GERENTES de algún departamento
        public function consultarGerentes(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_LISTA_GERENTES;
            //Almacenamiento de datos recuperados de la vista
            $cursor = $conexion->query($query);
            //Obtiene todas las filas de resultados como una matriz asociativa, numérica o ambas
            $resultado = $cursor->fetch_all(MYSQLI_ASSOC);
            
            //Se libera el espacio en memoria utilizado
            $cursor->free_result();
            //Se cierra la conexión con la BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex=null;
            return $resultado;
        }


        //CONSULTAR resumen de empleados a traves de una vista almacenada
        public function consultarEmpleadosResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_EMP_RESUMEN_MINIMA;
            //Almacenamiento de datos recuperados de la vista
            $cursor = $conexion->query($query);
            //Obtiene todas las filas de resultados como una matriz asociativa, numérica o ambas
            $resultado = $cursor->fetch_all(MYSQLI_ASSOC);
            
            //Se libera el espacio en memoria utilizado
            $cursor->free_result();
            //Se cierra la conexión con la BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex=null;
            return $resultado;
        }

        //***** Funcion para registrar un nuevo empleado a traves de un procedimiento almacenado
        public function registrarEmpleado(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_EMPLEADO(?, ?, ?, ?, ?, ?, ?, ?, ?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssssssdii",
                $this->first_name, $this->last_name, $this->email, $this->phone_number, 
                $this->hire_date, $this->job_id, $this->commission_pct, 
                $this->manager_id, $this->department_id);
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

        /// ********** Funcion para buscar un empleado especifico por id mediante procedimiento almacenado
        public function buscarEmpleado(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL BUSCAR_EMPLEADO_EXTENDIDO(?)";
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
        
        public function registrarJobHistory(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL AGREGAR_JOB_HISTORY(?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("is",$this->employee_id, $this->hire_date);
            //Ejecucion de sentencia preparada SQL (resultado se almacena en una variable)
            //Almacena un booleano dependiendo de si es exitoso o fallido la ejecución
            $resultado = $sentencia->execute();
            
            //Cierre de consulta preparada
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;
            return $resultado; //True si la ejecucion de la sentencia es exitosa, false caso contrario
        }

        /// ********** Funcion para Actualizar un empleado especifico por id mediante procedimiento almacenado
        public function actualizarEmpleado(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL ACTUALIZAR_EMPLEADO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("issssssdii",$this->employee_id,
                $this->first_name, $this->last_name, $this->email, $this->phone_number, 
                $this->hire_date, $this->job_id, $this->commission_pct, 
                $this->manager_id, $this->department_id);
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
            return $resultado; //True si la ejecucion de la sentencia es exitosa, false caso contrario
            
        }

        /// ********** Funcion para Eliminar un empleado especifico por id mediante procedimiento almacenado
        public function eliminarEmpleado(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "CALL ELIMINAR_EMPLEADO(?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE)";
            //Preparacion de sentencia SQL para su posterior ejecución
            $sentencia = $conexion->prepare($query);
            //Vinculacion de variables a la sentencia preparada a travez de parametros
            $sentencia->bind_param("i",$this->employee_id);
            //Ejecución de la sentencia preparada
            $resultado = $sentencia->execute();

            //Recuperar valores de salida devueltos por el procedimiento almacenado
            $query_validacion = 'SELECT @VALIDACION_ERROR AS VALIDACION_ERROR, @TIPO_ERROR AS TIPO_ERROR, @MENSAJE AS MENSAJE';
            $cursor = $conexion->query($query_validacion); //Se realiza la consulta de la variable de salida del procedimineto almacenado
            $resultadoValidacion = $cursor->fetch_all(MYSQLI_ASSOC);  //El resultado de la consulta de la variable de salida del procedimineto almacenado se almacena como un arreglo asosciatovo

            $this->setValidacionError($resultadoValidacion[0]['VALIDACION_ERROR']);
            $this->setTipoError($resultadoValidacion[0]['TIPO_ERROR']);
            $this->setMensaje($resultadoValidacion[0]['MENSAJE']);
            //Cierre de consulta preparada y conexion
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;

            return $resultado; //True si la ejecucion de la sentencia es exitosa, false caso contrario
        }











        /*LogIn como empleado*/
        public function iniciarSesionEmpleado(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL INICIAR_SESION_EMPLEADO(?,?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE )";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("si",$this->email, $this->employee_id);
            //Ejecucion de la sentencia SQL
            $sentencia->execute();
            //Almacenamiento de datos recuperados de la consulta
            //Obtiene todas las filas de resultados como una matriz asociativa, numérica o ambas
            $resultado = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
            //Se libera el espacio en memoria utilizado
            $sentencia->close(); //Se cierra la primer sentencia, para poder ejecutar una nueva sentencia dentro de esta misma conexion
            
            //Recuperar valor devuelto por el procedimiento almacenado (SEGUNDA CONSULTA dentro de la misma conexion)
            $query_validacion = "SELECT @VALIDACION_ERROR AS VALIDACION_ERROR, @TIPO_ERROR AS TIPO_ERROR, @MENSAJE AS MENSAJE;";
            $cursor = $conexion->query($query_validacion); //Se realiza la consulta de la variable de salida del procedimineto almacenado
            $resultadoValidacion = $cursor->fetch_all(MYSQLI_ASSOC);  //El resultado de la consulta de la variable de salida del procedimineto almacenado se almacena como un arreglo asosciatovo
            
            $this->setValidacionError($resultadoValidacion[0]['VALIDACION_ERROR']);
            $this->setTipoError($resultadoValidacion[0]['TIPO_ERROR']);
            $this->setMensaje($resultadoValidacion[0]['MENSAJE']);
            /*Se concatenan los datos que se recibieron del login*/
            //$datosLogIn = array_merge($resultado, $resultadoValidacion);

            //Se libera el espacio en memoria utilizado
            $cursor->close();
            
            //Se cierra la conexión con la BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex=null;

            //echo var_dump($resultado);
            return $resultado;
        }



        
    }


?>