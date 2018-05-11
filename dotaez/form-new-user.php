<?php
	session_start();
?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/dotaicone.jpeg">

    <title>DotaEz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="justified-nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <a href="index.php"><img src="img/dotalogo.png" width="50" height="50"></a> 
	<?php
		if(isset($_SESSION['nme_user'])){
   			echo "<p align=”Right”>Buenas noches señorita ".$_SESSION['nme_user']."	"."<a href='logout.php'>Logout</a>"."</p>";
		}
	?>
        <nav>
          <ul class="nav nav-justified">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="all-builds.php">Builds</a></li>
            <li class="nav-item"><a class="nav-link" href="all-heroes.php">Heroes</a></li>
            <li class="nav-item"><a class="nav-link" href="all-itens.php">Itens</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
	    <li class="nav-item"><a class="nav-link" href="login.php">Login(Moderadores)</a></li>
          </ul>
        </nav>
      </div>
    <form action='new-user.php' method='post'>
	<input type='text' name='nme_user' placeholder='Nome'><br>
	<input type='text' name='login' placeholder='Login'><br>
	<input type='text' name='password' placeholder='Senha'><br>
	<input type='text' name='email_user' placeholder='Email'><br>
	<input type='text' name='nickdota_user' placeholder='Nick'><br>
	<input type='checkbox' name='status_user' value='1'>Ativo<br>
	<input type='submit' value='Submit'>
</body>