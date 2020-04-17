<?php
require_once(__DIR__ . "/../inc/db.php");
$stmt = $db->prepare(
  <<<SQL
    SELECT
        "id",
        UNIX_TIMESTAMP("start") * 1000 AS "start",
        UNIX_TIMESTAMP("end") * 1000 AS "end",
        "description",
        "location"
    FROM "events"
    WHERE
        UNIX_TIMESTAMP("start") >= :start_time / 1000 AND
        UNIX_TIMESTAMP("end") < :end_time / 1000
    ORDER BY `start`, `end`
SQL
);
$stmt->execute([
  "start_time" => $_GET["from"],
  "end_time" => $_GET["to"]
]);
$events = $stmt->fetchAll();
foreach ($events as $event) {
  $event["url"] = "javascript:onEventOpen({$event["id"]})";
  $event["class"] = "event-info";
  $event["title"] = explode("\n", $event["description"])[0];
  $output[] = $event;
}
header("Content-Type: application/json");
echo (json_encode([
  "success" => 1,
  "result" => $output
]));
