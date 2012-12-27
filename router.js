var url = require("url");

function route(handle, request, response)	{
	var pathname = url.parse(request.url).pathname;
	if(typeof handle[pathname] === 'function')	{
		handle[pathname](response);
	}	else	{
		response.writeHead(404, {"Content-Type": "text/plain"});
		response.write("Nintriva-HMS API : No appropriate method found to handle this request");
		response.end();	
	}
}

exports.route = route
