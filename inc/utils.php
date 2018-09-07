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

// returns pretty-format date or time
function get_local_datetime($seconds, $should_omit_date) {
    $format = "g:ia";
    if (!$should_omit_date) {
        $format = "m/d/Y " . $format . " (l)";
    }
    return date($format, $seconds);
}

function get_current_commit_hash() {
    // magical git command
    exec('git log --pretty="%h" -n1 HEAD', $hash);
    return $hash[0];
}

function is_cabinet_member(PDO $db, $user_id) {
    $is_cabinet_member_stmt = $db->prepare(
        'SELECT COUNT(*) as "count" FROM "cabinet_roles" WHERE "user_id" = :user_id'
    );
    $stmt->execute([
        "user_id" => $user_id
    ]);
    return $stmt->fetchColumn() > 0;
}
?>
