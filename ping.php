<?php
if (!isset($_GET["host"]) {
	return;
}
echo exec("ping -n 5 -w 1 " . $_GET["host"]);
?>