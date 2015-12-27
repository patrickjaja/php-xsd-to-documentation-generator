<?php
class GuiLoader{
	public $HTML="";
        public $groups=array();
	public function __construct($page) {
		require_once(dirname(__FILE__) . "/shared/SYSTEM/HOOKS/class.hooks.php");
		require_once(dirname(__FILE__) . "/webService/package.spot.php");
                require_once(dirname(__FILE__) . "/shared/package.main.php");
		require_once(dirname(__FILE__) . "/webService/global.config.php");
                
		return $this->loadGUI($page);		
	}
	
	public function loadGUI($page) {
                require_once 'class.APIProcessor.php';
                require_once 'l8n.php';
                include("dom.php");
                
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
//                $generator->replaceIcon=array("##warn##"=>"http://example.de/ico.png");
//                $generator->highlight=array("muss");
                $page=$dom["theme1"]["page"];
                
//                //Baue Head  
//                $code="";
//                $menuitem=$dom["theme1"]["group_navi_elem"];
//                foreach($this->groups as $key=>$elem) {
//                    $code.=str_replace(array("##GROUPID##","##GROUPNAME##"),array($key,""),$menuitem); 
//                }
//                
//                $dom=str_replace('##GROUPNAVI##', $code, $page);	
//                
//                STAMMDATENFUNCTIONS
                $this->groups["##STAMMDATEN##"]=array("class.fnDrivers"
                                                ,"class.fnAuftraege"
                                                ,"class.fnAupos"
                                                ,"class.fnUpos"
                                                ,"class.fnCustomer"
                                                ,"class.fnTour"
                                                ,"class.fnDrawings"
                                                ,"class.fnServiceHinweise"
                                                ,"class.fnServiceRythm"
                                                ,"class.fnCat"
                                                );
                $this->groups["##ERGEBNISSE##"]=array("class.fnFleetPositions"
                                                        ,"class.fnFleetEvents"
                                                        ,"class.fnFleetTourActivity"
                                                        );
                $this->groups["##EINSTELLUNGEN##"]=array("class.fnTourAssignments"
                                                            ,"class.fnDriver2Tour"
                                                            ,"class.fnAndroidConfiguration"
                                                            ,"class.fnCustomTour"
                                                            ,"class.fnImports"
                                                            );
                $systemURL="https://be.trace2.de/trace2/service.php";
                $systemName="trace2";
                $systemDefaultParams="&format=json";
                $xsdArray=$generator->getResults();
                
                foreach ($this->groups as $key=>$val) {
                    $functionHTML="";
                    //Funktionsübersicht zur Gruppe bauen
                    foreach ($val as $className) {
                         //Zähle Funktionen zur Klasse
                         $functionCounter=0;
                         $deactivateFunction="";
                         if (isset($xsdArray[$className.".xsd"])) {
                             foreach($xsdArray[$className.".xsd"]["functions"] as $functionDetails) {
                                 $functionCounter++;
                             }
                         } else {
                             $deactivateFunction="disabled";
                         }
                         $functionHTML.='<a href="#'.$this->jQueryFriendly($className).'" class="list-group-item page-scroll '.$deactivateFunction.'"><span class="badge">'.$functionCounter.'</span>'.l8n::getText($className).'</a>';
                    }
                    $page=str_replace($key,$functionHTML,$page);
                    
                    $classDetailsHTML="";
                    //Funktionsdetails bauen
                    foreach ($val as $className) {
                         //Zähle Funktionen zur Klasse
                         if (isset($xsdArray[$className.".xsd"])) {
                            $klassenbeschreibung="";
                            if (isset($xsdArray[$className.".xsd"]["functions"][getLang()])) {
                                $klassenbeschreibung="(".$xsdArray[$className.".xsd"]["functions"][getLang()].")";
                            }
                            $classDetailsHTML.='
                            <section id="'.$this->jQueryFriendly($className).'" class="">
                                <div class="container">
                                    <div class="row">
                                        <h2 class="section-heading">'.l8n::getText($className).'</h2>
                                        <h3 class="section-subheading-n text-muted">'.l8n::getText("class_description").' <b>'.l8n::getText($className).'</b>. '.$klassenbeschreibung.'</h3>
                                    </div>
                                    <div class="row">';
                             foreach($xsdArray[$className.".xsd"]["functions"] as $functionname => $functionvalues) {
                                    $funktionsbeschreibung="";
                                    if (isset($xsdArray[$className.".xsd"]["functions"][$functionname][getLang()])) {
                                        $tmpBeschr="";
                                        if (strlen(utf8_encode($xsdArray[$className.".xsd"]["functions"][$functionname][getLang()])) > 85) {
                                            $tmpBeschr=substr(utf8_encode($xsdArray[$className.".xsd"]["functions"][$functionname][getLang()]),0,100)."...";
                                        } else {
                                            $tmpBeschr=substr(utf8_encode($xsdArray[$className.".xsd"]["functions"][$functionname][getLang()]),0,100);
                                        }
                                        $funktionsbeschreibung="(<span title='".utf8_encode($xsdArray[$className.".xsd"]["functions"][$functionname][getLang()])."'>".$tmpBeschr."</span>)";
                                    }
                                    $classDetailsHTML.='
                                                

                                                <div class="panel panel-default">
                                                    <div class="panel-heading bold"><i class="fa fa-globe fa-blue"></i> '.$xsdArray[$className.".xsd"]["classname"].'.'.$functionname.' '.$funktionsbeschreibung.'</div>
                                                    <div class="panel-body">
                                                    ';
                                    
                                    $parameters="";
                                    //Gibt es Parameter? Wenn ja dann in Tabelle einfügen und URL bauen
                                    $paramCount=1;
                                    $paramlist="";
                                    if (isset($xsdArray[$className.".xsd"]["functions"][$functionname]["parameter"])) {
                                        $classDetailsHTML.=l8n::getText("paramdescription").'
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>'.l8n::getText("table_head_name").'</th>
                                                            <th>'.l8n::getText("table_head_typ").'</th>
                                                            <th>'.l8n::getText("table_head_beschreibung").'</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>';
                                        foreach ($xsdArray[$className.".xsd"]["functions"][$functionname]["parameter"] as $paramnum =>$paramvals) {
                                            $pflicht="";
                                            if ($xsdArray[$className.".xsd"]["functions"][$functionname]["parameter"][$paramnum]["minOccurs"]!="1") {
                                                $pflicht="(".l8n::getText("nrequired").")";
                                            }
                                            $classDetailsHTML.='<tr>
                                                                    <td>'.$paramCount.'</td>
                                                                    <td>'.$paramvals["name"].' '.$pflicht.'</td>
                                                                    <td>'.str_replace("xs:","",$paramvals["type"]).'</td>
                                                                    <td>'.utf8_encode($paramvals[getLang()]).'</td>
                                                                  </tr>';
                                            $paramlist.="&".$paramvals["name"]."=".l8n::getText(str_replace("xs:","",$paramvals["type"]));                                          
                                            $paramCount++;
                                        }
                                        $classDetailsHTML.='
                                                                </tbody>
                                                              </table>
                                                            ';
                                        
                                        
                                    } else {
                                        $classDetailsHTML.=l8n::getText("no_param_desc");
                                    }
                                    $classDetailsHTML.='</div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading bold">'.l8n::getText("exa_http_get").'</div>
                                                            <div class="panel-body">
                                                                <code>'.$systemURL.'?function='.$systemName.'.'.$xsdArray[$className.".xsd"]["classname"].'.'.$functionname.$paramlist.$systemDefaultParams.'</code>
                                                            </div>
                                                        </div>
                                            
                                            
                                                        

                                                    
                                             ';
                                    
                                    
                             }
                             $classDetailsHTML.='</div>


                                                </div>
                                            </section>';
                         }
                    }
                    
                    
                    $page=str_replace("##FC".str_replace("#","",$key)."##",$classDetailsHTML,$page);
                    
                }
                
                //Navi Anzahl der Klasse setzen
                $page=str_replace("##STAMMDATENCOUNT##",count($this->groups["##STAMMDATEN##"]),$page);
                $page=str_replace("##ERGEBNISSECOUNT##",count($this->groups["##ERGEBNISSE##"]),$page);
                $page=str_replace("##EINSTELLUNGENCOUNT##",count($this->groups["##EINSTELLUNGEN##"]),$page);
                
                
                $this->HTML=$page;
	}	
		
	public function getHTML() {
		return $this->HTML;
	}
	private function getErrorPage() {
		return "404.php";
	}
	private function noRequirementsPage() {
		return "login.php";
	}
        private function jQueryFriendly($text) {
            return str_replace("class.","",$text);
        }
}