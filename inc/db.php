<?php
require_once(__DIR__ . "/config.php");

function db_connect() {
    global $CONFIG;
    return new \PDO(
        "mysql:dbname={$CONFIG->db->database};host={$CONFIG->db->host};port={$CONFIG->db->port}",
        $CONFIG->db->user, $CONFIG->db->password
    );
}


function db_init_schema(PDO $db) {
    $SCHEMA_DIR = __DIR__ . "/../schema/";
    $schema_files = array_diff(scandir($SCHEMA_DIR), [".", ".."]);
    sort($schema_files);
    foreach ($schema_files as $schema_file) {
        $result = $db->exec(file_get_contents($SCHEMA_DIR . $schema_file));
        if ($result === FALSE) {
            die("Error creating $schema_file: {$db->errorInfo()[2]}");
        }
    }
}

$db = db_connect();
db_init_schema($db);
?>
