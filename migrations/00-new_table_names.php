<?php
$people = $db->query('SELECT * FROM "Person"');
$stmt = $db->prepare(<<<SQL
    INSERT INTO "users"("username", "first_name", "last_name", "email")
    VALUES (:username, :first_name, :last_name, :email)
SQL
);
foreach ($people as $person) {
    $stmt->execute([
        "username" => $person["username"],
        "first_name" => $person["firstName"],
        "last_name" => $person["lastName"],
        "email" => $person["email"]
    ]);
}
$users = $db->query('SELECT * FROM "users"');

$cabinet_members = $db->query('SELECT * FROM "CabinetMember"');
$stmt = $db->prepare(<<<SQL
    INSERT INTO "cabinet_roles"("user_id", "title", "rank")
    VALUES (:user_id, :title, :rank)
SQL
);
foreach ($cabinet_roles as $cabinet_role) {
    $user = array_values(array_filter($users,
        function($u) { return $u["username"] == $cabinet_role["username"]; }
    ))[0];
    $stmt->execute([
        "user_id" => $user["id"],
        "title" => $cabinet_role["position"]
    ]);
}
// TODO finish, secure, add execution method
?>
