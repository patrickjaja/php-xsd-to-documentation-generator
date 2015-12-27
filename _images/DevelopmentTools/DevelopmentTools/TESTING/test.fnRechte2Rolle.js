var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnRechte2Rolle.insert Korrekte Parameter",
			'functionName' : 'function=KIS.fnRechte2Rolle.insert',
			'params' : '&rid=01726378&rgid=0172&mandantID=017&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.insert Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&mandantID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.insert Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRechte2Rolleet.insert',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&mandantID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.insert Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnRechte2Rolle.insert',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&mandantID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnRechte2Rolle.delete Korrekte Parameter",
			'functionName' : 'function=KIS.fnRechte2Rolle.delete',
			'params' : '&rid=2&rgid=2&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.delete Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.delete Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRechte2Rolleet.delete',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRechte2Rolle.delete Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnRechte2Rolle.delete',
			'params' : '&rid=017263748291029384756201928374657438391019283746573482391201929&rgid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
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
