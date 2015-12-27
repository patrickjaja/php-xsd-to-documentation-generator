var HOST="kis-toitoidixi.de";
 var testing=require("./wstest.js");
/**
* Tests zu dieser Funktion*/
 var testcases=[{'name': "KIS.fnSchema.load Korrekte Parameter", 'functionName': 'function=KIS.fnSchema.load', 'params': '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'OK', 'expectedCode' : 101, 'useSession':true},{'name': "KIS.fnSchema.load Kein Funktionsname uebergeben",'functionName': 'NOfunction', 'params': '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 544, 'useSession':true},{'name': "KIS.fnSchema.load Unbekannte Klasse uebergeben", 'functionName': 'function=KIS.fnSchemaet.load', 'params': '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 542, 'useSession':true},{'name': "KIS.fnSchema.load Es wurde kein Sessionkey uebergeben", 'functionName': 'function=KIS.fnSchema.load', 'params': '&tbl=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 551, 'useSession':false},];
/**
 *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
*/
 testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {appName:"KIS", loginuser:'cblazek@qits.de', loginpassword:'qits', 'onSuccess':function(skey) {testing.run(testcases,skey);}}); 

