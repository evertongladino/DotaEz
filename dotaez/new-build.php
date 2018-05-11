<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://localhost/dotaserver/build/newBuild';
$response = \Httpful\Request::post($get_request)
->sendsJson()
->body($json)->send();
echo ('<script type="text/javascript">
				alert("Build Cadastrada com sucesso!");
				window.location.href ="all-builds.php";
				</script>');
