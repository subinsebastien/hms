Parse.Cloud.define("new", function(request, response)	{

	if(request.params.title == undefined)	{
		response.success("Hazard title missing");
		return;
	}
	
	if(request.params.reportedBy == undefined)	{
		response.success("Hazard reporter name missing");
		return;
	}
	
	if(request.params.description == undefined)	{
		response.success("Hazard description is missing");
		return;
	}
	
	if(request.params.reportedByEmail == undefined)	{
		response.success("Hazard reporter email is missing");
		return;
	}
	
	var Hazard = Parse.Object.extend("Hazard");
	var hazard = new Hazard();
	hazard.save(
		{
			title : request.params.title,
			reportedBy : request.params.reportedBy,
			description : request.params.description,
			reportedByEmail : request.params.email
		},
		{
			success : function(hazard)	{
				response.success("200 OK");
			},
			error	: function(hazard, error)	{
				response.success("Error Saving Hazard");
			}
		}
	);
});


Parse.Cloud.define("list", function(request, response)	{
	var query = new Parse.Query(Parse.Object.extend("Hazard"));
	query.descending("createdAt");
	query.find(
		{
			success	: function(results)	{
				response.success(results);
			},
			error	: function(error)	{
				response.success("Error Retrieving Hazards");
			}
		}
	);
});
