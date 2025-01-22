<?php
    require_once 'Conexion.php';

    class Usuario{
        
        private $user_id;
        private $email;
        private $password;
        private $first_name;
        private $last_name;
        private $registration_date;
        private $last_logIn;
        private $status_id;
        private $role_id;

        /*Atrbutos de validacion en procedimientos almacenados
            Estos atributos guardan el valor devuelto por el procedimiento almacenado SQL (no todos los procedimientos almacenados manejan variables de salida)
        */
        private $validacion_error;
        private $tipo_error;
        private $mensaje;

        CONST USERS = 'USERS';
        CONST VISTA_USERS_RESUMEN = 'USERS_RESUMEN';
        CONST VISTA_USERS_RESUMEN_MINIMA = 'USERS_RESUMEN_MINIMA';
        CONST VISTA_LISTA_GERENTES = 'LISTA_USERS';

        //********************************* Getters
        public function getUserId(){
            return $this->user_id;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getFirstName(){
            return $this->first_name;
        }

        public function getLastName(){
            return $this->last_name;
        }

        public function getRegistrationDate(){
            return $this->registration_date;
        }

        public function getLastLogIn(){
            return $this->last_logIn;
        }

        public function getStatusId(){
            return $this->status_id;
        }
        
        public function getRoleId(){
            return $this->role_id;
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
        //******************************************************************************* */
        //******************************************************************************* */
        //********************************* SETTERS  ************************************ */
        //******************************************************************************* */
        //******************************************************************************* */

        public function setUserId ($user_id){
            $this->user_id = $user_id;
        }

        public function setEmail ($email){
            $this->email = $email;
        }

        public function setPassword ($password){
            $this->password = $password;
        }

        public function setFirstName ($first_name){
            $this->first_name = $first_name;
        }

        public function setLastName ($last_name){
            $this->last_name = $last_name;
        }

        public function setRegistrationDate ($registration_date){
            $this->registration_date = $registration_date;
        }

        public function setLastLogIn ($last_logIn){
            $this->last_logIn = $last_logIn;
        }


        public function setStatusId ($status_id){
            $this->status_id = $status_id;
        }

        public function setRoleId ($role_id){
            $this->role_id = $role_id;
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
        

        public function iniciarSesion(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL INICIAR_SESION_USUARIO(?,?, @VALIDACION_ERROR, @TIPO_ERROR, @MENSAJE )";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ss",$this->email, $this->password);
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