<?php
require_once(__DIR__ . "/inc/header.php");
$cabinet_members = $db->query(<<<SQL
    SELECT
        "users"."first_name",
        "users"."last_name",
        "users"."email",
        "cabinet_roles"."title"
    FROM "cabinet_roles"
        INNER JOIN "users" ON
            "cabinet_roles"."user_id" = "users"."id"
    ORDER BY
        "cabinet_roles"."rank" ASC,
        "users"."last_name" ASC,
        "users"."first_name" ASC
SQL
);
?>
<div class="row">
    <div class="col-xs-offset-2 col-xs-8">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cabinet_members as $cabinet_member): ?>
                    <tr>
                        <td><?=$cabinet_member["title"]?></td>
                        <td><?=$cabinet_member["first_name"]?> <?=$cabinet_member["last_name"]?></td>
                        <td>
                            <a href="mailto:<?=$cabinet_member["email"]?>">
                                <?=$cabinet_member["email"]?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once(__DIR__ . "/inc/footer.php");
?>
