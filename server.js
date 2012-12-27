console.log("About to start server");

var http = require("http");
var port = process.env.PORT || 8888;

//The start method
function start(route, handle)	{
	var server = http.createServer(function(request, response)	{
		route(handle, request, response);
	});
	server.listen(port);
	console.log("Server Running...");
}

exports.start = start;
