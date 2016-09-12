<?php
function get_local_datetime($seconds, $should_omit_date) {
    $format = "g:ia";
    if (!$should_omit_date) {
        $format = "D, M jS Y " . $format;
    }
    return date($format, $seconds);
}

function get_content_mixins($db, $page_name) {
    $sql = "SELECT
                name, value";
}
?>
