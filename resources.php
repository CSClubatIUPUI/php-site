<?php
require_once(__DIR__ . "/inc/header.php");
$resources = $db->query('SELECT * FROM "resources"');
?>
<div class="col-xs-12 col-md-offset-2 col-md-10">
  <?php foreach ($resources as $resource) : ?>
    <div class="resource-container">
      <?php
      $image_url = "https://assets.iu.edu/brand/2.x/trident-large.png";
      if (isset($resource["image_url"])) {
        $image_url = $resource["image_url"];
      }
      ?>
      <img class="resource-image" width="64" src="<?= $image_url ?>" />
      <span class="resource-name"><?= $resource["name"] ?></span>
      <a>
        <span class="resource-url"><?= $resource["url"] ?></span>
      </a>
    </div>
  <?php endforeach; ?>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
