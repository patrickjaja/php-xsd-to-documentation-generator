var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnUtils.sendPasswdLink Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.sendPasswdLink',
			'params' : '&forgetpw_email=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendPasswdLink Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&forgetpw_email=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendPasswdLink Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.sendPasswdLink',
			'params' : '&forgetpw_email=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.updateByMailkey Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.updateByMailkey',
			'params' : '&mailkey=abcdefhdjskaieoptu7837tzdhsgto948fgtpsoz&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.updateByMailkey Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&mailkey=äbcdef&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.updateByMailkey Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.updateByMailkey',
			'params' : '&mailkey=äbcdefhdjskaieoptu7837tzdhsgto948fgtpsoz&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendNewPasswd Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.sendNewPasswd',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendNewPasswd Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendNewPasswd Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.sendNewPasswd',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.transportNewsToKIS Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.transportNewsToKIS',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.transportNewsToKIS Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.transportNewsToKIS Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.transportNewsToKIS',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.checkLogged Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.checkLogged',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.checkLogged Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.checkLogged Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.checkLogged',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendContactRequest Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.sendContactRequest',
			'params' : '&contact_message=dawdawd&contact_telephone=awdawdawd&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendContactRequest Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&contact_message=dawdawda&contact_telephone=dawdawdaw&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendContactRequest Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.sendContactRequest',
			'params' : '&contact_message=dawdaw&contact_telephone=dawdawd&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.getStandort Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.getStandort',
			'params' : '&plz=01234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.getStandort Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&plz=01234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.getStandort Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.getStandort',
			'params' : '&plz=01234&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendFeedback Korrekte Parameter",
			'functionName' : 'function=KIS.fnUtils.sendFeedback',
			'params' : '&feedback_message=ghdgdrdrdrg&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendFeedback Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&feedback_message=&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnUtils.sendFeedback Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnUtilset.sendFeedback',
			'params' : '&feedback_message=&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		} ];
/**
 *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
 */
testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {
	appName : "KIS",
	loginuser : 'pschrei@qits.de',
	loginpassword : 'qits',
	'onSuccess' : function(skey) {
		testing.run(testcases, skey);
	}
});
