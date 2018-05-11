<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://localhost/dotaserver/item/alterItem';
$response = \Httpful\Request::put($get_request)
->sendsJson()
->body($json)->send();
echo ('<script type="text/javascript">
				alert("Item alterado com sucesso!");
				window.location.href ="all-itens.php";
				</script>');
