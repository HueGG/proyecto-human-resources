<?php
    require_once 'Conexion.php';

    class Departamento{
        
        private $department_id;
        private $department_name;
        private $manager_id;
        private $location_id;

        
        CONST TABLA = 'DEPARTMENTS';
        CONST VISTA_DEPT_EXTENDIDA =  'DEPARTAMENTOS';
        CONST VISTA_DEPT_RESUMEN = 'DEPARTAMENTOS_RESUMEN';
        CONST VISTA_DEPT_LISTA = 'LISTA_DEPARTAMENTOS';
        
        //********************************* Getters
        public function getDepartmentId(){
            return $this->department_id;
        }

        public function getDepartmentName(){
            return $this->department_name;
        }

        public function getManagerId(){
            return $this->manager_id;
        }

        public function getLocationId(){
            return $this->location_id;
        }



        //********************************* Setters

        public function setDepartmentId ($department_id){
            $this->department_id = $department_id;
        }

        public function setDepartmentName ($department_name){
            $this->department_name = $department_name;
        }

        public function setManagerId ($manager_id){
            $this->manager_id = $manager_id;
        }

        public function setLocationId ($location_id){
            $this->location_id = $location_id;
        }

        /******************************** */
        /********************************* */
        public function consultarListaDepartamentos(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_DEPT_LISTA;
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

        //*********************** */
        //CONSULTAR resumen de DEPARTAMENTOS a traves de una vista almacenada
        public function consultarDepartamentosResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_DEPT_RESUMEN;
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

        //***** Funcion para registrar un nuevo DEPARTAMENTO a traves de un procedimiento almacenado
        public function registrarDepartamento(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_DEPARTAMENTO(?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("sss",
                $this->department_name, $this->manager_id, $this->location_id);
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

        /// ********** Funcion para buscar un DEPARTAMENTO especifico por id mediante procedimiento almacenado
        public function buscarDepartamento(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL BUSCAR_DEPARTAMENTO(?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("i",$this->department_id);
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
        
        

        /// ********** Funcion para Actualizar un DEPARTAMENTO especifico por id mediante procedimiento almacenado
        public function actualizarDepartamento(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL ACTUALIZAR_DEPARTAMENTO(?, ?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssss",$this->department_id,
                $this->department_name, $this->manager_id, $this->location_id);
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

        /// ********** Funcion para Eliminar un Departamento especifico por id mediante procedimiento almacenado
        public function eliminarDepartamento(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "CALL ELIMINAR_DEPARTAMENTO(?)";
            //Preparacion de sentencia SQL para su posterior ejecución
            $sentencia = $conexion->prepare($query);
            //Vinculacion de variables a la sentencia preparada a travez de parametros
            $sentencia->bind_param("s",$this->department_id);
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