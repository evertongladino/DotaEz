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
		<form method="post" action="verifylogin.php" class="bootstrap-admin-login-form">
	<?php
		if(isset($_SESSION['nme_user'])){
			echo '<a class="btn btn-warning" href="form-new-user.php">Novo usuário</a><br>';
			echo '<a class="btn btn-warning" href="form-alter-user.php">Alterar usuário</a>';
		}
	?>
                        <h1>Login **(login: admin senha: 123)**</h1>
                        <div class="form-group">
                            <input class="form-control" type="text" name="login" id="login" placeholder="Login" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        </div>
			<button type="submit" class="btn btn-lg btn-primary">Logar</button>
</form>
    </div
</body>
