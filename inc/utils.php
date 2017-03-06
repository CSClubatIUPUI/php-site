<?php

// Borrowed from http://stackoverflow.com/a/10473026/5850070
function str_startswith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

// Borrowed from http://stackoverflow.com/a/10473026/5850070
function str_endswith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

function get_local_datetime($seconds, $should_omit_date) {
    $format = "g:ia";
    if (!$should_omit_date) {
        $format = "m/d/Y " . $format . " (l)";
    }
    return date($format, $seconds);
}

function get_page_content($db, $page_name) {
    $sql = 'SELECT
                "name",
                "value"
            FROM
                "page_content"
            WHERE
                "page" = $1';
    $content_rows = $db->query($sql, [$page_name]);
    $content = [];
    foreach ($content_rows as $content_row) {
        $content[$content_row["name"]] = $content_row["value"];
    }
    return $content;
}

function is_cabinet_member($db, $user_id) {
    $sql = 'SELECT
                COUNT(*) as "count"
            FROM
                "user_position"
            WHERE
                "user_id" = $1';
    $rows = $db->query($sql, [$user_id]);
    return $rows[0]["count"] > 0;
}

function get_user_id($db, $username) {
    $sql = 'select "id" from "user" where "username" = $1';
    $user_rows = $db->query($sql, [$username]);
    return count($user_rows) > 0 ? $user_rows[0]["id"] : null;
}
?>
