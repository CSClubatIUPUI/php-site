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

function get_current_commit_hash() {
    exec('git log --pretty="%h" -n1 HEAD', $hash);
    return $hash[0];
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

function is_cabinet_member($db, $username) {
    $escaped_username = $db->real_escape_string($username);
    $sql = "SELECT
                COUNT(*) AS 'count'
            FROM
                `CabinetMember`
            WHERE
                `username` = '$escaped_username'";
    $row = $db->query($sql)->fetch_assoc();
    return $row["count"] == 1;
}
?>
