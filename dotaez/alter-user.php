<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://localhost/dotaserver/user/alterUser';
$response = \Httpful\Request::put($get_request)
->sendsJson()
->body($json)->send();
echo ('<script type="text/javascript">
				alert("Usuário alterado com sucesso!");
				window.location.href ="login.php";
				</script>');
