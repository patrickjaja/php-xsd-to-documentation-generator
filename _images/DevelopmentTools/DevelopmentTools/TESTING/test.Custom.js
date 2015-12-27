var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnAuft.delete Cross-Zugriff Abmelden",
			'functionName' : 'function=KIS.fnAuft.delete',
			'params' : '&_mandantID=6015477&auftNr=11163878&checkoutOrder_date=28.12.2012',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 555,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnAuft.load',
			'functionName' : 'KIS.fnAuft.load',
			'params' : '&lang=en-US&auftNr=11152509&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnUtils.checkLogged',
			'functionName' : 'KIS.fnUtils.checkLogged',
			'params' : '&lang=en-US',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnSimpleuser.load',
			'functionName' : 'KIS.fnSimpleuser.load',
			'params' : '&lang=en-US',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnAuft.getAllOrdersFromCustomer',
			'functionName' : 'KIS.fnAuft.getAllOrdersFromCustomer',
			'params' : '&lang=de-DE&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnUtils.checkLogged',
			'functionName' : 'KIS.fnUtils.checkLogged',
			'params' : '&lang=de-DE',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : 'KIS.fnSimpleuser.load',
			'functionName' : 'KIS.fnSimpleuser.load',
			'params' : '&lang=de-DE&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		}
		];
/**
 *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
 */
testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {
	appName : "KIS",
	loginuser : 'twiegand@qits.de',
	loginpassword : 'qits1234',
	'onSuccess' : function(skey) {
		testing.run(testcases, skey);
	}
});
