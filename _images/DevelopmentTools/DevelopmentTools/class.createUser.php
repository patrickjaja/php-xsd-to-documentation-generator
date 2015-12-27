<?php
class createUser implements IfnPlugin {
	const REQUIRES_SESSION=0;
	static private $instance = null;
	public function __construct() {
	}	
	public function main() {
	}
	public function createUser($vars) {
		$db=getDB();
		$pw=$this->getRandomPW();
		$query="INSERT INTO user (userUID, userPassword, userEmail, userVorname, userNachname) VALUES (:uUID, PASSWORD(:uPassword), :uEmail, :uVorname, :uNachname);";
		$db->prepSQL($query);
		$db->sendSQL(array("uUID"=>$vars["UID"], "uPassword"=>$pw, "uEmail"=>$vars["email"], "uVorname"=>$vars["Vorname"], "uNachname"=>$vars["Nachname"] ));
		$header="From: QITS GmbH <webapps@qits.de>\r\n";
		$newID=$db->lastid();
		if($newID) {
			mail($vars["email"], "Ihre Zugangsdaten zum Administrationsportal fuer atWork Kunden", "Hallo " . $vars["Vorname"] . " " . $vars["Nachname"] . ",\n Ihre Zugangsdaten für das Administrationsportal lauten:\n
			Benutzername:  " . $vars["UID"] . "
			Passwort: " . $pw . "
			
Bitte beachten Sie, dass nur Sie dieses Passwort kennen und benötigen. Kein Mitarbeiter von WeightWatchers oder der QITS GmbH wird Sie je nach diesem Kennwort fragen. Geben Sie es unter keinen Umständern weiter.
Weitere Informationen zum Ablauf erhalten Sie von Ihrem Projektleiter." , $header);
			output::addNewContentMessage(array("EmailSenden"=>"OK"));
			if($newID==0)	{				
				errorExit(new specificExceptions("DB Write Error", ERR_SAVE_ERROR));
			} else {						
				$this->rolle2user=new rolle2user;			
				$this->rolle2user->__set("userID", $newID);
				$this->rolle2user->__set("rolleID", "1");
				$dbSaveId2=$this->rolle2user->save();
				if($dbSaveId2=0) {				
					errorExit(new specificExceptions("DB Write Error", ERR_SAVE_ERROR));
				} else {		
					output::addNewContentMessage(array("Berechtigung"=>"OK"));
				}			 			
			}
		}

		
	}
	public function makeUser($vars) {
			$ranPW=self::randomString();	
		$db=getDB();
		$db->prepSQL("INSERT INTO user SET userUID=:userUID, userPassword=PASSWORD(:userPassword), userEmail=:userEmail, userVorname=:userVorname, userNachname=:userNachname");
		$db->sendSQL(array("userUID"=>$obj->__get("receiverEmail"), "userPassword"=>$ranPW, "userEmail"=>$obj->__get("receiverEmail"), "userVorname"=>$obj->__get("receiverFirstname"), "userNachname"=>$obj->__get("receiverLastname")));		
		$dbSaveId=$db->lastid();
		if($dbSaveId==0)	{				
			errorExit(new specificExceptions("DB Write Error", ERR_SAVE_ERROR));
		} else {						
			$this->rolle2user=new rolle2user;			
			$this->rolle2user->__set("userID", $dbSaveId);
			$this->rolle2user->__set("rolleID", "2");
			$dbSaveId2=$this->rolle2user->save();
			if($dbSaveId2=0) {				
				errorExit(new specificExceptions("DB Write Error", ERR_SAVE_ERROR));
			} else {		
				$userData=array("ranPW"=>$ranPW, "lastID"=>$dbSaveId);					
				return $userData;
			}			 			
		}
	}
	
	public static function getInstance() {
		if (null === self::$instance) {
           self::$instance = new self;
        }
        return self::$instance;
	}
	public static function requiresSession() {
		return self::REQUIRES_SESSION;
	}
	public static function install() {
		
	}
	public static function uninstall() {
		
	}
	public function getRandomPW() {
		$length = 9;
	    $characters = "23456789abcdefghijkmnpqrstuvwxyz";
	    $string = "";	
	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters))];
	    }	
	    return $string;
	}
	public static function onTrigger($specificParameters) {

	}
	
	
}