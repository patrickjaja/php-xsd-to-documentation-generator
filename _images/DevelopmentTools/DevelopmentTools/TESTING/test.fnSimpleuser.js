var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnSimpleuser.load Korrekte Parameter",
			'functionName' : 'function=KIS.fnSimpleuser.load',
			'params' : '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.load Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.load Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnSimpleuseret.load',
			'params' : '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.load Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnSimpleuser.load',
			'params' : '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnSimpleuser.update Korrekte Parameter",
			'functionName' : 'function=KIS.fnSimpleuser.update',
			'params' : '&id=017263748291029384756201928374657438391019283746573482391201929&userUID=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userVorname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userNachname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userEmail=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.update Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&id=017263748291029384756201928374657438391019283746573482391201929&userUID=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userVorname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userNachname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userEmail=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.update Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnSimpleuseret.update',
			'params' : '&id=017263748291029384756201928374657438391019283746573482391201929&userUID=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userVorname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userNachname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userEmail=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.update Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnSimpleuser.update',
			'params' : '&id=017263748291029384756201928374657438391019283746573482391201929&userUID=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userVorname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userNachname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&userEmail=cblazek@qits.de&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnSimpleuser.changePW Korrekte Parameter",
			'functionName' : 'function=KIS.fnSimpleuser.changePW',
			'params' : '&changepw_oldPasswd=qits&changepw_newPasswd=äbcdefgh&changepw_newPasswdWdh=äbcdefgh&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.changePW Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&changepw_oldPasswd=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&changepw_newPasswd=äbcdefgh&changepw_newPasswdWdh=äbcdefgh&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.changePW Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnSimpleuseret.changePW',
			'params' : '&changepw_oldPasswd=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&changepw_newPasswd=äbcdefgh&changepw_newPasswdWdh=äbcdefgh&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.changePW Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnSimpleuser.changePW',
			'params' : '&changepw_oldPasswd=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&changepw_newPasswd=äbcdefgh&changepw_newPasswdWdh=äbcdefgh&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenants Korrekte Parameter",
			'functionName' : 'function=KIS.fnSimpleuser.getUserTenants',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenants Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenants Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnSimpleuseret.getUserTenants',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenants Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnSimpleuser.getUserTenants',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenantByID Korrekte Parameter",
			'functionName' : 'function=KIS.fnSimpleuser.getUserTenantByID',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenantByID Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenantByID Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnSimpleuseret.getUserTenantByID',
			'params' : '&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnSimpleuser.getUserTenantByID Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnSimpleuser.getUserTenantByID',
			'params' : '&_mandantID=6422497',
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
