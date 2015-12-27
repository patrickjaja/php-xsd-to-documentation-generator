<?php
class TestGenerator {
	public function getFunctionList() {
		
	}
	public function getParameterList($functionName, $style=self::PARAMETERLIST_NUM) {
		if($this->xsd) { 
			if(!$this->hasFunction()) {
				if(AUTO_CONFIG_FUNCTIONS===true) {
					$this->addMissingFunction();	
				} else {
					errorExit(new specificExceptions($this->function, ERR_XSD_MISSING_FUNCTION));
				}
			}
			$xpath=new DOMXPath($this->xsd);
			$xQueryString='/xs:schema/xs:element[@name="' . $this->class . '"]/xs:complexType/xs:all/xs:element[@name="' . $functionname . '"]/xs:complexType/xs:all/*';
			$xResult=$xpath->query($xQueryString);
			$paramList=array();
			for($i=0;$i<$xResult->length;$i++) {
				if($xResult->item($i)->hasChildNodes()) { 
					$children=$xResult->item($i)->getNodePath();
					$childResult=$xpath->query($children.'/*/xs:restriction');
					$type=$childResult->item(0)->getAttribute('base');
					$patternResult=$xpath->query($children.'/*/xs:restriction/xs:pattern');
					if($patternResult->length==1) {
						$pattern=$patternResult->item(0)->getAttribute('value');
					} else {
						$pattern=$this->getStandardPattern($type);
					}
				}  else {
					$type=$xResult->item($i)->getAttribute('type');
					$pattern=$this->getStandardPattern($type);
				}
				if(!$xResult->item($i)->hasAttribute('minOccurs')) {
					$mandatory=0;
				} else {
					$mandatory=$xResult->item($i)->getAttribute('minOccurs');
				}
				if($style==self::PARAMETERLIST_NUM) $paramList[]=array("name"=>$xResult->item($i)->getAttribute('name'), "mandatory"=>$mandatory, "type"=>$type, "pattern" => $pattern);
				if($style==self::PARAMETERLIST_ASSOC) $paramList[$xResult->item($i)->getAttribute('name')]=array("name"=>$xResult->item($i)->getAttribute('name'), "mandatory"=>$mandatory, "type"=>$type, "pattern" => $pattern);
			}
			return $paramList;
		} else {
			return false;
		}
	}
}
