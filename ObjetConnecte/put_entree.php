<?php

if($_POST){
	if($_POST['action'] == 'addRunner'){
		fail("test");
	}
}

function fail($message) {
	die(json_encode(array('status' => 'fail', 'message' => $message)));
}
function success($message) {
	die(json_encode(array('status' => 'success', 'message' => $message)));
}

?>