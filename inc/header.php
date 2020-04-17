<?php
date_default_timezone_set("America/Indianapolis");
require_once(__DIR__ . "/db.php");
require_once(__DIR__ . "/utils.php");
$script_name = basename($_SERVER["SCRIPT_NAME"]);
$page_title = isset($CONFIG->page_titles->{$script_name}) ? $CONFIG->page_titles->{$script_name} : $script_name;
$original_page_name = explode(".", $script_name)[0];
$version = get_current_commit_hash();
$cache = "?cacheVersion=$version";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CS Club @ IUPUI - <?= $page_title ?></title>
  <meta name="description" content="The homepage of the IUPUI Computer Science Club." />
  <meta name="author" content="CS Club @ IUPUI <csclubin@iupui.edu>" />
  <link href="img/logo-notext.png" rel="icon" />
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css" />
  <?php if (isset($extra_css)) : ?>
    <?php foreach ($extra_css as $css_url) : ?>
      <link rel="stylesheet" href="<?= $css_url . $cache ?>" />
    <?php endforeach; ?>
  <?php endif; ?>
  <link rel="stylesheet" href="css/global.css<?= $cache ?>" />
  <?php
  // include "css/PAGE_NAME.css", e.g. "css/cabinet.css"
  $css_name = "css/" . strtolower($original_page_name) . ".css";
  if (file_exists(__DIR__ . "/../$css_name")) : ?>
    <link rel="stylesheet" href="<?= $css_name . $cache ?>" />
  <?php endif; ?>
  <link href="favicon.ico" rel="icon" />
</head>

<body>
  <nav id="navbar-parent" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="img/logo-notext.png" width="32" />
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <?php foreach ($CONFIG->page_titles as $page => $title) : ?>
            <li <?= $page == $script_name ? 'class="active"' : "" ?>>
              <a href="<?= $page ?>"><?= $title ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
  <div id="container" class="container">
