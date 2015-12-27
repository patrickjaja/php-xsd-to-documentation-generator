<?php
class l8n{
	public $HTML="";
	public function __construct($page) {
	
	}
	
	public static function getText($key) {
                $langFile="lang/".getLang().".lang.php";
                if (file_exists($langFile)) {
                    include($langFile);
                } else {
                    die("Sprachdatei nicht gefunden");
                }	
                if (isset($texts[$key])) {
                    return $texts[$key];
                } else {
                    $file = $langFile;
                    // Öffnet die Datei, um den vorhandenen Inhalt zu laden
                    $current = file_get_contents($file);
                    // Fügt eine neue Person zur Datei hinzu
                    $current .= '$texts["'.$key.'"]="'.$key.'";';
                    // Schreibt den Inhalt in die Datei zurück
                    file_put_contents($file, $current);
                    return $key;
                }
	}	
}