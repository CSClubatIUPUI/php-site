<?php
require_once(__DIR__ . "/../../inc/db.php");
$db = get_database();
$sql = 'SELECT
            "id",
            extract(epoch from "start") * 1000 AS "start",
            extract(epoch from "end") * 1000 AS "end",
            (regexp_split_to_array("description", \'\n\'))[1] AS "title",
            "description",
            "location"
        FROM
            "schedule"
        WHERE
            extract(epoch from "start") >= $1 AND
            extract(epoch from "end") < $2
        ORDER BY
            "start",
            "end"';
$schedule_rows = $db->query($sql, [floatval($_GET["from"]) / 1000, floatval($_GET["to"]) / 1000]);
$output = [];
foreach ($schedule_rows as $schedule_row) {
    $schedule_row["url"] = "javascript:onEventOpen({$schedule_row["id"]})";
    $schedule_row["class"] = "event-info";
    $output[] = $schedule_row;
}
header("Content-Type: application/json");
echo(json_encode([
    "success" => 1,
    "result" => $output
]));
?>
