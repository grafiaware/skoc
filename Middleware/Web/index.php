<?php

$scssPath = "lay_bac_grafia.css";

if (isset($_GET['list'])) {$list = $_GET['list'];}
   else {$list = 'a0';}
if (isset($_GET['name'])) {$name = $_GET['name'];}
   else {$name = '';}
if (isset($_GET['php'])) {$php = $_GET['php'];}
   else {$php = '1';}
if (isset($_GET['sekce'])) {$sekce = $_GET['sekce'];}
   else {$sekce = '0';}

if (isset($_GET['lang']))  {$lang = $_GET['lang'];}
elseif (isset($_GET['language']))  {$lang = $_GET['language'];}
else {$lang = 'lan1';}

//----přidané udělátko pro stahování souborů --------------------------------
include 'contents/download.php';

//header ("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
//header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//If there is a Cache-Control header with the "max-age" or "s-max-age" directive in the response, the Expires header is ignored.
header ("Cache-Control: public, must-revalidate, max-age=3600");
header ("Content-Type: text/html; charset=utf-8");

$sekce = substr($list,0,3);
include_once 'contents/keywords.php';
include_once 'menu/menu_def.php';

include "templates/layout.php";
?>
