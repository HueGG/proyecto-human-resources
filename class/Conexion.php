<?php
    class Conexion extends mysqli{
        //Atributos de la clase
        private $servidor = 'localhost';
        private $usuario = 'root';
        //private $password = 'Administrador123.';
        private $password = 'Administrador...';
        private $bd = 'hr_02';
        private $puerto = '3306';
        private $con;
    
        public function getServidor(){
            return $this->servidor;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getBd(){
            return $this->bd;
        }

        public function getPuerto(){
            return $this->puerto;
        }

        public function __construct()
        {
            /*$this->con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd, $this->puerto) 
            or die("Error en la conexion");*/
            
             $this->con = new mysqli($this->servidor, $this->usuario, $this->password, $this->bd, $this->puerto);
        }

        public function getConexion(){
            return $this->con;
        }


    }

?>