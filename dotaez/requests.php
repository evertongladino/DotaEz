<?php

include('httpful.phar');
$get_request = 'http://127.0.0.1/aula8/user/search?lgn_user="'.$_GET['search'].'"';
$response = \Httpful\Request::get($get_request)->send();
echo  $response->body;
