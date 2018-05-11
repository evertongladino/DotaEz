<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://127.0.0.1/dotaez/skill/newSkill';
$response = \Httpful\Request::post($get_request)
->sendsJson()
->body($json)->send();
echo  $response->body;
