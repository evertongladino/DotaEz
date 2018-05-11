<?php
	include('httpful.phar');

	function combo_hero(){
		$url = 'http://localhost/dotaserver/hero';
		$response = \Httpful\Request::get($url)->send();
		$array = json_decode($response->body, true);
		echo '<div class="form-group">
			<label class="col-sm-4 control-label">Heroes</label><div class="col-sm-6">
			<select name="Hero" class="form-control">';
		$idt="";
		foreach ($array as $value => $key) {
			$idt=$key['idt'];
			echo '<option value="'.$key['idt'].'</option>';
		}
		echo '</select></div></div>';
	}

?>
