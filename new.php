<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

if (isset($_POST)) {

		$data = json_encode($_POST);
		$appid ='uDAS1lt0f2SyOyL4XrgEtHBqZdxRlUpNVwlVBYdY';
		$api_key='aVL9vXIQ2E5iOCsFfvgtMHj0Ldlr03aDdY3XcR24';
		$target_path = "uploads/";
		
		$img =rand().basename( $_FILES['image']['name']);
		$target_path = $target_path.$img;
		

		//if(move_uploaded_file($_FILES['image']['tmp_name'],$target_path)) {
			//send the image to server
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/files/".$img);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								    'X-Parse-Application-Id:'.$appid,
								    'X-Parse-REST-API-Key:'.$api_key,
								    'Content-Type: image/jpeg'));
			//curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($target_path));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($_FILES['image']['tmp_name']));
            $response = curl_exec($ch);
            //get the image url 
			$url = json_decode($response,true);
			$json = json_decode($data,true);
			$json['imageUrl']=$url['url'];
			$data = json_encode($json);
			
			//send the data
			curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/functions/new");
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'X-Parse-Application-Id:'.$appid,
								'X-Parse-REST-API-Key:'.$api_key,
								'Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			curl_close($ch);

//		} else{
//		        echo "There was an error uploading the file, please try again!";
//		}

	}
header('Refresh:0;URL=list.php');	
?>
