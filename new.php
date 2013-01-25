<?php

if (isset($_POST)) {

$jason=array();
$data = json_encode($_POST);


$target_path = "uploads/";
$img =rand().basename( $_FILES['image']['name']);
$target_path=$target_path.$img;


if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/files/".$img);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Setting Parse API keys and IDs as POST headers

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'X-Parse-Application-Id: uDAS1lt0f2SyOyL4XrgEtHBqZdxRlUpNVwlVBYdY',

'X-Parse-REST-API-Key: aVL9vXIQ2E5iOCsFfvgtMHj0Ldlr03aDdY3XcR24',

'Content-Type: application/json'));

$response = curl_exec($ch);

print($response);
print($img);

} else{
    echo "There was an error uploading the file, please try again!";
}

$json = json_decode($data,true);
$json['imageUrl']='test';
$data = json_encode($json);
//print($response);



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

//$response = curl_exec($ch);

curl_close($ch);

}

//header('Refresh:0;URL=list.php');
?>
