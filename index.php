<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>HMS</title>

</head>

<body>

<!-- Define a form to fill up and set correct parameter names -->

<form action="http://hms.pagodabox.com/new.php" method="POST">

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

</body>

</html>