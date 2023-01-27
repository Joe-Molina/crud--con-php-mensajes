<?php  include("cabecera.php"); ?>
<?php  include("conexion.php"); ?>

<?php

if($_POST){
    print_r($_POST);
    $nombre = $_POST['nombre'];
    $descripcion= $_POST['descripcion'];

    $fecha= new DateTime();

    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

    $imagen_temporal=$_FILES['archivo']['tmp_name'];

    move_uploaded_file($imagen_temporal, "imagenes/".$imagen);

    $objConexion = new conexion();
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion')";
    $objConexion->ejecutar($sql);

    header("location:portafolio.php");

}

if($_GET){

    $id=$_GET['borrar'];
    $objConexion= new conexion();

    $imagen= $objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);

    unlink("imagenes/".$imagen[0]['imagen']);


    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id;
    $objConexion->ejecutar($sql);

    header("location:portafolio.php");

}

$objConexion= new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

// print_r($resultado);

?>

<div class="container">
    <div class="row">
        <div class="col-6">
        <div class="card">
    <div class="card-header">
            datos del proyecto
        </div>
        <div class="card-body">
        <form action="portafolio.php" method="post" enctype="multipart/form-data">

        nombre del proyecto: <input Required class="form-control" type="text" name="nombre" id="">
        <br>
        nombre del archivo: <input required class="form-control" type="file" name="archivo" id="">
        <br>
        Descripcion:
        <textarea class="form-control" required name="descripcion" id="" cols="30" rows="3"></textarea>

        <input class="btn btn-success" type="submit" value="Enviar proyecto">
        </form>
        </div>
    </div>
        </div>
        <div class="col-6">
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">archivo</th>
                        <th scope="col">descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proyectos as $proyecto) {?>
                    <tr>
                        <td><?php echo $proyecto['id']; ?></td>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td><img width="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt=""></td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">eliminar</a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        </div>
        
    </div>
</div>







<?php include("pie.php");?>


<?php 
// notas:
/*
1. hacer form que contenga un input text y un input file

2. darle estilos con bootstrap con form control y grid card

3.crear tabla con btrap  table default con 3 columnas(id, nombre, imagen.jpg)

4. crear una columna con bootstrap y poner ambos en la misma altura
*/ 
?>
