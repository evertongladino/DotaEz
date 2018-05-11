<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://127.0.0.1/dotaez/build/alterBuild';
$response = \Httpful\Request::put($get_request)
->sendsJson()
->body($json)->send();
echo  $response->body;
