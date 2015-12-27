var wsutil = require('util');
exports.getSession=function(options) {
					var completeData="";
					http=options.http;
					options.path=options.path+ '?function=' + options.fnObject.appName + ".startSession&loginuser=" + options.fnObject.loginuser + "&nocompression=yes&format=json&loginpassword=" + options.fnObject.loginpassword;
					console.log("using ... "  + options.http + options.host + options.path);
					singleOpener=http.request(options, function(res)  {
						
						 res.on('end', function() {
							 try{
								 console.log("Data " + completeData.toString());
								 var jsonData=JSON.parse(completeData);
								 var sessionKey=jsonData[0].content.skey;
								 options.onSuccess(sessionKey);
							 } catch (e) {
								 console.log("ERROR " . completeData);
							 }
						  });
						 res.on('data', function(httpData) {
							 try{
								 strHttpData=httpData.toString();
								 completeData+=strHttpData;
								 
							 } catch (e) {
								 console.log("ERROR " . completeData);
							 }
						  }); 
					}).on('error', function(e) {
						 console.log("ERROR " . completeData);
					  });
					  singleOpener.end();
				};