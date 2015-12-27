<?php
class generateTestIdee {

	public $subsclass = "";
	public $functionlist = array();

	public static $produkt = "testProdukt12";
	public static $plz = "40822";
	public static $id = "5";



	public static $aBisZ = "abcdefghijklmnopqrstuvwxyz";
	public static $aBisZGross = "CBCDEFGHIJKLMNOPQRSTUVWXYZ";
	public static $nullBis9 = "0123456789";
	public static $exampleStrings = array("a","ab","abc","abcd","abcde","abcdef","abcdefg","abcdefgh","abcdefghij","abcdefghijk","abcdefghijkl","abcdefghijklm","abcdefghijklmn","abcdefghijklmno","abcdefghijklmnop","abcdefghijklmnopq","abcdefghijklmnopqr","abcdefghijklmnopqrs","abcdefghijklmnopqrst","abcdefghijklmnopqrstu","abcdefghijklmnopqrstuv","abcdefghijklmnopqrstuvw","abcdefghijklmnopqrstuvwx","abcdefghijklmnopqrstuvwxy","abcdefghijklmnopqrstuvwxyz","abcdefghijklmnopqrstuvwxyzC","abcdefghijklmnopqrstuvwxyzCB","abcdefghijklmnopqrstuvwxyzCBC","abcdefghijklmnopqrstuvwxyzCBCD","abcdefghijklmnopqrstuvwxyzCBCDE","abcdefghijklmnopqrstuvwxyzCBCDEF","abcdefghijklmnopqrstuvwxyzCBCDEFGH","abcdefghijklmnopqrstuvwxyzCBCDEFGHI","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJ","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJK","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKL","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLM","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMN","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNO","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOP","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ");
	public static $exampleStringKlein = array("a","ab","abc","abcd","abcde","abcdef","abcdefg","abcdefgh","abcdefghij","abcdefghijk","abcdefghijkl","abcdefghijklm","abcdefghijklmn","abcdefghijklmno","abcdefghijklmnop","abcdefghijklmnopq","abcdefghijklmnopqr","abcdefghijklmnopqrs","abcdefghijklmnopqrst","abcdefghijklmnopqrstu","abcdefghijklmnopqrstuv","abcdefghijklmnopqrstuvw","abcdefghijklmnopqrstuvwx","abcdefghijklmnopqrstuvwxy","abcdefghijklmnopqrstuvwxyz","abcdefghijklmnopqrstuvwxyza","abcdefghijklmnopqrstuvwxyzab","abcdefghijklmnopqrstuvwxyzabc","abcdefghijklmnopqrstuvwxyzabcd","abcdefghijklmnopqrstuvwxyzabcde","abcdefghijklmnopqrstuvwxyzabcdef","abcdefghijklmnopqrstuvwxyzabcdefg","abcdefghijklmnopqrstuvwxyzabcderfgh","abcdefghijklmnopqrstuvwxyzabcdefghi","abcdefghijklmnopqrstuvwxyzabcdefghij","abcdefghijklmnopqrstuvwxyzabcdefghijk","abcdefghijklmnopqrstuvwxyzabcdefghijkl","abcdefghijklmnopqrstuvwxyzabcdefghijklm","abcdefghijklmnopqrstuvwxyzabcdefghijklmn","abcdefghijklmnopqrstuvwxyzabcdefghijklmno","abcdefghijklmnopqrstuvwxyzabcdefghijklmnop","abcdefghijklmnopqrstuvwxyzhzgzgzugjzgjfbzkvz");
	public static $exampleStringGroß = array("A","AB","ABC","ABCD","ABCDE","ABCDEF","ABCDEFG","ABCDEFGH","ABCDEFGHIJ","ABCDEFGHIJK","ABCDEFGHIJKL","ABCDEFGHIJKLM","ABCDEFGHIJKLMN","ABCDEFGHIJKLMNO","ABCDEFGHIJKLMNOP","ABCDEFGHIJKLMNOPQ","ABCDEFGHIJKLMNOPQR","ABCDEFGHIJKLMNOPQRS","ABCDEFGHIJKLMNOPQRST","ABCDEFGHIJKLMNOPQRSTU","ABCDEFGHIJKLMNOPQRSTUV","ABCDEFGHIJKLMNOPQRSTUVW","ABCDEFGHIJKLMNOPQRSTUVWX","ABCDEFGHIJKLMNOPQRSTUVWXY","ABCDEFGHIJKLMNOPQRSTUVWXYZ","ABCDEFGHIJKLMNOPQRSTUVWXYZA","ABCDEFGHIJKLMNOPQRSTUVWXYZAB","ABCDEFGHIJKLMNOPQRSTUVWXYZABC","ABCDEFGHIJKLMNOPQRSTUVWXYZABCD","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDE","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEF","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFG","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDERFGH","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHI","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJ","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJK","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKL","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLM","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMN","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNO","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOP","ABCDEFGHIJKLMNOPQRSTUVWXYZHZGZGZUGJZGJFBZKVZEFWFWEFFW");
	public static $exampleDecinma = array("0","01","012","0123","01234","012345","0123456","01234567","012345678","0123456789","01234567890","012345678901","0123456789012","01234567890123","012345678901234","0123456789012345","01234567890123456","012345678901234567","0123456789012345678","01234567890123456789","012345678901234567890","0123456789012345678901","01234567890123456789012","012345678901234567890123","0123456789012345678901234","01234567890123456789012345","012345678901234567890123456","0123456789012345678901234567","01234567890123456789012345678","012345678901234567890123456789","0123456789012345678901234567890","01234567890123456789012345678901","012345678901234567890123456789012","0123456789012345678901234567890123","01234567890123456789012345678901234","012345678901234567890123456789012345","0123456789012345678901234567890123456","01234567890123456789012345678901234567","012345678901234567890123456789012345678","0123456789012345678901234567890123456789","01234567890123456789012345678901234567890","017263748291029384756201928374657438391019283746573482391201929");
	public static $exampleStringsGroßKlein = array("a","aB","aBc","aBcD","aBcDe","aBcDeF","aBcDeFg","aBcDeFgH","aBcDeFgHiJ","aBcDeFgHiJk","aBcDeFgHiJkL","aBcDeFgHiJkLm","aBcDeFgHiJkLmN","aBcDeFgHiJkLmNo","aBcDeFgHiJkLmNoP","aBcDeFgHiJkLmNoPq","aBcDeFgHiJkLmNoPqR","aBcDeFgHiJkLmNoPqRs","aBcdefghijklmnopqrst","abcdeFghijklmnopqrstu","abcdeFghijklmnopqrstuv","abcdefghIjklmnopqrstuvw","abcdefghijklmNopqrstuvwx","abcdefghijklmnoPqrstuvwxy","abcdefghijklmnOpqrstuvwxyz","abcdefghijklmnopqrstuvwxyzC","abcdefghijklmnopqrstuvwxyzCB","abcdefghijklmnopqrstuvwxyzCBC","abcdefghijklmnopqrstuvwxyzCBCD","abcdefghijklmnopqrstuvwxyzCBCDE","abcdefghijklmnopqrstuvwxyzCBCDEF","abcdefghijklmnopqrstuvwxyzCBCDEFGH","abcdefghijklmnopqrstuvwxyzCBCDEFGHI","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJ","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJK","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKL","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLM","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMN","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNO","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOP","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ");
	public static $exampleDate = array("2012-12-12");

	public function checkPattern($pattern) {
		$unendlich = strpos($pattern, "*");
		//$rightpattern = $pattern;
		if(strpos($pattern, "{") > 0) {
			$minZeichen = substr($pattern,strpos($pattern, "{")+1,1);
			$maxZeichen = substr($pattern,strpos($pattern, "{")+3,1);
			$maxZeichen = intval($maxZeichen);
			$minZeichen = intval($minZeichen);
		}
		else {
			$pattern = str_replace("*$","", $pattern);
			$pattern = str_replace("\\","", $pattern);
		}
		$pattern = substr($pattern,0,strpos($pattern,"]")+2);
		if($pattern == "^([0-9])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdee::$exampleDecinma[count(generateTestIdee::$exampleDecinma)-1];
				$falsepattern = generateTestIdee::$exampleStringGroß[count(generateTestIdee::$exampleStringGroß)-1];
			}
			else {
				for($i=0;$i<$minZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleDecinma[$i];
					$falsepattern = generateTestIdee::$exampleStringKlein[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleDecinma[$i];
					$falsepattern = generateTestIdee::$exampleStringKlein[$i];
				}
			}
		}
		if($pattern == "^([a-zA-Z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdee::$exampleStringsGroßKlein[count(generateTestIdee::$exampleStringsGroßKlein)-1];
				$falsepattern = generateTestIdee::$exampleDecinma[count(generateTestIdee::$exampleDecinma)-1];
			}
			else {
				for($i=0;$i<$minZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringsGroßKlein[$i];
					$falsepattern = generateTestIdee::$exampleDecinma[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringsGroßKlein[$i];
					$falsepattern = generateTestIdee::$exampleDecinma[$i];
				}
			}
		}
		if($pattern == "^([a-z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdee::$exampleStringKlein[count(generateTestIdee::$exampleStringKlein)-1];
				$falsepattern = generateTestIdee::$exampleStringGroß[count(generateTestIdee::$exampleStringGroß)-1];
			}
			else {
				for($i=0;$i<$minZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringKlein[$i];
					$falsepattern = generateTestIdee::$exampleStringGroß[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringKlein[$i];
					$falsepattern = generateTestIdee::$exampleStringGroß[$i];
				}
			}
		}
		if($pattern == "^([a-zA-ZÜÖÄüöäß(),_0-9.- ])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdee::$exampleStrings[count(generateTestIdee::$exampleStrings)-1];
				$falsepattern = "{";
			}
			else {
				for($i=0;$i<$minZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStrings[$i];
					$falsepattern = "}";
				}
				for($i=$minZeichen; $i<=$maxZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStrings[$i];
					$falsepattern = "}";
				}
			}
		}
		if($pattern == "^([A-Z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdee::$exampleStringGroß[count(generateTestIdee::$exampleStringGroß)-1];
				$falsepattern = generateTestIdee::$exampleDecinma[count(generateTestIdee::$exampleDecinma)-1];
			}
			else {
				for($i=0;$i<$minZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringGroß[$i];
					$falsepattern = generateTestIdee::$exampleStringKlein[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen;$i++) {
					$rightpattern = generateTestIdee::$exampleStringGroß[$i];
					$falsepattern = generateTestIdee::$exampleStringKlein[$i];
				}
			}
		}
		return $rightpattern.",".$falsepattern;
	}

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
				$type = "";
				$type = $value->getAttribute("type");
				if($type == "") {
					$type = " Nicht vorhanden";
				}
				$pflich = $value->getAttribute("minOccurs");
				if($pflich == "") {
					$pflich = 0;
				}
				if($type == "xs:date") {
					$rightpattern = "2012-12-12";
					$falsepattern = "2012-45-34-12";
					if($pflich == 0) {
						$rightpatternMandatory = "2012-12-12";
						$falsepatternMandatory = "2012-45-34-12";
					}
				}
				if($type == "xs:time") {
					$rightpattern = "12:00:12";
					$falsepattern = "5000:60000:30000";
					if($pflich == 0) {
						$rightpatternMandatory = "12:00:12";
						$falsepatternMandatory = "5000:60000:30000";
					}
				}
				$paramlist["Pflichtfeld"] .= $pflich;
				$param = $value->getAttribute("name");
				$xQueryStringtest = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/xs:restriction/*';
				$xResulttest=$xpath->query($xQueryStringtest);
				foreach($xResulttest as $k => $v) {
					$rightpattern = "";
					$falsepattern = "";
					$maxZeichen = 0;
					$minZeichen = 0;
					$zwischpattern = $v->getAttribute("value");
					if($pflich == 0) {
						$zwischpatternMandatory = $v->getAttribute("value");
					}
					$paramlist["PatternSelf"] .= $zwischpattern;
					$patterns = generateTestIdee::checkPattern($zwischpattern);
					$patternsMand = generateTestIdee::checkPattern($zwischpatternMandatory);
					$patternsMand = explode(",", $patternsMand);
					$patterns = explode(",", $patterns);
					$rightpattern = $patterns[0];
					$falsepattern = $patterns[1];
					$rightpatternMandatory = $patternsMand[0];
					$falsepatternMandatory = $patternsMand[1];
					if($zwischpattern == "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$") {
						$rightpattern = "cblazek@qits.de";
						$falsepattern = "test@test@test@test.de.com.ck";
					}
					if($zwischpatternMandatory == "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$") {
						$rightpattern = "cblazek@qits.de";
						$falsepattern = "test@test@test@test.de.com.ck";
					}
				}
				$paramlist["ParamRight"] .= "&".$param."=".$rightpattern;
				$paramlist["ParamFalse"] .= "&".$param."=".$falsepattern;
				$paramlist["ParamRightMandatory"] .= "&".$param."=".$rightpatternMandatory;
				$paramlist["ParamFalseMandatory"] .= "&".$param."=".$falsepatternMandatory;
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
				//$falseClass = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Falsche Klasse uebergeben\", 'functionName': 'function=KIS.fnNoClass.".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 543, 'useSession':true}";
				$unknowFunction = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Unbekannte Klasse uebergeben\", 'functionName': 'function=KIS.".$v["clazz"]."et.".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 542, 'useSession':true}";
				$noSession = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Es wurde kein Sessionkey uebergeben\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamRight"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 551, 'useSession':false}";
				if($paramList[$v["clazz"]][$v["name"]]["ParamFalse"] != "&invalidParams={") {
					$falseParams = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Falsche Parameter\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["clazz"]][$v["name"]]["ParamFalse"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 514, 'useSession':true}";
					$paramList[$v["clazz"]][$v["name"]]["ParamRight"] = substr($paramList[$v["clazz"]][$v["name"]]["ParamRight"], strrpos($paramList[$v["clazz"]][$v["name"]]["ParamRight"], "&")+1,strrpos($paramList[$v["clazz"]][$v["name"]]["ParamRight"], "&"));
					$mandatoryParam = "{'name': \"KIS.".$v["clazz"].".".$v["name"]." Fehlender Parameter\", 'functionName': 'function=KIS.".$v["clazz"].".".$v["name"]."', 'params': '".$paramList[$v["name"]]["ParamRightMandatory"]."&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 545, 'useSession':true}";
				}
				if($missingParam != "") {
					if($k==0) {
						$testcases = "\n var testcases=[".$rightParams.",".$noFunction.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam.",";
					}
					else if($k==count($value)-1) {
						$testcases .= $rightParams.",".$noFunction.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam;
					}
					else {
						$testcases .= $rightParams.",".$noFunction.",".$unknowFunction.",".$falseParams.",".$noSession.",".$missingParam.",";
					}
				}
				else {
					if($k==0) {
						$testcases = "\n var testcases=[".$rightParams.",".$noFunction.",".$unknowFunction.",".$noSession.",";
					}
					else if($k==count($value)-1) {
						$testcases .= $rightParams.",".$noFunction.",".$unknowFunction.",".$noSession;
					}
					else {
						$testcases .= $rightParams.",".$noFunction.",".$unknowFunction.",".$noSession.",";
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
$clazz = generateTestIdee::getClazz();
$functionList = array();
$paramlist = array();
foreach ($clazz as $key => $value) {
	$functionList[$key] = generateTestIdee::getFunctionList($value);
	foreach($functionList[$key] as $k => $v) {
		$paramlist[$value][$v["name"]] = generateTestIdee::getParameterList($v["name"],$v["doc"],$v["clazz"]);
	}
}
//print_r($paramlist);
generateTestIdee::generateDat($functionList, $paramlist);
