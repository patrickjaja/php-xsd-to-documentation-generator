
var HOST="kis-toitoidixi.de";
var testing=require("./wstest.js");

/**
 * Test initialisieren. Das muss nur einmal gemacht werden pro Testlauf
 */
testing.init(HOST, 443, '/KIS/service.php', 'POST', 'https');


/**
 * Tests zu dieser Funktion
 */
var options=testing.test("Falsche Credentials", 'KIS.startSession', 'loginuser=pscjkljkl@qits.de&loginpassword=qiadsad4', 200, 'ERROR',552);
testing.execute(options);

var options=testing.test("Korrekte Credentials", 'KIS.startSession', 'loginuser=pschrei@qits.de&loginpassword=qits1234', 200, 'OK',101);
testing.execute(options);

