<?php


session_start();
if($_POST){

    if( ($_POST['usuario']=="joe") && ( $_POST['password']=="12345") ){
       
        $_SESSION['usuario']="joe";

        header("location:index.php");

    } else {
        echo "<script> alert('usuario o contraseña incorrectos') </script>";
    }


}


?>

    <!doctype html>
    <html lang="en">
    
    <head>
      <title>login</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <!-- Bootstrap CSS v5.2.1 -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    </head>
    
    <body>

        <div class="container">      
            
            <div class="row">
                <div class="col-md-4">                         
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            iniciar sesion
                        </div>
                        <div class="card-body">
                        <form action="login.php" method="post">
                            usuario: <input class="form-control" type="text" name="usuario" id="">
                            <br>
                            contraseña: <input class="form-control" type="password" name="password" id="">
                            <br>
                            <button type="submit " class="btn btn-success">entrar al protafolio</button>           
                        </form>
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">     
                </div>
            </div> 

        </div>
        

    </body>
    
    </html>
