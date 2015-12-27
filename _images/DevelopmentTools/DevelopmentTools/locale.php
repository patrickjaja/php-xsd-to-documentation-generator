<?php
header("Content-Type: text/html; charset=utf-8");
$langpath="../shared/SYSTEM/L8N/text.errormessages." . $_GET["lang_in"] .  ".php";
require_once $langpath;

foreach($message as $key=>$singleMessage) {
echo $singleMessage;
}