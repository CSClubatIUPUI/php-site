<?php
if (!isset($_POST["email"])) {
	return;
}
$url = "https://mailman.cs.iupui.edu/mailman/subscribe/csclub";
print_r($_POST);
$name = isset($_POST["name"]) ? urlencode($_POST["name"]) : "";
$email = urlencode($_POST["email"][0]);
$postVars = array(
	"fullname" => $name,
	"email" => $email
	);
$fields = "";
foreach($postVars as $key=>$value) {
	$fields .= "$key=$value&";
}
rtrim($fields, "&");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($postVars));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
echo($result);
?>