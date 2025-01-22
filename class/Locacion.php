<?php
    require_once 'Conexion.php';

    class Locacion{
        
        private $location_id;
        private $street_address;
        private $postal_code;
        private $city;
        private $state_province;
        private $country_id;

        CONST TABLA = 'LOCATIONS';
        CONST VISTA_LOCACIONES_RESUMEN = 'LOCACIONES_RESUMEN';
        CONST VISTA_LISTA_LOCACIONES = 'LISTA_LOCACIONES';

        //********************************* Getters
        public function getLocationId(){
            return $this->location_id;
        }

        public function getStreetAddress(){
            return $this->street_address;
        }

        public function getPostalCode(){
            return $this->postal_code;
        }

        public function getCity(){
            return $this->city;
        }

        public function getStateProvince(){
            return $this->state_province;
        }

        public function getCountryId(){
            return $this->country_id;
        }


        //********************************* Setters

        public function setLocationId ($location_id){
            $this->location_id = $location_id;
        }

        public function setStreetAddress ($street_address){
            $this->street_address = $street_address;
        }

        public function setPostalCode ($postal_code){
            $this->postal_code = $postal_code;
        }

        public function setCity ($city){
            $this->city = $city;
        }

        public function setStateProvince ($state_province){
            $this->state_province = $state_province;
        }

        public function setCountryId ($country_id){
            $this->country_id = $country_id;
        }


        //*********************** */
        //Consultar list de Locaciones
        public function consultarListaLocaciones(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_LISTA_LOCACIONES;
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


        //CONSULTAR tabla resumen de locaciones
        public function consultarLocacionesResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_LOCACIONES_RESUMEN;
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

        //***** Funcion para registrar un nuevo LOCACION a traves de un procedimiento almacenado
        public function registrarLocacion(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_LOCACION(?, ?, ?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("sssss",
                $this->street_address, $this->postal_code, $this->city, $this->state_province, 
                $this->country_id   );
            //Ejecucion de sentencia preparada SQL (resultado se almacena en una variable)
            //Almacena un booleano dependiendo de si es exitoso o fallido la ejecución
            $resultado = $sentencia->execute();
            //Cierre de consulta preparada
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;
            return $resultado; //True si la eejcucion de la sentencia es exitosa, false caso contrario
        }

        /// ********** Funcion para buscar un LOCACION especifico por id mediante procedimiento almacenado
        public function buscarLocacion(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL BUSCAR_LOCACION_EXTENDIDO(?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i",$this->location_id);
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
        

        /// ********** Funcion para Actualizar un empleado especifico por id mediante procedimiento almacenado
        public function actualizarLocacion(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL ACTUALIZAR_LOCACION(?, ?, ?, ?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("isssss",$this->location_id,
                $this->street_address, $this->postal_code, $this->city, $this->state_province, 
                $this->country_id );
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

        /// ********** Funcion para Eliminar un empleado especifico por id mediante procedimiento almacenado
        public function eliminarLocacion(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "CALL ELIMINAR_LOCACION(?)";
            //Preparacion de sentencia SQL para su posterior ejecución
            $sentencia = $conexion->prepare($query);
            //Vinculacion de variables a la sentencia preparada a travez de parametros
            $sentencia->bind_param("i",$this->location_id);
            //Ejecución de la sentencia preparada
            $resultado = $sentencia->execute();
            
            //Cierre de consulta preparada y conexion
            $sentencia->close();
            //Cierre de conexion con BD
            $conexion->close();
            //liberar la memoria utilizada por el objeto
            $objConex = null;

            return $resultado; //True si la ejecucion de la sentencia es exitosa, false caso contrario
        }
        
    }


?>