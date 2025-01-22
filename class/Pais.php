<?php
    require_once 'Conexion.php';

    class Pais{
        
        private $country_id;
        private $country_name;
        private $region_id;

        CONST TABLA = 'COUNTRIES';
        CONST VISTA_PAISES_RESUMEN = 'PAISES_RESUMEN';
        CONST VISTA_LISTA_PAISES = 'LISTA_PAISES';

        //********************************* Getters
        public function getCountryId(){
            return $this->country_id;
        }

        public function getCountryName(){
            return $this->country_name;
        }

        public function getRegionId(){
            return $this->region_id;
        }


        //********************************* Setters

        public function setCountryId ($country_id){
            $this->country_id = $country_id;
        }

        public function setCountryName ($country_name){
            $this->country_name = $country_name;
        }

        public function setRegionId ($region_id){
            $this->region_id = $region_id;
        }


        //*********************** */
        //Consultar list de PAISES que son GERENTES de algún departamento
        public function consultarPaises(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_LISTA_PAISES;
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


        //CONSULTAR resumen de Paises a traves de una vista almacenada
        public function consultarPaisesResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_PAISES_RESUMEN;
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

        //***** Funcion para registrar un nuevo PAIS a traves de un procedimiento almacenado
        public function registrarPais(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_PAIS(?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssi",
                $this->country_id, $this->country_name, $this->region_id );
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

        /// ********** Funcion para buscar un PAIS especifico por id mediante procedimiento almacenado
        public function buscarPais(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL BUSCAR_PAIS_EXTENDIDO(?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i",$this->country_id);
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
        
        

        /// ********** Funcion para Actualizar un Pais especifico por id mediante procedimiento almacenado
        public function actualizarPais(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL ACTUALIZAR_PAIS(?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssi",$this->country_id,
                $this->country_name, $this->region_id);
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

        
        
    }


?>