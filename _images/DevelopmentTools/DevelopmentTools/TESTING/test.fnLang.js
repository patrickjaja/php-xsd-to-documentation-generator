var HOST="kis-toitoidixi.de";
 var testing=require("./wstest.js");
/**
* Tests zu dieser Funktion*/
 var testcases=[{'name': "KIS.fnLang.insert Korrekte Parameter", 'functionName': 'function=KIS.fnLang.insert', 'params': '&strText=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'OK', 'expectedCode' : 101, 'useSession':true},{'name': "KIS.fnLang.insert Kein Funktionsname uebergeben",'functionName': 'NOfunction', 'params': '&strText=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 544, 'useSession':true},{'name': "KIS.fnLang.insert Unbekannte Klasse uebergeben", 'functionName': 'function=KIS.fnLanget.insert', 'params': '&strText=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 542, 'useSession':true},{'name': "KIS.fnLang.insert Es wurde kein Sessionkey uebergeben", 'functionName': 'function=KIS.fnLang.insert', 'params': '&strText=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&_mandantID=6422497','expectedStatusCode': 200, 'expectedResult': 'ERROR', 'expectedCode' : 551, 'useSession':false},];
/**
 *Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
*/
 testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https', {appName:"KIS", loginuser:'cblazek@qits.de', loginpassword:'qits', 'onSuccess':function(skey) {testing.run(testcases,skey);}}); 

