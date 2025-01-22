<?php
    require_once 'Conexion.php';

    class Trabajo{
        
        private $job_id;
        private $job_title;
        private $min_salary;
        private $max_salary;

        CONST TABLA = 'JOBS';
        CONST VISTA_JOBS = 'TRABAJOS';
        CONST LISTA_TRABAJOS = 'TRABAJOS_RESUMEN';
        
        //********************************* Getters
        public function getJobId(){
            return $this->job_id;
        }

        public function getJobTitle(){
            return $this->job_title;
        }

        public function getMinSalary(){
            return $this->min_salary;
        }

        public function getMaxSalary(){
            return $this->max_salary;
        }

        //********************************* Setters

        public function setJobId ($job_id){
            $this->job_id = $job_id;
        }

        public function setJobTitle ($job_title){
            $this->job_title = $job_title;
        }

        public function setMinSalary ($min_salary){
            $this->min_salary = $min_salary;
        }

        public function setMaxSalary ($max_salary){
            $this->max_salary = $max_salary;
        }

        /*********************** */
        //Consultar listado resumido de trabajos
        public function consultarListaTrabajos(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::LISTA_TRABAJOS;
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
        //CONSULTAR resumen de empleados a traves de una vista almacenada
        public function consultarTrabajosResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_JOBS;
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

        //***** Funcion para registrar un nuevo TRABAJO a traves de un procedimiento almacenado
        public function registrarTrabajo(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL REGISTRAR_PUESTO_TRABAJO(?, ?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssss",
                $this->job_id, $this->job_title, $this->min_salary, $this->max_salary);
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

        /// ********** Funcion para buscar un TRABAJO especifico por id mediante procedimiento almacenado
        public function buscarTrabajo(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "CALL BUSCAR_TRABAJO(?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("s",$this->job_id);
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
        
        /// ********** Funcion para Actualizar un TRABAJO especifico por id mediante procedimiento almacenado
        public function actualizarTrabajo(){
            //Creación de un objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Abrir conexion con la BD a traves de la funcion del objeto
            $conexion = $objConex->getConexion();
            //Creación de sentencia SQL para el registro de un empleado
            //Al existir un procedimiento almacenado para registrar a un usuario, simplemente se le llama pasandole los parametros correspondientes
            $query = "CALL ACTUALIZAR_TRABAJO(?, ?, ?, ?)";
            //preparar sentencia SQL
            $sentencia = $conexion->prepare($query);
            //Vincular variables a una sentencia preparada como parámetros
            $sentencia->bind_param("ssss",$this->job_id,
                $this->job_title, $this->min_salary, $this->max_salary);
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

        /// ********** Funcion para Eliminar un TRABAJO especifico por id mediante procedimiento almacenado
        public function eliminarTrabajo(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "CALL ELIMINAR_TRABAJO(?)";
            //Preparacion de sentencia SQL para su posterior ejecución
            $sentencia = $conexion->prepare($query);
            //Vinculacion de variables a la sentencia preparada a travez de parametros
            $sentencia->bind_param("s",$this->job_id);
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