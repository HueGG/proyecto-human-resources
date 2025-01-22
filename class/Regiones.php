<?php
    require_once 'Conexion.php';
    ini_set("display_errors", E_ALL);
    class Regiones{
        
        private $region_id;
        private $region_name;
        CONST TABLA = 'REGIONS';
        //********************************* Getters
        public function getRegionId(){
            return $this->region_id;
        }

        public function getRegionName(){
            return $this->region_name;
        }

        //********************************* Setters
        public function setRegionId($region_id){
            $this->region_id = $region_id;
        }
        public function setRegionName($region_name){
            $this->region_name = $region_name;
        }

        /***** */
        /*
        public function consultarRegiones(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = mysqli_connect($objConex->getServidor(), $objConex->getUsuario(), $objConex->getPassword(), $objConex->getBd(), $objConex->getPuerto()) or die("Error en la conexion");
            //Probar conexion
            if(mysqli_connect_errno()){
                printf("Conexion erronea: %s\n", mysqli_connect_error());
                exit();
            }
            
            $query = "SELECT * FROM ".self::TABLA;
            //Almacenamiento de los datos recuperados de la BD en un cursor
            $cursor = mysqli_query($conexion, $query);
            $resultado = mysqli_fetch_all($cursor,MYSQLI_ASSOC);
            mysqli_free_result($cursor);
            mysqli_close($conexion);
            return $resultado;
        }
        */
        public function consultarRegiones(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
                        
            $query = "SELECT * FROM ".self::TABLA;
            //Almacenamiento de los datos recuperados de la BD en un cursor
            $cursor = $conexion->query($query);
            //Obtiene todas las filas de resultados como una matriz asociativa, numérica o ambas.
            $resultado = $cursor->fetch_all(MYSQLI_ASSOC);

            $cursor->free_result();
            $conexion->close();
            //mysqli_free_result($cursor);
            //mysqli_close($conexion);
            return $resultado;
        }



        /*
        public function registrar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = mysqli_connect($objConex->getServidor(), $objConex->getUsuario(), $objConex->getPassword(), $objConex->getBd(), $objConex->getPuerto()) or die("Error en la conexion");
            //Probar conexion
            if(mysqli_connect_errno()){
                printf("Conexion erronea: %s\n", mysqli_connect_error());
                exit();
            }
            //Preparando consulta
            $query = "INSERT INTO ".self::TABLA." (REGION_NAME) VALUES (?)";
            $sentencia = mysqli_prepare($conexion, $query);
            $sentencia->bind_param("s",$this->region_name);
            $resultado = $sentencia->execute();

            //Cierre de consulta preparada y conexion
            mysqli_stmt_close($sentencia);
            mysqli_close($conexion);

            return $resultado; //True si el registro es exitos, false caso contrario
        }*/
        public function registrar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "INSERT INTO ".self::TABLA." (REGION_NAME) VALUES (?)";
            $sentencia = $conexion->prepare($query);
            $sentencia->bind_param("s",$this->region_name);
            $resultado = $sentencia->execute();

            //Cierre de consulta preparada y conexion
            $sentencia->close();
            $conexion->close();
            $objConex = null;

            return $resultado; //True si el registro es exitos, false caso contrario
        }
        /*
        public function eliminar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = mysqli_connect($objConex->getServidor(), $objConex->getUsuario(), $objConex->getPassword(), $objConex->getBd(), $objConex->getPuerto()) or die("Error en la conexion");
            //Probar conexion
            if(mysqli_connect_errno()){
                printf("Conexion erronea: %s\n", mysqli_connect_error());
                exit();
            }
            //Preparando consulta
            $query = "DELETE FROM ".self::TABLA." WHERE REGION_ID = ?";
            $sentencia = mysqli_prepare($conexion, $query);
            $sentencia->bind_param("i",$this->region_id);
            $resultado = $sentencia->execute();

            //Cierre de consulta preparada y conexion
            mysqli_stmt_close($sentencia);
            mysqli_close($conexion);

            return $resultado; //True si el registro es exitos, false caso contrario
        }
        */
        public function eliminar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "DELETE FROM ".self::TABLA." WHERE REGION_ID = ?";
            $sentencia = $conexion->prepare($query);
            $sentencia->bind_param("i",$this->region_id);
            $resultado = $sentencia->execute();

            
            //Cierre de consulta preparada y conexion
            $sentencia->close();
            $conexion->close();
            $objConex = null;

            return $resultado; //True si el registro es exitos, false caso contrario
        }

        /*
        public function actualizar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = mysqli_connect($objConex->getServidor(), $objConex->getUsuario(), $objConex->getPassword(), $objConex->getBd(), $objConex->getPuerto()) or die("Error en la conexion");
            //Probar conexion
            if(mysqli_connect_errno()){
                printf("Conexion erronea: %s\n", mysqli_connect_error());
                exit();
            }
            //Preparando consulta
            $query = "UPDATE ".self::TABLA." SET REGION_NAME = ? WHERE REGION_ID = ? ";
            $sentencia = mysqli_prepare($conexion, $query);
            $sentencia->bind_param("si",$this->region_name, $this->region_id);
            $resultado = $sentencia->execute();

            //Cierre de consulta preparada y conexion
            mysqli_stmt_close($sentencia);
            mysqli_close($conexion);

            return $resultado; //True si el registro es exitos, false caso contrario
        }
        */

        public function actualizar(){
            $objConex = new Conexion();
            //Abrir conexion con BD
            $conexion = $objConex->getConexion();
            
            //Preparando consulta
            $query = "UPDATE ".self::TABLA." SET REGION_NAME = ? WHERE REGION_ID = ? ";
            $sentencia = $conexion->prepare($query);
            $sentencia->bind_param("si",$this->region_name, $this->region_id);
            $resultado = $sentencia->execute();

            //Cierre de consulta preparada y conexion
            $sentencia->close();
            $conexion->close();
            $objConex = null;
            //mysqli_stmt_close($sentencia);
            //mysqli_close($conexion);

            return $resultado; //True si el registro es exitos, false caso contrario
        }

    }


?>