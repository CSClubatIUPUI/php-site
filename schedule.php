<?php
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
$sql = "SELECT
            UNIX_TIMESTAMP(`start`) AS 'start',
            UNIX_TIMESTAMP(`end`) AS 'end',
            `location`,
            `description`,
            DATE(`start`) = DATE(`end`) AS 'sameDay'
        FROM
            `MeetingSchedule`
        WHERE
            MONTH(`start`) = MONTH(CURDATE()) OR
            MONTH(`start`) = MONTH(CURDATE() + INTERVAL 1 MONTH)
        ORDER BY `start`";
$schedule_result = $db->query($sql);
?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($schedule_row = $schedule_result->fetch_assoc()): ?>
            <tr>
                <td><?=get_local_datetime($schedule_row["start"], false)?></td>
                <td><?=get_local_datetime($schedule_row["end"], $schedule_row["sameDay"])?></td>
                <td><?=$schedule_row["location"]?></td>
                <td><?=$schedule_row["description"]?></td>
            </tr>
        <?php endwhile; ?>
</table>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
