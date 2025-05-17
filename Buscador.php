<? php
include 'config/config.php ';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action= "" method="get">
        <input type="text" name="busqueda"> <br>
        <input type="submit" name="enviar"  value="Buscar" >

    </form>

    <br><br><br>

    <?php 
    if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];

        $consulta =$con ->query("SELECT * FROM productos WHERE nombreProducto LIKE'%bsuqueda%' ");

        while ($row = $consulta->fetch_array()) {
            echo $row['nombreProducto']. '<br>';

        }
    }
    
    
    
    
    ?>



    
</body>
</html>