<?php
require_once("${WORKDIR}inc/utils.php");
$modalHTML = file_get_contents("${WORKDIR}inc/modal.html");

function buildModal($env) {
    global $modalHTML, $WORKDIR;
    $final = $modalHTML;
    foreach ($env as $name => $val) {
        if (startsWith($val, "file://")) {
            $fname = substr($val, strlen("file://"));
            $val = file_get_contents("${WORKDIR}modals/{$fname}");
        }
        $final = str_replace("{{" . $name . "}}", $val, $final);
    }
    return $final;
}
?>
