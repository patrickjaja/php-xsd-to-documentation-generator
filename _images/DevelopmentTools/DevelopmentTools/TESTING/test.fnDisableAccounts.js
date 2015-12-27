var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [ {
	'name' : "KIS.fnDisableAccounts.check Korrekte Parameter",
	'functionName' : 'function=KIS.fnDisableAccounts.check',
	'params' : '&_mandantID=6422497',
	'expectedStatusCode' : 200,
	'expectedResult' : 'OK',
	'expectedCode' : 101,
	'useSession' : true
}, {
	'name' : "KIS.fnDisableAccounts.check Kein Funktionsname uebergeben",
	'functionName' : 'NOfunction',
	'params' : '&_mandantID=6422497',
	'expectedStatusCode' : 200,
	'expectedResult' : 'ERROR',
	'expectedCode' : 544,
	'useSession' : true
}, {
	'name' : "KIS.fnDisableAccounts.check Unbekannte Klasse uebergeben",
	'functionName' : 'function=KIS.fnDisableAccountset.check',
	'params' : '&_mandantID=6422497',
	'expectedStatusCode' : 200,
	'expectedResult' : 'ERROR',
	'expectedCode' : 542,
	'useSession' : true
}, ];
/**
 * Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
 */
testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {
	appName : "KIS",
	loginuser : 'cblazek@qits.de',
	loginpassword : 'qits',
	'onSuccess' : function(skey) {
		testing.run(testcases, skey);
	}
});
