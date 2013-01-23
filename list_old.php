<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>HMS</title>

</head>

<body>

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

//for listing the values

foreach ($result as $list) {
	foreach ($list as $li) {
	echo '<pre>';
	echo $li->title;
	echo '<br>';
	echo $li->reportedBy;
	echo '<br>';
	echo $li->description;
	}
}

?>

</body>
</html>