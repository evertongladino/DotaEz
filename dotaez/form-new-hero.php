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
<form action='new-hero.php' method='post'>
  <div class="form-group">
	<label for="Nome">Nome</label>
	<input type="text" class="form-control" name="nme_hero" placeholder="Nome">
  </div>
  <div class="form-group">
  	<input type="radio" name="type_hero" value="Intellect" checked> Intellect<br>
  	<input type="radio" name="type_hero" value="Agility"> Agility<br>
  	<input type="radio" name="type_hero" value="strength"> strength<br>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
