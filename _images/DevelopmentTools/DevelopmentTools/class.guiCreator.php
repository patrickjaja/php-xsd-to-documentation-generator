<?php

class guiCreator {
	private $doc;
	public function __construct($html){
		
		
		$filename="languages/lang." . getLang() . ".php";		
		 if(file_exists($filename)) { 
		 	require_once($filename);
		 } else {
                        echo $filename;
		 	die("Die Sprache wurde nicht gefunden. This language could not be found!");
		 }
	 	$doc=new DOMDocument();
		$doc->loadHTML($html);
		$xpath=new DOMXPath($doc);
		$elements=$xpath->query('//text()');
		if (!is_null($elements)) {
		  foreach ($elements as $element) {
		    if($element->textContent) {
		    	if(trim($element->textContent)=="") continue;
		    	$text=$element->textContent;
//				if(isset($_GET["debug"])) {
//					if ($text=="btnTourText") {
//						echo $text;echo "POS:".strpos(trim($text), "_");echo "OK";die();
//					}
//				}
				if(strpos(trim($text), "_")!=0 || strpos(trim($text), "_")===false) {
					if(isset($texts[trim($text)])) {
						$domTextElement=new DOMText($texts[trim($text)]);
					} else {
						$fh=fopen($filename, "a+");
						fputs($fh, '$texts[\'' . trim($text) . '\']="' .trim($text). '";' . "\r");
						fclose($fh);
					}
					$parent=$element->parentNode;
					$parent->replaceChild($domTextElement,$element);
				} else {
					$domTextElement=new DOMText(trim($text));
					$parent=$element->parentNode;
					$parent->replaceChild($domTextElement,$element);
				}
		    }
		  }
		}
		$doc->preserveWhiteSpace=false;
		$doc->formatOutput=true;

		$this->doc=$doc;
	}
	public function showPage() {
		echo $this->doc->saveHTML();
	}
	public function getPage() {
		return $this->doc->saveHTML();
	}
}
