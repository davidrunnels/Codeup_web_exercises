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
        <label for="username">Guest ID<br></label>
        <input id="username" name="username" type="text">
    </p>
    <p>
        <label for="password">Secret Code<br></label>
        <input id="password" name="password" type="password">
    </p>
 <p>       
<button type="submit">Login</button>
</p>
<textarea id="email_body" name="email_body" rows="5" cols="40">Content Here</textarea>

<h2>Send E-mail to David:</h2>

<form action="MAILTO:david.runnels@gmail.com" method="post" >
Name:
<br>
<input type="text" name="name" value="your name"><br>
E-mail:<br>
<input type="text" name="mail" value="your email"><br>
Comment:<br>
<input type="text" name="comment" value="your comment" size="50"><br>
<input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>
<label for="mailing_list">Sign me up for the mailing list!<br></label><br>
<input type="submit" value="Send"><br>
<br>



</form>
    
    <p>
    </p>
</form>
</body>
</html>