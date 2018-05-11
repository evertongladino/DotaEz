<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://localhost/dotaserver/item/newItem';
$response = \Httpful\Request::post($get_request)
->sendsJson()
->body($json)->send();
echo ('<script type="text/javascript">
				alert("Item inserido com sucesso!");
				window.location.href ="all-itens.php";
				</script>');
