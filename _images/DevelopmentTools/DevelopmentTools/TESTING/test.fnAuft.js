var HOST = "kis-toitoidixi.de";
var testing = require("./wstest.js");
/**
 * Tests zu dieser Funktion
 */
var testcases = [
		{
			'name' : "KIS.fnAuft.getAllOrdersFromCustomer Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.getAllOrdersFromCustomer',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getAllOrdersFromCustomer Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getAllOrdersFromCustomer Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.getAllOrdersFromCustomer',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getAllOrdersFromCustomer Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.getAllOrdersFromCustomer',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnAuft.load Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.load',
			'params' : '&auftNr=11153310&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.load Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.load Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.load',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.load Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.load',
			'params' : '&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnAuft.getOrder Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.getOrder',
			'params' : '&auftid=11153310&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getOrder Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&auftid=11153310&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getOrder Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.getOrder',
			'params' : '&auftid=11153310&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.getOrder Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.getOrder',
			'params' : '&auftid=11153310&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnAuft.delete Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.delete',
			'params' : '&auftNr=11152509&checkoutOrder_date=22.12.2012&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.delete Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&checkoutOrder_date=2012-12-12&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.delete Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.delete',
			'params' : '&checkoutOrder_date=2012-12-12&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.delete Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.delete',
			'params' : '&checkoutOrder_date=2012-12-12&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnAuft.verifyNewOrder Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.verifyNewOrder',
			'params' : '&newOrder_rentalPeriodFrom=12.12.2012&newOrder_rentalPeriodTo=12.12.2012&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.verifyNewOrder Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&newOrder_rentalPeriodFrom=2012-12-12&newOrder_rentalPeriodTo=2012-12-12&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.verifyNewOrder Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.verifyNewOrder',
			'params' : '&newOrder_rentalPeriodFrom=2012-12-12&newOrder_rentalPeriodTo=2012-12-12&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.verifyNewOrder Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.verifyNewOrder',
			'params' : '&newOrder_rentalPeriodFrom=2012-12-12&newOrder_rentalPeriodTo=2012-12-12&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 551,
			'useSession' : false
		},
		{
			'name' : "KIS.fnAuft.insert Korrekte Parameter",
			'functionName' : 'KIS.fnAuft.insert',
			'params' : '&newOrder_rentalPeriodFrom=12.12.2012&newOrder_rentalPeriodTo=12.12.2012&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'OK',
			'expectedCode' : 101,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.insert Kein Funktionsname uebergeben",
			'functionName' : 'NOfunction',
			'params' : '&newOrder_rentalPeriodFrom=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_rentalPeriodTo=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 544,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.insert Unbekannte Klasse uebergeben",
			'functionName' : 'KIS.fnAuftet.insert',
			'params' : '&newOrder_rentalPeriodFrom=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_rentalPeriodTo=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
			'expectedStatusCode' : 200,
			'expectedResult' : 'ERROR',
			'expectedCode' : 542,
			'useSession' : true
		},
		{
			'name' : "KIS.fnAuft.insert Es wurde kein Sessionkey uebergeben",
			'functionName' : 'KIS.fnAuft.insert',
			'params' : '&newOrder_rentalPeriodFrom=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_rentalPeriodTo=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_service=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_street=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_houseNr=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_zipcode=017263748291029384756201928374657438391019283746573482391201929&newOrder_city=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_hintsToDelivery=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_salutation=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_lastname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_firstname=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_telephone2=äbcdefghijklmnopqrstuvwxyzCBCDEFGHIJKLMNOPQ&newOrder_email=cblazek@qits.de&_mandantID=6069078',
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
	loginuser : 'twiegand@qits.de',
	loginpassword : 'qits1234',
	'onSuccess' : function(skey) {
		testing.run(testcases, skey);
	}
});
