<?php
if (php_sapi_name() !== "cli") {
  echo ("You have to run this script from the command line.");
  exit;
}
require_once(__DIR__ . "/../inc/db.php");

$resources = $db->query('SELECT * FROM "Resource"', PDO::FETCH_ASSOC);
$stmt = $db->prepare(
  <<<SQL
    INSERT INTO "resources"("name", "url", "image_url")
    VALUES (:name, :url, :image_url)
SQL
);
foreach ($resources as $resource) {
  unset($resource["id"]);
  $stmt->execute($resource); // column names didn't change
}
echo ("Migrated resources.\n");

$people = $db->query('SELECT * FROM "Person"', PDO::FETCH_ASSOC);
$stmt = $db->prepare(
  <<<SQL
    INSERT INTO "users"("username", "first_name", "last_name", "email")
    VALUES (:username, :first_name, :last_name, :email)
SQL
);
foreach ($people as $person) {
  $stmt->execute($person); // column names didn't change
}
$users = $db->query('SELECT * FROM "users"')->fetchAll(PDO::FETCH_ASSOC);
echo ("Migrated users.\n");

$cabinet_members = $db->query('SELECT * FROM "CabinetMember"', PDO::FETCH_ASSOC);
$stmt = $db->prepare(
  <<<SQL
    INSERT INTO "cabinet_roles"("user_id", "title", "rank")
    VALUES (:user_id, :title, :rank)
SQL
);
foreach ($cabinet_members as $cabinet_member) {
  $user = array_values(array_filter(
    $users,
    function ($u) {
      global $cabinet_member;
      return $u["username"] == $cabinet_member["username"];
    }
  ))[0];
  $stmt->execute([
    "user_id" => $user["id"],
    "title" => $cabinet_member["position"],
    "rank" => $cabinet_member["rank"]
  ]);
}
echo ("Migrated cabinet members.\n");

$events = $db->query('SELECT * FROM "MeetingSchedule"', PDO::FETCH_ASSOC);
$stmt = $db->prepare(
  <<<SQL
    INSERT INTO "events"("start", "end", "location", "description")
    VALUES (:start, :end, :location, :description)
SQL
);
foreach ($events as $event) {
  unset($event["id"]);
  $stmt->execute($event); // column names didn't change
}
echo ("Migrated meeting schedule.\n");
