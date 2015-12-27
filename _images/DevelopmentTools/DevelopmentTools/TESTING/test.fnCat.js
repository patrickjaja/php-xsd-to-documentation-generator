var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnCat.load Korrekte Parameter",
			'functionName' : 'function=KIS.fnCat.load',
			'params' : '&orderby=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&direction=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&cat=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&rollenid=017263748291029384756201928374657438391019283746573482391201929&userid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCat.load Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&orderby=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&direction=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&cat=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&rollenid=017263748291029384756201928374657438391019283746573482391201929&userid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCat.load Unbekannte Klasse uebergeben",
			'functionName' : 'function=KIS.fnCatet.load',
			'params' : '&orderby=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&direction=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&cat=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&rollenid=017263748291029384756201928374657438391019283746573482391201929&userid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnCat.load Es wurde kein Sessionkey uebergeben",
			'functionName' : 'function=KIS.fnCat.load',
			'params' : '&orderby=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&direction=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&cat=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&rollenid=017263748291029384756201928374657438391019283746573482391201929&userid=017263748291029384756201928374657438391019283746573482391201929&_mandantID=6422497',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
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
