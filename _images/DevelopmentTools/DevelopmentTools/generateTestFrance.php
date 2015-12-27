<?php
class generateTestIdeeFrance {

	public $subsclass = "";
	public $functionlist = array();

	public static $produkt = "testProdukt12";
	public static $plz = "40822";
	public static $id = "5";



	public static $aBisZ = "abcdefghijklmnopqrstuvwxyz";
	public static $aBisZGross = "CBCDEFGHIJKLMNOPQRSTUVWXYZ";
	public static $nullBis9 = "0123456789";
	public static $exampleStringsAll = array("Ä","Äb","Äbc","äbcd","äbcde","äbcdef","äbcdefg","äbcdefgh","äbcdefghij","äbcdefghijk","äbcdefghijkl","äbcdefghijklm","äbcdefghijklmn","äbcdefghijklmno","äbcdefghijklmnop","äbcdefghijklmnopq","äbcdefghijklmnopqr","äbcdefghijklmnopqrs","äbcdefghijklmnopqrst","äbcdefghijklmnopqrstu","äbcdefghijklmnopqrstuv","äbcdefghijklmnopqrstuvw","äbcdefghijklmnopqrstuvwx","äbcdefghijklmnopqrstuvwxy","äbcdefghijklmnopqrstuvwxyz","äbcdefghijklmnopqrstuvwxyzC","äbcdefghijklmnopqrstuvwxyzCB","äbcdefghijklmnopqrstuvwxyzCBC","äbcdefghijklmnopqrstuvwxyzCBCD","äbcdefghijklmnopqrstuvwxyzCBCDE","äbcdefghijklmnopqrstuvwxyzCBCDEF","äbcdefghijklmnopqrstuvwxyzCBCDEFGH","äbcdefghijklmnopqrstuvwxyzCBCDEFGHI","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJ","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJK","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKL","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLM","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMN","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNO","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOP","äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQÀàÂâÆæÇçÈèÉéÊêËëÎîÏïÔôŒœÙùÛûŸÿ»«");
	public static $exampleStringsDecima = array("a","ab","ab1","ab1d","ab1de","ab1def","ab1defg","ab1defgh","ab1defghij","ab1defghijk","ab1defghijkl","ab1defghijklm","ab1defghijklmn","ab1defghijklmno","ab1defghijklmnop","ab1defghijklmnopq","ab1defghijklmnopqr","ab1defghijklmnopqrs","ab1defghijklmnopqrst","ab1defghijklmnopqrstu","ab1defghijklmnopqrstuv","ab1defghijklmnopqrstuvw","ab1defghijklmnopqrstuvwx","ab1defghijklmnopqrstuvwxy","ab1defghijklmnopqrstuvwxyz","ab1defghijklmnopqrstuvwxyzC","ab1defghijklmnopqrstuvwxyzCB","ab1defghijklmnopqrstuvwxyzCBC","ab1defghijklmnopqrstuvwxyzCBCD","ab1defghijklmnopqrstuvwxyzCBCDE","ab1defghijklmnopqrstuvwxyzCBCDEF","ab1defghijklmnopqrstuvwxyzCBCDEFGH","ab1defghijklmnopqrstuvwxyzCBCDEFGHI","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJ","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJK","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKL","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKLM","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKLMN","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKLMNO","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOP","ab1defghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ");
	public static $exampleStringKlein = array("a","ab","abc","abcd","abcde","abcdef","abcdefg","abcdefgh","abcdefghij","abcdefghijk","abcdefghijkl","abcdefghijklm","abcdefghijklmn","abcdefghijklmno","abcdefghijklmnop","abcdefghijklmnopq","abcdefghijklmnopqr","abcdefghijklmnopqrs","abcdefghijklmnopqrst","abcdefghijklmnopqrstu","abcdefghijklmnopqrstuv","abcdefghijklmnopqrstuvw","abcdefghijklmnopqrstuvwx","abcdefghijklmnopqrstuvwxy","abcdefghijklmnopqrstuvwxyz","abcdefghijklmnopqrstuvwxyza","abcdefghijklmnopqrstuvwxyzab","abcdefghijklmnopqrstuvwxyzabc","abcdefghijklmnopqrstuvwxyzabcd","abcdefghijklmnopqrstuvwxyzabcde","abcdefghijklmnopqrstuvwxyzabcdef","abcdefghijklmnopqrstuvwxyzabcdefg","abcdefghijklmnopqrstuvwxyzabcderfgh","abcdefghijklmnopqrstuvwxyzabcdefghi","abcdefghijklmnopqrstuvwxyzabcdefghij","abcdefghijklmnopqrstuvwxyzabcdefghijk","abcdefghijklmnopqrstuvwxyzabcdefghijkl","abcdefghijklmnopqrstuvwxyzabcdefghijklm","abcdefghijklmnopqrstuvwxyzabcdefghijklmn","abcdefghijklmnopqrstuvwxyzabcdefghijklmno","abcdefghijklmnopqrstuvwxyzabcdefghijklmnop","abcdefghijklmnopqrstuvwxyzhzgzgzugjzgjfbzkvz");
	public static $exampleStringGroß = array("A","AB","ABC","ABCD","ABCDE","ABCDEF","ABCDEFG","ABCDEFGH","ABCDEFGHIJ","ABCDEFGHIJK","ABCDEFGHIJKL","ABCDEFGHIJKLM","ABCDEFGHIJKLMN","ABCDEFGHIJKLMNO","ABCDEFGHIJKLMNOP","ABCDEFGHIJKLMNOPQ","ABCDEFGHIJKLMNOPQR","ABCDEFGHIJKLMNOPQRS","ABCDEFGHIJKLMNOPQRST","ABCDEFGHIJKLMNOPQRSTU","ABCDEFGHIJKLMNOPQRSTUV","ABCDEFGHIJKLMNOPQRSTUVW","ABCDEFGHIJKLMNOPQRSTUVWX","ABCDEFGHIJKLMNOPQRSTUVWXY","ABCDEFGHIJKLMNOPQRSTUVWXYZ","ABCDEFGHIJKLMNOPQRSTUVWXYZA","ABCDEFGHIJKLMNOPQRSTUVWXYZAB","ABCDEFGHIJKLMNOPQRSTUVWXYZABC","ABCDEFGHIJKLMNOPQRSTUVWXYZABCD","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDE","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEF","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFG","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDERFGH","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHI","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJ","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJK","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKL","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLM","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMN","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNO","ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOP","ABCDEFGHIJKLMNOPQRSTUVWXYZHZGZGZUGJZGJFBZKVZEFWFWEFFW");
	public static $exampleDecinma = array("0","01","012","0123","01234","012345","0123456","01234567","012345678","0123456789","01234567890","012345678901","0123456789012","01234567890123","012345678901234","0123456789012345","01234567890123456","012345678901234567","0123456789012345678","01234567890123456789","012345678901234567890","0123456789012345678901","01234567890123456789012","012345678901234567890123","0123456789012345678901234","01234567890123456789012345","012345678901234567890123456","0123456789012345678901234567","01234567890123456789012345678","012345678901234567890123456789","0123456789012345678901234567890","01234567890123456789012345678901","012345678901234567890123456789012","0123456789012345678901234567890123","01234567890123456789012345678901234","012345678901234567890123456789012345","0123456789012345678901234567890123456","01234567890123456789012345678901234567","012345678901234567890123456789012345678","0123456789012345678901234567890123456789","01234567890123456789012345678901234567890","017263748291029384756201928374657438391019283746573482391201929");
	public static $exampleStringsGroßKlein = array("a","aB","aBc","aBcD","aBcDe","aBcDeF","aBcDeFg","aBcDeFgH","aBcDeFgHiJ","aBcDeFgHiJk","aBcDeFgHiJkL","aBcDeFgHiJkLm","aBcDeFgHiJkLmN","aBcDeFgHiJkLmNo","aBcDeFgHiJkLmNoP","aBcDeFgHiJkLmNoPq","aBcDeFgHiJkLmNoPqR","aBcDeFgHiJkLmNoPqRs","aBcdefghijklmnopqrst","abcdeFghijklmnopqrstu","abcdeFghijklmnopqrstuv","abcdefghIjklmnopqrstuvw","abcdefghijklmNopqrstuvwx","abcdefghijklmnoPqrstuvwxy","abcdefghijklmnOpqrstuvwxyz","abcdefghijklmnopqrstuvwxyzC","abcdefghijklmnopqrstuvwxyzCB","abcdefghijklmnopqrstuvwxyzCBC","abcdefghijklmnopqrstuvwxyzCBCD","abcdefghijklmnopqrstuvwxyzCBCDE","abcdefghijklmnopqrstuvwxyzCBCDEF","abcdefghijklmnopqrstuvwxyzCBCDEFGH","abcdefghijklmnopqrstuvwxyzCBCDEFGHI","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJ","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJK","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKL","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLM","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMN","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNO","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOP","abcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ");

	public function checkTyp($Typ)
	{	
		if($Typ == "xs:float")
		{
			$patternright = "1.2";
			$patternfalse = generateTestIdeeFrance::$exampleStringGroß[3];
		}
		if($Typ == "xs:string")
		{
			$patternright = generateTestIdeeFrance::$exampleStringsAll[40];
			$patternfalse = generateTestIdeeFrance::$exampleDecinma[3];
		}
		if($Typ == "xs:integer")
		{
			$patternright = generateTestIdeeFrance::$exampleDecinma[3];
			$patternfalse = generateTestIdeeFrance::$exampleStringsAll[40];
		}
		if($Typ == "xs:int")
		{
			$patternright = generateTestIdeeFrance::$exampleDecinma[3];
			$patternfalse = generateTestIdeeFrance::$exampleStringsAll[40];
		}
		if($Typ == "xs:boolean")
		{
			$patternright = true;
			$patternfalse = generateTestIdeeFrance::$exampleDecinma[4];
		}
		if($type == "xs:date")
		{
			$rightpattern = "2012-12-12";
			$falsepattern = "2012-45-34-12";
			if($pflich == 0) 
			{
				$rightpatternMandatory = "2012-12-12";
				$falsepatternMandatory = "2012-45-34-12";
			}
		}
		if($type == "xs:time")
		{
			$rightpattern = "12:00:12";
			$falsepattern = "5000:60000:30000";
			if($pflich == 0) 
			{
				$rightpatternMandatory = "12:00:12";
				$falsepatternMandatory = "5000:60000:30000";
			}
		}
		return $patternright.",".$patternfalse;
	}
	
	public function checkPattern($pattern) {
		$unendlich = strpos($pattern, "*");
		if(strpos($pattern, "{") > 0) {
			$minZeichen = substr($pattern,strpos($pattern, "{")+1,1);
			$maxZeichen = substr($pattern,strpos($pattern, "{")+3,1);
			$maxZeichen = intval($maxZeichen);
			$minZeichen = intval($minZeichen);
			if(!is_numeric($maxZeichen) || $maxZeichen < $minZeichen) {
				$maxZeichen = $minZeichen + 1;
			}
			$pattern = str_replace("\\","", $pattern);
		}
		else {
			$pattern = str_replace("*$","", $pattern);
			$pattern = str_replace("\\","", $pattern);
		}
		$pattern = substr($pattern,0,strpos($pattern,"]")+2);
		if($pattern == "^([0-9])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleDecinma[count(generateTestIdeeFrance::$exampleDecinma)-1];
				$falsepattern = generateTestIdeeFrance::$exampleStringGroß[count(generateTestIdeeFrance::$exampleStringGroß)-1];
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleDecinma[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringKlein[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleDecinma[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringKlein[$i];
				}
			}
		}
		if($pattern == "^([a-zA-Z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleStringsGroßKlein[count(generateTestIdeeFrance::$exampleStringsGroßKlein)-1];
				$falsepattern = generateTestIdeeFrance::$exampleDecinma[count(generateTestIdeeFrance::$exampleDecinma)-1];
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsGroßKlein[$i];
					$falsepattern = generateTestIdeeFrance::$exampleDecinma[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsGroßKlein[$i];
					$falsepattern = generateTestIdeeFrance::$exampleDecinma[$i];
				}
			}
		}
		if($pattern == "^([a-zA-Z0-9])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleStringsDecima[count(generateTestIdeeFrance::$exampleStringsDecima)-1];
				$falsepattern = generateTestIdeeFrance::$exampleStringsAll[count(generateTestIdeeFrance::$exampleStringsAll)-1];
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsDecima[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringsAll[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsDecima[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringsAll[$i];
				}
			}
		}
		if($pattern == "^([a-z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleStringKlein[count(generateTestIdeeFrance::$exampleStringKlein)-1];
				$falsepattern = generateTestIdeeFrance::$exampleStringGroß[count(generateTestIdeeFrance::$exampleStringGroß)-1];
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringKlein[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringGroß[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringKlein[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringGroß[$i];
				}
			}
		}
		if($pattern == "^([a-zA-ZÄÖÜüöäß(),_0-9.- ])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleStringsAll[count(generateTestIdeeFrance::$exampleStringsAll)-1];
				$falsepattern = "{";
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsAll[$i];
					$falsepattern = "}";
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringsAll[$i];
					$falsepattern = "}";
				}
			}
		}
		if($pattern == "^([A-Z])") {
			if($unendlich > 0) {
				$rightpattern = generateTestIdeeFrance::$exampleStringGroß[count(generateTestIdeeFrance::$exampleStringGroß)-1];
				$falsepattern = generateTestIdeeFrance::$exampleDecinma[count(generateTestIdeeFrance::$exampleDecinma)-1];
			}
			else {
				for($i=0;$i<$minZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringGroß[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringKlein[$i];
				}
				for($i=$minZeichen; $i<=$maxZeichen-2;$i++) {
					$rightpattern = generateTestIdeeFrance::$exampleStringGroß[$i];
					$falsepattern = generateTestIdeeFrance::$exampleStringKlein[$i];
				}
			}
		}
		return $rightpattern.",".$falsepattern;
	}

	public static function getClazz() {
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
		$typpat = true;
		$xQueryString='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/*';
		$xResult=$xpath->query($xQueryString);
		$paramlist["ParamFalse"] = "&invalidParams={";
		foreach($xResult as $key => $value) {
				$type = "";
				$type = $value->getAttribute("type");
				if($type == "") {
					$type = " Nicht vorhanden";
					$typpat = false;
				}
				$pflich = $value->getAttribute("minOccurs");
				if($pflich == "") {
					$pflich = 0;
				}
				$patternsgene = generateTestIdeeFrance::checkTyp($type);
				$patternsexplo = explode(",",$patternsgene);
				$rightpattern = $patternsexplo[0];
				$falsepattern = $patternsexplo[1];
				$rightpatternMandatory = $patternsexplo[0];
				$falsepatternMandatory = $patternsexplo[1];
				$paramlist["Pflichtfeld"] .= $pflich;
				$param = $value->getAttribute("name");
				$xQueryStringtest = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/xs:restriction/*';
				$xResulttest=$xpath->query($xQueryStringtest);
				foreach($xResulttest as $k => $v) {
					$zwischpattern = "";
					$maxZeichen = 0;
					$minZeichen = 0;
					$zwischpattern = $v->getAttribute("value");
					if($pflich == 0) {
						$zwischpatternMandatory = $v->getAttribute("value");
					}
					$paramlist["PatternSelf"] .= $zwischpattern;
					$patterns = generateTestIdeeFrance::checkPattern($zwischpattern);
					$patternsMand = generateTestIdeeFrance::checkPattern($zwischpatternMandatory);
					$patternsMand = explode(",", $patternsMand);
					$patterns = explode(",", $patterns);
					if(!$typpat)
					{
						$rightpattern = $patterns[0];
						$falsepattern = $patterns[1];
						$rightpatternMandatory = $patternsMand[0];
						$falsepatternMandatory = $patternsMand[1];
					}
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
			$ende = "\n/**\n *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf\n*/\n testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {appName:\"KIS\", loginuser:'cblazek@qits.de', loginpassword:'qits', 'onSuccess':function(skey) {testing.run(testcases,skey);}}); \n\n";
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
$clazz = generateTestIdeeFrance::getClazz();
$functionList = array();
$paramlist = array();
foreach ($clazz as $key => $value) {
	$functionList[$key] = generateTestIdeeFrance::getFunctionList($value);
	foreach($functionList[$key] as $k => $v) {
		$paramlist[$value][$v["name"]] = generateTestIdeeFrance::getParameterList($v["name"],$v["doc"],$v["clazz"]);
	}
}
//print_r($paramlist);
generateTestIdeeFrance::generateDat($functionList, $paramlist);
