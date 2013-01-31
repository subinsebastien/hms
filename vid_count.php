<?php
$video_ID = 'RveIJixVs4M';
$JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
$JSON_Data = json_decode($JSON);
$views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};

//mail
$deepak = "deepak@emdesic.com";
$subject = "Kumaran and Pornstar video has reached hits";
$headers = "From: kumar@youtube.com" . "\r\n" . "CC: subinsebastien@gmail.com";
//$text = " ";

mail($deepak, $subject, $views, $headers);


echo $views;
?>
