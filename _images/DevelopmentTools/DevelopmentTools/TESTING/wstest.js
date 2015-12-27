var http;
var util = require('util');
var fs = require('fs');

var config={};
var globalKey="";
exports.init=function(host, port, path, method, protocol, fnObject) {
	http=require(protocol);
	config={
			'host':host,
			'port':port,
			'path':path,
			'method':method
	};
	fnConfig={
			'host':host,
			'port':port,
			'path':path,
			'method':method,
			'fnObject':fnObject,
			'http':http,
			'onSuccess': fnObject.onSuccess
	};
	var fN = require('./wsfuturenet.js');
	fN.getSession(fnConfig);
	var waiter=0;
	/*while(globalKey=="") {
		waiter++;
		if(waiter>10000000000) process.exit(code=0);
	}*/
	console.log(globalKey);
};
stream = fs.createWriteStream("testResults", {
    flags: "a",
    mode: 0666
});
exports.run=function(arrayTests,skey) {
	totalItems=arrayTests.length;
	for(var i=0; i<totalItems;i++) {
		if(arrayTests[i].useSession==true) {
			var strSkey="&skey=" + skey;
		} else {
			var strSkey="";
		}
		var options=getOptions(arrayTests[i].name, arrayTests[i].functionName, arrayTests[i].params, arrayTests[i].expectedStatusCode, arrayTests[i].expectedResult, arrayTests[i].expectedCode, arrayTests[i].useSession, strSkey);
		execute(options);
	}
};
function getOptions(testName, functionName, parameter, expectedStatusCode, expectedResult, expectedCode, useSession, sessionKey) {
	if( typeof parameter === 'object' ) {
		var paramString="";
		for (var key in parameter) {
			var obj = parameter[key];
			 if (obj.hasOwnProperty(key)) pramString+="&" + key+"=" + encodeURIComponent(obj);
		}
		parameter=paramString;
	}
	parameter=parameter+sessionKey;
	var options= {
			  path: config.path + '?function=' + functionName + '&format=json&nocompression=yes&' + parameter,
			  host: config.host,
			  port: config.port,
			  method: config.method,
			  expectedStatusCode: expectedStatusCode,
			  expectedResult:expectedResult,
			  expectedCode:expectedCode,
			  useSession:useSession,
			  testResult:{'name': testName, 'state':0, 'statePassed':true, 'response':"OK", 'responsePassed':true, 'responseDescription':'', 'responseSeverity':'' }
		  };
	return options;
}

function execute(options) {
					var completeData="";
					singleOpener=http.request(options, function(res)  {
						console.log(options.testResult.name + " gestartet");
						console.log(options.host + options.path + " gestartet");
						 options.testResult.state=res.statusCode;
						 if(res.statusCode!=options.testResult.expectedStatusCode) {
							 options.testResult.statePassed=false;
						 }
						 res.on('end', function() {
							 try{
								 var jsonData=JSON.parse(completeData);
								 var jsonDataLen=jsonData.length;
								 var doRemoveRequest=true;
								 for(var i=0; i<jsonDataLen;i++) {
									 if((jsonData[i].answer!=options.expectedResult) || (jsonData[i].code!=options.expectedCode)) {
										 options.testResult.response=jsonData[i].answer;
										 options.testResult.responsePassed=false;
										 options.testResult.responseSeverity='FAILED';
										 options.testResult.responseDescription="Erwartetes Ergebnis: " + options.expectedResult + "(" + options.expectedCode + ")" + "  geliefertes Ergebnis: " + jsonData[i].answer + "(" + jsonData[i].code + ") :: " + jsonData[i].descr ;
									 }else {
										 options.testResult.response=jsonData[i].answer;
										 options.testResult.responsePassed=true;
										 options.testResult.responseSeverity='PASSED';
										 options.testResult.responseDescription="Erwartetes Ergebnis: " + options.expectedResult + "(" + options.expectedCode + ")" + "  geliefertes Ergebnis: " + jsonData[i].answer + "(" + jsonData[i].code + ") :: " + jsonData[i].descr ;
									 }
								 } 
								 console.log(options.testResult.responseSeverity + "; " + options.testResult.responseDescription);
								 stream.write(options.testResult.responseSeverity + "; " + options.testResult.name  + "; " + options.path  + "; " + options.testResult.responseDescription + "\n");
							 } catch (e) {
								 options.testResult.responseDescription="Es wurde kein gültiges Resultat zurück gegeben. " + e;
								 console.log("Data:" + completeData);
								 options.testResult.responseSeverity="CRASH";
								 options.testResult.response="ERROR";
								 console.log(options.testResult.responseSeverity + " " +  options.testResult.responseDescription);
								 stream.write(options.testResult.responseSeverity + "; " + options.testResult.name  + "; " + options.path  + "; " + options.testResult.responseDescription + "\n");
								 
							 }
						  });
						 res.on('data', function(httpData) {
							 try{
								 strHttpData=httpData.toString();
								 completeData+=strHttpData;
								 
							 } catch (e) {
								 options.testResult.responseDescription="Es wurde kein gültiges Resultat angegben. " + e;
								 options.testResult.responseSeverity="CRASH";
								 options.testResult.response="ERROR";
								 console.log(options.testResult.responseSeverity + " " +  options.testResult.responseDescription);
								 stream.write(options.testResult.responseSeverity + "; " + options.testResult.responseDescription+ "\n");
								 
							 }
						  }); 
					}).on('error', function(e) {
						 options.testResult.responseDescription="Es konnte keine Verbingung hergestellt werden. " + e;
						 options.testResult.responseSeverity="CRASH";
						 options.testResult.response="ERROR";
						 console.log(options.testResult.responseSeverity + " " +  options.testResult.responseDescription);
						 stream.write(options.testResult.responseSeverity + "; " + options.testResult.responseDescription+ "\n");
					  });
					  singleOpener.end();
				};
	

