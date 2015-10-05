<?php
if (!isset($_POST["text"])) {
	return;
}
$json = json_decode(file_get_contents("requests.json"));
$json[] = $_POST["text"]; // TODO: Add timestamp
file_put_contents("requests.json", json_encode($json));
?>