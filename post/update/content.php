<?php
if (!isset($_POST["page"]) || !isset($_POST["name"]) || !isset($_POST["value"])) {
    echo("<h1>Invalid parameters.</h1><h4>Please do not access this page manually.</h4>");
    exit;
}
require_once(__DIR__ . "/../../inc/cas.php");
require_once(__DIR__ . "/../../inc/utils.php");
require_once(__DIR__ . "/../../inc/db.php");
$db = get_database();

$is_cabinet_member = is_cabinet_member($db, $_SESSION["username"]);
if (!$is_cabinet_member) {
    echo("<h1>Access denied.</h1><h4>You are not a cabinet member.</h4>");
    exit;
}

$content_page = $db->real_escape_string($_POST["page"]);
$content_name = $db->real_escape_string($_POST["name"]);
$content_value = $db->real_escape_string($_POST["value"]);
$sql = "INSERT INTO `PageContent` (`page`, `name`, `value`)
        VALUES('$content_page', '$content_name', '$content_value')
        ON DUPLICATE KEY UPDATE `value` = '$content_value'";
$db->query($sql);
header("Location: ../../edit.php");
?>
