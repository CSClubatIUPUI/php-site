<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
$WORKDIR = realpath(dirname(__FILE__)) . "/";
function code($code) {
    http_response_code($code);
    echo("Error 422 occurred");
}
if (!isset($_POST["action"])) {
    code(422);
    return;
}
$action = $_POST["action"];
header("Content-Type: application/json");
if ($action == "get-meetings") {
    echo(file_get_contents("${WORKDIR}json/meetings.json"));
} elseif ($action == "get-officers") {
    $json = json_decode(file_get_contents("${WORKDIR}json/officers.json"));
    foreach ($json as $k => $v) {
        $v->email = "<a href='mailto:" . $v->email . "'>" . $v->email . "</a>";
        $json[$k] = $v;
    }
    echo(json_encode($json));
} else {
    code(422);
}
?>
