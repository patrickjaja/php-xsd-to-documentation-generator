var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnRolle2User.insert Korrekte Parameter",
			'functionName' : 'function=KIS.fnRolle2User.insert',
			'params' : '&uid=31&mandatID=5&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.insert Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&mandatID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.insert Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRolle2Useret.insert',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&mandatID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.insert Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnRolle2User.insert',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&mandatID=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnRolle2User.delete Korrekte Parameter",
			'functionName' : 'function=KIS.fnRolle2User.delete',
			'params' : '&uid=30&rid=1&_mandantID=43422',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.delete Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.delete Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnRolle2Useret.delete',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnRolle2User.delete Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnRolle2User.delete',
			'params' : '&uid=017263748291029384756201928374657438391019283746573482391201929&rid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
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
