console.log("About to start server");

var http = require("http");

function start(route, handle)	{
	var server = http.createServer(function(request, response)	{
		route(handle, request, response);
	});
	server.listen(8888);
	console.log("Listening on port 8888");
}

exports.start = start;
