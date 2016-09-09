<?php
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
$sql = "SELECT
            `Person`.`firstName`,
            `Person`.`lastName`,
            `Person`.`email`,
            `CabinetMember`.`position`
        FROM
            `CabinetMember`
                LEFT JOIN `Person` ON
                    `CabinetMember`.`username` = `Person`.`username`";
$cabinetResult = $db->query($sql);
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
        <?php while ($cabinetRow = $cabinetResult->fetch_assoc()): ?>
            <tr>
                <td><?=$cabinetRow["position"]?></td>
                <td><?=$cabinetRow["firstName"]?> <?=$cabinetRow["lastName"]?></td>
                <td>
                    <a href="mailto:<?=$cabinetRow["email"]?>">
                        <?=$cabinetRow["email"]?>
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
require_once(__DIR__ . "/inc/footer.php");
?>
