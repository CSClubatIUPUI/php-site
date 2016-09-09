<?php
function get_local_datetime($seconds, $omitDate) {
    $format = "g:ia";
    if (!$omitDate) {
        $format = "D, M jS Y " . $format;
    }
    return date($format, $seconds);
}
?>
