<?php
ini_set("error_reporting",E_ALL);
ini_set("display_errors",1);

require_once 'class.APIProcessor.php';

$generator=new APIProcessor("img/logo.png","lang/","xsd/");
$generator->apiVersion="1.9.0";
$generator->keywords=array("json"
                            ,"xml"
                            ,"true"
                            ,"format"
                            ,"parse json"
                            ,"yes");
$generator->links=array("skey"=>"http://example.de"
                        ,"token"=>"http://example.de"
                        ,"API Call"=>"http://example.de"
                        ,"format"=>"http://example.de"
                        ,"lang"=>"http://example.de#lang"
                        ,"NEW_ORDERS_DELIVERY_PUFFER"=>"http://example.de#generaltrace2Parameter");
$generator->replaceIcon=array("##warn##"=>"http://example.de/ico.png");
$generator->highlight=array("muss");
$generator->groups=array(array("auftraege"=>""));

//$generator->generate();
//GUI LOADER UND DOM EINSETZEN + EIGENES SVN PROJEKT + FUTURENET + EVTL PARSER CHECK EINFÜGEN. EN ERWATET. DOKU ERWARTET. HIER FEHLT NOCH DOKU
//In DOM - Themes einbauen und über replace bauen
//FULL XSD BEISPIEL BAUEN. MIT GRUPPE EVTL:
//Pattern mit DB vergleichen
//Manuell in das Array Injecten für Beispielseiten wie startSession, Tokens und API Key
//Beispiel DB - Serverseitig für qits.de Seite! Mit Link
//Nachträgliches ändern der Menüpunkte bzw. namen über die Lang. Alles über die Lang
//Alles auf deutsch und englisch vorbereiten ! + Patterns und types etc. Full Example von einer Funktion vorbereiten

//Konstanden ermöglichen - für Server Pfad in der Beschreibung
//Download Button
//Suche einbauen
##Warning Pattern, ##Link Pattern, ##code Pattern, ##Response Pattern - exec CODE Pattern, ##HL5,##LIST
//
//Einzelne Wörter automatisch highlighten
//
$parsed=$generator->parseXSD();
print_r($parsed);