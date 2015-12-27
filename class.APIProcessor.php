<?php
/* futureNet API Generator Toolkip 1.0
 * PSÖ GmbH 2014 
 */
class APIProcessor {
        //Output
        public $apiGroups=array();
        public $apiVersion="";
        public $urlServiceEndpoint="";
        public $urlAPP="http://trace2.qits.eu/";
        
        //Setting Path in Constructor
        public $relLogoPath="";
        public $relLangPath="lang/";
        public $relXSDPath="xsd/";
        
        //XSD Stuff
        private $xsdFiles=array();
        private $functions=array();
        private $parsedFiles=array();
        
        //L8N Stuff
        
        //Textprocessor
        public $keywords=array();
        public $links=array();
        public $replaceIcon=array();
        public $highlight=array();
        
        public function __construct($relLogoPath,$relLangPath,$relXSDPath) {
            $this->relLogoPath=$relLogoPath;
            $this->relLangPath=$relLangPath;
            $this->relXSDPath=$relXSDPath;
            $this->loadXSDFiles();
	}
        
        public function readXSDFolder() {
            $files = array();
            $functions = array();
            $handle = opendir($this->relXSDPath);
            while (($file = readdir($handle)) !== false)
            {
                if(strrchr($file,'.')==".xsd") {
                    $subsfirst = substr($file,0,strrpos($file,"."));
                    $subsclass = substr($subsfirst,strrpos($subsfirst,".")+1);
                    $functions[]= $subsclass;
                    $files[$subsclass] = $file;
                }
            }
            $this->functions=$functions;
            $this->xsdFiles=$files;
            return $this->xsdFiles;;
        }
        
        private function loadXSDFiles() {
            $this->readXSDFolder();
            $clazzlist=array();
            foreach($this->xsdFiles as $k => $value) {
                    $handletest = $this->relXSDPath.$value;
                    $doc = new DOMDocument();


                    $doc->load($handletest);
                    $xpath = new DOMXPath($doc);
                    
                    //Klassenbeschreibung
                    $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:annotation//*';
                    $xResultdoc=$xpath->query($xQueryStringdoc);
                    $this->parsedFiles[$value]["classname"]=$k;
                    foreach($xResultdoc as $ke => $v) {
                        $this->parsedFiles[$value][$v->getAttribute("xml:lang")]=utf8_decode($v->textContent);
                    }
                    
                    //Funktionsnamen
                    $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element';
                    $xResultdoc=$xpath->query($xQueryStringdoc);
                    foreach($xResultdoc as $ke => $v) {
                        $functionName=$v->getAttribute("name");
                        $this->parsedFiles[$value]["functions"][$functionName]=array();
                        
                        //Funktionsbeschreibung
                        $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element[@name="'.$functionName.'"]/xs:annotation//*';
                        
                        $functionDescription=$xpath->query($xQueryStringdoc);
                        foreach($functionDescription as $key => $value2) {
                            $this->parsedFiles[$value]["functions"][$functionName][$value2->getAttribute("xml:lang")]=utf8_decode($value2->textContent);
                        }
                            //Parameterliste
                            $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element[@name="'.$functionName.'"]/xs:complexType/xs:all/xs:element';
                            
                            $parameterDescription=$xpath->query($xQueryStringdoc);
                            foreach($parameterDescription as $key3 => $value3) {
//                                $this->parsedFiles[$value]["functions"][$functionName]["parameter"][]=array("name"=>$value3->getAttribute("name"),"minOccurs"=>$value3->getAttribute("minOccurs"));
                                
                                //Parameterbeschreibungen
                                $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element[@name="'.$functionName.'"]/xs:complexType/xs:all/xs:element[@name="'.$value3->getAttribute("name").'"]/xs:annotation/xs:documentation';
                                
                                $parameterDescription=$xpath->query($xQueryStringdoc);
                                $beschreibungen=array();
                                
                                foreach($parameterDescription as $key4 => $value4) {
                                    $beschreibungen[$value4->getAttribute("xml:lang")]=utf8_decode($value4->textContent);
                                }
                                
                                //Restrictionbase
                                $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element[@name="'.$functionName.'"]/xs:complexType/xs:all/xs:element[@name="'.$value3->getAttribute("name").'"]/xs:simpleType/xs:restriction';
                                $parameterDescription=$xpath->query($xQueryStringdoc);
                                
                                foreach($parameterDescription as $key5 => $value5) {
                                    $beschreibungen["pattern"]["base"]=$value5->getAttribute("base");                               
                                }
                                
                                //Patternvalue
                                $xQueryStringdoc='/xs:schema/xs:element[@name="'.$k.'"]/xs:complexType/xs:all/xs:element[@name="'.$functionName.'"]/xs:complexType/xs:all/xs:element[@name="'.$value3->getAttribute("name").'"]/xs:simpleType/xs:restriction/xs:pattern';
                                
                                $parameterDescription=$xpath->query($xQueryStringdoc);
                                foreach($parameterDescription as $key6 => $value6) {
                                    $beschreibungen["pattern"]["value"]=utf8_decode($value6->getAttribute("value"));                               
                                }
                                
                                $this->keywords[]=$value3->getAttribute("name");
                                $beschreibungen["name"]=$value3->getAttribute("name");
                                $beschreibungen["minOccurs"]=$value3->getAttribute("minOccurs");
                                $beschreibungen["type"]=$value3->getAttribute("type");
                                
                                $this->parsedFiles[$value]["functions"][$functionName]["parameter"][]=$beschreibungen;
                                
                            }
                        
                        
                        
                    }
            }
//            print_r($this->parsedFiles);die();
//            return $clazzlist;
        }
        
        public function getResults() {
            return $this->parsedFiles;
        }
}