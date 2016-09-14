<?php
$config = json_decode(file_get_contents(__DIR__ . "/../config.json"));

function get_database() {
    global $config;
    return new mysqli(
        $config->db->host,
        $config->db->user,
        $config->db->password,
        $config->db->database,
        $config->db->port
    );
}
?>
