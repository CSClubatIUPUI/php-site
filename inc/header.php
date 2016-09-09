<?php
date_default_timezone_set("America/Indianapolis");
require_once(__DIR__ . "/utils.php");
require_once(__DIR__ . "/db.php");
$scriptName = basename($_SERVER["SCRIPT_NAME"]);
$pageNames = [
    "index.php" => "Home",
    "resources.php" => "Resources",
    "schedule.php" => "Meeting Schedule",
    "cabinet.php" => "Cabinet"
];
$pageName = isset($pageNames[$scriptName]) ? $pageNames[$scriptName] : $scriptName;
$originalPageName = explode(".", $scriptName)[0];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>CS Club @ IUPUI - <?=$pageName?></title>
        <meta name="description" content="The homepage of the IUPUI Computer Science Club." />
        <meta name="author" content="Alex Hicks <aldahick@iupui.edu>" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" />
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" /> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css" />
        <link rel="stylesheet" href="css/global.css" />
        <?php
        $cssName = "css/" . strtolower($originalPageName) . ".css";
        if (file_exists(__DIR__ . "/../$cssName")): ?>
            <link rel="stylesheet" href="<?=$cssName?>" />
        <?php endif; ?>
        <link href="favicon.ico" rel="icon" />
    </head>
    <body>
        <?php if ($scriptName != "index.php"): ?>
            <nav id="navbar" class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">CS Club @ IUPUI</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            foreach ($pageNames as $page => $name):
                            ?>
                                <li <?=$page == $scriptName ? 'class="active"' : "" ?>>
                                    <a href="<?=$page?>"><?=$name?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php endif; ?>
        <div id="container" class="container">
