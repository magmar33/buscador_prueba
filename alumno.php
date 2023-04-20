<?php
    include("conexion.php");
    $con=conectar();
    $sql="SELECT *  FROM alumno";
    if(isset($_POST['buscar'])){
        $nombre=$_POST['nombre'];
        $sql="SELECT *  FROM alumno WHERE nombres LIKE '%$nombre%'";
    }
    
    $query=mysqli_query($con,$sql);

    // $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Alumno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>
        
            <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_estudiante" placeholder="cod estudiante">
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="Dni">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">

                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <form action="alumno.php" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="nombre" class="form-control" placeholder="Buscar usuario por nombre">
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Buscar" name="buscar"  class="btn btn-secondary">
                                    </div>
                                </div>
                            </form>
                            <table class="table mt-3" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Dni</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_estudiante']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>
                                                
                                                <th>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editChildresn<?php echo $row['cod_estudiante']; ?>">
                                  Termino
                              </button></th>
                                            </tr>
                                                <!--Ventana Modal para Actualizar--->
                                                <?php  include('ModalEditar.php'); ?>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>    </body>
</html>