<?php 
ini_set("display_errors", E_ALL);
    require_once '../class/Regiones.php';
    $region = new Regiones();

    //Probar eliminacion
    
    $region->setRegionId(32);
    echo '<br> Eliminando al ID: '.$region->getRegionId();
    $region->eliminar();
    echo var_dump($region->eliminar()); 
    //************************************* */
    //Probar metodo registro
    /*
    $region->setRegionName('CLUB CAMPESTRE');
    echo $region->getRegionName();
    $region->registrar();
    */
    
    
    //echo var_dump($listaRegiones);

    //Probar actualizacion
    /*
    $region->setRegionId(32);
    $region->setRegionName("Nueva España");
    $region->actualizar();
    */
    //echo var_dump($listaRegiones= $region->consultarRegiones());
    $listaRegiones= $region->consultarRegiones();
?>
    <table border="1">
        <thead>
            <tr>
                <th> ID REGION </th>
                <th> Region </th>
                <th> Accion </th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($listaRegiones as $fila) :?>
                <tr>
                    <td> <?php echo $fila['REGION_ID']; ?> </td>
                    <td> <?php echo $fila['REGION_NAME']; ?> </td>
                    <td>  </td>
                </tr>
            <?php endforeach ?>
        </tbody>


        
    </table>
    

