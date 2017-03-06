<?php
require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/Database.php");
function get_database() {
    global $config;
    $db = new Database($config["db"]);
    $db->connect();
    return $db;
}
?>
