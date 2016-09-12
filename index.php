<?php
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
$content = get_page_content($db, $original_page_name);
?>
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div id="desc-index" class="text-center">
            <?=$content["introduction"]?>
        </div>
    </div>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
