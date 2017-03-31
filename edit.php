<?php
require_once(__DIR__ . "/inc/cas.php");
require_once(__DIR__ . "/inc/header.php");

$db = get_database();
$is_cabinet_member = is_cabinet_member($db, $_SESSION["username"]);
if (!$is_cabinet_member) {
    echo("<h1>Access denied.</h1><h4>You are not a cabinet member.</h4>");
    exit;
}

$sql = "SELECT
            `page`, `name`, `value`
        FROM
            `PageContent`
        ORDER BY `page`, `name`";
$content_result = $db->query($sql);
$last_page = "";
?>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($content_row = $content_result->fetch_assoc()): ?>
                    <tr>
                        <td><?=$content_row["page"]?></td>
                        <td><?=$content_row["name"]?></td>
                        <form action="post/update/content.php" method="POST">
                            <td>
                                <input type="hidden" name="page" value="<?=$content_row["page"]?>" />
                                <input type="hidden" name="name" value="<?=$content_row["name"]?>" />
                                <textarea class="input-content-value" cols="80" rows="5" name="value"><?=$content_row["value"]?></textarea>
                            </td>
                            <td>
                                <button class="btn btn-submit">Submit</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
