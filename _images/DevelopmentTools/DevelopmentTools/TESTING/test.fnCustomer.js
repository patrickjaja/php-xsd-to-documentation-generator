var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnCustomer.load Korrekte Parameter",
			'functionName' : 'function=KIS.fnCustomer.load',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.load Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.load Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnCustomeret.load',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.load Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnCustomer.load',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnCustomer.update Korrekte Parameter",
			'functionName' : 'function=KIS.fnCustomer.update',
			'params' : '&customerData_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_plz=01234&customerData_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.update Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&customerData_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_plz=0123456&customerData_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.update Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnCustomeret.update',
			'params' : '&customerData_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_plz=0123456&customerData_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.update Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnCustomer.update',
			'params' : '&customerData_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_plz=0123456&customerData_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_department=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&customerData_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnCustomer.insert Korrekte Parameter",
			'functionName' : 'function=KIS.fnCustomer.insert',
			'params' : '&addCustomer_customerNr=0123456&addCustomer_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&addCustomer_zipcode=01234&addCustomer_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.insert Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&addCustomer_customerNr=012345678&addCustomer_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&addCustomer_zipcode=0123456&addCustomer_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.insert Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnCustomeret.insert',
			'params' : '&addCustomer_customerNr=012345678&addCustomer_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&addCustomer_zipcode=0123456&addCustomer_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCustomer.insert Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnCustomer.insert',
			'params' : '&addCustomer_customerNr=012345678&addCustomer_company=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&addCustomer_zipcode=0123456&addCustomer_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		} ];
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
