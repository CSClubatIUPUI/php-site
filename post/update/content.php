<?php
if (!isset($_POST["page"]) || !isset($_POST["name"]) || !isset($_POST["value"])) {
    echo("<h1>Invalid parameters.</h1><h4>Please do not access this page manually.</h4>");
    exit;
}
require_once(__DIR__ . "/../../inc/cas.php");
require_once(__DIR__ . "/../../inc/utils.php");
require_once(__DIR__ . "/../../inc/db.php");
$db = get_database();

$is_cabinet_member = is_cabinet_member($db, $_SESSION["user_id"]);
if (!$is_cabinet_member) {
    echo("<h1>Access denied.</h1><h4>You are not a cabinet member.</h4>");
    exit;
}

$sql = 'INSERT INTO "page_content" ("page", "name", "value")
        VALUES($1, $2, $3)
        ON CONFLICT("page", "name") DO UPDATE SET "value" = "excluded"."value"';
$db->query($sql, [$_POST["page"], $_POST["name"], $_POST["value"]]);
header("Location: ../../edit.php");
?>
