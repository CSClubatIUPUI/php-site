<?php
require_once(__DIR__ . "/inc/header.php");

$db = get_database();
$sql = 'SELECT
            "name",
            "url",
            "image_url"
        FROM
            "resource"';
$resource_rows = $db->query($sql);
?>
<div class="col-xs-12 col-md-offset-2 col-md-10">
    <?php foreach ($resource_rows as $resource_row): ?>
        <div class="resource-container">
            <?php
            $image_url = "https://assets.iu.edu/brand/2.x/trident-large.png";
            if (isset($resource_row["image_url"])) {
                $image_url = $resource_row["image_url"];
            }
            ?>
            <img class="resource-image" width="64" src="<?=$image_url?>" />
            <span class="resource-name"><?=$resource_row["name"]?></span>
            <a>
                <span class="resource-url"><?=$resource_row["url"]?></span>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
