<?php
    require_once 'Conexion.php';

    class Historico{
        
        private $employee_id;
        private $start_date;
        private $end_date;
        private $job_id;
        private $department_id;

        CONST TABLA = 'JOB_HISTORY';
        CONST VISTA_HISTORICO_RESUMEN = 'HISTORICO_RESUMEN';
        

        //********************************* Getters
        public function getEmployeeId(){
            return $this->employee_id;
        }

        public function getStartDate(){
            return $this->start_date;
        }

        public function getEndDate(){
            return $this->end_date;
        }

        public function getJobId(){
            return $this->job_id;
        }

        public function getDepartmentId(){
            return $this->department_id;
        }
        


        //********************************* Setters

        public function setEmployeeId ($employee_id){
            $this->employee_id = $employee_id;
        }

        public function setStartDate ($start_date){
            $this->start_date = $start_date;
        }

        public function setEndDate ($end_date){
            $this->end_date = $end_date;
        }

        public function setJobId ($job_id){
            $this->job_id = $job_id;
        }

        public function setDepartmentId ($department_id){
            $this->department_id = $department_id;
        }

        //CONSULTAR resumen de empleados a traves de una vista almacenada
        public function consultarHistoricoResumen(){
            //Creacion de objeto de la clase Conexion.php
            $objConex = new Conexion();
            //Conexión a BD y almacenamiento del objeto devuelto en una variable
            $conexion = $objConex->getConexion();
            //Se almacena la cadena que sera usada como sentenia SQL
            $query = "SELECT * FROM ".self::VISTA_HISTORICO_RESUMEN;
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

       
        
    }


?>