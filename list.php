<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HMS</title>
    <meta name="description" content="">
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    
</head>

<body>

<div class="container">

	<div class="searchform">
    
	<form class="navbar-search pull-right">
    <input type="text" class="search-query" placeholder="Search">
    </form>
    
    </div> <!--end of searchform-->
    
    
    <?php

		$ch = curl_init();
		
		// Setting curl options
		
		curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/functions/list");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		//Setting Parse API keys and IDs
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		
		'X-Parse-Application-Id: uDAS1lt0f2SyOyL4XrgEtHBqZdxRlUpNVwlVBYdY',
		
		'X-Parse-REST-API-Key: aVL9vXIQ2E5iOCsFfvgtMHj0Ldlr03aDdY3XcR24',
		
		'Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');
		
		// Finally let it run
		
		$data = curl_exec($ch);
		
		$result = json_decode($data);
		
		curl_close($ch);
		
		//for listing the hazard details
		
		foreach ($result as $list) {
			foreach ($list as $li) {
			//echo '<pre>';
			echo '<div class="hazzard-content">';
			
			echo '<div class="hazzard-img">';
			echo '<img src="'.$li->imageUrl.'"/>';
			echo '</div>';
			
			echo '<div class="hazzard-list">';
			
			echo '<div class="hazzard-title">';
			echo $li->title;
			echo '</div>';
			
			echo '<div class="viewmap"><a href="https://maps.google.com/maps?q='.$li->latitude.', '.$li->longitude.' ('.$li->title.')" target="_blank"><button class="btn btn-primary" type="button">View Map</button></a></div>';
			
			echo '<br>';
			
			echo $li->reportedBy;
			
			echo '<br>';
			
			echo $li->description;
			
			echo '</div>'; //end of hazzard list
			
			echo '</div>'; //end of hazzard-content
			}
		}
		
	?>
    
   
</div> <!--end of container-->

</body>
</html>
