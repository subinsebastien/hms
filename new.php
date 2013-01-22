<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>HMS</title>

</head>

<body>

<!-- Define a form to fill up and set correct parameter names -->

<form action="new.php" method="POST">

<label for="title">Title:</label>

<br>

<input type="text" name="title" value="<?php echo @$_POST['title']; ?>" placeholder="Title" ><br/>

<br>

<label for="name">Name:</label>

<br>

<input type="text" name="reportedBy" value="<?php echo @$_POST['name'];?>" placeholder="Name" ><br/>

<br>

<label for="email">Email:</label>

<br>

<input type="email" placeholder="Email" name="reportedByEmail" value="<?php echo @$_POST['email'];?>" ><br/>

<br>

<label for="description">Description:</label>

<br>

<textarea name="description" placeholder="Description" value="<?php echo @$_POST['description'];?>"></textarea>

<br>

<br>

<input type="submit" value="Submit">

</form>

<!-- PHP stuff starts here, bingo! -->

<?php

if (isset($_POST)) {

$data = json_encode($_POST);
print_r($data);

$ch = curl_init();

// Setting curl options

curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/functions/new");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Setting Parse API keys and IDs as POST headers

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'X-Parse-Application-Id: uDAS1lt0f2SyOyL4XrgEtHBqZdxRlUpNVwlVBYdY',

'X-Parse-REST-API-Key: aVL9vXIQ2E5iOCsFfvgtMHj0Ldlr03aDdY3XcR24',

'Content-Type: application/json'));

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Finally let it run

$result = curl_exec($ch);

print_r($result);
curl_close($ch);

}

?>

</body>

</html>