<?php
mb_internal_encoding('UTF-8');
set_time_limit("1800"); //30 min
ini_set("default_socket_timeout", "1800");
$googleKey="AIzaSyBQTntV81uQOrj6haI8OKYqhGlAFYPAAI4";
$project=$_GET["project"];
$langpath="tmp/lang_de.js.php";
$langnewpath="tmp/lang_" . $_GET["lang_out"]. ".js.php";
$fIn=file($langpath);
$fh=fopen($langnewpath, "w");
foreach($fIn as $line) {
	$lCode=explode("=",$line);
	$rightSide=$lCode[1];
	$leftSide=$lCode[0];
	$rightSide=str_replace('"', "", $rightSide);
	$singleMessage=substr($rightSide,0, (strlen($rightSide)-3));
	echo $singleMessage . "\n";
	$url="https://www.googleapis.com/language/translate/v2?key=$googleKey&q=" . urlencode($singleMessage) . "&source=". $_GET["lang_in"] ."&target=" . $_GET["lang_out"];
	echo "Trying ... " . $url;
	$fileIn=getFile($url);
	fputs($fh, $leftSide . "=\"" . getTranslation($fileIn) . '";' . "\n");	
}

function getTranslation($fileIn) {
	$arr=json_decode($fileIn);
	print_r($arr);
	return $arr->data->translations[0]->translatedText;
}
function getFile($url) {
	$content=file($url);
	foreach($content as $line) {
		$all.=$line . "\n";
	}
	return $all;
}