<?php
require_once(__DIR__ . "/../../inc/db.php");
$db = get_database();
$start_time = $db->real_escape_string($_GET["from"]);
$end_time = $db->real_escape_string($_GET["to"]);
$sql = "SELECT
            UNIX_TIMESTAMP(`start`) * 1000 AS 'start',
            UNIX_TIMESTAMP(`end`) * 1000 AS 'end',
            SUBSTRING_INDEX(`description`, '\n', 1) AS 'title',
            `description`,
            `location`
        FROM
            `MeetingSchedule`
        WHERE
            UNIX_TIMESTAMP(`start`) >= $start_time / 1000 AND
            UNIX_TIMESTAMP(`end`) < $end_time / 1000
        ORDER BY `start`, `end`";
$schedule_result = $db->query($sql);
$output = [];
$id = 0;
while ($schedule_row = $schedule_result->fetch_assoc()) {
    $schedule_row["id"] = $id;
    $schedule_row["url"] = "javascript:onEventOpen($id)";
    $schedule_row["class"] = "event-info";
    $output[] = $schedule_row;
    $id++;
}
header("Content-Type: application/json");
echo(json_encode([
    "success" => 1,
    "result" => $output
]));
?>
