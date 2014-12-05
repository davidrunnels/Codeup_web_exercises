<?php
	var_dump($_POST);
	var_dump($_GET);
?>
<html>
<head>
	<title>My First Form</title>
</head>
<body>
<form method="POST" action="/my_first_form.php">
    <p>
        <label for="username">Guest ID</label>
        <input id="username" name="username" type="text">
    </p>
    <p>
        <label for="password">Secret Code</label>
        <input id="password" name="password" type="password">
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
</body>
</html>