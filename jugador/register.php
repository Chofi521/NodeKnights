<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>NodeKnight</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <link href="css/style2.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Páginas <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.php">Acerca de</a></li>
                              <li><a href="testimonial.php">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="product.php">Descargar</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.php">Contáctanos</a>
                        </li>
                        
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      
      <!-- center -->
      <div class="container2 ">
         <div class="box form-box">

            <?php
               include("php/config.php");
               if(isset($_POST['submit'])){
                  $username = $_POST['username'];
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $age = $_POST['age'];
                  $password = $_POST['password'];

                  // Verificando usuario
                  $verify_query2 = mysqli_query($con, "SELECT Username FROM usuario WHERE Username = '$username'");
                  // Verificando correo
                  $verify_query = mysqli_query($con, "SELECT Email  FROM usuario WHERE Email = '$email'");
                  
                  if (mysqli_num_rows($verify_query) != 0){
                     echo "<div class='message'>
                              <p>Este correo ya fue usado, pruebe con otro por favor</p>
                           </div>  <br>";
                     echo "<a href='javascript:self.history.back()'><button button class='btn'>Regresar</button>";
                  }
                  else if(mysqli_num_rows($verify_query2) != 0){
                     echo "<div class='message'>
                              <p>Este nombre de usuario ya fue usado, pruebe con otro por favor</p>
                           </div>  <br>";
                     echo "<a href='javascript:self.history.back()'><button button class='btn'>Regresar</button>";
                  }
                  else{
                     mysqli_query($con, "INSERT INTO usuario(Username, Name, Email, Age, Password) VALUES('$username', '$name', '$email', '$age', '$password')") or die('Hubo un error');
                     echo "<div class='message'>
                              <p>¡Cuenta Creada!</p>
                           </div>  <br>";
                     echo "<a href='product.php'><button button class='btn'>Iniciar sesión</button>";
                  }
               } else{

               

            ?>

            <header>Registrar</header>
            <form action="" method="post">
               <div class="field input">
                  <label for="username">Nombre de usuario</label>
                  <input type="text" name="username" id="username" autocomplete="none" style="text-transform: none;"required>
               </div>

               <div class="field input">
                    <label for="name">Nombre completo</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>

                <div class="field input">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" autocomplete="off" autocapitalize="none" style="text-transform: none;" required>
               </div> 

                <div class="field input">
                    <label for="age">Edad</label>
                    <input type="number" name="age" id="age" autocomplete="off" required style="text-transform: none;" min='6' max='97' step='1'>
                 </div>

               <div class="field input">
                  <label for="password">Contraseña</label>
                  <input type="password" name="password" id="password" autocomplete="off" autocapitalize="none" required style="text-transform: none;">
               </div>

               <div class="field">
                  <input type="submit" class="btn" name="submit" value="Crear cuenta" required>
               </div>

               <div class="links">
                  ¿Ya tienes una cuenta? <a href="product.php">Inicie sesion</a>
               </div>
            </form>
         </div>
         <?php } ?>
      </div>

      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>