<?php
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
$sql = "SELECT
            `Person`.`first_name`,
            `Person`.`last_name`,
            `Person`.`email`,
            `CabinetMember`.`position`
        FROM
            `CabinetMember`
                LEFT JOIN `Person` ON
                    `CabinetMember`.`username` = `Person`.`username`";
$cabinet_result = $db->query($sql);
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Position</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($cabinet_row = $cabinet_result->fetch_assoc()): ?>
            <tr>
                <td><?=$cabinet_row["position"]?></td>
                <td><?=$cabinet_row["first_name"]?> <?=$cabinet_row["last_name"]?></td>
                <td>
                    <a href="mailto:<?=$cabinet_row["email"]?>">
                        <?=$cabinet_row["email"]?>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
require_once(__DIR__ . "/inc/footer.php");
?>
