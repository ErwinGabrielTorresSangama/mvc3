<?php
session_start();
if (isset($_SESSION['s_iduser'])) //Si la variable de session existe
{
  header('Location: home');
}
else
{

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>



    <!-- Custom styles for this template -->
    <link href="./views/css/signin.css" rel="stylesheet">
  </head>
 


  <body class="text-center">
    <form class="form-signin">
      
      <img class="mb-4" src="./views/images/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
      
      
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="email" class="form-control" id="inputUsuario" placeholder="Usuario">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" class="form-control" id="inputPass" placeholder="Password">
      
      <button class="btn btn-lg btn-success btn-block" type="button" id="btnIngresar">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    
  </body>

</html>


<script src="./ajax/loginView.js"></script>
<?php 
}
?>



