
function saveNewHazard(response)	{
	response.writeHead(200, {"Content-Type": "text/plain"});
	response.write("Nintriva-HMS API : This endpoint can be used to create new hazards in the database.\nA simple example would be http://host/save?title=Some Big Pothole&severity=medium");
	response.end();
}

function listAllHazard(response)	{
	response.writeHead(200, {"Content-Type": "text/plain"});
	response.write("Nintriva-HMS API : This end point can list all the hazards.\nOnce the API is mature, it might be responding in JSON");
	response.end();
}

function welcomeMessage(response)	{
	response.writeHead(200, {"Content-Type": "text/plain"});
	response.write("Hi There, welcome to the Nintriva-HMS API.\nPlease read the docs for more information.");
	response.end();
}

exports.save = saveNewHazard
exports.list = listAllHazard
exports.welcome = welcomeMessage
