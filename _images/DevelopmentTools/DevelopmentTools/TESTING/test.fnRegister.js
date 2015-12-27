var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnRegister.sendRegisterLinkViaEmail Korrekte Parameter",
			'functionName' : 'function=KIS.fnRegister.sendRegisterLinkViaEmail',
			'params' : '&reg_customerNr=0123456&reg_company=äbcde&reg_zipcode=40822&reg_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_email=cblazek7@qits.de&reg_email_wdh=cblazek7@qits.de&reg_passwd=qits1234&reg_passwd_wdh=qits1234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRegister.sendRegisterLinkViaEmail Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&reg_customerNr=012345678&reg_company=äbcde&reg_zipcode=40822&reg_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_email=cblazek@qits.de&reg_email_wdh=cblazek@qits.de&reg_passwd=qits1234&reg_passwd_wdh=qits1234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRegister.sendRegisterLinkViaEmail Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRegisteret.sendRegisterLinkViaEmail',
			'params' : '&reg_customerNr=0123456&reg_company=äbcde&reg_zipcode=40822&reg_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&reg_email=cblazek@qits.de&reg_email_wdh=cblazek@qits.de&reg_passwd=qits1234&reg_passwd_wdh=qits1234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
//		{
//			'name' : "KIS.fnRegister.finishRegistration Korrekte Parameter",
//			'functionName' : 'function=KIS.fnRegister.finishRegistration',
//			'params' : '&_mandantID=6422497',
//			'expectedStatusCode' : 200,
//			'expectedResult' : 'OK',
//			'expectedCode' : 101,
//			'useSession' : true
//		},
		{
			'name' : "KIS.fnRegister.finishRegistration Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRegister.finishRegistration Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRegisteret.finishRegistration',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		}, ];
/**
 *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
 */
testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {
	appName : "KIS",
	loginuser : 'cblazek@qits.de',
	loginpassword : 'qits',
	'onSuccess' : function(skey) {
		testing.run(testcases, skey);
	}
});
