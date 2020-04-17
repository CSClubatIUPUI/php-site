<?php
if (php_sapi_name() !== "cli") {
  echo ("You have to run this script from the command line.");
  exit;
}
// outputs a newline-separated list of PHP files
$php_dirs = [
  ".",
  "./inc",
  "./post"
];
$php_files = [];
foreach ($php_dirs as $php_dir) {
  $php_files = array_merge(
    $php_files,
    array_map(
      function ($filename) {
        global $php_dir;
        return $php_dir . "/" . $filename;
      },
      array_filter(scandir(__DIR__ . "/../" . $php_dir), function ($filename) {
        return strpos($filename, ".php") !== false;
      })
    )
  );
}
echo (implode("\n", $php_files) . "\n");
