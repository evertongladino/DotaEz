<?php
include('httpful.phar');
//include('crypt/crypt.php');
if(!isset($_SESSION))
    {
        session_start();
    }
if($_POST["login"] != null && $_POST["password"] != null)
{
	//$crypted = generateHash($_POST["password"]);
	//$_POST["password"] = $crypted;
	$login_array = array('login' => $_POST["login"], 'password' =>$_POST["password"]);
	$body = json_encode($login_array);
	$url = "http://localhost/dotaserver/user/login";
	$response = \Httpful\Request::post($url)->sendsJson()->body($body)->send();
	$array = json_decode($response->body, true)[0];
	
	//die();
		if(!empty($array) && $array["login"] == $_POST["login"] && $array['password'] == $_POST['password'])
		{
			$_SESSION['idt'] = $array['idt'];
			$_SESSION['nme_user'] = $array['nme_user'];
			$_SESSION['nickdota_user'] = $array['nickdota_user'];
			$_SESSION['email_user'] = $array['email_user'];
			$_SESSION['status_user'] = $array['status_user'];
			if($_SESSION['status_user'] == '1')
			{
				header("Location: index.php");
			}
			if($_SESSION['status_user'] == '0')
			{
			echo('<script type="text/javascript">
				alert("Usuário está inativo, entre em contato com o administrador do sistema!");
				window.location.href ="login.html";
				</script>');
			}
		}
			
		
		else
		{
		
			echo('<script type="text/javascript">
				alert("Login ou password incorreto");
				window.location.href ="login.html";
				</script>');
		}
}
