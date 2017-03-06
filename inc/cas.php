<?php
session_start();
if (isset($_SESSION["username"])) {
    return;
}
require_once(__DIR__ . "/utils.php");
$this_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if (!isset($_GET["casticket"])) {
    header("Location: https://cas.iu.edu/cas/login?cassvc=IU&casurl=" . urlencode($this_url));
    exit;
}
$response_url = "https://cas.iu.edu/cas/validate?cassvc=IU&casurl=" . urlencode($this_url) . "&casticket=" . urlencode($_GET["casticket"]);
$cas_response = file_get_contents($response_url);
if (str_startswith($cas_response, "no")) {
    http_response_code(403);
    echo("Access denied.");
    exit;
}
$username = explode("\r\n", $cas_response)[1];
$_SESSION["username"] = $username;

require_once(__DIR__ . "/db.php");
$db = get_database();
$_SESSION["user_id"] = get_user_id($db, $username);
?>
