<?php
mb_internal_encoding('UTF-8');
set_time_limit("1800"); //30 min
ini_set("default_socket_timeout", "1800");
$googleKey="AIzaSyBQTntV81uQOrj6haI8OKYqhGlAFYPAAI4";
$project=$_GET["project"];
$langpath="./tmp/lang." . $_GET["lang_in"] .  ".php";
$langnewpath="./tmp/lang." . $_GET["lang_out"] .  ".php";
require_once $langpath;
$fh=fopen($langnewpath, "w");
fputs($fh, "<?\n");
foreach($texts as $key=>$singleMessage) {
	$i++;
	$url="https://www.googleapis.com/language/translate/v2?key=$googleKey&q=" . urlencode($singleMessage) . "&source=". $_GET["lang_in"] ."&target=" . $_GET["lang_out"];
	echo "Trying ... " . $url;
	$fileIn=getFile($url);
	fputs($fh, '$texts["' . $key . "\"]=\"" . getTranslation($fileIn) . '";' . "\n");	
}

function getTranslation($fileIn) {
	$arr=json_decode($fileIn);
	print_r($arr);
	return str_replace('"', '\"', $arr->data->translations[0]->translatedText);
}
function getFile($url) {
	$content=file($url);
	foreach($content as $line) {
		$all.=$line . "\n";
	}
	return $all;
}