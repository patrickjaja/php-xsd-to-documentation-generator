<?php
class generateTest {

	public $subsclass = "";
	public $functionlist = array();

	public static $produkt = "testProdukt12";
	public static $plz = "40822";
	public static $id = "5";



	public static $aBisZ = "abcdefghijklmnopqrstuvwxyz";
	public static $aBisZGross = "CBCDEFGHIJKLMNOPQRSTUVWXYZ";
	public static $nullBis9 = "0123456789";



	public function getClazz() {
		$clazzlist = array();
		$key = 0;
		$verzeichnis = "./xsd/";
		$handle = opendir($verzeichnis);
		while (($file = readdir($handle)) !== false)
		{
			if(strrchr($file,'.')==".xsd") {
				$subsfirst = substr($file,0,strrpos($file,"."));
				$subsclass = substr($subsfirst,strrpos($subsfirst,".")+1);
				$clazzlist[$key] = $subsclass;
				$key++;
			}
		}
		return $clazzlist;
	}
	public function getFunctionList($clazz) {
		$verzeichnis = "./xsd/";
		$functionList = "";
		$handle = $verzeichnis."class.".$clazz.".xsd";
		$doc = new DOMDocument();
		$doc->load($handle);
		$xpath=new DOMXPath($doc);
		$xQueryString='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/*';
		$xResult=$xpath->query($xQueryString);
		$functionList=array();
		foreach($xResult as $key => $value) {
			$functionList[$key]["name"] = $value->getAttribute("name");
			$functionList[$key]["doc"] = $doc;
			$functionList[$key]["clazz"] = $clazz;
		}
		return $functionList;
	}
	public function getParameterList($functionname,$doc,$clazz) {
		$paramlist=array();
		$xpath=new DOMXPath($doc);
		$xQueryString='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/*';
		$xResult=$xpath->query($xQueryString);
		$paramlist["ParamFalse"] = "&invalidParams={";
		foreach($xResult as $key => $value) {
			if($key == 0) {
				$pflich = $value->getAttribute("minOccurs");
				if($pflich == "") {
					$pflich = 0;
				}
				$paramlist["Pflichtfeld"] .= $pflich;
				$param = $value->getAttribute("name");
				$xQueryStringtest = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/xs:restriction/*';
				$xResulttest=$xpath->query($xQueryStringtest);
				foreach($xResulttest as $k => $v) {
					$undendlich = true;
					$pattern = "";
					$rightpattern = "";
					$falsepattern = "";
					$maxZeichen = 0;
					$minZeichen = 0;
					$zwischpattern = $v->getAttribute("value");
					$paramlist["PatternSelf"] .= ",".$zwischpattern;
					$pattern = $zwischpattern;
					$pattern = str_replace("^([", "", $zwischpattern);
					$pattern = str_replace("])", "", $pattern);
					if(strpos($zwischpattern, "a-z") > 0) {
						$pattern .= generateTest::$aBisZ;
						$pattern = str_replace("a-z","", $pattern);
					}
					if(strpos($zwischpattern, "A-Z") > 0) {
						$pattern .= generateTest::$aBisZGross;
						$pattern = str_replace("A-Z","", $pattern);
					}
					if(strpos($zwischpattern, "0-9") > 0) {
						$pattern .= generateTest::$nullBis9;
						$pattern = str_replace("0-9","", $pattern);
					}
					if(strpos($zwischpattern, "{") > 0) {
						$minZeichen = substr($zwischpattern,strpos($zwischpattern, "{")+1,1);
						$maxZeichen = substr($zwischpattern,strpos($zwischpattern, "{")+3,1);
						$maxZeichen = intval($maxZeichen);
						$minZeichen = intval($minZeichen);
						$pattern = substr($pattern,strpos($pattern, "$")+1);
						if($minZeichen > 0 || $maxZeichen > 0) {
							for($i = 1; $i <= $minZeichen; $i++) {
								$rightpattern .= substr($zwischpattern,3,1);
								$falsepattern .= "{";
							}
							for($i = $minZeichen; $i < $maxZeichen-1; $i++) {
								$rightpattern .= substr($zwischpattern,3,1);
								$falsepattern .= "{";
							}
						}
						else {
							$pattern = str_replace("*$", "", $pattern);
							$pattern = str_replace("\\","", $pattern);
							$rightpattern .= $pattern;
							$falsepattern .= "{";
						}
						$undendlich = false;
					}
					$pattern = str_replace("])", "", $pattern);
					$pattern = str_replace("*$", "", $pattern);
					if($undendlich == true) {
						$rightpattern = $pattern;
					}
					if($zwischpattern == "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$") {
						$rightpattern .="test@test.de";
						$falsepattern .="test@test@test@test.de.com.sk";
					}
					else {
						$rightpattern .= "";
						$falsepattern .= "{";
					}
				}
				$paramlist["ParamRight"] .= "&".$param."=".$rightpattern;
				$paramlist["ParamFalse"] = "&".$param."=".$falsepattern;
			}
			else {
				$param = $value->getAttribute("name");
				$pflich = $value->getAttribute("minOccurs");
				if($pflich == "") {
					$pflich = 0;
				}
				$paramlist["Pflichtfeld"] .= ",".$pflich;
				$xQueryStringtest = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/xs:restriction/*';
				$xResulttest=$xpath->query($xQueryStringtest);
				foreach($xResulttest as $k => $v) {
					$pattern = "";
					$rightpattern = "";
					$falsepattern = "";
					$maxZeichen = 0;
					$minZeichen = 0;
					$zwischpattern = $v->getAttribute("value");
					$paramlist["PatternSelf"] .= ",".$zwischpattern;
					$pattern = str_replace("^([", "", $zwischpattern);
					$pattern = str_replace("])", "", $pattern);
					if(strpos($zwischpattern, "a-z") > 0) {
						$pattern .= generateTest::$aBisZ;
						$pattern = str_replace("a-z", "", $pattern);
					}
					if(strpos($zwischpattern, "A-Z") > 0) {
						$pattern .= generateTest::$aBisZGross;
						$pattern = str_replace("A-Z", "", $pattern);
					}
					if(strpos($zwischpattern, "0-9") > 0) {
						$pattern .= generateTest::$nullBis9;
						$pattern = str_replace("0-9", "", $pattern);
					}
					if(strpos($zwischpattern, "{") > 0) {
						$minZeichen = substr($zwischpattern,strpos($zwischpattern, "{")+1,1);
						$maxZeichen = substr($zwischpattern,strpos($zwischpattern, "{")+3,1);
						$maxZeichen = intval($maxZeichen);
						$minZeichen = intval($minZeichen);
						$pattern = substr($pattern,strpos($pattern, "$"));
						if($minZeichen > 0 || $maxZeichen > 0) {
							for($i = 0; $i <= $minZeichen; $i++) {
								$rightpattern .= substr($zwischpattern,3,1);
								$falsepattern .= "{";
							}
							for($i = $minZeichen; $i < $maxZeichen-1; $i++) {
								$rightpattern .= substr($zwischpattern,3,1);
								$falsepattern .= "{";
							}
						}
					}
					else {
						$pattern = str_replace("*$","", $pattern);
						$pattern = str_replace("\\","", $pattern);
						$rightpattern .= $pattern;
						$falsepattern .= "{";
					}
					$pattern = str_replace("])", "", $pattern);
					$pattern = str_replace("*$", "", $pattern);
					$rightpattern = $pattern;
					if($zwischpattern == "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zC-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$") {
						$rightpattern = "test@test.de";
						$falsepattern = "test@test@test@test.de.com.sk";
					}
				}
				$paramlist["ParamRight"] .= "&".$param."=".$rightpattern;
				$paramlist["ParamFalse"] .= "&".$param."=".$falsepattern;
			}

		}
		return $paramlist;
	}
	public function generateDat($functionsList,$paramList) {
		foreach($functionsList as $key => $value) {
			$anfang = "var HOST=\"kis-toitoidixi.de\";\n var testing=require(\"./wstest.js\");\n/**\n* Tests zu dieser Funktion*/";
			$ende = "\n/**\n *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf\n*/\n testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {appName:\"KIS\", loginuser:'pschrei@qits.de', loginpassword:'qits1234', 'onSuccess':function(skey) {testing.run(testcases,skey);}}); \n\n";
			$handle = fopen("./Testdatei/test.".$functionsList[$key][0]["clazz"].".js","c");
			fwrite($handle,$anfang);
			foreach($value as $k => $v) {
				$rightParams = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Korrekte Parameter\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'OK', 'expectedCode' : 101, 'useSession':true}";
				$noFunction = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Kein Funktionsname uebergeben\",'functionName': 'NOfunction', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 544, 'useSession':true}";
				//$falseFunction = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Falscher Funktionsname uebergeben\", 'functionName': 'KIS.".$v["clazz"].".".$v["name"]."et', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 544, 'useSession':true}";
				$falseClass = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Falsche Klasse uebergeben\", 'functionName': 'function=KIS.fnNoClass.".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 543, 'useSession':true}";
				$unknowFunction = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Unbekannte Klasse uebergeben\", 'functionName': 'function=KIS.".$v["clazz"]."et.".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 542, 'useSession':true}";
				$noSession = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Es wurde kein Sessionkey uebergeben\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 551, 'useSession':false}";
				if($paramList[$v["clazz"]][$v["name"]]["ParamFalse"] != "&invalidParams={") {
					$falseParams = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Falsche Parameter\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamFalse"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 514, 'useSession':true}";
					$paramList[$v["clazz"]][$v["name"]]["ParamRight"] = substr($paramList[$v["clazz"]][$v["name"]]["ParamRight"], strrpos($paramList[$v["clazz"]][$v["name"]]["ParamRight"], "&")+1,strrpos($paramList[$v["clazz"]][$v["name"]]["ParamRight"], "&"));
					$missingParam = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Fehlender Parameter\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 545, 'useSession':true}";
				}
				if($missingParam != "") {
					if($k==0) {
						$testcases = "\n var testcases=[".$rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam.",";
					}
					else if($k==count($value)-1) {
						$testcases .= $rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam;
					}
					else {
						$testcases .= $rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam.",";
					}
				}
				else {
					if($k==0) {
						$testcases = "\n var testcases=[".$rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$noSession.",";
					}
					else if($k==count($value)-1) {
						$testcases .= $rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$noSession;
					}
					else {
						$testcases .= $rightParams.",".$noFunction.",".$falseClass.",".$unknowFunction.",".$noSession.",";
					}
				}

			}
			$testcases .= "];";
			fwrite($handle,$testcases);
			fwrite($handle, $ende);
			fclose($handle);
		}
	}

}
$clazz = generateTest::getClazz();
$functionList = array();
$paramlist = array();
foreach ($clazz as $key => $value) {
	$functionList[$key] = generateTest::getFunctionList($value);
	foreach($functionList[$key] as $k => $v) {
		$paramlist[$value][$v["name"]] = generateTest::getParameterList($v["name"],$v["doc"],$v["clazz"]);
	}
}
print_r($paramlist);
//generateTest::generateDat($functionList, $paramlist);
