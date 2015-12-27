<?php
class generateDoc {

	public static function getClazz($lang) {
		$clazzlist = array();
		$key = 0;
		$verzeichnis = "./xsd/";
		$handle = opendir($verzeichnis);
		while (($file = readdir($handle)) !== false)
		{
			if(strrchr($file,'.')==".xsd") {
				$subsfirst = substr($file,0,strrpos($file,"."));
				$subsclass = substr($subsfirst,strrpos($subsfirst,".")+1);
				$clazzlist[$key]["clazz"] = $subsclass;
				$key++;
			}
		}
		foreach($clazzlist as $k => $value) {
			$handletest = $verzeichnis."class.".$value["clazz"].".xsd";
			$doc = new DOMDocument();
			$doc->load($handletest);
			$xpath = new DOMXPath($doc);
			$xQueryStringdoc='/xs:schema/xs:element[@name="' . $value["clazz"] . '"]/xs:annotation/xs:documentation[@lang="'.$lang.'"]';
			$xResultdoc=$xpath->query($xQueryStringdoc);
			foreach($xResultdoc as $ke => $v) {
				$beschreib=$v->textContent;
				$clazzlist[$k]["beschreib"] = $beschreib;
			}
		}
		return $clazzlist;
	}

	public static function generateAllClazzDocumentation($lang) {
		$handle = fopen("./Doc/AllClass_".$lang.".html","c");
		$anfang = "<html><br><head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
					<link rel='shortcut icon' href='../favicon.ico'>
<link rel='stylesheet'
	href='../css/ui-darkness/jquery-ui-1.9.1.custom.css' type='text/css'
	media='all'><title></title><br></head><br><body>";
		$ende = "</body><br></html>";
		$content = "";
		$content .= "<script language='JavaScript'>if (navigator.appName.indexOf('Explorer') != -1){
document.write('Sie benutzen einen beschiessenen Browser bitte nehmen sie einen anderen');
window.location = './AllClass_IE_".$lang.".html';}
else{
window.location = './AllClass_Other_".$lang.".html';
}</script>";

		fwrite($handle, $anfang);
		fwrite($handle, $content);
		fwrite($handle, $ende);
		fclose($handle);
	}

	public static function generateAllClazzDocumentation_Other($clazz,$lang,$langwort) {
		$handle = fopen("./Doc/AllClass_Other_".$lang.".html","c");
		$anfang = "<html><br><head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<link rel='shortcut icon' href='../favicon.ico'>
		<link rel='stylesheet' href='../css/smoothness/jquery-ui-1.9.2.custom.css' type='text/css' media='all'><title></title><br>
		<link rel='apple-touch-icon' href='../icons/apple-touch-icon.png' />
		<link rel='apple-touch-icon-precomposed' sizes='144x144' href='../icons/apple-touch-icon-144x144-precomposed.png' />
		<link rel='apple-touch-icon-precomposed' sizes='114x114' href='../icons/apple-touch-icon-114x114-precomposed.png' />
		<link rel='apple-touch-icon-precomposed' sizes='72x72' href='../icons/apple-touch-icon-72x72-precomposed.png' />
		<link rel='apple-touch-icon-precomposed' sizes='57x57' href='../icons/apple-touch-icon-57x57-precomposed.png' />
		<link rel='stylesheet' href='../css/style.css' type='text/css' media='screen' />
		
		<script src='../js/jquery-1.11.1.min.js'></script>
		<script src='../js/jquery.jpanelmenu.js'></script>
		<script src='../js/smooth-scroll.js'></script>
		<script>
		$(document).ready(function() {

			$('pre').each(function(e, t) {
				hljs.highlightBlock(t)
			});
			jPanelMenu = $.jPanelMenu({
				menu : 'header.main nav',
				animated : !1
			});
			jPanelMenu.on();
			jPanelMenu.open();
					$('.level1').click(function() {
				if($(this).next().children('.level2').css('display') == 'block') {
					$(this).next().children('.level2').css('display','none');
				} else {
					$(this).next().children('.level2').css('display','block');
				}
			});
			$('.level2').click(function() {
				if($(this).next().children('.level3').css('display') == 'block') {
					$(this).next().children('.level3').css('display','none');
				} else {
					$(this).next().children('.level3').css('display','block');
				}
			});
			$('#language').change(function() {
				if($('#language option:selected').val() == 'deutsch') {
					window.location = './AllClass_Other_de.html'
				} else {
					window.location = './AllClass_Other_en.html'
				}
			});
		});
		</script>
		</head><br><body>";
		$ende = "</body><br></html>";
		$content = "<header class='main'>";
		$content .= "<div class='mp-pusher' id='mp-pusher'>
		<h1 class='logo'>".$langwort[$lang]["Menü"]."</h1>
		<a href='#menu' class='menu-trigger ss-icon'>&#xED50;</a>
		<nav>
		<ul>";
		foreach($clazz as $k =>$v) {
			$content .= "
			<h2 class='level1 icon icon-display' sub='".$v["clazz"]."'>".$v["clazz"]."</h2>
			<ul>";
			$func = generateDoc::getFunctionList($v["clazz"],$lang);
			foreach($func as $ke => $va) {
				$content .="<li class='level2' id='".$v["clazz"]."' style='display:none'><a class='level2' href='#".$va["name"]."'>".$va["name"]."</a>";
				$content .= "<ul>";
				$par = generateDoc::getParameterList($va["name"],$va[$va["name"]]["doc"],$v["clazz"],$lang);
				$parameinz = explode(",",$par[$va["name"]]["paramname"]);
				foreach($parameinz as $key => $value) {
					if(!empty($value)) {
						$content .= "<li class='level3' style='padding:12px;display:none;' id='".$value."'><a href='#".$value."'>".$value."</a></li>";
					}
				}
				$content .= "</ul></li>";
			}
			$content .="</ul>";
		}
		$content .= "</li></ul></nav></header></div><div class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Anfang"]."</div><br>";
		if($lang == "de") {
			$content .= "<select id='language'><option value='deutsch'>Deutsch</option><option value='english'>Englisch</option></select>";
		} else {
			$content .= "<select id='language'><option value='english'>English</option><option value='deutsch'>German</option></select>";
		}
		$content .= "<table>
					<tr>
					<td class='ui-widget ui-state-default' colSpan='2' style='padding:12px;'>".$langwort[$lang]["Klasse"]."</td>
					</tr>
					<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Klassenname"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px'>".$langwort[$lang]["Klassenbeschreibung"]."</td>
					</tr>";
		foreach($clazz as $key => $value) {
			$content .= "<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;'><a data-scroll href='#".$value["clazz"]."'>".$value["clazz"]."</a></td>
					<td class='ui-widget ui-state-default'style='padding:12px;'>".utf8_decode($value["beschreib"])."</td>
					</tr>";
		}
		$content .= "</table><br><div class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Ende"]."</div>";
		foreach($clazz as $key => $value) {
			$content .= "<h1 id='".$value["clazz"]."' style='padding:12px;'>".$value["clazz"]."</h1>";
			$content .= "<h2><span style='padding:12px;'>".utf8_decode($value["beschreib"])."</span></h2>";
			$func = generateDoc::getFunctionList($value["clazz"],$lang);
			foreach($func as $k => $v) {
				$par = generateDoc::getParameterList($v["name"], $v[$v["name"]]["doc"], $value["clazz"],$lang);
				$content .= generateDoc::generateDocumentation_Other($value["clazz"], $v["name"], $par, utf8_decode($v["beschreib"]),$langwort,$lang);
				//$content .= "<p><a href='#top' id='trigger' class='menu-trigger'>Top</a></p>";
			}
		}
		fwrite($handle, $anfang);
		fwrite($handle, $content);
		fwrite($handle, $ende);
		fclose($handle);
	}

	public static function generateAllClazzDocumentation_IE($clazz,$lang,$langwort) {
		$handle = fopen("./Doc/AllClass_IE_".$lang.".html","c");
		$anfang = "<html><br><head><br><title></title><br></head><br><body>";
		$ende = "</body><br></html>";
		$content = "";
		$content .= "<div align=center style='border-width:12px; border-color:#9999FF; border-style:outset; padding:5px;'>".$langwort[$lang]["Anfang"]."</div><br>";
		$content .= "<table style='border-style:solid; padding:5px; border-width:2px;' width=100%>
					<tr>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;' colSpan='2'>".$langwort[$lang]["Klasse"]."</td>
					</tr>
					<tr style='border-style:solid; padding:5px; border-width:2px;'>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF'>".$langwort[$lang]["Klassenname"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF'>".$langwort[$lang]["Klassenbeschreibung"]."</td>
					</tr>";
		foreach($clazz as $key => $value) {
			$content .= "<tr style='border-style:solid; padding:5px;'>
					<td style='padding:5px;'><a href=".$value["clazz"]."_IE_".$lang.".html>".$value["clazz"]."</a></td>
					<td style='padding:5px;'>".utf8_decode($value["beschreib"])."</td>
					</tr>";
		}
		$content .= "</table><br><div align=center style='border-width:12px; border-color:#9999FF; border-style:outset; padding:5px;'>".$langwort[$lang]["Ende"]."</div>";
		fwrite($handle, $anfang);
		fwrite($handle, $content);
		fwrite($handle, $ende);
		fclose($handle);
	}

	public static function getFunctionList($clazz,$lang) {
		$verzeichnis = "./xsd/";
		$handle = $verzeichnis."class.".$clazz.".xsd";
		$doc = new DOMDocument();
		$doc->load($handle);
		$xpath=new DOMXPath($doc);
		$xQueryString='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/*';
		$xResult=$xpath->query($xQueryString);
		$functionList=array();
		foreach($xResult as $key => $value) {
			$functionList[$key]["name"] = $value->getAttribute("name");
			$functionList[$key][$value->getAttribute("name")]["doc"] = $doc;
			$functionList[$key][$value->getAttribute("name")]["clazz"] = $clazz;
			$xQueryStringdoc='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:annotation/xs:documentation[@lang="'.$lang.'"]';
			$xResultdoc=$xpath->query($xQueryStringdoc);
			foreach($xResultdoc as $k => $v) {
				$beschreib=$v->textContent;
				$functionList[$key]["beschreib"] = $beschreib;
			}
		}
		return $functionList;
	}

	public static function getParameterList($functionname,$doc,$clazz,$lang) {
		$paramlist=array();
		$xpath=new DOMXPath($doc);
		$xQueryString='/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/*';
		$xResult=$xpath->query($xQueryString);
		$paramlist[$functionname]["functionname"] = $functionname;
		foreach($xResult as $key => $value) {
			$beschreib = "";
			$pattern = ";";
			$type = $value->getAttribute("type");
			if($type != "") {
				$type = str_replace("xs:", "", $type);
				$paramlist[$functionname]["type"] .= $type.",";
			}
			$pflich = $value->getAttribute("minOccurs");
			if($pflich == "") {
				$pflich = 0;
			}
			$paramlist[$functionname]["pflichtfeld"] .= $pflich.",";
			$param = $value->getAttribute("name");
			$paramlist[$functionname]["paramname"] .= $param.",";
			$xQueryStringAnnotation = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:annotation/xs:documentation[@lang="'.$lang.'"]';
			$xResultAnnotation=$xpath->query($xQueryStringAnnotation);
			foreach($xResultAnnotation as $keyanno => $valueanno) {
				$beschreib=$valueanno->textContent;
				$paramlist[$functionname]["beschreib"] .= $beschreib.",";
			}
			$xQueryStringType = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/*';
			$xResultType=$xpath->query($xQueryStringType);
			foreach($xResultType as $k => $v) {
				$type = $v->getAttribute("base");
				$type = str_replace("xs:", "", $type);
				$paramlist[$functionname]["type"] .= $type.",";
				$xQueryStringPattern = '/xs:schema/xs:element[@name="' . $clazz . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/xs:element[@name="'.$value->getAttribute("name").'"]/xs:simpleType/xs:restriction/*';
				$xResultPattern=$xpath->query($xQueryStringPattern);
				foreach($xResultPattern as $ke => $va) {
					$pattern = $va->getAttribute("value").";";
				}
			}
			$paramlist[$functionname]["pattern"] .= $pattern;
		}
		return $paramlist;
	}

	public static function generateDocumentation_IE($clazz,$function,$paramlist,$document,$end,$lang,$langwort) {
		if(file_exists("./Doc/".$clazz."_IE.html")) {
			$handle = fopen("./Doc/".$clazz."_IE_".$lang.".html","a");
			$anheang = 0;
		}
		else {
			$handle = fopen("./Doc/".$clazz."_IE_".$lang.".html","c");
			$anheang = 1;
		}
		if(empty($appname)) {
			$appname = "";
		}
		if(empty($document)) {
			$document = "";
		}
		$anfang = "<html>\n<head>\n<title></title>\n</head>\n<body>";
		$ende = "<div align=center><input type=button value=zur&uuml;ck onClick=window.history.back()></div>\n</body>\n</html>";
		$content = "<div align=center style='border-width:12px; border-color:#9999FF; border-style:outset; padding:5px;'>";
		$content .= "<span style='font-weight:bold;'>Function ".$function."</span>\n<br>";
		$content .= "<span style='font-weight:bold;'>Funktionsbeschreibung: </span>".utf8_decode($document)."\n<br>";
		$params = explode(",",$paramlist[$function]["paramname"]);
		$beschreib = explode(",", $paramlist[$function]["beschreib"]);
		$pflichtfeld = explode(",",$paramlist[$function]["pflichtfeld"]);
		$pattern = explode(";",$paramlist[$function]["pattern"]);
		$type = explode(",",$paramlist[$function]["type"]);
		$content .= "<table style='border-style:solid; padding:5px; border-width:2px;' width=100%>
					<tr>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;' colSpan='4'>".$langwort[$lang]["Parameter"]."</td>
					</tr>
					<tr style='border-style:solid; padding:5px; border-width:2px;'>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Parametername"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Datentype"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Parameterbeschreibung"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Pattern"]."</td>
					</tr>";
		if(count($params) <= 1) {
			$content .= "<tr><td style='border-style:solid; padding:5px; border-width:2px;' colSpan='4'>".$langwort[$lang]["NoParam"]."</td></tr>\n<br>";
			$content .= "</table>";
		}
		for($i = 0; $i < count($params)-1; $i++) {
			$t = $i+1;
			if($pattern[$i] == "") {
				$pattern[$i] = $langwort[$lang]["NoPattern"];
			}
			$content .= "<tr style='border-style:solid; padding:5px; border-width:2px;'>
						 <td style='padding:5px;'>".$params[$i]."</td>\n
						 <td style='padding:5px;'>".$type[$i]."</td>\n
						 <td style='padding:5px;'>".utf8_decode($beschreib[$i])."</td>\n
						 <td style='padding:5px;'>".utf8_decode($pattern[$i])."</td></tr>\n";
			if($i == count($params)-2) {
				$content .= "</table><br>";
			}
		}
		$countpflich = 0;
		foreach($pflichtfeld as $key => $value) {
			if($value != 0) {
				$countpflich++;
			}
		}
		$content .= "<table style='border-style:solid; padding:5px; border-width:2px;' width=100%>
					<tr>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;' colSpan='4'>".$langwort[$lang]["Pflichtparameter"]."</td>
					</tr>
					<tr style='border-style:solid; padding:5px; border-width:2px;'>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Parametername"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Datentype"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Parameterbeschreibung"]."</td>
					<td style='border-style:solid; padding:5px; border-width:2px; background-color:#AAD4FF;'>".$langwort[$lang]["Pattern"]."</td>
					</tr>";
		if($countpflich <= 0) {
			$content .= "<tr><td style='border-style:solid; padding:5px; border-width:2px;' colSpan='4'>".$langwort[$lang]["NoManParam"]."</td></tr>\n<br>";
			$content .= "</table>";
		}
		for($i = 0; $i < count($pflichtfeld)-1; $i++) {
			if($pflichtfeld[$i] == 1) {
				if($pattern[$i] == "") {
					$pattern[$i] = $langwort[$lang]["NoPattern"];
				}
				$content .= "<tr style='padding:5px;'>
							 <td style='padding:5px;'>".$params[$i]."</td>\n
							 <td style='padding:5px;'>".$type[$i]."</td>\n
							 <td style='padding:5px;'>".utf8_decode($beschreib[$i])."</td>\n
							 <td style='padding:5px;'>".utf8_decode($pattern[$i])."</td></tr>\n";
			}
			if($i == count($pflichtfeld)-2) {
				$content .= "</table><br>";
			}
		}
		$content .= "</div>";
		if($anheang == 1) {
			fwrite($handle, $anfang);
		}
		fwrite($handle, $content);
		if($end == 0) {
			fwrite($handle, $ende);
		}
		fclose($handle);
	}

	public static function generateDocumentation_Other($clazz,$function,$paramlist,$document,$langwort,$lang) {
		//public static function generateDocumentation_Other($clazz,$function,$paramlist,$document,$end) {
		//if(file_exists("./Doc/".$clazz."_Other.html")) {
		//$handle = fopen("./Doc/".$clazz."_Other.html","a");
		//$anheang = 0;
		//}
		//else {
		//$handle = fopen("./Doc/".$clazz."_Other.html","c");
		//$anheang = 1;
		//}
		//if(empty($appname)) {
		//$appname = "";
		//}
		//if(empty($document)) {
		//$document = "";
		//}
		//$anfang = "<html>\n<head>\n<title></title>\n</head>\n<body>";
		//$ende = "<div class='ui-accordian-header ui-helper-reset ui-state-active' align='center'>";
		$content = "<br><div>";
		//$content .= "<span id='$clazz' style='font-weight:bold;'>Klasse: </span>".$clazz."<br>";
		//$content .= "<span style='font-weight:bold;'>Klassenbeschreibung: </span>".$beschreib."<br>";
		$content .= "<h3><span id='".$function."' style='font-weight:bold;padding:12px;text-decoration:underline;'>".$function."</span></h3>\n<br>";
		$content .= "<h3><span style='padding:12px;text-decoration:underline;'>".$document."</span></h3>\n<br>";
		$params = explode(",",$paramlist[$function]["paramname"]);
		$beschreib = explode(",", $paramlist[$function]["beschreib"]);
		$pflichtfeld = explode(",",$paramlist[$function]["pflichtfeld"]);
		$pattern = explode(";",$paramlist[$function]["pattern"]);
		$type = explode(",",$paramlist[$function]["type"]);
		$content .= "<table style='border-style:solid; padding:5px; border-width:2px;'>
					<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;' colSpan='4'>".$langwort[$lang]["Parameter"]."</td>
					</tr>
					<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Parametername"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Datentype"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Parameterbeschreibung"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Pattern"]."</td>
					</tr>";
		if(count($params) <= 1) {
			$content .= "<tr><td class='ui-widget ui-state-default' style='padding:12px;' colSpan='4'>".$langwort[$lang]["NoParam"]."</td></tr>\n<br>";
			$content .= "</table>";
		}
		for($i = 0; $i < count($params)-1; $i++) {
			$t = $i+1;
			if($pattern[$i] == "") {
				$pattern[$i] = $langwort[$lang]["NoPattern"];
			}
			$content .= "<tr>
						 <td class='ui-widget ui-state-default' style='padding:12px;' id='".$params[$i]."'>".$params[$i]."</td>\n
						 <td class='ui-widget ui-state-default' style='padding:12px;'>".$type[$i]."</td>\n
						 <td class='ui-widget ui-state-default' style='padding:12px;'>".utf8_decode($beschreib[$i])."</td>\n
						 <td class='ui-widget ui-state-default' style='padding:12px;'>".utf8_decode($pattern[$i])."</td></tr>\n";
			if($i == count($params)-2) {
				$content .= "</table><br>";
			}
		}
		$countpflich = 0;
		foreach($pflichtfeld as $key => $value) {
			if($value != 0) {
				$countpflich++;
			}
		}
		$content .= "<table style='border-style:solid; padding:5px; border-width:2px;'>
					<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;' colSpan='4'>".$langwort[$lang]["Pflichtparameter"]."</td>
					</tr>
					<tr>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Parametername"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Datentype"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Parameterbeschreibung"]."</td>
					<td class='ui-widget ui-state-default' style='padding:12px;'>".$langwort[$lang]["Pattern"]."</td>
					</tr>";
		if($countpflich <= 0) {
			$content .= "<tr><td class='ui-widget ui-state-default' style='padding:12px;' colSpan='4'>".$langwort[$lang]["NoManParam"]."</td></tr>\n<br>";
			$content .= "</table>";
		}
		for($i = 0; $i < count($pflichtfeld)-1; $i++) {
			if($pflichtfeld[$i] == 1) {
				if($pattern[$i] == "") {
					$pattern[$i] = $langwort[$lang]["NoPattern"];
				}
				$content .= "<tr>
							 <td class='ui-widget ui-state-default' style='padding:12px;' id='".$params[$i]."'>".$params[$i]."</td>\n
							 <td class='ui-widget ui-state-default' style='padding:12px;'>".$type[$i]."</td>\n
							 <td class='ui-widget ui-state-default' style='padding:12px;'>".utf8_decode($beschreib[$i])."</td>\n
							 <td class='ui-widget ui-state-default' style='padding:12px;'>".utf8_decode($pattern[$i])."</td></tr>\n";
			}
			if($i == count($pflichtfeld)-2) {
				$content .= "</table><br>";
			}
		}
		$content .= "</div>";
		//if($anheang == 1) {
		//fwrite($handle, $anfang);
		//}
		//fwrite($handle, $content);
		//if($end == 0) {
		//fwrite($handle, $ende);
		//}
		//fclose($handle);
		return $content;
	}

}

$clazz = array();
$functionlist = array();
$lang = array("de","en");
$langwort = array("de"=>array("Klasse"=>"Klasse","Klassenname"=>"Klassenname","Klassenbeschreibung"=>"Klassenbeschreibung","Menü"=>"Menü","Parameter"=>"Parameter","Parametername"=>"Parametername","Datentyp"=>"Datentyp","Parameterbeschreibung"=>"Parameterbeschreibung","Pattern"=>"Pattern","Pflichtparameter"=>"Pflichtparameter","Anfang"=>"Hier können sie Auswählen welche Dokumentation für welche Klasse sie ansehen möchten","Ende"=>"Sollte ihre gewünschte Dokumentation nicht vorhanden sein, nutzen sie doch das Tool generateDoc","NoParam"=>"Es werden keine Parameter ben�tigt","NoPattern"=>"Kein Pattern vorhanden","NoManParam"=>"Keine Pflichtparameter vorhanden")
,"en"=>array("Klasse"=>"Class","Klassenname"=>"Classname","Klassenbeschreibung"=>"Classdescription","Menü"=>"Menu","Parameter"=>"Params","Parametername"=>"Paramname","Datentyp"=>"Datatyp","Parameterbeschreibung"=>"Paramsdescription","Pattern"=>"Pattern","Pflichtparameter"=>"Madatoryparameter","Anfang"=>"Here you can choose which dokumentation you want to see","Ende"=>"When your Dokumentation is not there use the tool generateDoc","NoParam"=>"No Params needed","NoPattern"=>"No Pattern needed","NoManParam"=>"No Mandatoryparams needed"));
foreach($lang as $ke => $va) {
	$clazz = generateDoc::getClazz($va);
	generateDoc::generateAllClazzDocumentation($va);
	generateDoc::generateAllClazzDocumentation_Other($clazz,$va,$langwort);
	generateDoc::generateAllClazzDocumentation_IE($clazz,$va,$langwort);
	foreach($clazz as $key => $value) {
	$functionlist[$value["clazz"]] = generateDoc::getFunctionList($value["clazz"],$va);
	foreach($functionlist[$value["clazz"]] as $k => $v) {
		$paramlist = generateDoc::getParameterList($v["name"], $v[$v["name"]]["doc"], $v[$v["name"]]["clazz"],$va);
		if($k == count($functionlist[$value["clazz"]])-1) {
			generateDoc::generateDocumentation_IE($value["clazz"],$v["name"],$paramlist,$v["beschreib"],0,$va,$langwort);
			//generateDoc::generateDocumentation_Other($value["clazz"],$v["name"],$paramlist,$v["beschreib"],0);
		}
		else {
			generateDoc::generateDocumentation_IE($value["clazz"],$v["name"],$paramlist,$v["beschreib"],1,$va,$langwort);
			//generateDoc::generateDocumentation_Other($value["clazz"],$v["name"],$paramlist,$v["beschreib"],1);
		}
	}
	}
}
//$clazz_de = generateDoc::getClazz("de");
//$clazz_en = generateDoc::getClazz("en");
//generateDoc::generateAllClazzDocumentation($clazz);
//generateDoc::generateAllClazzDocumentation_IE($clazz);
//generateDoc::generateAllClazzDocumentation_Other($clazz_en,"en");
//generateDoc::generateAllClazzDocumentation_Other($clazz_de,"de");
//foreach($clazz as $key => $value) {
//	$functionlist[$value["clazz"]] = generateDoc::getFunctionList($value["clazz"]);
//	foreach($functionlist[$value["clazz"]] as $k => $v) {
//		$paramlist = generateDoc::getParameterList($v["name"], $v[$v["name"]]["doc"], $v[$v["name"]]["clazz"]);
//		if($k == count($functionlist[$value["clazz"]])-1) {
//			generateDoc::generateDocumentation_IE($value["clazz"],$v["name"],$paramlist,$v["beschreib"],0);
//			//generateDoc::generateDocumentation_Other($value["clazz"],$v["name"],$paramlist,$v["beschreib"],0);
//		}
//		else {
//			generateDoc::generateDocumentation_IE($value["clazz"],$v["name"],$paramlist,$v["beschreib"],1);
//			//generateDoc::generateDocumentation_Other($value["clazz"],$v["name"],$paramlist,$v["beschreib"],1);
//		}
//	}
//}