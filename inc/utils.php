<?php
function get_local_datetime($seconds, $should_omit_date) {
    $format = "g:ia";
    if (!$should_omit_date) {
        $format = "D, M jS Y " . $format;
    }
    return date($format, $seconds);
}

function get_page_content($db, $page_name) {
    $sql = "SELECT
                name, value
            FROM
                PageContent
            WHERE
                page = ?";
    $content_stmt = $db->prepare($sql);
    $content_stmt->bind_param("s", $page_name);
    $content_stmt->execute();
    $content_stmt->bind_result($content_name, $content_value);
    $content = [];
    while ($content_stmt->fetch()) {
        $content[$content_name] = $content_value;
    }
    return $content;
}
?>
