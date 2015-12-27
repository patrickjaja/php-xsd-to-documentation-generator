<?php
/**
 * 
 * Diese Datei kann genutzt werden, um zu überprüfen, ob alle Dateien nach der Installation 
 * "unangetastet" geblieben sind. Dazu wird zu jeder Datei der MD5 hash gebildet. 
 * Damit das ganze per NAGIOS abfragbar bleibt, gibt die Datei im Fehlerfall 500er ERR Code aus.
 * @var unknown_type
 */
$runningMD5="e2a89e55e20845769e223e54e9a57915";
$fileTxt="";
$fileContents="";
$readContent=true;
$exclude=array(
0=>array("type"=>".pdf","dir"=>"./futurenet/camp2/GUI/PDF/large" ), 
1=>array("type"=>"generateMD5checksum.php","dir"=>"." )
);
$md5s=array();

function getFilesFromDir($dir, $exclude) { 

  $files = array(); 
  if ($handle = opendir($dir)) { 
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != "..") { 
            if(is_dir($dir.'/'.$file)) { 
                $dir2 = $dir.'/'.$file; 
                $files[] = getFilesFromDir($dir2, $exclude); 
            } 
            else {
            	if(!is_excluded($dir,$file, $exclude)) {
	              $GLOBALS["fileTxt"].=$dir. '/' . $file; 
	              if($GLOBALS["readContent"]==true) {
	              	$cont=file($dir . "/". $file);
	              	$GLOBALS["fileContents"].=implode("\n", $cont);
	              	$GLOBALS["md5s"][$dir . "/" . $file]=md5(implode("\n", $cont));
	              }
	              $files[] = $dir.'/'.$file;
            	} 
            } 
        } 
    } 
    closedir($handle); 
  } 

  return $files; 
} 

function is_excluded($dir, $file, $exclusion) {
	foreach ($exclusion as $key=>$ex) {
		if(($ex["dir"]==trim($dir) && substr($file,strlen($file)-strlen($ex["type"]))==$ex["type"])) {
			return true;

		} 		
	}
	return false;
}

// Usage 
$dir = '.'; 

$foo = getFilesFromDir($dir, $exclude); 

if(md5($fileTxt.$fileContents)==$runningMD5) {
	header("Status: 200 OK");
	echo "OK";
} else {
	header("Status: 500 OK");
	$jsonFile=file("secure.json");
	$jsonString=implode("", $jsonFile);
	$array=json_decode($jsonString,true);
	foreach($md5s as $filepath=>$md5) {
		if($array[$filepath]!=$md5) {
			$arrDiff[$filepath]["md5Original"]=$array[$filepath];
			$arrDiff[$filepath]["md5Now"]=$md5;
		}
	}
	echo "Mismatch";
	if($_GET["getDiff"]=="yes")	print_r($arrDiff);
}
if($_GET["getInfo"]=="yes")  {
	echo "content:" . md5($fileTxt.$fileContents) . "\n";
	echo "json: \n" . json_encode($md5s);	
}