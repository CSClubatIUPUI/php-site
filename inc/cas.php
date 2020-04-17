<?php
session_start();
if (isset($_SESSION["username"])) { // already logged in
  return;
}
require_once(__DIR__ . "/utils.php");
// construct the URL for CAS to redirect back to
$this_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
/*
flow of CAS:
    - user tries to access http://csclub.cs.iupui.edu/edit
    - CSC redirects user to http://cas.iu.edu/cas/login?casurl=http://csclub.cs.iupui.edu/edit
    - CAS redirects user to http://csclub.cs.iupui.edu/edit?casticket=RANDOMSTRING
    - CSC sends request to http://cas.iu.edu/cas/validate?casticket&casurl
    - if valid, CSC allows user to access page (we get CAS username back from /validate)
 */
if (!isset($_GET["casticket"])) { // redirect for CAS login form
  header("Location: https://cas.iu.edu/cas/login?cassvc=IU&casurl=" . urlencode($this_url));
  exit;
}
// construct validation URL
$response_url = "https://cas.iu.edu/cas/validate?cassvc=IU&casurl=" . urlencode($this_url) . "&casticket=" . urlencode($_GET["casticket"]);
// file_get_contents works for URLs too: http://php.net/manual/en/function.file-get-contents.php
$cas_response = file_get_contents($response_url);
// response is either "yes\r\nUSERNAME" or "no"
// "no" is rare - afaik, means that the user was able to log in, but isn't authorized to access IU resources
// if the user's password is incorrect or something, CAS just doesn't redirect them back to us
if (str_startswith($cas_response, "no")) {
  // TODO improve error handling..? per above, it's not that important
  http_response_code(403);
  echo("Access denied.");
  exit;
}
// split by \r\n to get the username
$username = explode("\r\n", $cas_response)[1];
$_SESSION["username"] = $username;
?>
