<?php
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
$sql = 'SELECT
            "user"."first_name",
            "user"."last_name",
            "user"."email",
            "position"."name" AS "position_name"
        FROM
            "user_position"
                left join "user" on
                    "user_position"."user_id" = "user"."id"
                left join "position" on
                    "user_position"."position_id" = "position"."id"
        ORDER BY
            "position"."rank" ASC,
            "user"."last_name" ASC,
            "user"."first_name" ASC';
$cabinet_rows = $db->query($sql);
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
                <?php foreach ($cabinet_rows as $cabinet_row): ?>
                    <tr>
                        <td><?=$cabinet_row["position_name"]?></td>
                        <td><?=$cabinet_row["first_name"]?> <?=$cabinet_row["last_name"]?></td>
                        <td>
                            <a href="mailto:<?=$cabinet_row["email"]?>">
                                <?=$cabinet_row["email"]?>
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
